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
        $this->middleware('admin')->except(['home', 'updateSelf']);
    }



    public function home()
    {
      $user = auth()->user();
      return view('auth.home', compact('user'));
    }

    public function getUser(Request $request, $id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }


    public function edit(Request $request, $id)
    {
      $user = User::find($id);
        return view('admin.edit', compact('user'));
    }

    public function updateSelf(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
          ]);
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->route('home')->with('status', 'Profile updated successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
          ]);
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('user.edit', ['id' => $id])->with('status', 'Profile updated successfully');
    }

    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('user.list')
        ->with('success', 'Post deleted successfully');
    }


    public function list()
    {
      $users = User::all();
      return view('admin.index', compact('users'));
    }
}
