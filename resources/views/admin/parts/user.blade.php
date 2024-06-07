<div class="col-sm">
<div class="card">
    <div class="card-header">
        

<div class="d-flex justify-content-start align-items-center mt-4">
    <h5 class="card-title me-auto">{{ $user->email }}</h5>
    @if ($user->accepted_status)
        <div class="alert bg-success bg-opacity-25 my-0 me-4">
            <i class="fas fa-circle-check fa-lg me-2"></i>{{ __('auth.participate_accept') }}
        </div>
        <a form="accept-thesises" type="button" href="{{ route('user.decline', $user->id) }}"
            class="btn btn-danger me-2"><i class="fa fa-cancel me-1"></i>{{ __('auth.admin_cancel') }}</a>
    @else
        <a form="accept-thesises" type="button" href="{{ route('user.accept', $user->id) }}"
            class="btn btn-success me-2"><i class="fa fa-check me-1"></i>{{ __('auth.admin_user_accept') }}</a>
    @endif
    </div>


    </div>
    <div class="card-body">
        @include('user.parts.info')
        <div class="theses me-auto">
        @foreach ($user->theses as $thesis)
            @include('admin.parts.theses')
        @endforeach
         </div>
    </div>
    <div class="card-footer">
        <div class="d-lg-flex justify-content-end">
            <div>
                <a href="{{ route('user.get', $user->id) }}" class="btn btn-primary btn-sm me-4"><i class="fas fa-user-alt me-2"></i>{{ __('auth.admin_show') }}</a>
            </div>
            <div>
                <a href="{{ route('user.get.reports', $user->id) }}" class="btn btn-primary btn-sm me-4"><i class="fas fa-chalkboard-teacher me-2"></i>{{ __('auth.reports') }}</a>
            </div>
            <div>
                <a href="{{ route('user.get.documents', $user->id) }}" class="btn btn-primary btn-sm me-4"><i class="far fas fa-file-word me-2"></i>{{ __('auth.documents') }}</a>
            </div>
            <div>
                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash me-2"></i>{{ __('auth.admin_delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>