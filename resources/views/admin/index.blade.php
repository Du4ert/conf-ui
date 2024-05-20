@extends('layouts.auth')
@section('header')
{{ __('Dashboard') }}
@endsection

@section('body')
    <h1>Hello admin</h1>
    @foreach ($users as $user)
    <div class="col-sm">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">{{ $user->name }}</h5>
        </div>
        <div class="card-body">
          <p class="card-text">{{ $user->email }}</p>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm">
              <a href="{{ route('user.get', $user->id) }}"
        class="btn btn-primary btn-sm">Edit</a>
            </div>
            <div class="col-sm">
                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection
