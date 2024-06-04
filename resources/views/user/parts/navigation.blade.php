@php
 if (!isset($page)) {
    $page = 'home';
 }

 if (auth()->user()->isAdmin()) {
    $admin = true;
 } else {
    $admin = false;
 }
    

@endphp
<strong class="me-sm-auto d-none d-lg-inline">{{ __('auth.dashboard') }}</strong>

<a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" type="button" class="btn text-secondary btn-light @if ($page === 'home') active  @endif" role="button"><i
        class="fa fa-address-card  me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.home') }}</span></a>

<a href="{{ $admin ? route('user.get.reports', $user->id) : route('reports') }}" class="btn  text-secondary btn-light ms-3  @if ($page === 'reports') active  @endif"
    role="button"><i class="fas fa-chalkboard-teacher me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.reports') }}</span></a>

<a href="{{ $admin ? route('user.get.documents', $user->id) : route('documents') }}" class="btn  text-secondary btn-light  ms-3  @if ($page === 'documents') active  @endif"
    role="button"><i class="fas fa-file-word me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.documents') }}</a>
    

