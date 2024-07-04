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
            @if (isset($user->vavilov_article))
                <dt class="col-4  mb-2">{{ __('auth.vavilov_info') }}</dt>
                <dd class="col-8">
                    {{ $user->vavilov_article ? __('auth.yes') : __('auth.no') }}
                </dd>
            @else
            @if (!auth()->user()->isAdmin())
            <div class="alert alert-warning" role="alert">
                <strong>{{ __('auth.new_field_alert') }}</strong> <br />
                {{ __('auth.vavilov_form') }} <br />
                <span class="text-muted">Пожалуйста, нажмите «редактировать» и обновите значение.</span>
              </div>
            @endif
            @endif
            

        </dl>

    </div>

</div>