@extends('layouts.admin')
@section('header')
    {{-- {{ __('Dashboard') }} --}}

@include('admin.parts.filter')

@endsection

@section('body')
<div class="row mb-4">
  <div class="col-md-12">
  <h5 class="text-center">{{ __('auth.admin_found') }} <span>{{ @count($users) }}</span> {{__('auth.admin_users') }}:</h5>
</div>
</div>
<div class="row">
    @foreach ($users as $user)
    @if ($user->role === 'admin')
      @continue
@endif
       @include('admin.parts.user')
    @endforeach
  </div>
@endsection

@section('footer')
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mx-auto">
    {{ $users->links() }}
  </div>
  <h6 class="text-muted text-center">{{ __('auth.dashboard')}}</h6>
@endsection
