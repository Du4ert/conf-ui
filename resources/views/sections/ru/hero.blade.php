<div id="hero-block" class="hero-block">
    <div id="hero-carousel" class="hero-carousel carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item-1 carousel-item active">
            </div>
            {{-- <div class="carousel-item-2 carousel-item">
            </div> --}}
            {{-- <div class="carousel-item-3 carousel-item">
            </div> --}}
        </div>
    </div>
    <div class="hero-block-mask"></div>
    <div class="container">
        <div class="hero-text-block">
            <div class="row">
                <div class="col-md-2">
                    <img class="hero-logo mb-2" src="{{ asset('images/conf-logo.png') }}"
                        alt="">
                </div>
                <div class="col-md-10">
                    {{-- <div class="event-countdown text-center mb-3"></div> --}}
                    {{-- <div id="countdown-box" class="countdown-box"></div> --}}
                </div><!--//event-countdown-->
            </div>
            <h1 class="hero-heading mb-2">GenBio</h1>
            <div class="hero-meta mb-3"><i class="far fa-calendar-alt me-2"></i>07 - 11 {{ __('main.month_oct')}} <i
                    class="fas fa-map-marker-alt mx-2"></i>{{ __('main.location') }}</div>
            <div class="hero-intro mb-4">Курчатовский геномный центр <br/> Никитского ботанического сада <br>{{ __('main.conf') }}</div>
            <div class="hero-cta">
                {{-- <a class="btn btn-primary btn-lg" href="{{ LaravelLocalization::localizeUrl('/register') }}">{{ __('main.participate')}}</a> --}}
                <a class="btn btn-primary btn-lg" href="#program-section">{{ __('main.program')}}</a>
            </div>

        </div><!--//hero-text-block-->
    </div><!--//container-->

</div><!--//hero-block-->


{{-- <script>
    /* ======= Countdown ========= */
// set the date we're counting down to
var target_date = new Date("Oct 7, 2024").getTime();

var secUnit = 's';
var minUnit = 'm';
var daysUnit = 'd';
var hoursUnit = 'h';

if (locale === 'ru') {
var secUnit = 'с';
var minUnit = 'м';
var daysUnit = 'д';
var hoursUnit = 'ч';
}
 
// variables for time units
var days, hours, minutes, seconds;
 
// get tag element
var countdown =  document.getElementById("countdown-box");
var days_span = document.createElement("SPAN");
days_span.className = 'days';
countdown.appendChild(days_span);
var hours_span = document.createElement("SPAN");
hours_span.className = 'hours';
countdown.appendChild(hours_span);
var minutes_span = document.createElement("SPAN");
minutes_span.className = 'minutes';
countdown.appendChild(minutes_span);
var secs_span = document.createElement("SPAN");
secs_span.className = 'secs';
countdown.appendChild(secs_span);
 
// update the tag with id "countdown" every 1 second
setInterval(function () {
 
    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;
 
    // do some time calculations
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
     
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
     
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
     
    // format countdown string + set tag value.
    days_span.innerHTML = '<span class="number">' + days + '</span>' + '<span class="unit">' + daysUnit + '</span>';
    hours_span.innerHTML = '<span class="number">' + hours + '</span>' + '<span class="unit">' + hoursUnit + '</span>';
    minutes_span.innerHTML = '<span class="number">' + minutes + '</span>' + '<span class="unit">' + minUnit + '</span>';
    secs_span.innerHTML = '<span class="number">' + seconds + '</span>' + '<span class="unit">' + secUnit + '</span>'; 
 
}, 1000);

</script> --}}