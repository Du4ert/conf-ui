@php
if (!isset($field_name)) {
    $field_name = '';
}

if (!isset($form)) {
    $form = 'thesis-form';
}
@endphp

<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end" for="report_form">Форма доклада</label>
    <div class="col-md-6">
        <select form="{{ $form }}" class="form-select" name="report_form" aria-label="Default select example">
            <option selected value="oral">Устный доклад на секции</option>
            <option value="poster">Стендовое сообщение</option>
            <option value="absentee">Заочное участие</option>
        </select>
    </div>
</div>
{{-- <script>
    let reportSelect = document.querySelector('select[name="report_form"]');
    reportSelect.value = {{ $thesis->report_form ?? null }}
</script> --}}