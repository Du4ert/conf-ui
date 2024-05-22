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


// Common user
    public function home()
    {
      $user = auth()->user();
      $thesis = $user->thesis;
      return view('auth.home', compact('user', 'thesis'));
    }

    public function editSelf(Request $request)
    {
      $user = auth()->user();
      return view('auth.home', compact('user'))->with(['editable' => true]);
    }

    public function updateSelf(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->route('home')->with('status', 'Profile updated successfully');
    }
}
