@php
if (!isset($field_name)) {
    $field_name = '';
}

if (!isset($form)) {
    $form = 'user-form';
}
@endphp
<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('auth.email') }}<span class="text-danger">*</span></label>

    <div class="col-md-6">
        <input form="{{ $form }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
    </div>
</div>