<div  class="file-upload">
    <form id="{{ $formUpload }}" action="{{ route('file.store', $user->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
        @csrf

        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>

        <input type="hidden" name="type" value="{{ $type }}">


        <div class="mb-3">
            <label class="form-label" for="inputFile">Select file:</label>
            <input form="{{ $formUpload }}" type="file" name="file" id="inputFile"
                class="form-control @error('file') is-invalid @enderror">
            <small>{{ __('file.extensions') }} (.doc, .docx, .pdf, .txt)</small>

            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            {{ $error }}
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button form="{{ $formUpload }}" type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Upload</button>
        </div>

    </form>


</div>

<script type="module">
    $(document).ready(function() {
        $('#{{ $formUpload }}').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    const alert = $('#{{ $formUpload }} .alert');
                    alert.removeClass('alert-danger').addClass('alert-success').show();
                    alert.find('ul').html('');
                    alert.find('ul').append('<li>' + response.success + '</li>');
                    
                },
                error: function(response) {
                    const alert = $('#{{ $formUpload }} .alert');
                    alert.removeClass('alert-success').addClass('alert-danger').show();
                    alert.find('ul').html('');

                    $.each(response.responseJSON.errors, function(key, value) {
                        alert.find('ul').append('<li>' + value + '</li>');
                    });
                }
            });
        });
    });
</script>
