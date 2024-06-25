<div id="coauthorModal" class="modal fade" tabindex="-1" aria-labelledby="coauthorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coauthorModalLabel">{{ __('auth.coauthor') }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div id="coauthor-add-alert" class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>

                <form id="modal-coauthor-form" class="modal-coauthor-form"
                    action="{{ route('coauthor.store', $thesis->id) }}" data-action="add" method="POST" class="mt-2">
                    @csrf

                    @include('user.parts.languages')

                    <div class="row form-group mb-2">
                        <div class="col-lg-6">
                            @include('user.coauthor.field', [
                                'form' => 'modal-coauthor-form',
                                'field_name' => 'last_name',
                                'required' => true,
                            ])
                        </div>
                        <div class="col-lg-6">
                            @include('user.coauthor.field', [
                                'form' => 'modal-coauthor-form',
                                'field_name' => 'last_name_en',
                                'required' => true,
                            ])
                        </div>

                        <div class="row form-group mb-2">
                            <div class="col-lg-6">@include('user.coauthor.field', [
                                'form' => 'modal-coauthor-form',
                                'field_name' => 'first_name',
                                'required' => true,
                            ])</div>
                            <div class="col-lg-6">@include('user.coauthor.field', [
                                'form' => 'modal-coauthor-form',
                                'field_name' => 'first_name_en',
                                'required' => true,
                            ])</div>
                        </div>
                        <div class="row form-group mb-2">
                            <div class="col-lg-6">@include('user.coauthor.field', [
                                'form' => 'modal-coauthor-form',
                                'field_name' => 'middle_name',
                            ])</div>
                            <div class="col-lg-6">@include('user.coauthor.field', [
                                'form' => 'modal-coauthor-form',
                                'field_name' => 'middle_name_en',
                            ])</div>
                        </div>

                        <div class="row mb-3 form-check">
                            <div class="form-check col-lg-5 mx-auto">

                            <label for="user_org" class="form-check-label">{{ __('auth.user_organization') }}
                            </label>
                                <input checked form="" class="form-check-input" id="user-organization" type="checkbox" name="user_organization">
                            </div>
                        </div>
                        

                        <div hidden class="row form-group mb-2" id="organization-title">
                            <hr />
                            <div class="col-lg-6">@include('user.coauthor.field', [
                                'form' => 'modal-coauthor-form',
                                'field_name' => 'organization_title',
                            ])</div>
                            <div class="col-lg-6">@include('user.coauthor.field', [
                                'form' => 'modal-coauthor-form',
                                'field_name' => 'organization_title_en',
                            ])</div>
                        </div>



                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button class="coauthor-close btn btn-secondary" data-bs-dismiss="modal">Close<i
                        class="fa fa-cancel ms-2"></i></button>
                <button type="submit" class="coauthor-save btn btn-primary">Save changes<i
                        class="fa fa-save ms-2"></i></button>
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

        const coauthors = $('.coauthors-list');
        const modal = $('#coauthorModal');
        const form = modal.find('#modal-coauthor-form');
        const buttonSave = modal.find('.coauthor-save');
        const modalClose = modal.find('.coauthor-close');
        const orgCheck = modal.find('#user-organization');
        const organization = modal.find('#organization-title');

        

        // Users organization use
        orgCheck.change(function(e) {
            if ($(this).is(':checked')) {
                organization.attr('hidden', '');
                organization.find('input').val('');
            } else {
                organization.removeAttr('hidden');
            }
        });


        modal.on('show.bs.modal', function() {

        });


        $(document).on('click', '.coauthor-add-button', function(e) {
            // Add coauthor
            orgCheck.prop('checked', true);
            organization.attr('hidden', '');
            organization.find('input').val('');
            form.attr('action', "{{ route('coauthor.store', $thesis->id) }}");
            form.data('action', 'add');
        })

        $(document).on('click', '.coauthor-edit-button', function(e) {
            // Edit coauthor
            form.data('action', 'edit');
            const id = $(this).data('id');

            $.get(SITEURL + '/coauthor/get/' + id, function(data) {
                form.attr('action', SITEURL + '/coauthor/' + data.id + '/update');
                form.find('[name=last_name]').val(data.last_name);
                form.find('[name=last_name_en]').val(data.last_name_en);
                form.find('[name=middle_name]').val(data.middle_name);
                form.find('[name=middle_name_en]').val(data.middle_name_en);
                form.find('[name=first_name]').val(data.first_name);
                form.find('[name=first_name_en]').val(data.first_name_en);
                form.find('[name=organization_title]').val(data.organization_title);
                form.find('[name=organization_title_en]').val(data.organization_title_en);

                if (!data.organization_title && !data.organization_title) {
                    orgCheck.prop('checked', true);
                    organization.attr('hidden', '');
                } else {
                    orgCheck.prop('checked', false);
                    organization.removeAttr('hidden');
                }
            });
        })


        function loadCoauthor(id) {
            $.get({
                url: SITEURL + '/coauthor/' + id + '/show',
                // type: "GET",
                success: function(response) {
                    coauthors.append(response);
                },
                error: function(response) {}
            });

        }

        function reloadCoauthor(id) {
            $.ajax({
                url: SITEURL + '/coauthor/' + id + '/show',
                type: "GET",
                success: function(response) {
                    const coauthor = coauthors.find('[data-id=' + id + ']');
                    coauthor.replaceWith(response)
                },
                error: function(response) {}
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
                    modalClose.click();
                    loadCoauthor(response.id);
                },
                error: function(response) {
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
                error: function(response) {}
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
