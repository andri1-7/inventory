 <!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#0844a5" />
		<title>Go Express</title>
	<!-- <link rel="shortcut icon" href="<?php echo base_url('web/favicon.ico'); ?> "> -->
	<link rel="stylesheet" href="<?php echo base_url('web/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('web/css/stylesheet_driver.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('web/css/animate.css') ?>">

</head>
<body>

<header>
	<div class="container">
    <a href="<?php echo base_url("goexpress");?>"><img src="<?php echo base_url('web/img/logo.png'); ?>" alt=""></a>
	</div>
</header>

<div class="content">
	<div id="driver">

	<div class="container">
		<div class="col-xs-12 col-sm-6 col-md-7 zero">
			<h1>BECOME OUR DRIVER PARTNER</h1>
			<img src="<?php echo base_url('web/img/drivers2.jpg'); ?>" alt="" class="img-responsive drivers2">
		</div>

		<div class="col-xs-12 col-sm-6 col-md-5 zero signup-drivers">
			<img src="<?php echo base_url('web/img/jabat-tangan.jpg'); ?>" alt="" class="img-responsive drivers3">
		</div>

		<div class="col-xs-12 col-sm-5 zero signup-bg signup-form">
			<form action="<?php echo base_url('goexpress/tmp_registration'); ?>" method="POST" name="signup_form" id="signup_form">
				<h2>SIGNUP NOW</h2>
				<input type="text" placeholder="First Name" name="firstname" required>
				<input type="text" placeholder="Last Name" name="lastname" required>
				<input type="email" placeholder="Email" name="email" required>
				<input type="text" placeholder="Phone" name="phone" required>
				<input type="password" placeholder="Create Password" name="password" required>
				<input type="date" placeholder="Birthday Date" name="birthdate" required>
				<input type="text" placeholder="Address" name="address" required>
				<input type="text" placeholder="City" name="city" required>
				<input type="text" placeholder="Invite Code (Optional)" name="invite_code" required>
				<div class="clearfix"></div>
				<div class="submit">				
					<input type="submit" value="SUBMIT" name="submit">
				</div>
                <div class="clearfix"></div>
                <br>
				<div class="warning">
					<ul>
						<!-- <li class="succes">Password is too simple. Please try something more complex.</li> -->
						<!-- <li class="failed">Password is too simple. Please try something more complex.</li> -->
					</ul> 
				</div>
			</form>
        </div>


		<div class="col-xs-12 col-sm-7 zero description">
			<p>By continuing this activity, I agree that Go Express or its affiliates and representatives can use my personal information and contact me via email, telephone or SMS (including the system of automated telephone calls) at the email address or phone number that I gave, including for marketing purposes. I have read and understood the privacy statement Go Express</p>
			<p>Furthermore, I also agree that the personal information I provide to sign up with Go Express will be distributed to GOXPRESS CO,. LTD, the operator of a web portal www.goexpress-kh.com and (a) I hereby agree to create a customer account registered in www.goexpress-kh.com at the same time with my enrollment in Go Express; (b) I hereby consent to the privacy statements of GOXPRESS CO,. LTD and for the processing of my personal data in accordance with the laws of Cambodia are also in accordance with the requirements of GOXPRESS CO,. LTD's privacy statement available here.</p>
		</div>



		<div class="clearfix"></div>
	</div>
	</div>
	<div class="clearfix"></div>
</div>
 
