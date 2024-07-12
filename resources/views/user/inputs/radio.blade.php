<div class="row mx-auto align-items-center">
    <div class="col-md-8 mx-auto">
        <label for="form-check">{{ __('auth.' . $field_name . '_form') }}</label>
    </div>
    <div class="col-md-4">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="{{ $field_name }}" id="{{ $field_name}}-yesRadio" value="1" @if (isset($user->$field_name)) {{$user->$field_name ? 'checked' : ''}} @endif>
            <label class="form-check-label" for="{{ $field_name}}-yesRadio">{{ __('auth.yes') }}</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="{{ $field_name }}" id="{{ $field_name}}-noRadio" value="0" @if (isset($user->$field_name)) {{ !$user->$field_name ? 'checked' : ''}} @else {{ 'checked' }}@endif>
            <label class="form-check-label" for="{{ $field_name}}-noRadio">{{ __('auth.no') }}</label>
        </div>
    </div>
</div>