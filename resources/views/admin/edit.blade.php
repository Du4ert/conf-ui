@extends('layouts.auth')
@section('header')
{{ __('Dashboard') }}
@endsection

@section('body')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h1>Admin home</h1>
    {{ __('You are logged in!') }}

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <h3>User data</h3>
            <form action="{{ route('user.update', $user->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $user->name }}">
              </div>

              <button type="submit" class="btn mt-3 btn-primary">Update Data</button>
            </form>
          </div>
        </div>
      </div>

@endsection
