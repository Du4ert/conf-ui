@extends('layouts.auth')
@section('header')
    {{-- {{ __('Dashboard') }} --}}

<!-- Filter Form -->
<form action="{{ route('user.list') }}" class="w-100" method="get">
  <div class="filter d-md-flex align-items-center justify-content-between">
  @csrf

  
  <div class="form-group">
      <label for="has_thesis" class="me-1">{{ __('auth.admin_thesis') }}:</label>
      <input type="checkbox" name="has_thesis" id="has_thesis" {{ request()->has('has_thesis') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
      <label for="accepted_status" class="me-1">{{ __('auth.admin_accepted') }}:</label>
      <input type="checkbox" name="accepted_status" id="accepted_status" {{ request()->has('accepted_status') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
      <label for="pay_status" class="me-1">{{ __('auth.admin_pay') }}:</label>
      <input type="checkbox" name="pay_status" id="pay_status" {{ request()->has('pay_status') ? 'checked' : '' }}>
  </div>

  <div class="form-group">
    <label for="search">{{ __('auth.admin_last_name') }}:</label>
    <input type="text" name="search" id="search" value="{{ request()->input('search') }}" size="10">
  </div>
  <button type="submit" class="btn btn-primary d-inline mt-2 mt-md-0"><i class="fa-solid fa-filter me-md-2"></i><span class="d-none d-md-inline">{{ __('auth.admin_filter') }}:</span></button>
</div>
</form>

@endsection

@section('body')
    @foreach ($users as $user)
    @if ($user->role === 'admin')
      @continue
@endif
       @include('admin.parts.user')
    @endforeach
@endsection

@section('footer')
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mx-auto">
    {{ $users->links() }}
  </div>
  <h6 class="text-muted text-center">{{ __('auth.dashboard')}}</h6>
@endsection
