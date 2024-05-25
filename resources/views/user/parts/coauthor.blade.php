@php
$formDelete = $author->id . '-form';
@endphp
<form id="{{ $formDelete }}" action="{{ route('coauthor.delete', $author->id) }}" method="post">
    @csrf
    @method('DELETE')
    <span>{{ $author->last_name . ' ' . $author->first_name . ' ' . $author->middle_name}}</span>
    <span>{{ $author->rank_title }}</span>
    <span>{{ $author->job_title }}</span>


    <button form="{{ $formDelete }}" type="submit" class="btn btn-link text-danger"><i class="fa fa-trash"></i></button>
</form>