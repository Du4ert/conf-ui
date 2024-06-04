@extends('layouts.auth')
@section('header')
    {{-- {{ __('Dashboard') }} --}}

<!-- Filter Form -->
<form action="{{ route('user.list') }}" class="w-100" method="get">
  <div class="filter d-md-flex align-items-center justify-content-between">
  @csrf

  
  <div class="form-group">
      <label for="has_thesis" class="me-1">Thesis:</label>
      <input type="checkbox" name="has_thesis" id="has_thesis" {{ request()->has('has_thesis') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
      <label for="accepted_status" class="me-1">Accepted:</label>
      <input type="checkbox" name="accepted_status" id="accepted_status" {{ request()->has('accepted_status') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
      <label for="pay_status" class="me-1">Pay:</label>
      <input type="checkbox" name="pay_status" id="pay_status" {{ request()->has('pay_status') ? 'checked' : '' }}>
  </div>

  <div class="form-group">
    <label for="search">Last name:</label>
    <input type="text" name="search" id="search" value="{{ request()->input('search') }}">
  </div>
  <button type="submit" class="btn btn-primary">Filter</button>
</div>
</form>

@endsection

@section('body')
    @foreach ($users as $user)
        @if ($user->role === 'admin')
            @continue
        @endif
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
                            <a href="{{ route('user.get', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
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

@section('footer')
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mx-auto">
    {{ $users->links() }}
  </div>
@endsection
