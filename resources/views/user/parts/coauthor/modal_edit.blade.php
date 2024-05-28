@php
    $editable = true;
@endphp
<!-- Modal -->
<div id="{{ $author->id }}-coauthorModalEdit" data-id="{{ $author->id ?? '' }}" class="modal fade" tabindex="-1"
    aria-labelledby="coauthorModalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coauthorModalEditLabel">{{ __('coauthor.add') }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div id="coauthor-add-alert" class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>

                <form id="{{ $author->id }}-coauthor-form" class="coauthor-edit-form" action="{{ route('coauthor.update', $author->id ) }}" method="POST" class="mt-2">
                    @csrf

                    @include('user.parts.coauthor.field', ['form' => $author->id . '-coauthor-form', 'field_name' => 'last_name', 'required' => true])
                    @include('user.parts.coauthor.field', ['form' => $author->id . '-coauthor-form', 'field_name' => 'first_name', 'required' => true,])
                    @include('user.parts.coauthor.field', ['form' => $author->id . '-coauthor-form', 'field_name' => 'middle_name'])
                    @include('user.parts.coauthor.field', ['form' => $author->id . '-coauthor-form', 'field_name' => 'organization_title'])
                    @include('user.parts.coauthor.field', ['form' => $author->id . '-coauthor-form', 'field_name' => 'rank_title'])
                    @include('user.parts.coauthor.field', ['form' => $author->id . '-coauthor-form', 'field_name' => 'job_title'])

                    <div class="form-check">
                        <input class="form-check-input participate-check" type="checkbox" value="{{ $author->participate }}" name="participate">
                        <label class="form-check-label" for="coauthor-form">
                            {{ __('coauthor.participate') }}
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button  class="coauthor-close btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button  type="submit" class="coauthor-save btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script type="module">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function() {
    
    const SITEURL = '{{ URL::to('') }}';
    
    const coauthors = $('#coauthors .coauthors-list');
    const modal = $('#{{ $author->id }}-coauthorModalEdit');
    const formAdd = modal.find('.coauthor-edit-form');
    const buttonSave = modal.find('.coauthor-save');
    const modalClose = modal.find('.coauthor-close');
    const participate = modal.find('.participate-check');

    if(participate.val() == 1){
        participate.prop({checked: true});
    }
    console.log(participate.val());
    
    function reloadCoauthor(id) {

        $.ajax({
            url: SITEURL + '/coauthor/' + id + '/show',
            type: "GET",
            success: function(response) {
                coauthors.find('[data-id=' + id +']').replaceWith(response);
            },
            error: function(response) {
                // alertError(response);
            }
        });
    
    }
    
    formAdd.on('submit', function(e) {
        console.log('submit');
    e.preventDefault();
    const formData = new FormData(this);
    
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            modalClose.click();
            reloadCoauthor(response.id);
        },
        error: function(response) {
            alertError(response);
        }
    });
    });
    
    buttonSave.on('click', (e) => {
        console.log('click');
    formAdd.submit();
    });
    
    function alertError(response) {
    const alert = modal.find('.alert');
    alert.removeClass('alert-success').addClass('alert-danger').show();
    alert.find('ul').html('');
    
    $.each(response.responseJSON.errors, function(key, value) {
        alert.find('ul').append('<li>' + value + '</li>');
    });
    }
    });

    $('body').on('hidden.bs.modal', '.modal', function() {
    $(this).find('form')[0].reset();
    $(this).find('input[type="text"],input[type="email"],textarea,select').each(function() {
    if (this.defaultValue != '' || this.value != this.defaultValue) {
        this.value = this.defaultValue;
    } else {
        this.value = '';
    }
    });
});
</script>