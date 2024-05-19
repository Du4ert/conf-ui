<header id="header" class="header fixed-top">	    
		<div class="branding">
			<div class="container-fluid">
				@if(Route::currentRouteName() == 'homepage')
					@include('common.navigation')
				@else
					@include('common.navigation-static')
			  	@endif
			</div><!--//container-->
		</div><!--//branding-->
	</header><!--//header-->