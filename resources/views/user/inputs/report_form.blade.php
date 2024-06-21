@php
if (!isset($form)) {
    $form = 'thesis-form';
}
@endphp

<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end" for="report_form">{{ __('auth.report_form') }}</label>
    <div class="col-md-6">
        <select form="{{ $form }}" class="form-select" name="report_form" aria-label="Default select example">
            <option selected value="oral">{{ __('auth.oral') }}</option>
            <option value="poster">{{ __('auth.poster') }}</option>
            <option value="absentee">{{ __('auth.absentee') }}</option>
        </select>
    </div>
</div>