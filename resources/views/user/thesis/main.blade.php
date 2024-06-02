
<div class="row mb-2 d-none d-md-flex">
    @include('user.inputs.section', ['form' => 'thesis-form'])
    @include('user.inputs.report_form', ['form' => 'thesis-form'])
</div>


@include('user.parts.languages')

            <div class="row form-group mb-2">
                <div class="col-lg-6">
                    @include('user.thesis.field', ['field_name' => 'thesis_title', 'required' => true, 'form' => 'thesis-form'])
                </div>
                <div class="col-lg-6">
                    @include('user.thesis.field', ['field_name' => 'thesis_title_en', 'required' => true, 'form' => 'thesis-form'])
                </div>
            </div>



            <div class="row form-group mb-2">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="thesis-form" class="form-label">{{ __('auth.thesis_text') }}</label>
                        <textarea id="text" class="form-control" name="text" rows="3">{{ $thesis->text}}</textarea>
                      </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="thesis-form" class="form-label">{{ __('auth.thesis_text_en') }}</label>
                        <textarea id="text_en" class="form-control" name="text_en" rows="3">{{ $thesis->text_en}}</textarea>
                      </div>
                </div>
             </div>