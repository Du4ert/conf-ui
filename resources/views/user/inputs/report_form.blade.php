<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end" for="report_form">Форма доклада</label>
    <div class="col-md-6">
        <select form="main-form" class="form-select" name="report_form" aria-label="Default select example"
            {{ $editable ? '' : 'disabled' }}>
            <option value="1">Устный доклад на секции</option>
            <option value="2">Стендовое сообщение</option>
            <option value="3">Заочное участие</option>
        </select>
    </div>
</div>
<script>
    let reportSelect = document.querySelector('select[name="report_form"]');
    reportSelect.value = {{ $user->report_form }}
</script>