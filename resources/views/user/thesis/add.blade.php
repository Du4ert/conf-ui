@php
    if (!isset($editable)) {
        $editable = true;
    }
@endphp
<form id="thesis-form" action="" method="post">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('thesis.title') }}<span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                    <input form="thesis-form" required type="text" class="form-control" name="title" autocomplete="title">
                </div>
            </div>
            

            <div class="row mb-3">
                <label class="col-md-4  col-form-label text-md-end" for="section">Научное направление (секция)</label>
                <div class="col-md-6">
                    <select form="main-form" class="form-select" name="section" aria-label="Default select example">
                        <option value="gen">Геномика, транскриптомика и биоинформатика растений</option>
                        <option value="2">Биотехнология и биоинженерия растений</option>
                        <option value="3">Селекция сельскохозяйственных растений</option>
                        <option value="4">Работа с биоресурсными коллекциями растений, методы сохранения генофонда
                        </option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end" for="report_form">Форма доклада</label>
                <div class="col-md-6">
                    <select form="main-form" class="form-select" name="report_form" aria-label="Default select example">
                        <option value="1">Устный доклад на секции</option>
                        <option value="2">Стендовое сообщение</option>
                        <option value="3">Заочное участие</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-primary coauthor-add-button" data-bs-toggle="modal" data-bs-target="#thesisModal">
                {{ __('thesis.add') }}
            </button>
</form>
