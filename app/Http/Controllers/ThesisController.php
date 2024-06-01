<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;

class ThesisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    
    public function show($id)
    {
        $thesis = Thesis::findOrFail($id);
        return view('user.thesis.show', compact('thesis'));
    }


    public function get($id)
    {
        $thesis = Thesis::findOrFail($id);
        return response()->json($thesis);
    }


    public function create(Request $request)
    {
        $user = auth()->user();
        $theses = $user->theses;

        // Не больше 2х
        if ( $theses->count() >= 2 ) {

            if ($request->ajax()) {
                return response()->json(['errors' => 'User can only have two theses.']);
            } else {
            return back()->withErrors('User can only have two theses.');
            }
        }

        return view('user.thesis.create', compact('user'));
    }


    public function store(Request $request)
    {
        $userId = auth()->user()->id;

        $validatedData = $request->validate([
            'thesis_title' => 'required|string|max:50',
            'thesis_title_en' => 'required|string|max:50',
            'section' => 'required|in:genomics,biotechnology,breeding,bioresource',
            'report_form' => 'required|in:oral,poster,absentee',
            'text' => 'nullable|string',
            'text_en' => 'nullable|string',
        ]);

        $thesis = new Thesis([
            'user_id' => $userId,
            'thesis_title' => $request['thesis_title'],
            'thesis_title_en' => $request['thesis_title_en'],
            'text' => $request['text'],
            'text_en' => $request['text_en'],
            'section' => $request['section'],
            'report_form' => $request['report_form'],
        ]);

        $thesis->save();;

        return back()->with('success', 'Thesis created succesfully.');
    }

        public function download($id)
    {
        // $thesis = Thesis::findOrFail($id);
        
        // return response()->json($thesis));
    }


    public function delete(Request $request, $id)
    {
        $thesis = Thesis::findOrFail($id);
    
        $thesis->delete();

        if ($request->ajax()) {
            return response()->json(['success', 'Thesis deleted']);
        } else {
            return back()->with('success', 'Thesis deleted');
        }
        
    }
}
