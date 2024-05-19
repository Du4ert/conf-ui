<nav class="main-nav navbar navbar-expand-lg">
    <div class="site-logo"><a class="" href="{{ LaravelLocalization::localizeUrl('/#hero-block') }}"><img class="logo-icon" src="{{asset('/images/botsad.png')}}" alt="logo"></a></div>
    <div class="navbar-btn order-lg-2"><a class="btn btn-secondary" href="{{ LaravelLocalization::localizeUrl('/register') }}" target="">{{ __('navigation.register') }}</a></div>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div id="navigation" class="navbar-collapse collapse  justify-content-lg-end me-lg-3">
    

<ul class="nav navbar-nav">					
    <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/#about-section') }}">{{ __('navigation.about') }}</a></li>                                              
    <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/#organizer-section') }}">{{ __('navigation.organizer') }}</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/#speakers-section') }}">{{ __('navigation.people') }}</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/#schedule-section') }}">{{ __('navigation.dates') }}</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/#tickets-section') }}">{{ __('navigation.fee') }}</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/#venue-section') }}">{{ __('navigation.venue') }}</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/#sponsors-section') }}">{{ __('navigation.partners') }}</a></li>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    @if ($localeCode !== LaravelLocalization::getCurrentLocale())
    <li class="nav-item">
        <a class="nav-link language-flag flag-{{ $localeCode }}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, []) }}">
            {{-- {{ $properties['native'] }} --}}
        </a>
    </li>
    @endif
    @endforeach
</ul><!--//nav-->


</div><!--//navabr-collapse-->

</nav><!--//main-nav-->