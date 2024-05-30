<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


    public function store(Request $request, $userId)
    {
        

        $validatedData = $request->validate([
            'type' => 'required|string|max:50',
            'thesis_title' => 'required|string|max:50',
            'section' => 'required|string',
            'report_form' => 'required|string',
            'text' => 'required|string',
        ]);

        $sameTypes = Thesis::where('user_id', $userId)->where('type', $type)->count();
        if ( $sameTypes >= 1) {

            if ($request->ajax()) {
                return response()->json(['errors' => 'User can only have one thesis for each type.']);
            } else {
            return back()->withErrors('User can only have one thesis for each type.');
            }
        }


        if ($request->ajax()) {
            return response()->json(['success' => 'Тезис успешно сохранен.']);
        } else {
            return back()->with('success', 'Тезис успешно сохранен.');
        }
    }

        public function download($id, $type = 'file')
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
