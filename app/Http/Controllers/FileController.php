<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;

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
    
    public function show()
    {
//
    }

    public function store(Request $request, $userId)
    {
        $file = $request->file;
        $extension = $file->extension();

        $validatedData = $request->validate([
            'type' => 'required|string|max:50',
            'file' => 'required|mimes:doc,docx,pdf,txt,jpg,png,gif'
        ]);

        $type = $validatedData['type'];

        $fileName = $type . '-' . time() . '.' . $extension;
        $file->storeAs('public/' . $userId . '/', $fileName);

        $file = new Files([
            'type' => $type,
            'file' => $fileName,
            'user_id' => $userId,
        ]);

        $file->save();

        if ($request->ajax()) {
            return response()->json(['success', 'Тезис успешно сохранен.']);
        } else {
            return redirect()->route('home')->with('success', 'Тезис успешно сохранен.');
        }
    }

        public function download($id, $type = 'file')
    {
        $file = Files::findOrFail($id)->first();
        $userId = $file->user_id;
        
        $filePath = public_path('storage/' . $userId . '/' . $file->file);
        
        return response()->download($filePath, $file->file);
    }


    public function delete(Request $request, $id)
    {
        $file = Files::findOrFail($id)->first();
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
