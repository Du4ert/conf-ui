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


    public function get($id)
    {
        $author = Coauthor::findOrFail($id);
        return response()->json($author);
    }


    public function modal($id)
    {
        $author = Coauthor::findOrFail($id);
        return view('user.coauthor.modal_js', compact('author'));
    }


    public function store(Request $request, $thesisId)
    {
        $author = $request->author;

        $validatedData = $request->validate([
            'first_name' => 'required|string|min:2|max:50',
            'first_name_en' => 'required|string|min:2|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'last_name_en' => 'required|string|min:2|max:50',
            'middle_name' => 'nullable|string|max:50',
            'middle_name_en' => 'nullable|string|max:50',
            'organization_title' => 'nullable|string|max:3000',
            'organization_title_en' => 'nullable|string|max:3000',
        ]);

        $author = new Coauthor([
            'thesis_id' => $thesisId,
            'first_name' => $request['first_name'],
            'first_name_en' => $request['first_name_en'],
            'last_name' => $request['last_name'],
            'last_name_en' => $request['last_name_en'],
            'middle_name' => $request['middle_name'],
            'middle_name_en' => $request['middle_name_en'],
            'organization_title' => $request['organization_title'],
            'organization_title_en' => $request['organization_title_en'],
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
            'first_name' => 'required|string|min:1|max:50',
            'first_name_en' => 'required|string|min:1|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'last_name_en' => 'required|string|min:2|max:50',
            'middle_name' => 'nullable|string|max:50',
            'middle_name_en' => 'nullable|string|max:50',
            'organization_title' => 'nullable|string|max:1000',
            'organization_title_en' => 'nullable|string|max:1000',
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
