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
                    @include('user.inputs.field', ['field_name' => 'last_name', 'required' => true, 'form' => 'user-form'])
                </div>
                <div class="col-lg-6">
                @include('user.inputs.field', ['field_name' => 'last_name_en', 'required' => true, 'form' => 'user-form'])
                </div>
             </div>
             <div class="row form-group mb-2">
                <div class="col-lg-6">
            @include('user.inputs.field', ['field_name' => 'first_name', 'required' => true, 'form' => 'user-form'])
                </div>
                <div class="col-lg-6">
            @include('user.inputs.field', ['field_name' => 'first_name_en', 'required' => true, 'form' => 'user-form'])
                </div>
            </div>
            <div class="row form-group mb-2">
            <div class="col-lg-6">
            @include('user.inputs.field', ['field_name' => 'middle_name', 'form' => 'user-form'])
        </div>
            <div class="col-lg-6">
            @include('user.inputs.field', ['field_name' => 'middle_name_en', 'form' => 'user-form'])
        </div>
    </div>
    <div class="row form-group mb-2">
    <div class="col-lg-6 mb-0">
            @include('user.inputs.field', ['field_name' => 'organization_title', 'required' => true, 'form' => 'user-form'])
        </div>
            <div class="col-lg-6 mb-0">
            @include('user.inputs.field', ['field_name' => 'organization_title_en', 'required' => true, 'form' => 'user-form'])
        </div>
        <div class="col-md-10 mx-auto mb-4 organization-notice"><small class="text-muted">{{ __('auth.organization_full_notice') }}</small></div> 
    </div>
    <div class="row form-group mb-2">
        <div class="col-lg-6">
            @include('user.inputs.field', ['field_name' => 'rank_title', 'form' => 'user-form'])
        </div>
            <div class="col-lg-6">
            @include('user.inputs.field', ['field_name' => 'rank_title_en', 'form' => 'user-form'])
        </div>
    </div>
            <div class="row form-group mb-2">
                <div class="col-lg-6">
            @include('user.inputs.field', ['field_name' => 'job_title', 'form' => 'user-form'])
        </div>
            <div class="col-lg-6">
            @include('user.inputs.field', ['field_name' => 'job_title_en', 'form' => 'user-form'])
        </div>
    </div>
    </div>