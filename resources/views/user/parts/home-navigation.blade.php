<strong class="me-auto">{{ __('auth.dashboard') }}</strong>

<a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" type="button" class="btn text-secondary btn-light ms-3" role="button"><i
        class="fa fa-home me-2"></i> {{ __('auth.home') }}</a>

<a href="{{ $admin ? route('user.get', $user->id) : route('reports') }}" class="btn  text-secondary btn-light  ms-3"
    role="button"><i class="fa fa-file-alt me-2"></i> {{ __('auth.reports') }}</a>

<a href="{{ $admin ? route('user.get', $user->id) : route('files') }}" class="btn  text-secondary btn-light  ms-3"
    role="button"><i class="fas fa-file-word me-2"></i> {{ __('auth.documents') }}</a>
    

@if ($admin)
    <a class="btn btn-success " href="{{ route('user.list') }}"><i class="fa fa-list me-2"> {{ __('admin.list') }}</i></a>
@endif
