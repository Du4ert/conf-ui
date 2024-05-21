@php
if (!isset($field_name)) {
    $field_name = '';
}
@endphp
<div class="row mb-3">
    <label for="{{  $field_name }}" class="col-md-4 col-form-label text-md-end">{{ __('auth.' . $field_name) }}@isset($required)<span class="text-danger">*</span> @endisset
    </label>
    <div class="col-md-6">
        <input id="{{ $field_name }}" @isset($required) required @endisset type="text" class="form-control" name="{{ $field_name }}" autocomplete="{{ $field_name }}" {{$editable ? '' : 'disabled'}} value="{{ $user->$field_name }}">
    </div>
</div>