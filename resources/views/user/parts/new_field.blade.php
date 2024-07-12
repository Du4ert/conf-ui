@if (isset($user->$field_name))
    <dt class="col-4  mb-2">{{ __('auth.' . $field_name . '_info') }}</dt>
    <dd class="col-8">
        {{ $user->$field_name ? __('auth.yes') : __('auth.no') }}
    </dd>
@else
    @if (!auth()->user()->isAdmin())
        <div class="alert alert-warning" role="alert">
            <strong>{{ __('auth.new_field_alert') }}</strong> <br />
            {{ __('auth.' . $field_name . '_form') }} <br />
            <span class="text-muted">{{ __('auth.new_field_instructions') }}</span>
        </div>
    @endif
@endif
