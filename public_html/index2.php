<?php session_start();
	if (isset($_SESSION["wallet"]) && isset($_SESSION["fb_id"]) && isset($_SESSION["time"]) && isset($_SESSION["total"]) && isset($_SESSION['id'])) header("Location: work.php"); ?>
<!DOCTYPE html>
<html> 
<head>
		<meta charset="utf-8" />
		<title>raicash.com - Kích captcha kiếm tiền</title>
		<meta name="keywords" content="HTML5,CSS3,Template" />
		<meta name="description" content="" />
		<meta name="Author" content="LHQ" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets-1/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets-1/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets-1/css/layout.css" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<!--<link href="assets-1/css/header-1.css" rel="stylesheet" type="text/css" />-->
		<link href="assets-1/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-101667712-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>

	<!--
		AVAILABLE BODY CLASSES:
		
		smoothscroll 			= create a browser smooth scroll
		enable-animation		= enable WOW animations

		bg-grey					= grey background
		grain-grey				= grey grain background
		grain-blue				= blue grain background
		grain-green				= green grain background
		grain-blue				= blue grain background
		grain-orange			= orange grain background
		grain-yellow			= yellow grain background
		
		boxed 					= boxed layout
		pattern1 ... patern11	= pattern background
		menu-vertical-hide		= hidden, open on click
		
		BACKGROUND IMAGE [together with .boxed class]
		data-background="assets-1/images/boxed_background/1.jpg"
	-->
	<body class="bg-grey">

		<!-- wrapper -->
		<div id="wrapper">


			<div class="maintenance">

				<h1>BẢO TRÌ</h1>
				<p>

					<!-- custom text -->
					Trang web đang tạm thời bảo trì để khắc phục 1 số lỗi, mong các bạn thông cảm và vào lại sau nhé! :)
					<!-- /custom text -->

				</p>

				<hr />

				<!-- progress bars -->
				<div class="container">
					<div class="row text-left">
						<div class="col-md-8 col-md-offset-2">

							<div class="progress-bars">
								<div class="progress-label">
									<strong>Database</strong>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-warning" style="width: 89%; min-width: 2em;">
										89%
									</div>
								</div>
								<div class="progress-label">
									<strong>Code</strong>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-danger" style="width: 99%; min-width: 2em;">
										99%
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
				<!-- /progress bars -->

				<hr />

				<!-- socials -->
				<a href="https://www.facebook.com/groups/771262379710284/" class="social-icon social-icon-sm social-facebook" title="Facebook">
					<i class="icon-facebook"></i>
					<i class="icon-facebook"></i>
				</a>

				<!-- /socials -->
				
				
			</div><!-- /maintenance -->


		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>

	
		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div><!-- /PRELOADER -->
		

		<!-- JAVASCRIPT FILES -->
		<!--<script type="text/javascript">var plugin_path = 'assets-1/plugins/';</script>-->
		<script type="text/javascript" src="assets-1/plugins/jquery/jquery-2.1.4.min.js"></script>

		<script type="text/javascript" src="assets-1/js/scripts.js"></script>
		
		<!-- STYLESWITCHER - REMOVE 
		<script async type="text/javascript" src="assets-1/plugins/styleswitcher/styleswitcher.js"></script>-->
	</body>
</html>