<div id="hero-block" class="hero-block">
    <div id="hero-carousel" class="hero-carousel carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item-1 carousel-item active">
            </div>
            <div class="carousel-item-2 carousel-item">
            </div>
            <div class="carousel-item-3 carousel-item">
            </div>
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
                    <div class="event-countdown text-center mb-3"></div>
                    <div id="countdown-box" class="countdown-box"></div>
                </div><!--//event-countdown-->
            </div>
            <h1 class="hero-heading mb-2">НБС-ННЦ</h1>
            <div class="hero-meta mb-3"><i class="far fa-calendar-alt me-2"></i>12 - 15 Oct <i
                    class="fas fa-map-marker-alt mx-2"></i>Москва, Россия</div>
            <div class="hero-intro mb-4">Курчатовский геномный центр <br>Конференция.</div>
            <div class="hero-cta"><a class="btn btn-primary btn-lg" href="{{ LaravelLocalization::localizeUrl('/register') }}">Принять участие</a>
            </div>

        </div><!--//hero-text-block-->
    </div><!--//container-->

</div><!--//hero-block-->
