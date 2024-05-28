{{Form::file('main_image')}}
{{-- In work --}}
<h2 class="text-center">{{ __('auth.thesis') }}</h2>
@isset ($thesis)
<div class="row mb-3">
        <div class="col-md-6 offset-4">
            <a href="{{ route('thesis.download', $thesis->id) }}" alt="download" title="{{ $thesis->title }}"><i class="fas fa-file-download" aria-hidden="true"></i></a>
            {{-- {{ $thesis=> }} --}}
        </div>
</div>
@else
<form action="{{ route('thesis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <label for="title" class="col-md-4 col-form-label text-md-end" required>{{ __('auth.thesis_name') }}</label>
        <div class="col-md-6">
            <input id="title" required type="text" class="form-control" name="title" autocomplete="title"  value="{{ old('title') }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6 offset-4">
            <input class="form-control" type="file" id="file" name="file" required>
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-6">
            <button id="submit_thesis" type="submit" class="btn btn-primary">
                {{ __('auth.thesis_submit') }}
            </button>
        </div>
    </div>

</form>
@endisset



{{-- <div class="row mb-3">
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
    </div> --}}

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