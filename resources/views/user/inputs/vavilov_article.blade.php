<div class="row mx-auto align-items-center">
    <div class="col-md-8 mx-auto">
        <label for="form-check">{{ __('auth.vavilov_form') }}</label>
    </div>
    <div class="col-md-4">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vavilov_article" id="yesRadio" value="1" {{ isset($user->vavilov_article) ? 'checked' : '' }}>
            <label class="form-check-label" for="yesRadio">Да</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vavilov_article" id="noRadio" value="0" {{ !isset($user->vavilov_article) ? 'checked' : '' }}>
            <label class="form-check-label" for="noRadio">Нет</label>
        </div>
    </div>
</div>