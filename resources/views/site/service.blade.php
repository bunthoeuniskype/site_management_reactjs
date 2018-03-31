@extends('layouts.master_site')

@section('title')

Service | B-Site Solution

@endsection

@section('content')

		<div class="hide-mobile" id="fh5co-hero" style="background-image: url({{url('uploads/images/slide_2.jpg') }});">
			<div class="overlay" style="position: sticky;"><img src="{{url('uploads/images/bsitesolition_promotion.png') }}" style="width: 100%;"></div>
			<a href="#fh5co-main" class="smoothscroll fh5co-arrow to-animate hero-animate-4"><i class="ti-angle-down"></i></a>
			<!-- End fh5co-arrow -->
			<div class="container">
				<div class="col-md-12">
					<div class="fh5co-hero-wrap">
						<div class="fh5co-hero-intro">
						
						</div>
					</div>
				</div>
			</div>		
		</div>

		<div id="fh5co-main">
			<div class="container">
				
				<div class="row text-center" id="fh5co-features">
					<div class="col-md-12 heading animate-box"><h2>Our Offer</h2></div>
					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
						<div class="fh5co-feature-icon">
							<i class="ti-mobile"></i>
						</div>
						<h3 class="heading">Mobile</h3>
						<p>Connect your business and processes to the mobile world with creatively designed mobile solutions. Establish your space in the huge mobile app market and enhance your business presence through powerful ios and android.</p>
					</div>
					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box"> 
						<div class="fh5co-feature-icon">
							<i class="ti-lock"></i>
						</div>
						<h3 class="heading">Security</h3>
						<p>Internet Security protect businesses with websites and online applications. Although it’s grim reading, it makes it absolutely clear to webmasters about the need to be vigilant and to be thoroughly proactive when it comes to security.  </p>
					</div>

					<div class="clearfix visible-sm-block"></div>

					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box"> 
						<div class="fh5co-feature-icon">
							<i class="ti-video-camera"></i>
						</div>
						<h3 class="heading">Video</h3>
						<p>Live video streaming applications like Google Hangouts On Air, Periscope, Meerkat and Blab.im are becoming extremely popular with social media users. website movies with api service.</p>
					</div>

					
					<!-- END Tabs -->
				</div>

				<!-- END .row -->
				</div>
		</div>
		<!-- END fhtco-main -->
@endsection