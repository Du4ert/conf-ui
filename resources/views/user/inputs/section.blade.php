@php
if (!isset($field_name)) {
    $field_name = '';
}

if (!isset($form)) {
    $form = 'thesis-form';
}
@endphp
<div class="row mb-3">
    <label class="col-md-4  col-form-label text-md-end" for="section">{{ __('auth.section') }}</label>
    <div class="col-md-6">
        <select form="{{ $form }}" class="form-select" name="section" aria-label="Default select example">
            <option selected value="genomics">{{ __('auth.genomics') }}</option>
            <option value="biotechnology">{{ __('auth.biotechnology') }}</option>
            <option value="breeding">{{ __('auth.breeding') }}</option>
            <option value="bioresource">{{ __('auth.bioresource') }}
            </option>
        </select>
        {{-- <script>
            const sectionSelect = document.querySelector('select[name="section"]');
            sectionSelect.value = {{ $user->section }}
        </script> --}}
    </div>
</div>