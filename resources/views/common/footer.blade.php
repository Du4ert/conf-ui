<footer class="footer py-5 theme-bg-dark text-white">
    <div class="container text-center">
        
        {{-- <ul class="social-list list-inline mb-4"> 
            <li class="list-inline-item me-3"><a href="#mailto"><i class="fas fa-envelope"></i></a></li>
            <li class="list-inline-item me-3"><a href="#telegram"><i class="fab fa-telegram fa-fw"></i></a></li>
            <li class="list-inline-item me-3"><a href="#vk"><i class='fab fa-vk'></i></a></li>
        </ul><!--//social-list--> --}}
        
        
        <ul class="footer-links list-inline mx-auto mb-4">
            <li class="list-inline-item"><a href="{{ route('policy') }}">{{ __('main.confidencial')}}</a></li>
            <li class="list-inline-item">|</li>
            <li class="list-inline-item"><a href="{{ route('agreement') }}">{{ __('main.agreement')}}</a></li>
            <li class="list-inline-item">|</li>
            <li class="list-inline-item"><a href="/">{{ __('main.main') }}</a></li>
            <li class="list-inline-item">|</li>
            <li class="list-inline-item me-0"><a href="{{ route('home') }}">{{ __('main.home') }}</a></li>
        </ul><!--//footer-link-->
        
         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
        {{-- <small class="copyright">Designed with <i class="fas fa-heart" style="color: #EC645E;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small> --}}
        
    </div><!--//container-->	    
</footer>