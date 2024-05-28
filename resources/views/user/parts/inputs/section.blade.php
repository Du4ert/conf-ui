<div class="row mb-3">
    <label class="col-md-4  col-form-label text-md-end" for="section">Научное направление (секция)</label>
    <div class="col-md-6">
        <select form="main-form" class="form-select" name="section" aria-label="Default select example"
            {{ $editable ? '' : 'disabled' }}>
            <option value="1">Геномика, транскриптомика и биоинформатика растений</option>
            <option value="2">Биотехнология и биоинженерия растений</option>
            <option value="3">Селекция сельскохозяйственных растений</option>
            <option value="4">Работа с биоресурсными коллекциями растений, методы сохранения генофонда
            </option>
        </select>
        <script>
            const sectionSelect = document.querySelector('select[name="section"]');
            sectionSelect.value = {{ $user->section }}
        </script>
    </div>
</div>