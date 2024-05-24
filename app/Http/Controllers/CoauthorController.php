<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coauthor;

class CoauthorController extends Controller
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
        $author = $request->author;

        $validatedData = $request->validate([
            'type' => 'required|string|max:50',
            'author' => 'required|mimes:doc,docx,pdf,txt,jpg,png,gif'
        ]);

        $type = $validatedData['type'];
        $extension = $author->extension();

        $authorName = $type . '-' . time() . '.' . $extension;
        $author->storeAs('public/' . $userId . '/', $authorName);

        $author = new Coauthor([
            'type' => $type,
            'author' => $authorName,
            'user_id' => $userId,
        ]);

        $author->save();

        if ($request->ajax()) {
            return response()->json(['success', 'Тезис успешно сохранен.']);
        } else {
            return back()->with('success', 'Тезис успешно сохранен.');
        }
    }

        public function download($id, $type = 'author')
    {
        $author = Coauthor::findOrFail($id);
        $userId = $author->user_id;
        
        $authorPath = public_path('storage/' . $userId . '/' . $author->author);
        
        return response()->download($authorPath, $author->author);
    }


    public function delete(Request $request, $id)
    {
        $author = Coauthor::findOrFail($id);
        $userId = $author->user_id;

        $authorPath = public_path('storage/' . $userId . '/' . $author->author);

        if (author_exists($authorPath)) {
            unlink($authorPath);
        }
    
        $author->delete();

        if ($request->ajax()) {
            return response()->json(['success', 'Coauthor deleted']);
        } else {
            return back()->with('success', 'Coauthor deleted');
        }
        
    }


}
