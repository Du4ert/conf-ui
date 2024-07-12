<div class="form-group d-flex justify-content-between  mb-2 mb-md-0 border-bottom">
    <label for="{{ $field_name }}" class="me-1">{{ __('auth.admin_' . $field_name) }}:</label>
    <input type="checkbox" name="{{ $field_name }}" id="{{ $field_name }}" class="ms-auto me-2"
        {{ request()->has($field_name) ? 'checked' : '' }}>
</div>