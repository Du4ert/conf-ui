@php
// Todo
 function navUrl($url) {
  if (Route::currentRouteName() == 'welcome') {
	return $url;  
  } else {
	return LaravelLocalization::localizeUrl('/' . $url);
  }
}

function setClass($class_name = 'scrollto') {
	if (Route::currentRouteName() == 'welcome') {
	return $class_name;
	}
}
@endphp

<header id="header" class="header fixed-top px-3">	    
	<nav class="main-nav navbar navbar-expand-xl">
		<div class="site-logo"><a class="{{ setClass('scrollto') }}" href="{{ navUrl('#hero-block')}}"><img class="logo-icon" src="{{asset('images/botsad.png')}}" alt="logo"></a></div>
		@include('common.authnav')
	
		{{-- <div class="navbar-btn order-lg-2"><a class="btn btn-secondary" href="{{ LaravelLocalization::localizeUrl('/register') }}" target="">{{ __('navigation.register') }}</a></div> --}}
		
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div id="navigation" class="navbar-collapse collapse  justify-content-lg-end me-lg-3">
		
			
	<ul class="nav navbar-nav">					
		<li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#about-section')}}">{{ __('navigation.about') }}</a></li>
		<li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#sections-section')}}">{{ __('navigation.sections') }}</a></li>                                               
		<li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#organizer-section')}}">{{ __('navigation.organizer') }}</a></li>
		<li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#committee-section')}}">{{ __('navigation.committee') }}</a></li>
		{{-- <li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#dates-section')}}">{{ __('navigation.dates') }}</a></li> --}}
		<li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#program-section')}}">{{ __('navigation.program') }}</a></li>
		{{-- <li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#schedule-section')}}">{{ __('navigation.dates') }}</a></li> --}}
		<li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#payment-section')}}">{{ __('navigation.fee') }}</a></li>
		<li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#venue-section')}}">{{ __('navigation.venue') }}</a></li>
		<li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#sponsors-section')}}">{{ __('navigation.partners') }}</a></li>
		<li class="nav-item"><a class="nav-link {{ setClass('scrollto') }}" href="{{ navUrl('#contacts-section')}}">{{ __('navigation.contacts') }}</a></li>

		@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
@if ($localeCode !== LaravelLocalization::getCurrentLocale())
<li class="nav-item ms-2 ms-lg-4 ms-auto">
    <a class="nav-link language-flag flag-{{ $localeCode }}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, []) }}"></a>
</li>
@endif
@endforeach

	</ul><!--//nav-->
	
	
	</div><!--//navabr-collapse-->
	</nav><!--//main-nav-->
			
	</header><!--//header-->