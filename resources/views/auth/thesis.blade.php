{{-- In work --}}
<div class="card mt-5 col-md-5">
    <h4 class="card-header p-3"><i class="fa fa-file"></i>Files</h4>
    <div class="card-body">
        @isset ($thesis)
           <form action="{{ route('thesis.delete', $thesis->id) }}" method="post">
            @csrf

            <a class="btn  text-primary" href="{{ route('thesis.download', $thesis->id) }}"><i class="far fa-file-alt me-1"></i>{{ $user->first_name . '-thesis' . '.' . pathinfo($thesis->file, PATHINFO_EXTENSION) }}</a>
            @method('DELETE')
            <button type="submit" class="btn btn-link text-danger"><i class="fa fa-trash"></i></button>
          </form>
        @else
        <form action="{{ route('thesis.store') }}" method="POST" enctype="multipart/form-data" class="mt-2" id="file-upload">
            @csrf

            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>

            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end" required>{{ __('auth.thesis_name') }}</label>
                <div class="col-md-6">
                    <input id="title" required type="text" class="form-control" name="title" autocomplete="title"  value="{{ old('title') }}">
                </div>
            </div>
    
            <div class="mb-3">
                <label class="form-label" for="inputFile">Select file:</label>
                <input 
                    type="file" 
                    name="file" 
                    id="inputFile"
                     
                    class="form-control @error('file') is-invalid @enderror">
                    <small>{{ __('thesis.extensions') }} (.doc, .docx, .pdf, .txt)</small>
    
                @error('file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            </div>
     
            <div class="mb-3">
                <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Upload</button>
            </div>
         
        </form>
        @endisset
        {{-- <img id="preview-file" width="300px"> --}}
        

    </div>
</div>

<script type="module">
   $('#inputFile').change(function(){    
        let reader = new FileReader();
       
        reader.onload = (e) => { 
            $('#preview-file').attr('src', e.target.result); 
        }   
        
        reader.readAsDataURL(this.files[0]); 
         
    });

        $('#file-upload').submit(function(e) {
           e.preventDefault();
           let formData = new FormData(this);
           $('#file-input-error').text('');
      
           $.ajax({
                type:'POST',
                url: "{{ route('thesis.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    this.reset();
                    alert('Thesis has been uploaded successfully');
                },
                error: function(response){
                    $('#file-upload').find(".print-error-msg").find("ul").html('');
                    $('#file-upload').find(".print-error-msg").css('display','block');
                    $.each( response.responseJSON.errors, function( key, value ) {
                        // console.log(value);
                        $('#file-upload').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
           });
    });
</script>