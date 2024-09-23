<div class="col-md-12 mb-5">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h5 class="col-md-4 card-title me-auto ms-auto ms-md-0"><a href="{{ route('impersonate.start', $user->id) }}" 
                    class="text-success"><i
                        class="fas fa-user-friends me-2"></i></a>{{ $user->email }}
                </h5>
                <div class="col-sm-8">
                    <div class="row align-items-center">
                        
                        @if ($user->accepted_status)
                            <div class="col-sm-8">
                                <div class="alert bg-success bg-opacity-25 my-0">
                                    <i class="fas fa-circle-check fa-lg me-2"></i>{{ __('auth.participate_accept') }}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <a form="accept-thesises" type="button" href="{{ route('user.decline', $user->id) }}"
                                    class="btn btn-danger me-2"><i
                                        class="fa fa-cancel me-1"></i>{{ __('auth.admin_cancel') }}</a>
                            </div>
                        @else
                        @if ($user->hasAcceptedThesis() && $user->pay_status)
                            <div class="col-sm-12 text-end">
                                <a form="accept-thesises" type="button" href="{{ route('user.accept', $user->id) }}"
                                    class="btn btn-success ms-auto  me-2"><i
                                        class="fa fa-check me-1"></i>{{ __('auth.admin_user_accept') }}</a>
                            </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>


        </div>
        <div class="card-body">
            @include('user.parts.info')
            @if ($user->theses()->exists())
            <div class="theses me-auto">
                Тезисы:
                @foreach ($user->theses as $thesis)
                    @include('admin.parts.theses')
                @endforeach
            </div>
            @endif
            <div class="documents me-auto">
                @include('admin.parts.files')
            </div>
        </div>
        <div class="card-footer">
            <div class="d-lg-flex justify-content-end">
                <div class="me-auto">
                    <form id="delete-user-{{ $user->id }}" class="delete-user"
                        action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="delete-button btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#deleteUserModal" {{$user->accepted_status ? 'disabled' : '' }}><i
                                class="fa fa-trash me-2"></i>{{ __('auth.admin_delete') }}</button>
                    </form>
                </div>
                <div>
                    <a href="{{ route('user.get', $user->id) }}"
                        class="btn btn-outline-light text-secondary btn-sm me-4"><i
                            class="fas fa-user-alt me-2"></i>{{ __('auth.admin_show') }}</a>
                </div>
                <div>
                    <a href="{{ route('user.get.reports', $user->id) }}"
                        class="btn btn-outline-light text-secondary btn-sm me-4"><i
                            class="fas fa-chalkboard-teacher me-2"></i>{{ __('auth.reports') }}</a>
                </div>
                <div>
                    <a href="{{ route('user.get.documents', $user->id) }}"
                        class="btn btn-outline-light text-secondary btn-sm me-4"><i
                            class="far fas fa-file-word me-2"></i>{{ __('auth.documents') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="deleteUserModalLabel" class="modal-title">{{ __('auth.admin_delete') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ __('auth.admin_delete_confirmation') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"
                    data-bs-dismiss="modal">{{ __('auth.cancel') }}</button>
                <button type="button" class="btn btn-danger" form="delete-user">{{ __('auth.admin_delete') }}</button>
            </div>
        </div>
    </div>
</div>

<script type="module">
    $(document).ready(function() {

        const modal = $('#deleteUserModal');

        // $('#myModal').modal('show'); 

        $('.delete-button').on('click', function(e) {
            const form = $(this).closest('form').attr('id');
            e.preventDefault();
            modal.data('form', form)

        })

        modal.on('show.bs.modal', function() {
            modal.find('.btn.btn-danger').on('click', function() {
                $('#' + modal.data('form')).submit();
            });
        });

    });
</script>
