<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#coauthorModalAdd">
    {{ __('coauthor.add') }}
</button>

<!-- Modal -->
<div class="modal fade" id="coauthorModalAdd" tabindex="-1" aria-labelledby="coauthorModalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coauthorModalAddLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div id="coauthor-add-alert" class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>



    <form id="coauthor-form" action="{{ route('coauthor.store', $user->id) }}" method="POST"
        class="mt-2">
        @csrf
        @include('user.parts.field', ['form' => 'coauthor-form', 'field_name' => 'last_name', 'required' => true])
        @include('user.parts.field', ['form' => 'coauthor-form', 'field_name' => 'first_name', 'required' => true,])
        @include('user.parts.field', ['form' => 'coauthor-form', 'field_name' => 'middle_name'])
        @include('user.parts.field', ['form' => 'coauthor-form', 'field_name' => 'organization_title'])
        @include('user.parts.field', ['form' => 'coauthor-form', 'field_name' => 'rank_title'])
        @include('user.parts.field', ['form' => 'coauthor-form', 'field_name' => 'job_title'])

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="participate">
            <label class="form-check-label" for="coauthor-form">
                Будет участвовать?
            </label>
        </div>
    </form>


            </div>
            <div class="modal-footer">
                <button id="coauthor-close" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button id="coauthor-save" type="button" class="btn btn-primary">Save changes</button>
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

        const coauthors = $('#coauthors');
        const modal = $('#coauthorModalAdd');
        const formAdd = $('#coauthor-form');
        const buttonSave = $('#coauthor-save');
        const modalClose = $('#coauthor-close');

        function loadCoauthor(id) {

            $.ajax({
                url: SITEURL + '/coauthor/' + id + '/show',
                type: "GET",
                success: function(response) {
                    coauthors.append(response);
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                    // alertError(response);
                }
            });

        }

        formAdd.on('submit', function(e) {
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
                    loadCoauthor(response.id);
                },
                error: function(response) {
                    alertError(response);
                }
            });
        });

        buttonSave.on('click', (e) => {
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
