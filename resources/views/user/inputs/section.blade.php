@php
if (!isset($field_name)) {
    $field_name = '';
}

if (!isset($form)) {
    $form = 'thesis-form';
}
@endphp
<div class="row mb-3">
    <label class="col-md-4  col-form-label text-md-end" for="section">Научное направление (секция)</label>
    <div class="col-md-6">
        <select form="{{ $form }}" class="form-select" name="section" aria-label="Default select example">
            <option selected value="genomics">Геномика, транскриптомика и биоинформатика растений</option>
            <option value="biotechnology">Биотехнология и биоинженерия растений</option>
            <option value="breeding">Селекция сельскохозяйственных растений</option>
            <option value="bioresource">Работа с биоресурсными коллекциями растений, методы сохранения генофонда
            </option>
        </select>
        {{-- <script>
            const sectionSelect = document.querySelector('select[name="section"]');
            sectionSelect.value = {{ $user->section }}
        </script> --}}
    </div>
</div>