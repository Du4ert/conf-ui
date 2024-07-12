<div class="row">
    <div class="col-md-12">
        <dl class="row">

            <dt class="col-4  mb-2">{{ __('auth.participant') }}</dt>
            <dd class="col-8">
                {{ $user->fullNameExtend() }}<br/><small>{{ $user->regalia() }}</small>
            </dd>

            <dt class="col-4  mb-2">{{ __('auth.participant_en') }}</dt>
            <dd class="col-8">
                {{ $user->fullNameExtendEn() }}<br/><small>{{ $user->regaliaEn() }}</small>
            </dd>


            <dt class="col-4  mb-2">{{ __('auth.organization_title') }}</dt>
            <dd class="col-8">
                {{ $user->organization_title }}
            </dd>

            <dt class="col-4  mb-2">{{ __('auth.organization_title_en') }}</dt>
            <dd class="col-8">
                {{ $user->organization_title_en }}
            </dd>

            
                
            
            <hr />
            @include('user.parts.new_field', ['field_name' => 'vavilov_article'])
            @include('user.parts.new_field', ['field_name' => 'school_participation'])
            @include('user.parts.new_field', ['field_name' => 'young_scientist'])
            

        </dl>

    </div>

</div>