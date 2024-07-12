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
        @include('user.inputs.field_home', [
            'field_name' => 'last_name',
            'required' => true,
            'form' => 'user-form',
        ])
    </div>
    <div class="col-lg-6">
        @include('user.inputs.field_home', [
            'field_name' => 'last_name_en',
            'required' => true,
            'form' => 'user-form',
        ])
    </div>
</div>
<div class="row form-group mb-2">
    <div class="col-lg-6">
        @include('user.inputs.field_home', [
            'field_name' => 'first_name',
            'required' => true,
            'form' => 'user-form',
        ])
    </div>
    <div class="col-lg-6">
        @include('user.inputs.field_home', [
            'field_name' => 'first_name_en',
            'required' => true,
            'form' => 'user-form',
        ])
    </div>
</div>
<div class="row form-group mb-2">
    <div class="col-lg-6">
        @include('user.inputs.field_home', ['field_name' => 'middle_name', 'form' => 'user-form'])
    </div>
    <div class="col-lg-6">
        @include('user.inputs.field_home', ['field_name' => 'middle_name_en', 'form' => 'user-form'])
    </div>
</div>
<div class="row form-group mb-2">
    <div class="col-lg-6">
        @include('user.inputs.field_home', [
            'field_name' => 'organization_title',
            'required' => true,
            'form' => 'user-form',
        ])
    </div>
    <div class="col-lg-6">
        @include('user.inputs.field_home', [
            'field_name' => 'organization_title_en',
            'required' => true,
            'form' => 'user-form',
        ])
    </div>
</div>
<div class="row form-group mb-2">
    <div class="col-lg-6">
        @include('user.inputs.field_home', ['field_name' => 'rank_title', 'form' => 'user-form'])
    </div>
    <div class="col-lg-6">
        @include('user.inputs.field_home', ['field_name' => 'rank_title_en', 'form' => 'user-form'])
    </div>
</div>
<div class="row form-group mb-2">
    <div class="col-lg-6">
        @include('user.inputs.field_home', ['field_name' => 'job_title', 'form' => 'user-form'])
    </div>
    <div class="col-lg-6">
        @include('user.inputs.field_home', ['field_name' => 'job_title_en', 'form' => 'user-form'])
    </div>
</div>

<div class="mb-2">
@include('user.inputs.radio', ['field_name' => 'vavilov_article'])
</div>
<div class="mb-2">
@include('user.inputs.radio', ['field_name' => 'school_participation'])
</div>
<div class="mb-2">
@include('user.inputs.radio', ['field_name' => 'young_scientist'])
</div>

