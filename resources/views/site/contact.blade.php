@extends('layouts.master_site')

@section('title')

Contact Us | B-Site Solution

@endsection

@section('content')

	
		<div id="fh5co-hero" style="background-image: url({{asset('/public/uploads/images/slide_2.jpg')}});">
			<div class="overlay"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7818.221625214976!2d104.92362649399159!3d11.543908016310752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x9c010ee85ab525bb!2sPhnom+Penh!5e0!3m2!1sen!2skh!4v1508172751944" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
			<a href="#fh5co-main" class="smoothscroll fh5co-arrow to-animate hero-animate-4"><i class="ti-angle-down"></i></a>
			<!-- End fh5co-arrow -->
			<div class="container">
				<div class="col-md-12">
					<div class="fh5co-hero-wrap" style="height: 450px">
						<div class="fh5co-hero-intro">
							
						</div>
					</div>
				</div>
			</div>		
		</div>

		<div id="fh5co-main">
			<div class="col-12 heading animate-box"><h2 id="our-provide">Contact Us</h2></div>	
			<div id="fh5co-contact">
			<div class="col-12">
				
					<div class="col-12 col-lg-6">
						<form action="#" method="post">
							<div class="col-12">
								<div class="form-group">
									<label for="name" class="sr-only">UserName</label>
									<input placeholder="Name" id="name" type="text" class="form-control input-lg">
								</div>	
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input placeholder="Email" id="email" type="text" class="form-control input-lg">
								</div>	
							</div>
							
							<div class="col-12">
								<div class="form-group">
									<label for="message" class="sr-only">Message</label>
									<textarea placeholder="Message" id="message" class="form-control input-lg" rows="3"></textarea>
								</div>	
							</div>
							<div class="col-12">
								<div class="form-group">
									<input type="submit" class="btn btn-primary btn-lg " value="Send">

								</div>	
							</div>
							
							
						</form>	
						
					</div>
					<div class="col-12 col-md-6">
						<h3>Need Help?</h3>
						<p>
						Address : Phnom Penh, Cambodia <br>
						
						Phone : (+855)86 921 945 / (+855)78 987 170 <br>
						
						Email : bsite168@gmail.com<br>
					
						Website : www.bsitezone.com
						</p> 
						<p>
						We would like to hear from you, whether you want to receive further information, ask a question, make a suggestion, or report a problem. Please contact us using the details below or fill out the form on the right.
						If you experience problems with your website you might want to post your issues in our forum. It is FREE and one of our moderator will try to resolve your issue for you..
						</p>
							
					</div>


			</div>

			</div>
			<!-- fh5co-contact -->

		
		</div>
		<!-- END fhtco-main -->

@endsection