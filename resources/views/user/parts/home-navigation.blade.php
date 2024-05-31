<strong class="me-xs-auto d-none d-xs-inline">{{ __('auth.dashboard') }}</strong>

<a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" type="button" class="btn text-secondary btn-light fs-2 fs-xs-1" role="button"><i
        class="fa fa-home me-xs-2"></i><span class="d-none d-xs-inline"> {{ __('auth.home') }}</span></a>

<a href="{{ $admin ? route('user.get', $user->id) : route('reports') }}" class="btn  text-secondary btn-light  fs-2 fs-xs-1 ms-3"
    role="button"><i class="fa fa-file-alt me-xs-2"></i><span class="d-none d-xs-inline"> {{ __('auth.reports') }}</span></a>

<a href="{{ $admin ? route('user.get', $user->id) : route('files') }}" class="btn  text-secondary btn-light  fs-2 fs-xs-1 ms-3"
    role="button"><i class="fas fa-file-word me-xs-2"></i><span class="d-none d-xs-inline"> {{ __('auth.documents') }}</a>
    

@if ($admin)
    <a class="btn btn-success " href="{{ route('user.list') }}"><i class="fa fa-list me-2"> {{ __('admin.list') }}</span></i></a>
@endif
