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
    
    public function show($id)
    {
        $author = Coauthor::findOrFail($id);
        
        return view('author', compact('author'));
    }

    public function store(Request $request, $userId)
    {
        $author = $request->author;

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'min:2'],
            'last_name' => ['required', 'string', 'min:2'],
            'middle_name',
            'organization_title',
            'job_title',
            'rank_title',
            'participate',
        ]);

        $author = new Coauthor([
            'user_id' => $userId,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'middle_name' => $request['middle_name'],
            'organization_title' => $request['organization_title'],
            'job_title' => $request['job_title'],
            'rank_title' => $request['rank_title'],
            'participate' => $request['participate'] ?? false,
        ]);

        $author->save();

        if ($request->ajax()) {
            return response()->json(['success', 'Автор добавлен.']);
        } else {
            return back()->with('success', 'Автор добавлен.');
        }
    }


    public function delete(Request $request, $id)
    {
        $author = Coauthor::findOrFail($id);
        $author->delete();

        if ($request->ajax()) {
            return response()->json(['success', 'Coauthor deleted']);
        } else {
            return back()->with('success', 'Coauthor deleted');
        }
        
    }


}
