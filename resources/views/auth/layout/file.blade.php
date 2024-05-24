{{-- $type - file type ['thesis_ru', 'thesis_en', 'poster'] --}}
@php
$formDelete = $type . '-delete-form';
$formUpload = $type . '-upload-form';
@endphp

<div id="{{$type}}" class="card col-md-6 offset-4">
    <h6  class="card-header p-3">{{ __('file.' . $type) }}
        {{-- <button role="button" class="add btn btn-success float-sm-end"><i class="fa fa-plus"></i></button> --}}
    </h6>
    
    <div class="card-body">
        @if ($file != null)
        
            <div id="#file-download" class="file-download">
                <form id="{{ $formDelete }}" action="{{ route('file.delete', $file->id) }}" method="post">
                    @csrf
                    <a class="btn  text-primary" href="{{ route('file.download', $file->id) }}"><i
                            class="far fa-file-alt me-1"></i>{{ $file->type . '.' . pathinfo($file->file, PATHINFO_EXTENSION) }}</a>
                    @method('DELETE')
                    <button form="{{ $formDelete }}" type="submit" class="btn btn-link text-danger"><i class="fa fa-trash"></i></button>
                </form>
            </div>
        @else
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
        @endif

    </div>
</div>

