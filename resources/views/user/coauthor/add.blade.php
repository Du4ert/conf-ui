<button type="button" class="btn btn-primary coauthor-add-button" data-bs-toggle="modal" data-bs-target="#coauthorModal">
    {{ __('coauthor.add') }}
</button>
@include('user.coauthor.modal_js')

{{-- <form id="modal-coauthor-form" class="modal-coauthor-form" action="{{ route('coauthor.store') }}" data-action="add" method="POST" class="mt-2">
    @csrf

    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'last_name', 'required' => true])
    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'last_name_en', 'required' => true])
    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'first_name', 'required' => true,])
    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'first_name_en', 'required' => true,])
    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'middle_name'])
    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'middle_name_en'])
    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'organization_title'])
    @include('user.coauthor.field', ['form' => 'modal-coauthor-form', 'field_name' => 'organization_title_en'])

    <button  class="coauthor-close btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button  type="submit" class="coauthor-save btn btn-primary">Save changes</button> --}}
    {{-- <div class="form-check">
        <input  @checked($author->participate)  form="{{ $author->id . '-coauthor-form' }}" class="form-check-input participate-check" type="checkbox" name="participate">
        <label class="form-check-label" for="coauthor-form">
            {{ __('coauthor.participate') }}
        </label>
    </div> --}}
{{-- </form> --}}


