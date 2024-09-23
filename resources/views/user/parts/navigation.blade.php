@php
 if (!isset($page)) {
    $page = 'home';
 }

@endphp
@if (session()->has('impersonator'))
      <a href="{{ route('impersonate.stop') }}" type="button" class="btn text-danger btn-light" role="button"><i
         class="fas fa-user-times  me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.impersonate_stop') }}</span></a>
@else
@if (auth()->user()->isAdmin())
   <a href="{{ route('impersonate.start', $user->id) }}" type="button" class="btn text-success btn-light" role="button"><i
   class="fas fa-user-friends  me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.impersonate_start') }}</span></a>
@else
<strong class="me-sm-auto d-none d-lg-inline">{{ __('auth.dashboard') }}</strong>
@endif
@endif

@if ($user->accepted_status)
<div class="alert bg-success bg-opacity-25 my-0 me-4">
   <i class="fas fa-circle-check fa-lg me-2"></i>{{ __('auth.participate_accept') }}
</div>
@endif

@if (auth()->user()->isAdmin())
<a href="{{ route('user.list') }}" type="button" class="btn text-secondary btn-light" role="button"><i
   class="fas fa-list  me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.list') }}</span></a>
@endif

<a href="{{ auth()->user()->isAdmin() ? route('user.get', $user->id) : route('home') }}" type="button" class="btn text-secondary btn-light @if ($page === 'home') active  @endif" role="button"><i
        class="fas fa-user-alt  me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.home') }}</span></a>

<a href="{{ auth()->user()->isAdmin() ? route('user.get.reports', $user->id) : route('reports') }}" class="btn  text-secondary btn-light ms-3  @if ($page === 'reports') active  @endif"
    role="button"><i class="fas fa-chalkboard-teacher me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.reports') }}</span></a>

<a href="{{ auth()->user()->isAdmin() ? route('user.get.documents', $user->id) : route('documents') }}" class="btn  text-secondary btn-light  ms-3  @if ($page === 'documents') active  @endif"
    role="button"><i class="fas fa-file-word me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.documents') }}</a>
    

