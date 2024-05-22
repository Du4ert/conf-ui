{{-- In work --}}
<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end" for="thesis">{{ __('auth.thesis_body') }}<span
            class="text-danger">*</span></label>
    <div class="col-md-6">
        <textarea name="thesis_body" id="thesis_body" cols="30" rows="10" {{ $editable ? '' : 'disabled' }}>{{ $user->thesis_body }}</textarea>
    </div>
</div>


<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end" for="thesis">{{ __('auth.thesis_body') }}<span
            class="text-danger">*</span></label>
    <div class="col-md-6">
        <textarea name="thesis_body" id="thesis_body" cols="30" rows="10"></textarea>
    </div>
</div>


<div class="row mb-3">
    <label for="role" class="col-md-4 col-form-label text-md-end">Я регистрируюсь с<span
            class="text-danger">*</span></label><br>
    <div class="col-md-6">
        <div class="form-check form-check-inline">
            <label class="form-label">
                <input class="form-check-input" type="radio" name="type" value="presenter"
                    onClick="hideInputDiv();" {{ old('type') == 'presenter' ? 'checked' : '' }}>
                {{ __('auth.live') }}
            </label>
        </div>

        <div class="form-check form-check-inline">
            <label class="form-label">
                <input id="poster_radio" class="form-check-input" type="radio" name="type" value="poster"
                    onChange="showInputDiv();" {{ old('type') == 'poster' ? 'checked' : '' }}>
                {{ __('auth.poster') }}
            </label>
        </div>
    </div>

    <div id="poster_input" class="row mb-3" style="display: none;">
        {{-- <input type="file" name="poster_image"> --}}
    </div>

<script>
    const checkbox = document.getElementById("poster_radio");
    const posterInput = document.getElementById("poster_input");


    //function that will show hidden inputs when clicked
    function showInputDiv() {
        if (checkbox.checked = true) {
            posterInput.style.display = "block";
        }
    }

    //function that will hide the inputs when another checkbox is clicked
    function hideInputDiv() {
        posterInput.style.display = "none";
    }
</script>