@php
$formDelete = $author->id . '-form-delete';

@endphp
<li class="coauthor-list-item" data-id="{{$author->id}}">

<span>{{ $author->last_name }} {{ $author->first_name }} {{ $author->middle_name }}</span>
<p>
    <small>{{ $author->job_title }} {{ $author->rank_title }} {{ $author->organization_title }} </small>
</p>

<div class="coauthor-controls">
    <button type="button" class="btn btn-link text-primary coauthor-edit-button" data-bs-toggle="modal" data-bs-target="#coauthorModal" data-id="{{$author->id}}"><i class="fa fa-edit"></i>
    </button>
    <input type="text" hidden name="coauthor[{{$author->id}}]" value="{{ $author->id }}" form="thesis-form">

    <form id="{{ $formDelete }}" class="d-inline" action="{{ route('coauthor.delete', $author->id) }}" method="post">
        @csrf
        @method('DELETE')
    
        <button form="{{ $formDelete }}" data-id="{{ $author->id ?? '' }}" type="button" class="btn btn-link text-danger coauthor-delete-button"><i class="fa fa-trash"></i></button>
    </form>
</div>

</li>
