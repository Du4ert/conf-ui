@php
if (!isset($editable)) {
  $editable = false;
}
if (!isset($admin)) {
  $admin = false;
}
@endphp

@extends('layouts.auth')
@section('header')
{{ __('auth.dashboard') }}
@endsection

@section('body')


    
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {{ __('auth.logged_in') }}
    
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            @if (!$editable)
            <a href="{{ $admin ? route('user.edit', $user->id) : route('user.editSelf') }}" class="btn btn-warning" role="button">Edit</a>
            @endif
            <h3>User data</h3>
             <form action="{{ $admin ? route('user.update', $user->id) : route('user.updateSelf') }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="name">Name</label>
                <input {{$editable ? '' : 'disabled'}} type="text" name="name" value="{{ $user->name }}">
              </div>

              @if ($editable)
                <button type="submit" class="btn mt-3 btn-primary">Update Data</button>
              @endif
              
            </form>
          </div>
        </div>
      </div>

@endsection
