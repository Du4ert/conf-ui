<strong class="me-sm-auto d-none d-md-inline">{{ __('auth.dashboard') }}</strong>

<a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" type="button" class="btn text-secondary btn-light" role="button"><i
        class="fa fa-home me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.home') }}</span></a>

<a href="{{ $admin ? route('user.get', $user->id) : route('reports') }}" class="btn  text-secondary btn-light ms-3"
    role="button"><i class="fas fa-chalkboard-teacher me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.reports') }}</span></a>

<a href="{{ $admin ? route('user.get', $user->id) : route('documents') }}" class="btn  text-secondary btn-light  ms-3"
    role="button"><i class="fas fa-file-word me-sm-2"></i><span class="d-none d-md-inline"> {{ __('auth.documents') }}</a>
    

@if ($admin)
    <a class="btn btn-success " href="{{ route('user.list') }}"><i class="fa fa-list me-2"> {{ __('admin.list') }}</span></i></a>
@endif
