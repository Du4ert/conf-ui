<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;
use App\Models\Coauthor;
use App\Models\User;
use App\Mail\ThesisSubmitted;
use App\Notifications\ThesisSubmittedNotification;
use Illuminate\Support\Facades\Mail;
use PDF;

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

        $thesis = new Thesis([
            'user_id' => $user->id,
        ]);
        $thesis->save();

        return redirect()->route('thesis.edit', $thesis->id);
    }


    public function edit($id) {
        $thesis = Thesis::findOrFail($id);

        if ($thesis->accepted_status ) {
            return abort('404');
        }

        $user = $thesis->user;
        $authors = $thesis->coauthors;

        return view('user.thesis.edit', compact('thesis', 'user', 'authors'));
    }

    public function update(Request $request, $id) {
        $thesis = Thesis::findOrFail($id);

        $thesis->update($request->all());

        return redirect()->route('reports')->with('success', 'Report updated successfully');
    }


    public function submit(Request $request, $id)
    {
        

        $validatedData = $request->validate([
            'thesis_title' => 'required|string|max:500',
            'thesis_title_en' => 'required|string|max:500',
            'section' => 'required|in:genomics,biotechnology,breeding,bioresource',
            'report_form' => 'required|in:oral,poster,absentee',
            'text' => 'required|string|max:5000',
            'text_en' => 'required|string|max:5000',
        ]);

        $thesis = Thesis::findOrFail($id);

        $validatedData['submitted_status'] = true;
        $thesis->update($validatedData);

        $admins = User::where('role', 'admin')->get('email');
        // Mail::cc($admins)->send(new ThesisSubmitted($thesis->user));
        foreach ($admins as $admin) {
            $admin->notify(new ThesisSubmittedNotification($thesis->user));
        }
        

        return redirect()->route('reports');
    }

    // public function getUserAffiliations($lang = 'ru') {
    //     $title = 'organization_title';
    //     if ($lang === 'en') {
    //         $title = 'organization_title_en';
    //     }

    //     $user = $this->user();

    //     $user_affiliations = [];
    //     $user_affiliations = array_map('trim', explode(';', $user->$title));

    //     return $user_affiliations;
    // }

    // public function setAllAffiliations($authors, $lang = 'ru') {
    //     $title = 'organization_title';
    //     if ($lang === 'en') {
    //         $title = 'organization_title_en';
    //     }

    //     $all_affiliations = $this->getUserAffiliations($lang);
    
    //     foreach ($authors as $author) {
    //         if (!$author->$title) {
    //             continue;
    //         }
    
    //             $author_affiliations = array_map('trim', explode(';', $author->$title));
    
    //             foreach ($author_affiliations as $affiliation) {
    
    //                 if (!in_array($affiliation, $all_affiliations)) {
    //                 $all_affiliations[] = $affiliation;
    //             }
    //         }
    //     }
    //     return $all_affiliations;
    // }

    public function download($id)
    {
        $thesis = Thesis::findOrFail($id);

        $user = $thesis->user;
        $authors = $thesis->coauthors;
              
        $pdf = PDF::loadView('pdf.downloadPDF', compact('thesis', 'user', 'authors'));
       
        // return $pdf->download($user->last_name . '.pdf');
        // !DEBUG
        return view('pdf.downloadPDF', compact('thesis', 'user', 'authors'));

}

public function downloadEn($id)
{
    $thesis = Thesis::findOrFail($id);

    $user = $thesis->user;
    $authors = $thesis->coauthors;
          
    $pdf = PDF::loadView('pdf.downloadEnPDF', compact('thesis', 'user', 'authors'));
   
    // return $pdf->download($user->last_name . '_EN.pdf');
    // !DEBUG
    return view('pdf.downloadEnPDF', compact('thesis', 'user', 'authors'));
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
