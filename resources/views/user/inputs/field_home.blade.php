@php
if (!isset($field_name)) {
    $field_name = '';
}

if (!isset($form)) {
    $form = 'user-form';
}
@endphp
<div class="row mb-3">
    <label for="{{  $field_name }}" class="col-sm-7 col-md-5 col-lg-4 col-form-label text-md-end">{{ __('auth.' . $field_name) }}@isset($required)<span class="text-danger">*</span> @endisset
    </label>
    <div class="col-sm-5 col-md-7 col-lg-6">
        <input form="{{ $form }}" id="{{ $field_name }}" @isset($required) required @endisset type="text" class="form-control" name="{{ $field_name }}" autocomplete="{{ $field_name }}" {{$editable ? '' : 'disabled'}} value="{{ $user->$field_name }}">
    </div>
</div>