@php
 if (!isset($page)) {
    $page = 'home';
 }
@endphp
<strong class="me-sm-auto d-none d-md-inline">{{ __('auth.dashboard') }}</strong>

<a href="{{ route('home') }}" type="button" class="btn text-secondary btn-light @if ($page === 'home') active  @endif" role="button"><i
        class="fa fa-home me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.home') }}</span></a>

<a href="{{ route('reports') }}" class="btn  text-secondary btn-light ms-3  @if ($page === 'reports') active  @endif"
    role="button"><i class="fas fa-chalkboard-teacher me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.reports') }}</span></a>

<a href="{{ route('documents') }}" class="btn  text-secondary btn-light  ms-3  @if ($page === 'documents') active  @endif"
    role="button"><i class="fas fa-file-word me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.documents') }}</a>
    

