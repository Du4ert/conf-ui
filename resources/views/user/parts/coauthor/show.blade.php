@php
$formDelete = $author->id . '-form-delete';
@endphp
<li class="coauthor-list-item" data-id="{{$author->id}}">
<form id="{{ $formDelete }}" action="{{ route('coauthor.delete', $author->id) }}" method="post">
    @csrf
    @method('DELETE')
    <span>{{ $author->last_name . ' ' . $author->first_name . ' ' . $author->middle_name}}</span>
    <span>{{ $author->rank_title }}</span>
    <span>{{ $author->job_title }}</span>

    <button type="button" class="btn btn-link text-primary edit-button" data-bs-toggle="modal" data-bs-target="#{{ $author->id }}-coauthorModalEdit"><i class="fa fa-edit"></i>
    </button>
    <button form="{{ $formDelete }}" data-id="{{ $author->id ?? '' }}" type="submit" class="btn btn-link text-danger delete-button"><i class="fa fa-trash"></i></button>
</form>
@include('user.parts.coauthor.modal_edit')
</li>



<script type="module">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
const SITEURL = '{{ URL::to('') }}';
const formDelete = $('#{{ $formDelete }}');
const deleteButton = formDelete.find('.delete-button');

deleteButton.on('click', (e) => {
    e.preventDefault();

    $.ajax({
        url: SITEURL + '/coauthor/' + deleteButton.data('id') + '/delete',
        type: "DELETE",
        success: function(response) {
            formDelete.parent().remove();
        },
        error: function(response) {
            // console.log(response);
        }
    });
})
});

</script>