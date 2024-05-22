<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;

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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file',
        ]);
        
        $file = $request->file('file');
        $filePath = $file->store('theses', 'public');
        
        $thesis = new Thesis([
            'title' => $validatedData['title'],
            'file_path' => $filePath,
            'user_id' => auth()->id(),
        ]);
        
        $thesis->save();
        
        return back()->with('status', 'Тезис успешно сохранен.');
    }

    public function download($id)
    {
        $thesis = Thesis::findOrFail($id);
        
        $filePath = storage_path('app/' . $thesis->file_path);
        
        return response()->download($filePath, $thesis->title . '.pdf');
    }

}
