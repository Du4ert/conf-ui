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


// Common user
    public function home()
    {
      $user = auth()->user();
      $files = $user->files;

      $fileByTypes = $user->fileByTypes($files);

      return view('auth.home', compact('user', 'fileByTypes'));
    }

    public function editSelf(Request $request)
    {

      $user = auth()->user();
      $files = $user->files;
      $fileByTypes = [
        'thesis_ru' => $files->where('type', 'thesis_ru')->first(),
        'thesis_en' => $files->where('type', 'thesis_en')->first(),
        'poster' => $files->where('type', 'poster')->first(),
      ];

      return view('auth.home', compact('user', 'fileByTypes'))->with(['editable' => true]);
    }

    public function updateSelf(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->route('home')->with('status', 'Profile updated successfully');
    }
}
