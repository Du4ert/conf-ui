@if ($editable)
<form id="thesis-form" action="{{ $admin ? route('user.update', $user->id) : route('updateSelf') }}"
    method="post">
    @csrf
    @method('PUT')
@endif

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active mt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="row mb-2 d-none d-md-flex">
<h5 class="col-lg-6 text-center">
{{ __('auth.russian') }}
</h5>
<h5 class="col-lg-6 text-center">
    {{ __('auth.english') }}
</h5>
</div>
    <div class="row form-group mb-2">
        <div class="col-lg-6">
            @include('user.inputs.field', ['field_name' => 'thesis_title', 'required' => true, 'form' => 'thesis-form'])
        </div>
        <div class="col-lg-6">
        @include('user.inputs.field', ['field_name' => 'thesis_title_en', 'required' => true, 'form' => 'thesis-form'])
        </div>
     </div>

     @include('user.inputs.section', ['form' => 'thesis-form'])
     @include('user.inputs.report_form', ['form' => 'thesis-form'])

</div>
</div>
</form>


@if ($editable)
    <button id="submit" type="submit" class="btn btn-primary offset-md-6  mb-3 mt-3 float-end" form="thesis-form">
        <i class="fa fa-save"></i>
        {{ __('auth.save') }}
    </button>
@endif
</div>