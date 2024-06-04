<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

      if (Auth::user()->isAdmin()) {
        return redirect()->route('user.list');
      }
    //   $coauthors = $user->coauthors;

      // $fileByTypes = $user->fileByTypes($files);

      return view('user.home', compact('user'));
    }

    public function reports()
    {
      $user = auth()->user();
      $theses = $user->theses;

      return view('user.reports', compact('user', 'theses'));
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

        $validatedData = $request->validate([
          // 'email' => 'required|string|email|max:255|unique:users',
          // 'password' => 'required|string|min:8|confirmed',
          'first_name' => 'required|string|min:2',
          'first_name_en' => 'required|string|min:2',
          'last_name' => 'required|string|min:2',
          'last_name_en' => 'required|string|min:2',
          'middle_name' => 'nullable|string|max:50',
          'middle_name_en' => 'nullable|string|max:50',
          'organization_title' => 'required|string|max:50',
          'organization_title' => 'required|string|max:50',            
          'job_title' => 'nullable|string|max:50',
          'job_title_en' => 'nullable|string|max:50',
          'rank_title' => 'nullable|string|max:50',
          'rank_title_en' => 'nullable|string|max:50',
          // 'pay_status' => 'nullable|boolean',
          // 'accepted_status' => 'nullable|boolean',
        ]);

        $user->update($validatedData);

        // $user->update($request->all());

        return redirect()->route('home')->with('status', 'Profile updated successfully');
    }
}
