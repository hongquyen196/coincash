<?php 
session_start(); 
if(!isset($_SESSION["wallet"]) OR !isset($_SESSION["fb_id"]) OR !isset($_SESSION["time"])) {
	header("Location: login.php?u=" . urlencode("https://coincash.top/payment.php"));
}
?>
<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Coin Cash</title>
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
		
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-98371372-2', 'auto');
		  ga('send', 'pageview');
		</script>

	</head>
	<!--
		.boxed = boxed version
	-->
	<body class="min">


		<!-- WRAPPER -->
		<div id="wrapper">

			<!-- ASIDE -->
			<aside id="aside">
				<nav id="sideNav"><!-- MAIN MENU -->

					<ul class="nav nav-list">
						<li>
							<a class="dashboard" href="work.php">
								<i class="main-icon fa fa-th-large"></i> <span>L??m vi???c</span>
							</a>
						</li>
						<li class="active el_primary">
							<a href="payment.php">
								<i class="main-icon fa fa-gg-circle"></i> <span>Thanh to??n</span>
							</a>
						</li>
						<li>
							<a href="listtop.php">
								<i class="main-icon fa fa-users"></i> <span>B???ng x???p h???ng</span>
							</a>
						</li>
						<li>
							<a href="calendar.php">
								<i class="main-icon fa fa-calendar"></i>
								<span class="label label-warning pull-right">2</span> <span>L???ch l??m vi???c</span>
							</a>
						</li>
							<li>
							<a href="tutorial.php">
								<i class="main-icon fa fa-question-circle"></i>	<span>H?????ng d???n</span>
							</a>
						</li>
						<li>
							<a href="about.php">
								<i class="main-icon fa fa-info-circle"></i> <span>Th??ng tin</span>
							</a>
						</li>
					</ul>

					<!-- SECOND MAIN LIST -->
					<h3 style="display:none;">MORE</h3>
					<ul class="nav nav-list">
						<li>
							<a href="https://www.facebook.com/hongquyen196">
								<i class="main-icon fa fa-link"></i>
								<span class="label label-success pull-right">23</span> <span>Nh??m tr??n Facebook</span>
							</a>
						</li>
					</ul>

				</nav>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->


			<!-- HEADER -->
			<header id="header">

				<!-- Mobile Button -->
				<button id="mobileMenuBtn"></button>

				<!-- Logo -->
				<span class="logo pull-left">
					<img src="assets/images/logo_light.png" alt="admin panel" height="35" />
				</span>

				<form method="get" action="page-search.html" class="search pull-left hidden-xs">
					<input type="text" class="form-control" name="k" placeholder="Search for something..." />
				</form>

				<nav>

					<!-- OPTIONS LIST -->
					<ul class="nav pull-right">
						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<?php echo '<img class="user-avatar" alt="" src="https://graph.facebook.com/' . $_SESSION["fb_id"] . '/picture?type=large" height="34" width="34" />'; ?>
								<span class="user-name"><?php echo $_SESSION["name"]; ?><span class="hidden-xs"><i class="fa fa-angle-down"></i></span></span>
							</a>
							<ul class="dropdown-menu hold-on-click">
								<li><!-- my calendar -->
									<a href="calendar.php"><i class="fa fa-calendar"></i> L???ch</a>
								</li>
								<li><!-- my inbox -->
									<a href="inbox.php"><i class="fa fa-envelope"></i> Tin nh???n
										<span class="pull-right label label-default">0</span>
									</a>
								</li>
								<li><!-- settings -->
									<a href="setting.php"><i class="fa fa-cogs"></i> C??i ?????t</a>
								</li>
								<li class="divider"></li>
								<li><!-- logout -->
									<a href="logout.php"><i class="fa fa-power-off"></i> ????ng xu???t</a>
								</li>
							</ul>
						</li>
						<!-- /USER OPTIONS -->
					</ul>
					<!-- /OPTIONS LIST -->

				</nav>

			</header>
			<!-- /HEADER -->


			<!-- 
				MIDDLE 
			-->
			
			<section id="middle" style="margin-left: 0px;">


				<!-- page title -->
				<header id="page-header">
					<h1>coincash.top - Thanh to??n</h1>
					<ol class="breadcrumb">
						<li><a>Trang ch???</a></li>
						<li class="active">Thanh to??n</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">

						<div class="col-md-8">
						
							<div class="panel panel-default">

								<!-- panel content -->
								<div class="panel-body">

									<div class="row tabs nomargin">

										<!-- tabs content -->
										<div class="col-md-9 col-sm-9 nopadding-right nopadding-left">
											<div class="tab-content">
											
												<div id="tab_x" class="tab-pane active">
													<h4>Th??? c??o</h4>
													<p>Thanh to??n s??? x??? l?? trong v??ng 48 gi???!</p>
													<div class="panel-body">
														<form class="validate" action="payment.php" method="post" data-success="G???i y??u c???u thanh to??n th??nh c??ng!" data-toastr-position="top-right">
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>M???nh gi??</label>
																		<select name="denominations" class="form-control pointer required">
																			<option value="">Ch???n m???nh gi??</option>
																			<option value="20.000">20.000</option>
																			<option value="50.000">50.000</option>
																			<option value="100.000">100.000</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Lo???i th???</label>
																		<select name="type card" class="form-control pointer required">
																			<option value="">Ch???n lo???i th???</option>
																			<option value="Mobiphone">Mobiphone</option>
																			<option value="Viettel">Viettel</option>
																			<option value="Vinaphone">Vinaphone</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<div id="recaptcha1"></div>
															</div>	
															<div class="row">
																<div class="col-md-12">
																	<button type="submit" class="btn btn-3d btn-pink btn-xlg btn-block margin-top-30">
																		<b>G???I THANH TO??N</b>
																	</button>
																</div>
															</div>					
														</form>
													</div>
												</div>

												<div id="tab_y" class="tab-pane">
													<h4>Chuy???n kho???n ng??n h??ng</h4>
													<p>Thanh to??n s??? x??? l?? trong v??ng 48 gi???!</p>
													<div class="panel-body">
														<form class="validate" action="#" method="post" data-success="G???i y??u c???u thanh to??n th??nh c??ng sai r???i!" data-toastr-position="top-right">
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>S??? ti???n  <small>(T???i thi???u: 100,000 VND)</small></label>
																		<input type="text" name="amount-of-money" value="" min="100000" max="3000000" class="form-control required" placeholder="VD: 200000">
																	</div>
																</div>
																</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>T???nh/Th??nh ph???</label>
																		<select name="province" class="form-control pointer required">
																			<option value="">Ch???n T???nh/Th??nh ph???</option>
																			<option value="89">An Giang</option>
																			<option value="24">B???c Giang</option>
																			<option value="06">B???c K???n</option>
																			<option value="95">B???c Li??u</option>
																			<option value="27">B???c Ninh</option>
																			<option value="83">B???n Tre</option>
																			<option value="52">B??nh ?????nh</option>
																			<option value="74">B??nh D????ng</option>
																			<option value="70">B??nh Ph?????c</option>
																			<option value="60">B??nh Thu???n</option>
																			<option value="96">C?? Mau</option>
																			<option value="92">C???n Th??</option>
																			<option value="04">Cao B???ng</option>
																			<option value="48">???? N???ng</option>
																			<option value="66">?????k Lak</option>
																			<option value="67">?????k N??ng</option>
																			<option value="11">??i???n Bi??n</option>
																			<option value="75">?????ng Nai</option>
																			<option value="87">?????ng Th??p</option>
																			<option value="64">Gia Lai</option>
																			<option value="02">H?? Giang</option>
																			<option value="35">H?? Nam</option>
																			<option value="01">H?? N???i</option>
																			<option value="42">H?? T???nh</option>
																			<option value="30">H???i D????ng</option>
																			<option value="31">H???i Ph??ng</option>
																			<option value="93">H???u Giang</option>
																			<option value="79">H??? Ch?? Minh</option>
																			<option value="17">H??a B??nh</option>
																			<option value="33">H??ng Y??n</option>
																			<option value="56">Kh??nh H??a</option>
																			<option value="91">Ki??n Giang</option>
																			<option value="62">Kon Tum</option>
																			<option value="12">Lai Ch??u</option>
																			<option value="68">L??m ?????ng</option>
																			<option value="20">L???ng S??n</option>
																			<option value="10">L??o Cai</option>
																			<option value="80">Long An</option>
																			<option value="36">Nam ?????nh</option>
																			<option value="40">Ngh??? An</option>
																			<option value="37">Ninh B??nh</option>
																			<option value="58">Ninh Thu???n</option>
																			<option value="25">Ph?? Th???</option>
																			<option value="54">Ph?? Y??n</option>
																			<option value="44">Qu???ng B??nh</option>
																			<option value="49">Qu???ng Nam</option>
																			<option value="51">Qu???ng Ng??i</option>
																			<option value="22">Qu???ng Ninh</option>
																			<option value="45">Qu???ng Tri</option>
																			<option value="94">S??c Tr??ng</option>
																			<option value="14">S??n La</option>
																			<option value="72">T??y Ninh</option>
																			<option value="34">Th??i B??nh</option>
																			<option value="19">Th??i Nguy??n</option>
																			<option value="38">Thanh H??a</option>
																			<option value="46">Th???a Thi??n Hu???</option>
																			<option value="82">Ti???n Giang</option>
																			<option value="84">Tr?? Vinh</option>
																			<option value="08">Tuy??n Quang</option>
																			<option value="86">V??nh Long</option>
																			<option value="26">V??nh Ph??c</option>
																			<option value="77">V??ng T??u</option>
																			<option value="15">Y??n B??i</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>S??? t??i kho???n</label>
																		<input type="text" name="account-number" value="" class="form-control required" placeholder="VD: 0321000456789">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Ch??? t??i kho???n</label>
																		<input type="text" name="account-holder" value="" class="form-control required" placeholder="VD: LE VAN A">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-6 col-sm-6">
																		<label>Ng??n h??ng</label>
																		<input type="text" name="bank-name" value="" class="form-control required" placeholder="VD: Vietcombank">
																	</div>
																	<div class="col-md-6 col-sm-6">
																		<label>Chi nh??nh</label>
																		<input type="text" name="bank-branch" value="" class="form-control required" placeholder="VD: Th???a Thi??n Hu???">
																	</div>
																</div>	
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>S??? th??? ATM  <small>(16 s??? in tr??n th??? ATM)</small></label>
																		<input type="text" name="card-number" value="" class="form-control" placeholder="VD: 9704158402020202">
																	</div>
																</div>
															</div>
															<div class="form-group">
																<div id="recaptcha2"></div>						
															</div>														
															<div class="row">
																<div class="col-md-12">
																	<button type="submit" class="btn btn-3d btn-pink btn-xlg btn-block margin-top-30">
																		<b>G???I THANH TO??N</b>
																	</button>
																</div>
															</div>				
														</form>	
													</div>	
												</div>

												<div id="tab_z" class="tab-pane">	
													<h4>V?? ??i???n t??? 365.vtc.vn</h4>
													<p>Thanh to??n s??? x??? l?? trong v??ng 48 gi???!</p>
													<div class="panel-body">
														<form class="validate" action="payment.php" method="post" data-success="G???i y??u c???u thanh to??n th??nh c??ng!" data-toastr-position="top-right">
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>S??? ??i???n tho???i</label>
																		<input type="text" name="phone" value="" class="form-control required" placeholder="VD: 0905001000">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>H??? v?? t??n</label>
																		<input type="text" name="name" value="" class="form-control required" placeholder="VD: L?? V??n A">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>S??? ti???n  <small>(T???i thi???u: 10,000 VND)</small></label>
																		<input type="text" name="amount" value="" min="10000" max="3000000" class="form-control required" placeholder="VD: 20000">
																	</div>
																</div>
															</div>
															<div class="form-group">
																<div id="recaptcha3" ></div>
																
															</div>
															<div class="row">		
																<div class="col-md-12">
																<button type="submit" class="btn btn-3d btn-pink btn-xlg btn-block margin-top-30">
																		<b>G???I THANH TO??N</b>
																	</button>
																</div>
															</div>	
														</form>		
													</div>
												</div>
											</div>											
										</div>

										<!-- tabs -->
										<div class="col-md-3 col-sm-3 nopadding-right nopadding-left">
											<ul class="nav nav-tabs nav-stacked">
												<li class="active">
													<a href="#tab_x" data-toggle="tab">
														Th??? c??o
													</a>
												</li>
												<li>
													<a href="#tab_y" data-toggle="tab">
														Chuy???n kho???n
													</a>
												</li>
												<li>
													<a href="#tab_z" data-toggle="tab">
														<span class="badge badge-danger pull-right">New</span>
														V?? 365 VTC
													</a>
												</li>
																								
											</ul>
										</div>

									</div>

								</div>

							</div>
							

						</div>

						<div class="col-md-4">

							<div class="panel panel-default">
								<div class="panel-body">

									<h4>T???i sao b???n ch??a ???????c thanh to??n?</h4>
									<p><em>Th???i gian thanh to??n ph??? thu???c v??o t???ng s??? l?????ng c??c th??nh vi??n thanh to??n, ?????ng th???i m???i y??u c???u thanh to??n ph???i ???????c x??t duy???t v?? xem x??t k?? l?????ng ????? ?????m b???o th??ng tin b???n nh???p ho??n to??n ch??nh x??c tr?????c khi thanh to??n cho b???n</em></p>
									<hr />
									<p>
									- M???i y??u c???u thanh to??n s??? ???????c l??u chi ti???t v??o L???ch s??? thanh to??n.
									<br>
									- N???u c?? l???i v??? thanh to??n vui l??ng li??n h??? ????? ???????c h??? tr??? nhanh nh???t c?? th???.
									</p>	
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-body">

									<a href="javascript:;" onclick="jQuery('#pre-0').slideToggle();" class="btn btn-info btn-xs">Xem chi ???? ??? ????y</a>
									<pre id="pre-0" class="text-left noradius text-success softhide margin-top-20 margin-bottom-0"> M??o c?? chi ????? xem :D
									</pre>
								</div>
							</div>

						</div>

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->

		</div>
	<script>
		var myCallBack = function()	{
			recaptcha1 = grecaptcha.render('recaptcha1', {'sitekey':'6LcpkiMUAAAAAKf6WjLBgmBJPjoWkXh-0QVYiLVo', 'theme':'light'});
			recaptcha2 = grecaptcha.render('recaptcha2', {'sitekey':'6LcpkiMUAAAAAKf6WjLBgmBJPjoWkXh-0QVYiLVo', 'theme':'light'});
			recaptcha3 = grecaptcha.render('recaptcha3', {'sitekey':'6LcpkiMUAAAAAKf6WjLBgmBJPjoWkXh-0QVYiLVo', 'theme':'light'});
		};
	</script>
	<?php 
		$api_url     = 'https://www.google.com/recaptcha/api/siteverify';
		$secret_key  = '6LcpkiMUAAAAAPVR_B4xlWAVMnQXK1GqBJquhYp9';
		 
		if(isset($_POST['submit'])) {
			echo '<script type="text/javascript">alert("hello!");</script>';
			if(isset($_POST['g-recaptcha-response'])) {
			    $site_key_post = $_POST['g-recaptcha-response'];
			    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			        $remoteip = $_SERVER['HTTP_CLIENT_IP'];
			    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			        $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			    } else {
			        $remoteip = $_SERVER['REMOTE_ADDR'];
			    }

			    $api_url = $api_url . '?secret=' . $secret_key . '&response=' . $site_key_post . '&remoteip=' . $remoteip;
			    $response = file_get_contents($api_url);
			    $response = json_decode($response);

			    if($response->success) {
			        //return 'G???i y??u c???u thanh to??n th??nh c??ng';
			        //return '<div class="alert alert-success margin-bottom-30">G???i y??u c???u thanh to??n th??nh c??ng</div>';
			    } else {
			        //return 'M?? x??c nh???n h??nh ???nh kh??ng ????ng';
			        //return '<div class="alert alert-danger margin-bottom-30">M?? x??c nh???n h??nh ???nh kh??ng ????ng</div>';
			        echo "alert('M?? x??c nh???n h??nh ???nh kh??ng ????ng')";
			    }
			}
		}
	 ?>	
	</body>
</html>
