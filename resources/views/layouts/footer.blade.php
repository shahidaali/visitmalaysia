		<footer class="footer">
			<div class="social-links">
				<div class="container">
					<ul>
						@if($twitter = setting('site.social_twitter')) 
							<li><a href="{{ $twitter }}"><i class="fab fa-twitter"></i></a></li>
						@endif
						@if($facebook = setting('site.social_facebook')) 
							<li><a href="{{ $facebook }}"><i class="fab fa-facebook-f"></i></a></li>
						@endif
						@if($instagram = setting('site.social_instagram')) 
							<li><a href="{{ $instagram }}"><i class="fab fa-instagram"></i></a></li>
						@endif
						@if($youtube = setting('site.social_youtube')) 
							<li><a href="{{ $youtube }}"><i class="fab fa-youtube"></i></a></li>
						@endif
						@if($trip_advisor = setting('site.social_trip_advisor')) 
							<li><a href="{{ $trip_advisor }}"><i class="fab fa-tripadvisor"></i></a></li>
						@endif
						@if($pinterest = setting('site.social_pinterest')) 
							<li><a href="{{ $pinterest }}"><i class="fab fa-pinterest"></i></a></li>
						@endif
					</ul>
				</div>
			</div>
			<div class="footer-cols">
				<div class="container">
					<div class="row">
						<div class="col">
							<h3>{{ __('Discover') }}</h3>
							{{ menu('footer_1', 'bootstrap') }}
						</div>
						<div class="col">
							<h3>{{ __('Shop Dine Relax') }}</h3>
							{{ menu('footer_1', 'bootstrap') }}
						</div>
						<div class="col">
							<h3>{{ __('See Thrill Play') }}</h3>
							{{ menu('footer_1', 'bootstrap') }}
						</div>
						<div class="col">
							<h3>{{ __('Travel Planning') }}</h3>
							{{ menu('footer_1', 'bootstrap') }}
						</div>
						<div class="col">
							<h3>{{ __('Essential Links') }}</h3>
							{{ menu('footer_1', 'bootstrap') }}
						</div>
					</div>
				</div>
			</div>
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<a class="copyright-logo" href="{{ url('/') }}"><img src="{{ Voyager::image(setting('site.footer_logo')) }}"></a>
						</div>
						<div class="col-md-10">
							<div class="copyright-menu">{{ menu('copyright_menu', 'bootstrap') }}</div>
							<div class="copyright-text">{!! setting('site.copyright_text') !!}</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

        </div><!-- # App -->

        @yield('javascript')
        <!-- <script src="{{asset('assets/js/main.js ') }}"></script> -->
    </body>
</html>
