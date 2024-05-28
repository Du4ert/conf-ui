<div id="#file-download" class="file-download">
    <form id="{{ $formDelete }}" action="{{ route('file.delete', $file->id) }}" method="post">
        @csrf
        <a class="btn  text-primary" href="{{ route('file.download', $file->id) }}"><i
                class="far fa-file-alt me-1"></i>{{ $file->type . '.' . pathinfo($file->file, PATHINFO_EXTENSION) }}</a>
        @method('DELETE')
        <button form="{{ $formDelete }}" type="submit" class="btn btn-link text-danger"><i class="fa fa-trash"></i></button>
    </form>
</div>