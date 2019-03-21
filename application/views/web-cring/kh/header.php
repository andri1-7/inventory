<!DOCTYPE html>
<html lang="th">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#0844a5" />
		<title>Go Express</title>
	<!-- <link rel="shortcut icon" href="<?php echo base_url('web/favicon.ico'); ?> "> -->
	<link rel="stylesheet" href="<?php echo base_url('web/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('web/css/stylesheet.css'); ?>">

</head>
<body>

<div id="body" class="hidden">

<div id="menu-button-click" class="sekali">
	<div class="menu-icon">
		<span class="glyphicon glyphicon-align-left"></span>
	</div>
</div>

<!-- MENU CONTENT -->
<div id="menu-click" class="animated slideInLeft hidden">
	<div id="close-left">
		<i class="icon-cross"></i>
	</div>
<div id="logo-left">
	<a href="" class="logo-small"><img src="<?php echo base_url('web/img/logo-left.png')?>" alt="" class="img-responsive"></a>
	<div class="lang">
		<span><a href="<?php echo base_url('kh'); ?>" class="this" title="Thailand"><img src="<?php echo base_url('web/img/kh.png'); ?>" alt=""></a></span>
		<span><a href="<?php echo base_url('en'); ?>" title="English"><img src="<?php echo base_url('web/img/inter.png'); ?>" alt=""></a></span>
	</div>
</div>
<nav id="nav-left">
 <ul>
	 <li class="active">
	 	<span><i class="icon-home"></i></span>
		<a data-href="#slide1" data-hover="ទំព័រដើម" class="text-hover">ទំព័រដើម</a>
	 </li>
<!-- 	 <li>
	 	<span><i class="icon-newspaper"></i></span>
		<a data-href="#slide" data-hover="Newsroom" class="text-hover">About</a>
	 </li> -->
	 <li>
	 	<span><i class="glyphicon glyphicon-question-sign"></i></span>
		<a data-href="#slide2" data-hover="អំពីយើង" class="text-hover">អំពីយើង</a>
	 </li>
	 <li>
	 	<span><i class="icon-cog"></i></span>
		<a data-href="#slide3" data-hover="សេវាកម្ម" class="text-hover">សេវាកម្ម</a>
	 </li>
	 <li>
	 	<span><i class="glyphicon glyphicon-list-alt"></i></span>
		<a data-href="#slide5" data-hover="ហេតុអ្វី Go-X?" class="text-hover">ហេតុអ្វី Go-X?</a>
	 </li>
<!-- 	 <li>
	 	<span><i class="icon-briefcase"></i></span>
		<a data-href="#slide" data-hover="Careers" class="text-hover">Careers</a>
	 </li> -->
	 <li>
	 	<span><i class="glyphicon glyphicon-earphone"></i></span>
		<a data-href="#slidex" data-hover="ទំនាក់ទំនង" class="text-hover">ទំនាក់ទំនង</a>
	 </li>
 </ul>
</nav>

</div>


<!--  HEADER START --> 
<header id="header" class="hide-opacity">
<div class="content">
<div id="logo"><a href=""><img src="<?php echo base_url('web/img/logo-sticky.png') ?>" alt="" class="img-responsive"></a></div>


<div class="navbar-toggle">
	<span class="icon-bar top-bar"></span>
	<span class="icon-bar middle-bar"></span>
	<span class="icon-bar bottom-bar"></span>
</div>

<nav id="nav" class="hide-mobile">
 <ul>
	 <li><a id="section" data-href="#slide1" class="active" title="Back To Home">ទំព័រដើម</a></li>
	 <li><a id="section" data-href="#slide2" title="What is Go-X?">អំពីយើង</a></li>
	 <li><a id="section" data-href="#slide3" title="Our Services">សេវាកម្ម</a></li>
	 <!-- <li><a id="section" data-href="#slide4" title="Next Section"></a></li> -->
	 <li><a id="section" data-href="#slide5" title="Why Go-X?">ហេតុអ្វី Go-X?</a></li>
	 <li><a id="section" data-href="#slidex" title="Contact Us">ទំនាក់ទំនង</a></li>
	 <!-- <li><a id="section" data-href="#slide7" title="Next Section">Slide 7</a></li> -->
 </ul>
 <ul style="float: right;">
	 <li style="padding-left: 5px;color:#d30e0e;"></li>
	 <li style="padding-left: 5px;"><a href="<?php echo base_url('en'); ?>"><img src="<?php echo base_url('web/img/inter.png') ?>" alt=""></a></li>
	 <li style="padding-left: 5px;"><a href="<?php echo base_url('kh'); ?>" style="border-bottom:1px solid #fff;color:#fff;"><img src="<?php echo base_url('web/img/kh.png') ?>" alt=""></a></li>
 </ul>
</nav>
</div>
</header>
