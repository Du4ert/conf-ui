@php
$formDelete = $author->id . '-form-delete';

// function formatFullName($lastName, $firstName, $middleName = '') {
//     $fullName = $lastName . ' ';
//     $fullName .= mb_substr($firstName, 0, 1) . '.';
    
//     if ($middleName) {
//         $fullName .= ' ' . mb_substr($middleName, 0, 1) . '.';
//     }
    
//     return $fullName;
// }
@endphp
<li class="coauthor-list-item card col-md-12 col-lg-6 mb-1" data-id="{{$author->id}}">
<div class="card-header d-flex justify-content-between align-items-center">
    <div>{{ formatFullName($author->last_name, $author->first_name, $author->middle_name) }}</div>

    <div class="coauthor-controls d-flex justify-content-end align-items-center">
        <button type="button" class="btn btn-link text-primary coauthor-edit-button" data-bs-toggle="modal" data-bs-target="#coauthorModal" data-id="{{$author->id}}"><i class="fa fa-edit"></i>
        </button>
        <input type="text" hidden name="coauthor[{{$author->id}}]" value="{{ $author->id }}" form="thesis-form">
    
        <form id="{{ $formDelete }}" class="d-inline" action="{{ route('coauthor.delete', $author->id) }}" method="post">
            @csrf
            @method('DELETE')
        
            <button form="{{ $formDelete }}" data-id="{{ $author->id ?? '' }}" type="button" class="btn btn-link text-danger coauthor-delete-button"><i class="fa fa-trash"></i></button>
        </form>
    </div>
</div>

</li>
