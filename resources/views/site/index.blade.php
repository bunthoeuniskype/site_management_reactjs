@extends('layouts.master_site')

@section('title')

B-Site Solution

@endsection

@section('content')

<div class="hide-mobile" id="fh5co-hero" style="background-image: url({{url('uploads/images/slide_2.jpg')}});">
			<div class="overlay" style="position: sticky;"><img src="{{url('uploads/images/web-responsive.jpg')}}" style="width: 100%;"></div>
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
			
			<div class="fh5co-cards">
				<div class="container-fluid">
					<div class="row animate-box">
						<div class="col-md-12 heading text-center"><h2>Our Provide</h2></div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 animate-box">
							<a class="fh5co-card" href="#">
								<img src="{{url('uploads/images/web-development.jpg')}}" alt="B-Site Solution" class="img-responsive">
								<div class="fh5co-card-body">
									<h3>Web Develop</h3>
									<ul style="font-size: 14px;">
									<li>All Type System</li>
									<li>POS System</li>
									<li>Content Management Systems </li>
									<li>Shopping and E-Commerce</li>								
									<li>Any other dynamic website</li>
									</ul>
								</div>
							</a>
						</div>
						
						<div class="col-lg-3 col-md-6 col-sm-6 animate-box">
							<a class="fh5co-card" href="#">
								<img src="{{url('uploads/images/web-design.jpg')}}" alt="B-Site Solution" class="img-responsive">
								<div class="fh5co-card-body">
									<h3>Web Design</h3>
								<ul style="font-size: 14px;">
								<li>Content Management Systems </li>
								<li>Shopping and E-Commerce</li>
								<li>Presentation Websites </li>
								<li>Online Catalogues </li>
								<li>Any other dynamic website</li>
								</ul>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 animate-box">
							<a class="fh5co-card" href="#">
								<img src="{{url('uploads/images/online_marketing.jpg')}}" alt="B-Site Solution" class="img-responsive">
								<div class="fh5co-card-body">
									<h3>Online Marketing</h3>
									<ul style="font-size: 14px;">
									<li>Search engine optimisation </li>
									<li>Search engine marketing </li>
									<li>Internet advertising </li>
									<li>Web analysis </li>
									<li>Blog marketing</li>
									</ul>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 animate-box">
							<a class="fh5co-card" href="#">
								<img src="{{url('uploads/images/graphic-design.jpg')}}" alt="B-Site Solution" class="img-responsive">
								<div class="fh5co-card-body">
									<h3>Graphic Design</h3>
									<ul style="font-size: 14px;">
									<li>Logo design </li>
									<li>Flyers Brochures </li>
									<li>Business Cards </li>
									<li>Magazine </li>
									<li>Banners</li>
									</ul>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		

			<div class="fh5co-product-2">

				<div class="fh5co-half img" style="background-image: url({{url('uploads/images/web-development-process-explained.jpg')}});">
					
				</div>
				<div class="fh5co-half">
					<h3>Turning Ideas into Partnership</h3>
					<p style="text-align: justify;">We have architected tremendous work in Web Applications development, covering the entire range of the latest Web Technologies and tools. We have the expertise to build high-end solutions for industry specific portals. Software Assurance is the one stop solution for everything from Web Applications development, design, e-commerce, and business portals to CMS Solutions, social networking, and customized software solutions.</p>
				
				</div>
			</div>

		</div>
		<!-- END fhtco-main -->


@endsection