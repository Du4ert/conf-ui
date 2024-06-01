@php
if (!isset($formDelete)) {
    $formDelete = 'delete-thesis-' . $thesis->id;
}

@endphp
<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ $thesis->thesis_title }}</h5>
        <h5 class="card-title">{{ $thesis->thesis_title_en }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6 class="card-title">{{ $thesis->thesis_title }}</h6>
                  <h6 class="card-title">{{ $thesis->thesis_title_en }}</h6>
                <form>
                    <div class="mb-3">
                        <label for="inputField1" class="form-label">Field 1</label>
                        <input type="text" class="form-control" id="inputField1" placeholder="Enter Field 1">
                    </div>
                    <div class="mb-3">
                        <label for="inputField2" class="form-label">Field 2</label>
                        <input type="text" class="form-control" id="inputField2" placeholder="Enter Field 2">
                    </div>
                    <div class="mb-3">
                        <label for="inputField3" class="form-label">Field 3</label>
                        <input type="text" class="form-control" id="inputField3" placeholder="Enter Field 3">
                    </div>
                    <div class="mb-3">
                        <label for="inputField4" class="form-label">Field 4</label>
                        <input type="text" class="form-control" id="inputField4" placeholder="Enter Field 4">
                    </div>
                    <div class="mb-3">
                        <label for="inputField5" class="form-label">Field 5</label>
                        <input type="text" class="form-control" id="inputField5" placeholder="Enter Field 5">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <!-- Add content here -->
            </div>
        </div>
        <div class="row mb-3 float-end">
            <div class="col-md-6 offset-md-4">
                <form id="{{ $formDelete }}" class="d-inline" action="{{ route('thesis.delete', $thesis->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                
                    <button form="{{ $formDelete }}" data-id="{{ $thesis->id ?? '' }}" type="submit" class="btn btn-link text-danger coauthor-delete-button"><i class="fa fa-trash"></i>{{ __('auth.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>