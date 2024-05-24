<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');
    }

// Admin
public function getUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    $files = $user->files;
    $coauthors = $user->coauthors;

    $fileByTypes = $user->fileByTypes($files);

    return view('admin.home', compact('user', 'fileByTypes', 'coauthors'));
}

public function edit(Request $request, $id)
{
    $user = User::findOrFail($id);
    
    $files = $user->files;
    $fileByTypes = $user->fileByTypes($files);
    
    return view('admin.home', compact('user', 'fileByTypes'))->with(['editable' => true]);
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update($request->all());

    return redirect()->route('user.get', ['id' => $id])->with('success', 'Profile updated successfully');
}

public function destroy($id)
{
  $user = User::findOrFail($id);
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
