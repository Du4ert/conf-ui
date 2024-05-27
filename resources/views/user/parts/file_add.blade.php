{{-- /Upload --}}
<form id="{{ $formUpload }}" class="file-upload" action="{{ route('file.store', $user->id) }}" method="POST"
    enctype="multipart/form-data" class="mt-2">
    @csrf

    <input type="hidden" name="type" value="{{ $type }}">

    <div class="form-group mb-3">
        <div class="input-group shadow">
            <span class="upload-icon input-group-text px-3 text-muted text-success"><i
                    class="fas fa-check fa-lg"></i></span>
            <input form="{{ $formUpload }}" type="file" name="file" class="upload-input file d-none">
            <input type="text" disabled class="upload-text form-control form-control-lg"
                placeholder="{{ __('file.' . $type) }}">
            <button class="upload-browse btn btn-info px-4" type="button"><i class="fas fa-file"></i> Search</button>
            <button form="{{ $formUpload }}" class="upload-button btn btn-primary px-4" type="submit"><i
                    class="fas fa-save"></i> {{ __('file.save') }}</button>
        </div>
        <div><small>{{ __('file.extensions') }} (.doc, .docx, .pdf, .txt)</small></div>
    </div>

</form>


<form id="{{ $formDelete }}" class="file-delete" action="{{ route('file.delete', 'idTemp') }}" method="post">
    @csrf
    <a class="download-link btn text-primary" href="{{ route('file.download', 'idTemp') }}"><i
            class="far fa-file-alt me-1"></i>{{ $type }}</a>
    @method('DELETE')
    <button form="{{ $formDelete }}" type="submit" class="btn btn-link text-danger"><i
            class="fa fa-trash"></i></button>
</form>


<div id="{{ $type }}-alert" class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
</div>

<script type="module">
    $(document).ready(function() {
const formDelete = $('#{{ $formDelete }}');
formDelete.hide();

const uploadForm = $('#{{ $formUpload }}');
const uploadInput = uploadForm.find('.upload-input');
const textInput = uploadForm.find('.upload-text');
const browseButton = uploadForm.find('.upload-browse');
const saveButton = uploadForm.find('.upload-button');

browseButton.on('click', () => uploadInput.click());
uploadInput.on('change', function() {
    textInput.val($(this).prop('files')[0].name);
});


function formatDelete (id) {
    const formDelete = $('#{{ $formDelete }}');
    let tempAction = formDelete.attr('action');
    formDelete.attr('action', tempAction.replace("idTemp", id));

    const downloadLink = formDelete.find('.download-link');
    let tempLink = downloadLink.attr('href');
    downloadLink.attr('href', tempLink.replace("idTemp", id));
}


function alertSuccess(message) {
    const alert = $('#{{ $type }}-alert');
    alert.removeClass('alert-danger').addClass('alert-success').show();
    alert.find('ul').html('');
    alert.find('ul').append('<li>' + message + '</li>');
}

function alertError(response) {
    const alert = $('#{{ $type }}-alert');
            alert.removeClass('alert-success').addClass('alert-danger').show();
            alert.find('ul').html('');

            $.each(response.responseJSON.errors, function(key, value) {
                alert.find('ul').append('<li>' + value + '</li>');
        });
}

        

formDelete.submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr('action'),
        type: "DELETE",
        success: function(response) {
            // alertSuccess("{{ __('file.deleted') }}");
        },
        error: function(response) {
            // alertError(response);
        }
    });
});

        uploadForm.submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alertSuccess("{{ __('file.success') }}");
                    formatDelete(response.id);
                    formDelete.show();
                    $(e.target).hide();

                },
                error: function (response) {
                    alertError(response);
                }
            });
        });
    });
</script>
