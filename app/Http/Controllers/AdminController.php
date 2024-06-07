<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Thesis;

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

    return view('user.home', compact('user', 'fileByTypes', 'coauthors'));
}

// public function edit(Request $request, $id)
// {
//     $user = User::findOrFail($id);
    
//     $files = $user->files;
//     $fileByTypes = $user->fileByTypes($files);
    
//     return view('admin.home', compact('user', 'fileByTypes'))->with(['editable' => true]);
// }

// public function update(Request $request, $id)
// {
//     $user = User::findOrFail($id);
//     $user->update($request->all());

//     return redirect()->route('user.get', ['id' => $id])->with('success', 'Profile updated successfully');
// }

public function paymentAccept($id)
{
  $user = User::findOrFail($id);
    $user->pay_status = true;
    $user->save();

    return back();
}

public function paymentDecline($id)
{
  $user = User::findOrFail($id);
    $user->pay_status = false;
    $user->save();

    return back();
}

public function participationAccept($id)
{
  $user = User::findOrFail($id);
    $user->accepted_status = true;
    $user->save();

    return back();
}

public function participationDecline($id)
{
  $user = User::findOrFail($id);
    $user->accepted_status = false;
    $user->save();

    return back();
}


public function thesisAccept($id)
{
    $thesis = Thesis::findOrFail($id);
    $thesis->accepted_status = true;
    $thesis->save();

    return back();
}

public function thesisDecline($id)
{
    $thesis = Thesis::findOrFail($id);
    $thesis->accepted_status = false;
    $thesis->save();

    return back();
}

public function destroy($id)
{
  $user = User::findOrFail($id);
  $user->delete();
  return redirect()->route('user.list')
    ->with('success', 'Post deleted successfully');
}

public function reports($id)
{
  $user = User::findOrFail($id);
  $theses = $user->theses;

  return view('user.reports', compact('user', 'theses'));
}


public function documents($id)
{
  $user = User::findOrFail($id);
  $files = $user->files;

  $fileByTypes = $user->fileByTypes($files);

  return view('user.files', compact('user', 'fileByTypes'));
}

// public function list()
// {
//   $query = request()->query();

// $users = User::when(request()->has('has_thesis'), function ($query) {
//             return $query->whereNotNull('email_verified_at')->has('theses');
//         })->when(request()->has('accepted_status'), function ($query) {
//             return $query->where('accepted_status', true);
//         })->when(request()->has('pay_status'), function ($query) {
//             return $query->where('pay_status', true);
//         })->paginate(15);
  

//   return view('admin.index', compact('users'));
// }

public function list()
{
  $query = request()->query();

$users = User::whereRaw("lower(last_name) like ? or lower(last_name_en) like ?", ['%' . request()->input('search') . '%', '%' . request()->input('search') . '%'])
          ->when(request()->has('has_thesis'), function ($query) {
            return $query->whereNotNull('email_verified_at')->has('theses');
        })->when(request()->has('accepted_status'), function ($query) {
            return $query->where('accepted_status', true);
        })->when(request()->has('pay_status'), function ($query) {
            return $query->where('pay_status', true);
        })->paginate(15);
  

  return view('admin.list', compact('users'));
}

}
