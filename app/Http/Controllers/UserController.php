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
        // $this->middleware('admin')->except(['home', 'updateSelf']);
    }


// Common user
    public function home()
    {
      $user = auth()->user();
      return view('auth.home', compact('user'));
    }

    public function editSelf(Request $request)
    {
      $user = auth()->user();
      return view('auth.home', compact('user'))->with(['editable' => true]);
    }

    public function updateSelf(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //   ]);
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->route('home')->with('status', 'Profile updated successfully');
    }
}
