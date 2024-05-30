@php
if (!isset($field_name)) {
    $field_name = '';
}

if (!isset($form)) {
    $form = 'user-form';
}
@endphp
<div class="row mb-3">
    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('auth.password_field') }}<span class="text-danger">*</span></label>

    <div class="col-md-6">
        <input form="{{ $form }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('auth.password_confirm') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>
