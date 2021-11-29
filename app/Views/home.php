<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/public/assets/css/home.css') ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<style>
		.contact-details {
			background-image: url(<?= base_url('/public/assets/img/contact.jpg') ?>);
			background-repeat: no-repeat;
			background-size: cover;
			border-radius: 10px;
		}
	</style>


	<title>Web Landing Page</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-soft-primary" id="home">
		<div class="container">
			<a class="navbar-brand" href="#"><img class="logo" src="<?= base_url('/public/assets/img/logo.png') ?>" alt="logo"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item px-3">
						<a href="#client">Consumer</a>
					</li>
					<li class="nav-item px-3">
						<a href="#delivery">Rider</a>
					</li>
					<li class="nav-item px-3">
						<a href="#about-us">About</a>
					</li>
					<li class="nav-item px-3">
						<a href="#contact">Contact</a>
					</li>
				</ul>
				<ul class="navbar-nav">

					<li class="nav-button navbar-right my-2">
						<a href="#client">Sign up</a>
					</li>
					<li class="nav-button navbar-right my-2">
						<a href="#client" style="padding: 10px 36px; margin: 5px; margin-left: 20px" class="btn1 btn-second">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


	<!--------- Banner Section --------->
	<section id="banner">
		<div class="container d-flex justify-content-center">
			<div class="row">
				<div class="col-md-6 banner-info">
					<h1 class="big-text font-weight-bold">Let's make your</h1>
					<h1 class="big-text font-weight-bold">Business</h1>
					<h1 class="big-text font-weight-bold">Grow</h1>
					<p>Bagudbud Express guarantees reliable delivery of your items your customer, at the right location in the right time through its effective distribution management.</p>
					<a href="#client" class="btn btn-first font-weight-bold">Start Now</a>
				</div>
				<div class="col-md-6 banner-image">
					<img src="<?= base_url('/public/assets/img/img1.jpg') ?>" class="w-100">
				</div>
			</div>
		</div>
	</section>

	<section id="about-us">
		<div class="container">
			<div class="row">
				<div class="col-md-12 d-flex align-items-center d-flex justify-content-center">
					<h1 class="about text-center font-weight-bold">Track all your deliveries at once</h1>
				</div>
				<div class="col-md-12 about-info d-flex justify-content-center mb-3">
					<p>Get the latest status of your package.</p>
				</div>
				<div class="col-md-12 d-flex justify-content-center">
					<a href="<?= base_url('/tracking') ?>" class="btn btn-first p-3 font-weight-bold" style="width: 12rem;">Track my Deliveries</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ------Consumer Section --------->
	<section id="consumer">
		<div class="container d-flex flex-column justify-content-center">
			<div class="consumer-title text-center mb-5">
				<h1 class="title font-weight-bold">We Care About Your Dreams</h1>
				<p>We provide Safe, Convenient and Fast deliveries.</p>
			</div>

			<div class="row">
				<div class="col-md-4 consumer-content">
					<img class="icon" src="<?= base_url('/public/assets/img/icon1.png') ?>" alt="">
					<h4 class="font-weight-bold mt-5">Safety</h4>
					<hr>
					<p>We take full responsibility of the item that we pick-up and provide a secure delivery of your items.</p>
				</div>
				<div class="col-md-4 consumer-content">
					<img class="icon" src="<?= base_url('/public/assets/img/icon2.png') ?>" alt="">
					<h4 class="font-weight-bold mt-5">Convenience</h4>
					<hr>
					<p>We provide you notifications of real time delivery state with which you can track the status of the item delivery. </p>
				</div>
				<div class="col-md-4 consumer-content">
					<img class="icon" src="<?= base_url('/public/assets/img/icon3.png') ?>" alt="">
					<h4 class="font-weight-bold mt-5">Speed</h2>
						<hr>
						<p>Offers fast and reliable pick-up and delivery of your item. </p>
				</div>
			</div>

		</div>
	</section>

	<!---------- Seller Section	----------->
	<section id="client">
		<div class="container">
			<div class="row seller">
				<div class="col-md-5 seller-image">
					<img src="<?= base_url('/public/assets/img/img2.jpg') ?>" class="w-100">
				</div>
				<div class="col-md-7 seller-info">
					<h1 class="title font-weight-bold">Are you an online seller?</h1>
					<p class="mt-4">Deliver your items with us. Whether you are a local blog shop or an ordinary online seller, we will be delighted in delivering fro you whether a parcel-collection or a doorto-door delivery in the Rinconada. </p>
					<a href="<?= base_url('/client-login') ?>" class="btn btn-first mt-5">Start Now</a>
				</div>
			</div>
		</div>
	</section>

	<!----------- Delivery Man Section ----------->
	<section id="delivery">
		<div class="container">
			<div class="row flex-column-reverse flex-md-row seller">
				<div class="col-md-7 delivery-info">
					<h1 class="title font-weight-bold">Are you interested to be a delivery man?</h1>
					<p>Drive with us! Be a part of Bagudbud Express delivery personnel along with your vehicle. Register as a new driver/rider by filling up the form, upload document and submit you application.</p>
					<a href="<?= base_url('/rider-login') ?>" class="btn btn-first mt-5">Start Now</a>
				</div>
				<div class="col-md-5 delivery-image">
					<img src="<?= base_url('/public/assets/img/img3.jpg') ?>" class="w-100">
				</div>
			</div>
		</div>
	</section>

	<section id="about-us" class="bg-soft-primary">
		<div class="container">
			<div class="row">
				<div class="col-md-6 d-flex align-items-center">
					<h1 class="about text-center font-weight-bold">About Us</h1>
				</div>
				<div class="col-md-6 about-info">
					<p>Bagudbud Express is a web based courier managements System that made for safe and hassle-free management of request, pick-up and delivery of items online. Bagudbud Express is purposely made and designed to connect people, through an extra hand in delivering items in the middle of COVID-19 Pandemic.</p>
				</div>
			</div>
		</div>
	</section>

	<!------------- Contact Section -------------->
	<section id="contact">
		<div class="container">
			<div class="contact-title text-center">
				<h1 class="title font-weight-bold">Share with Us</h1>
				<p>Want to get in touch? We would love to hear something from you! Send us your comment and questions</p>
			</div>
			<div class="row contact-content">
				<div class="col-md-5 contact-details">
					<div class="contact-info">
						<h1>Contact Information</h1>
						<p>Have any queries? Let us know we will clear it for you at the best!</p>
						<ul class="contact-list">
							<li><i class="fas fa-phone-alt"></i> <a href="tel:+63 912 3456 789" class="text-white font-weight-normal">+63 912 3456 789</a></li>
							<li><i class="fas fa-envelope"></i> <a href="mailto:bagudbudexpressph@gmail.com" class="text-white font-weight-normal">bagudbudexpressph@gmail.com</a></li>
							<li><i class="fas fa-map-marker-alt"></i> San Miguel, Nabua, Camarines Sur</li>
						</ul>
						<div class="contact-logo">
							<i class="fab fa-facebook"></i>
							<i class="fab fa-twitter"> </i>
							<i class="fab fa-google"></i>
						</div>
					</div>
				</div>
				<div class="col-md-7 contact-form">
					<form action="">
						<div class="row contact-form1">
							<div class="col-sm-6 form-field">
								<label for="first-name">First Name</label><br>
								<input id="first-name" class="input-text" type="text" placeholder="John">
							</div>
							<div class="col-sm-6 form-field">
								<label for="last-name">Last Name</label><br>
								<input id="last-name" class="input-text" type="text" placeholder="Doe">
							</div>
							<div class="col-sm-12 form-field">
								<label for="email">Email</label><br>
								<input id="email" class="input-text" type="text" placeholder="example@example.com">
							</div>
							<div class="col-sm-12 form-field">
								<label for="message">Message</label><br>
								<input id="message" class="input-text" type="text" placeholder="Write your message"><br>
							</div>
							<div class="col-sm-12 form-field text-right">
								<input class="submit-btn" type="submit" value="Send message">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="bg-light page-footer font-small blue-grey lighten-5">

		<div style="background-color: #39de7b">
			<div class="container">

				<!-- Grid row-->
				<div class="row py-4 d-flex align-items-center">

					<!-- Grid column -->
					<div class="col-md-6 col-lg-5 text-center text-white text-md-left mb-4 mb-md-0">
						<h6 class="mb-0">Get connected with us on social networks!</h6>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-6 col-lg-7 text-center text-white text-md-right">

						<!-- Facebook -->
						<a class="fb-ic">
							<i class="fab fa-facebook-f white-text mr-4 text-white"> </i>
						</a>
						<!-- Twitter -->
						<a class="tw-ic">
							<i class="fab fa-twitter white-text mr-4 text-white"> </i>
						</a>
						<!-- Google +-->
						<a class="gplus-ic">
							<i class="fab fa-google-plus-g white-text mr-4 text-white"> </i>
						</a>
						<!--Linkedin -->
						<a class="li-ic">
							<i class="fab fa-linkedin-in white-text mr-4 text-white"> </i>
						</a>
						<!--Instagram-->
						<a class="ins-ic">
							<i class="fab fa-instagram white-text text-white"> </i>
						</a>

					</div>
					<!-- Grid column -->

				</div>
				<!-- Grid row-->

			</div>
		</div>

		<!-- Footer Links -->
		<div class="container text-center text-md-left mt-5">

			<!-- Grid row -->
			<div class="row mt-3 dark-grey-text">

				<!-- Grid column -->
				<div class="col-md-4 col-lg-5 col-xl-4 mb-4">

					<!-- Content -->
					<h6 class="text-uppercase font-weight-bold">Bagudbud Express</h6>
					<hr class="green accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
					<p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
						consectetur
						adipisicing elit.</p>

				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">

					<!-- Links -->
					<h6 class="text-uppercase font-weight-bold">Useful links</h6>
					<hr class="green accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
					<p>
						<a class="text-info" href="#home">Home</a>
					</p>
					<p>
						<a class="text-info" href="">Your Account</a>
					</p>
					<p>
						<a class="text-info" href="#about-us">About Us</a>
					</p>
					<p>
						<a class="text-info" href="#contact">Contact Us</a>
					</p>

				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-md-5 col-lg-4 col-xl-4 mx-auto mb-md-0 mb-4">

					<!-- Links -->
					<h6 class="text-uppercase font-weight-bold">Contact</h6>
					<hr class="green accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
					<p>
						<i class="fas fa-home mr-3"></i> San Miguel, Nabua, Camarines Sur
					</p>
					<p>
						<i class="fas fa-envelope mr-3"></i> <a href="mailto:bagudbudexpressph@gmail.com" class="text-dark">bagudbudexpressph@gmail.com</a>
					</p>
					<p>
						<i class="fas fa-phone mr-3"></i> <a href="tel:+63 912 3456 789" class="text-dark">+63 912 3456 789</a>
					</p>

				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row -->

		</div>
		<!-- Footer Links -->

		<!-- Copyright -->
		<div class="footer-copyright text-center text-dark py-3">© 2021 Copyright:
			<a class="text-dark" href="https://mdbootstrap.com/"> Bagudbud Express</a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->

	<!-- <script src="<?= base_url('/public/assets/bootstrap-4/js/bootstrap.min.js') ?>"></script> -->
	<!-- <script src="js/jquery-3.5.1.min.js"></script> -->
</body>

</html>