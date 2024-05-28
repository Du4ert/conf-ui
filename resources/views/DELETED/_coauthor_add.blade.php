<form id="coauthor-form" action="{{ route('coauthor.store', $user->id) }}" method="POST" class="mt-2">
    @csrf

    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>


    <div class="mb-3">
        @error('coauthor')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            
            @include('user.inputs.field', ['form' => 'coauthor-form', 'field_name' => 'last_name', 'required' => true])
            @include('user.inputs.field', ['form' => 'coauthor-form', 'field_name' => 'first_name', 'required' => true,])
            @include('user.inputs.field', ['form' => 'coauthor-form', 'field_name' => 'middle_name'])
            @include('user.inputs.field', ['form' => 'coauthor-form', 'field_name' => 'organization_title'])
            @include('user.inputs.field', ['form' => 'coauthor-form', 'field_name' => 'rank_title'])
            @include('user.inputs.field', ['form' => 'coauthor-form', 'field_name' => 'job_title'])

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="participate">
                <label class="form-check-label" for="coauthor-form">
                  Будет участвовать?
                </label>
            </div>

    </div>

    <div class="mb-3">
        <button form="coauthor-form" type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
    </div>

</form>