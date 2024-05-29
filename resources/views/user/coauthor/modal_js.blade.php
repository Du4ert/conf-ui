<!-- Modal -->
<div id="coauthorModal" class="modal fade" tabindex="-1"
    aria-labelledby="coauthorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coauthorModalLabel">{{ __('coauthor.edit') }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div id="coauthor-add-alert" class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>

                <form id="modal-coauthor-form" class="modal-coauthor-form" action="{{ route('coauthor.store', $user->id) }}" data-action="add" method="POST" class="mt-2">
                    @csrf

                    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'last_name', 'required' => true])
                    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'first_name', 'required' => true,])
                    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'middle_name'])
                    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'organization_title'])
                    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'rank_title'])
                    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'job_title'])

                    {{-- <div class="form-check">
                        <input  @checked($author->participate)  form="{{ $author->id . '-coauthor-form' }}" class="form-check-input participate-check" type="checkbox" name="participate">
                        <label class="form-check-label" for="coauthor-form">
                            {{ __('coauthor.participate') }}
                        </label>
                    </div> --}}
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
    // console.log('script LOAD');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function() {
    
    const SITEURL = '{{ URL::to('') }}';
    
    const coauthors = $('#coauthors .coauthors-list');
    const modal = $('#coauthorModal');
    const form = modal.find('#modal-coauthor-form');
    const buttonSave = modal.find('.coauthor-save');
    const modalClose = modal.find('.coauthor-close');


    $(document).on('click', '.coauthor-add-button', function(e) {
        // Add coauthor
        form.attr('action', "{{ route('coauthor.store', $user->id) }}");
        form.data('action', 'add');
    })

    $(document).on('click', '.coauthor-edit-button', function(e) {
        // Edit coauthor
        form.data('action', 'edit');
        const id = $(this).data('id');

        $.get( SITEURL + '/coauthor/get/' + id, function(data) {
            form.attr('action', SITEURL + '/coauthor/' + data.id + '/update');
            form.find('[name=last_name]').val(data.last_name);
            form.find('[name=middle_name]').val(data.middle_name);
            form.find('[name=first_name]').val(data.first_name);
            form.find('[name=organization_title]').val(data.organization_title);
            form.find('[name=rank_title]').val(data.rank_title);
            form.find('[name=job_title]').val(data.job_title);
        });
    })
        

    function loadCoauthor(id) {
    console.log('load-' + id);
    $.get({
        url: SITEURL + '/coauthor/' + id + '/show',
        // type: "GET",
        success: function(response) {
            console.log('success');
            coauthors.append(response);
        },
        error: function(response) {
            console.log('error');
        }
    });

}

    function reloadCoauthor(id) {
        $.ajax({
            url: SITEURL + '/coauthor/' + id + '/show',
            type: "GET",
            success: function(response) {
                const coauthor = coauthors.find('[data-id=' + id +']');
                // console.log(coauthor);
                coauthor.replaceWith(response)
            },
            error: function(response) {
            }
        });
    
    }

    function editCoauthor(action, data) {
        $.ajax({
        url: action,
        type: 'POST',
        data: data,
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
    }

    function addCoauthor(action, data) {
        $.ajax({
        url: action,
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log('add submit success');
            modalClose.click();
            loadCoauthor(response.id);
        },
        error: function(response) {
            console.log('add submit error');
            alertError(response);
        }
    });
    }
    
    form.on('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const formAction = $(this).attr('action');
    const coauthorAction = $(this).data('action');

    if (coauthorAction === 'edit') {
        editCoauthor(formAction, formData);
    } else if (coauthorAction === 'add') {
        addCoauthor(formAction, formData);
    }

    });
    
    buttonSave.on('click', (e) => {
    form.submit();
    });

// DELETE
$(document).on('click', '.coauthor-delete-button', function(e) {
    e.preventDefault();
    let button = $(this);
    let listItem = button.closest('.coauthor-list-item')

    $.ajax({
        url: SITEURL + '/coauthor/' + button.data('id') + '/delete',
        type: "DELETE",
        success: function(response) {
            listItem.remove();
        },
        error: function(response) {
        }
    })
});
    

// Alert in modal
    function alertError(response) {
    const alert = modal.find('.alert');
    alert.removeClass('alert-success').addClass('alert-danger').show();
    alert.find('ul').html('');
    
    $.each(response.responseJSON.errors, function(key, value) {
        alert.find('ul').append('<li>' + value + '</li>');
    });
    }
    });

</script>