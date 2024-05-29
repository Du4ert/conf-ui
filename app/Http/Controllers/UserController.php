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

    public $avaliableFileTypes = ['thesis_ru', 'thesis_en', 'poster'];

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
      $coauthors = $user->coauthors;

      $fileByTypes = $user->fileByTypes($files);

      return view('user.home', compact('user', 'fileByTypes', 'coauthors'));
    }

    public function editSelf(Request $request)
    {

      $user = auth()->user();
      $files = $user->files;
      $coauthors = $user->coauthors;

      $fileByTypes = $user->fileByTypes($files);

      return view('user.home', compact('user', 'fileByTypes', 'coauthors'))->with(['editable' => true]);
    }

    public function updateSelf(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->route('home')->with('status', 'Profile updated successfully');
    }
}
