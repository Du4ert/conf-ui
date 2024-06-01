<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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


    public function get($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }


// Common user
    public function home()
    {
      $user = auth()->user();
      $files = $user->files;
    //   $coauthors = $user->coauthors;

      // $fileByTypes = $user->fileByTypes($files);

      return view('user.home', compact('user'));
    }

    public function reports()
    {
      $user = auth()->user();
      $theses = $user->theses;

      $thesisByTypes = $user->thesisByTypes($theses);

      return view('user.reports', compact('user', 'thesisByTypes'));
    }

    public function documents()
    {
      $user = auth()->user();
      $files = $user->files;

      $fileByTypes = $user->fileByTypes($files);

      return view('user.files', compact('user', 'fileByTypes'));
    }

    public function editSelf(Request $request)
    {

      $user = auth()->user();
      $files = $user->files;
    //   $coauthors = $user->coauthors;

      $fileByTypes = $user->fileByTypes($files);

      return view('user.home', compact('user', 'fileByTypes'))->with(['editable' => true]);
    }

    public function updateSelf(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->route('home')->with('status', 'Profile updated successfully');
    }
}
