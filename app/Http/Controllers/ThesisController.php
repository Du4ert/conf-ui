<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;
use Illuminate\Support\Facades\Storage;

class ThesisController extends Controller
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:doc,docx,pdf,txt'
        ]);

        $file = $request->file;
        $type = $file->extension();
        $userId = auth()->id();

        $fileName = $userId . '-' . time() . '.' . $type;
        $file->storeAs('public/theses', $fileName);

        $thesis = new Thesis([
            'title' => $validatedData['title'],
            'file' => $fileName,
            'user_id' => auth()->id(),
        ]);

        $thesis->save();

        if ($request->ajax()) {
            return response()->json(['success', 'Тезис успешно сохранен.']);
        } else {
            return redirect()->route('home')->with('success', 'Тезис успешно сохранен.');
        }
    }

        public function download($id)
    {
        $thesis = Thesis::findOrFail($id);
        
        $filePath = public_path('storage/theses/' . $thesis->file);
        
        return response()->download($filePath, $thesis->file);
    }


    public function delete($id)
    {
        $thesis = Thesis::findOrFail($id);
        $filePath = public_path('storage/theses/' . $thesis->file);

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        $thesis->delete();
        
        return back()->with('success', 'Thesis deleted');
    }


}
