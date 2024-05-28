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
        return view('user.coauthor.show', compact('author'));
    }


    public function modal($id)
    {
        $author = Coauthor::findOrFail($id);
        return view('user.coauthor.modal_js', compact('author'));
    }


    public function store(Request $request, $userId)
    {
        $author = $request->author;

        $validatedData = $request->validate([
            'first_name' => 'required|string|min:2|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'middle_name' => 'nullable|string|max:50',
            'organization_title' => 'nullable|string|max:50',
            'job_title' => 'nullable|string|max:50',
            'rank_title' => 'nullable|string|max:50',
            'participate' => 'nullable|boolean',
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
            return response()->json(['success'=> 'Author added.', 'id' => $author->id]);
        } else {
            return back()->with('success', 'Author added.');
        }
    }

    public function update(Request $request, $id)
    {
        $author = Coauthor::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|min:2|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'middle_name' => 'nullable|string|max:50',
            'organization_title' => 'nullable|string|max:50',
            'job_title' => 'nullable|string|max:50',
            'rank_title' => 'nullable|string|max:50',
            'participate' => 'boolean',
        ]);

        $author->update($validatedData);
        
        if ($request->ajax()) {
            return response()->json(['success' => 'Author edited.', 'id' => $author->id]);
        } else {
            return back()->with('success', 'Author edited.');
        }
    }


    public function delete(Request $request, $id)
    {
        $author = Coauthor::findOrFail($id);
        $author->delete();

        if ($request->ajax()) {
            return response()->json(['success', 'Author deleted']);
        } else {
            return back()->with('success', 'Author deleted');
        }
        
    }


}
