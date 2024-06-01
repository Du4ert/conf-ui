@php
if (!isset($field_name)) {
    $field_name = '';
}

if (!isset($form)) {
    $form = 'user-form';
}
@endphp
<div class="row mb-3">
    <label for="{{  $field_name }}" class="col-md-4 col-form-label text-md-end">{{ __('auth.' . $field_name) }}@isset($required)<span class="text-danger">*</span> @endisset
    </label>
    <div class="col-md-6">
        <input form="{{ $form }}" @isset($required) required @endisset type="text" class="form-control" name="{{ $field_name }}" autocomplete="{{ $field_name }}"  value="{{ $thesis->$field_name }}">
    </div>
</div>