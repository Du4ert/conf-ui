{{-- $type - file type ['thesis_ru', 'thesis_en', 'poster'] --}}
@php
    $formDelete = $type . '-delete-form';
    $formUpload = $type . '-upload-form';
@endphp

<div id="{{ $type }}" class="col-md-10  file">
    {{-- <h6 class="card-header p-3">{{ __('file.' . $type) }}</h6> --}}
    

{{-- /Upload --}}

<form id="{{ $formUpload }}" class="file-upload" action="{{ route('file.store', $user->id) }}" method="POST"
    enctype="multipart/form-data" class="mt-2">
    @csrf

    <input type="hidden" name="type" value="{{ $type }}">

    <div class="form-group mb-3">
        <div class="input-group border-success">
            <span @if (!$file) style="display: none" @endif class="success-icon rounded-start bg-success input-group-text px-3 text-muted" ><i
                    class="fas fa-check fa-lg text-white"></i></span>
            <span @if ($file) style="display: none" @endif class="danger-icon rounded-start bg-danger input-group-text px-3 text-muted"><i
                    class="fas fa-exclamation-circle fa-lg text-white"></i></span>
            <input form="{{ $formUpload }}" type="file" role="file" name="file" class="upload-input file d-none">
            <input type="text" disabled class="upload-text form-control" placeholder=" {{ __('file.' . $type) }}">
            <button @if ($file) style="display: none" @endif class="upload-browse  btn btn-info px-4" role="browse" type="button"><i class="fas fa-folder-open"></i> {{ __('file.browse') }}</button>
            <button @if ($file) style="display: none" @endif form="{{ $formUpload }}" class="upload-button btn btn-primary rounded-end px-4" role="submit" type="submit"><i
                    class="fas fa-save"></i> {{ __('file.save') }}</button>
            <a @if (!$file) style="display: none" @endif class="download-link btn btn-primary" href="{{ route('file.download', $file->id ?? 'idTemp') }}"><i
                        class="fa fa-download"></i> {{ __('file.download') }}</a>
            <button @if (!$file) style="display: none" @endif form="{{ $formUpload }}" data-id="{{ $file->id ?? '' }}" role="delete" class="delete-button btn btn-danger px-4" 
                type="button"><i class="fas fa-trash"></i> {{ __('file.delete') }}</button>
        </div>
        <div class="text-muted ms-3"><small>{{ __('file.extensions') }} (.doc, .docx, .pdf, .txt)</small></div>
    </div>

</form>


<div id="{{ $type }}-alert" class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
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
        const formDelete = $('#{{ $formDelete }}');

        const uploadForm = $('#{{ $formUpload }}');
        const uploadInput = uploadForm.find('.upload-input');
        const textInput = uploadForm.find('.upload-text');
        const browseButton = uploadForm.find('.upload-browse');
        const saveButton = uploadForm.find('.upload-button');
        const deleteButton = uploadForm.find('.delete-button');
        const successIcon = uploadForm.find('.success-icon');
        const dangerIcon = uploadForm.find('.danger-icon');
        const downloadLink = uploadForm.find('.download-link');


        browseButton.on('click', () => uploadInput.click());
        uploadInput.on('change', function() {
            textInput.val($(this).prop('files')[0].name);
        });

        deleteButton.on('click', (e) => {
            $.ajax({
                url: SITEURL + '/file/' + deleteButton.data('id') + '/delete',
                type: "DELETE",
                success: function(response) {
                    deleteButton.hide();
                    downloadLink.hide();
                    saveButton.show();
                    browseButton.show();
                    successIcon.hide();
                    dangerIcon.show();
                    textInput.val("{{ __('file.' . $type) }}");
                },
                error: function(response) {
                    alertError(response);
                }
            });
        })

        uploadForm.submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    deleteButton.data('id', response.id).show();
                    downloadLink.attr('href', SITEURL + '/file/' + deleteButton.data('id') + '/download').show();
                    saveButton.hide();
                    browseButton.hide();
                    successIcon.show();
                    dangerIcon.hide();
                    textInput.val("{{ __('file.' . $type) }}");

                },
                error: function(response) {
                    alertError(response);
                }
            });
        });


        function alertError(response) {
            const alert = $('#{{ $type }}-alert');
            alert.removeClass('alert-success').addClass('alert-danger').show();
            alert.find('ul').html('');

            $.each(response.responseJSON.errors, function(key, value) {
                console.log(key + '-' + value);
                alert.find('ul').append('<li>' + value + '</li>');
            });
        }
    });
</script>