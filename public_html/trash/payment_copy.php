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
								<i class="main-icon fa fa-th-large"></i> <span>Làm việc</span>
							</a>
						</li>
						<li class="active el_primary">
							<a href="payment.php">
								<i class="main-icon fa fa-gg-circle"></i> <span>Thanh toán</span>
							</a>
						</li>
						<li>
							<a href="listtop.php">
								<i class="main-icon fa fa-users"></i> <span>Bảng xếp hạng</span>
							</a>
						</li>
						<li>
							<a href="calendar.php">
								<i class="main-icon fa fa-calendar"></i>
								<span class="label label-warning pull-right">2</span> <span>Lịch làm việc</span>
							</a>
						</li>
							<li>
							<a href="tutorial.php">
								<i class="main-icon fa fa-question-circle"></i>	<span>Hướng dẫn</span>
							</a>
						</li>
						<li>
							<a href="about.php">
								<i class="main-icon fa fa-info-circle"></i> <span>Thông tin</span>
							</a>
						</li>
					</ul>

					<!-- SECOND MAIN LIST -->
					<h3 style="display:none;">MORE</h3>
					<ul class="nav nav-list">
						<li>
							<a href="https://www.facebook.com/hongquyen196">
								<i class="main-icon fa fa-link"></i>
								<span class="label label-success pull-right">23</span> <span>Nhóm trên Facebook</span>
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
									<a href="calendar.php"><i class="fa fa-calendar"></i> Lịch</a>
								</li>
								<li><!-- my inbox -->
									<a href="inbox.php"><i class="fa fa-envelope"></i> Tin nhắn
										<span class="pull-right label label-default">0</span>
									</a>
								</li>
								<li><!-- settings -->
									<a href="setting.php"><i class="fa fa-cogs"></i> Cài đặt</a>
								</li>
								<li class="divider"></li>
								<li><!-- logout -->
									<a href="logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a>
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
					<h1>coincash.top - Thanh toán</h1>
					<ol class="breadcrumb">
						<li><a>Trang chủ</a></li>
						<li class="active">Thanh toán</li>
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
													<h4>Thẻ cào</h4>
													<p>Thanh toán sẽ xử lí trong vòng 48 giờ!</p>
													<div class="panel-body">
														<form class="validate" action="payment.php" method="post" data-success="Gửi yêu cầu thanh toán thành công!" data-toastr-position="top-right">
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Mệnh giá</label>
																		<select name="denominations" class="form-control pointer required">
																			<option value="">Chọn mệnh giá</option>
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
																		<label>Loại thẻ</label>
																		<select name="type card" class="form-control pointer required">
																			<option value="">Chọn loại thẻ</option>
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
																		<b>GỬI THANH TOÁN</b>
																	</button>
																</div>
															</div>					
														</form>
													</div>
												</div>

												<div id="tab_y" class="tab-pane">
													<h4>Chuyển khoản ngân hàng</h4>
													<p>Thanh toán sẽ xử lí trong vòng 48 giờ!</p>
													<div class="panel-body">
														<form class="validate" action="#" method="post" data-success="Gửi yêu cầu thanh toán thành công sai rồi!" data-toastr-position="top-right">
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Số tiền  <small>(Tối thiểu: 100,000 VND)</small></label>
																		<input type="text" name="amount-of-money" value="" min="100000" max="3000000" class="form-control required" placeholder="VD: 200000">
																	</div>
																</div>
																</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Tỉnh/Thành phố</label>
																		<select name="province" class="form-control pointer required">
																			<option value="">Chọn Tỉnh/Thành phố</option>
																			<option value="89">An Giang</option>
																			<option value="24">Bắc Giang</option>
																			<option value="06">Bắc Kạn</option>
																			<option value="95">Bạc Liêu</option>
																			<option value="27">Bắc Ninh</option>
																			<option value="83">Bến Tre</option>
																			<option value="52">Bình Định</option>
																			<option value="74">Bình Dương</option>
																			<option value="70">Bình Phước</option>
																			<option value="60">Bình Thuận</option>
																			<option value="96">Cà Mau</option>
																			<option value="92">Cần Thơ</option>
																			<option value="04">Cao Bằng</option>
																			<option value="48">Đà Nẵng</option>
																			<option value="66">Đắk Lak</option>
																			<option value="67">Đắk Nông</option>
																			<option value="11">Điện Biên</option>
																			<option value="75">Đồng Nai</option>
																			<option value="87">Đồng Tháp</option>
																			<option value="64">Gia Lai</option>
																			<option value="02">Hà Giang</option>
																			<option value="35">Hà Nam</option>
																			<option value="01">Hà Nội</option>
																			<option value="42">Hà Tỉnh</option>
																			<option value="30">Hải Dương</option>
																			<option value="31">Hải Phòng</option>
																			<option value="93">Hậu Giang</option>
																			<option value="79">Hồ Chí Minh</option>
																			<option value="17">Hòa Bình</option>
																			<option value="33">Hưng Yên</option>
																			<option value="56">Khánh Hòa</option>
																			<option value="91">Kiên Giang</option>
																			<option value="62">Kon Tum</option>
																			<option value="12">Lai Châu</option>
																			<option value="68">Lâm Đồng</option>
																			<option value="20">Lạng Sơn</option>
																			<option value="10">Lào Cai</option>
																			<option value="80">Long An</option>
																			<option value="36">Nam Định</option>
																			<option value="40">Nghệ An</option>
																			<option value="37">Ninh Bình</option>
																			<option value="58">Ninh Thuận</option>
																			<option value="25">Phú Thọ</option>
																			<option value="54">Phú Yên</option>
																			<option value="44">Quảng Bình</option>
																			<option value="49">Quảng Nam</option>
																			<option value="51">Quảng Ngãi</option>
																			<option value="22">Quảng Ninh</option>
																			<option value="45">Quảng Tri</option>
																			<option value="94">Sóc Trăng</option>
																			<option value="14">Sơn La</option>
																			<option value="72">Tây Ninh</option>
																			<option value="34">Thái Bình</option>
																			<option value="19">Thái Nguyên</option>
																			<option value="38">Thanh Hóa</option>
																			<option value="46">Thừa Thiên Huế</option>
																			<option value="82">Tiền Giang</option>
																			<option value="84">Trà Vinh</option>
																			<option value="08">Tuyên Quang</option>
																			<option value="86">Vĩnh Long</option>
																			<option value="26">Vĩnh Phúc</option>
																			<option value="77">Vũng Tàu</option>
																			<option value="15">Yên Bái</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Số tài khoản</label>
																		<input type="text" name="account-number" value="" class="form-control required" placeholder="VD: 0321000456789">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Chủ tài khoản</label>
																		<input type="text" name="account-holder" value="" class="form-control required" placeholder="VD: LE VAN A">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-6 col-sm-6">
																		<label>Ngân hàng</label>
																		<input type="text" name="bank-name" value="" class="form-control required" placeholder="VD: Vietcombank">
																	</div>
																	<div class="col-md-6 col-sm-6">
																		<label>Chi nhánh</label>
																		<input type="text" name="bank-branch" value="" class="form-control required" placeholder="VD: Thừa Thiên Huế">
																	</div>
																</div>	
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Số thẻ ATM  <small>(16 số in trên thẻ ATM)</small></label>
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
																		<b>GỬI THANH TOÁN</b>
																	</button>
																</div>
															</div>				
														</form>	
													</div>	
												</div>

												<div id="tab_z" class="tab-pane">	
													<h4>Ví điện tử 365.vtc.vn</h4>
													<p>Thanh toán sẽ xử lí trong vòng 48 giờ!</p>
													<div class="panel-body">
														<form class="validate" action="payment.php" method="post" data-success="Gửi yêu cầu thanh toán thành công!" data-toastr-position="top-right">
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Số điện thoại</label>
																		<input type="text" name="phone" value="" class="form-control required" placeholder="VD: 0905001000">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Họ và tên</label>
																		<input type="text" name="name" value="" class="form-control required" placeholder="VD: Lê Văn A">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Số tiền  <small>(Tối thiểu: 10,000 VND)</small></label>
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
																		<b>GỬI THANH TOÁN</b>
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
														Thẻ cào
													</a>
												</li>
												<li>
													<a href="#tab_y" data-toggle="tab">
														Chuyển khoản
													</a>
												</li>
												<li>
													<a href="#tab_z" data-toggle="tab">
														<span class="badge badge-danger pull-right">New</span>
														Ví 365 VTC
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

									<h4>Tại sao bạn chưa được thanh toán?</h4>
									<p><em>Thời gian thanh toán phụ thuộc vào tổng số lượng các thành viên thanh toán, đồng thời mọi yêu cầu thanh toán phải được xét duyệt và xem xét kĩ lưỡng để đảm bảo thông tin bạn nhập hoàn toàn chính xác trước khi thanh toán cho bạn</em></p>
									<hr />
									<p>
									- Mọi yêu cầu thanh toán sẽ được lưu chi tiết vào Lịch sử thanh toán.
									<br>
									- Nếu có lỗi về thanh toán vui lòng liên hệ để được hỗ trợ nhanh nhất có thể.
									</p>	
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-body">

									<a href="javascript:;" onclick="jQuery('#pre-0').slideToggle();" class="btn btn-info btn-xs">Xem chi đó ở đây</a>
									<pre id="pre-0" class="text-left noradius text-success softhide margin-top-20 margin-bottom-0"> Méo có chi để xem :D
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
			        //return 'Gửi yêu cầu thanh toán thành công';
			        //return '<div class="alert alert-success margin-bottom-30">Gửi yêu cầu thanh toán thành công</div>';
			    } else {
			        //return 'Mã xác nhận hình ảnh không đúng';
			        //return '<div class="alert alert-danger margin-bottom-30">Mã xác nhận hình ảnh không đúng</div>';
			        echo "alert('Mã xác nhận hình ảnh không đúng')";
			    }
			}
		}
	 ?>	
	</body>
</html>
