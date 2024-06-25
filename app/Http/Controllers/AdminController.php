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


public function list()
{
  $users = User::query();

  $users = $users->when(request()->has('search'), function ($query) {
    $search = '%' . strtolower(request()->input('search')) . '%';
    return $query->where(function ($q) use ($search) {
        $q->where('last_name', 'LIKE', $search)
          ->orWhere('last_name_en', 'LIKE', $search);
    });
  });
  
  $users->when(request()->has('has_thesis'), function ($query) {
      $query = $query->whereHas('theses', function($query) {
        $section = request()->input('section');
        $report_form = request()->input('report_form');
        if ($section) {
          $query->where('section', $section);
        }
        if ($report_form) {
          $query->where('report_form', $report_form);
        }
        
      });
      return  $query->has('theses');
    });

  $users->when(request()->has('accepted_status'), function ($query) {
      return $query->where('accepted_status', true);
    });
  $users->when(request()->has('pay_status'), function ($query) {
      return $query->where('pay_status', true);
    });

  $users = $users->paginate(15);

  return view('admin.list', compact('users'));
}



}
