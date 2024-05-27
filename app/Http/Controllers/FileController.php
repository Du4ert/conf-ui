<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    
    public function show($id)
    {
        $file = File::findOrFail($id);
        $type = $file->type;
        // $path = $file->file;
        $userId = $file->user_id;

        return response()->json(['id' => $id, 'type' => $type, 'userId' => $userId]);
    }

    public function store(Request $request, $userId)
    {
        $file = $request->file;
        

        $validatedData = $request->validate([
            'type' => 'required|string|max:50',
            'file' => 'required|mimes:doc,docx,pdf,txt,jpg,png,gif',
        ]);

        
        $type = $validatedData['type'];

        $sameTypes = File::where('user_id', $userId)->where('type', $type)->count();
        if ( $sameTypes >= 1) {

            if ($request->ajax()) {
                return response()->json(['errors' => 'User can only have one file for each type.']);
            } else {
            return back()->withErrors('User can only have one file for each type.');
            }
        }


        $extension = $file->extension();

        $fileName = $type . '-' . time() . '.' . $extension;
        $file->storeAs('public/' . $userId . '/', $fileName);

        $file = new File([
            'type' => $type,
            'file' => $fileName,
            'user_id' => $userId,
        ]);

        $file->save();
        $newId = $file->id;

        if ($request->ajax()) {
            return response()->json(['success' => 'Тезис успешно сохранен.', 'id' => $newId, 'extension' => $extension, 'name' => $fileName]);
        } else {
            return back()->with('success', 'Тезис успешно сохранен.');
        }
    }

        public function download($id, $type = 'file')
    {
        $file = File::findOrFail($id);
        $userId = $file->user_id;
        
        $filePath = public_path('storage/' . $userId . '/' . $file->file);
        
        return response()->download($filePath, $file->file);
    }


    public function delete(Request $request, $id)
    {
        $file = File::findOrFail($id);
        $userId = $file->user_id;

        $filePath = public_path('storage/' . $userId . '/' . $file->file);

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        $file->delete();

        if ($request->ajax()) {
            return response()->json(['success', 'File deleted']);
        } else {
            return back()->with('success', 'File deleted');
        }
        
    }


}
