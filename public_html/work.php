<?php 
	session_start(); 
	if(!isset($_SESSION["wallet"]) OR !isset($_SESSION["fb_id"]) OR !isset($_SESSION["time"])) {
		header("Location: /");
	} else {
		$available = "NULL";
		$totalcoin = "NULL";
		$wallet = $_SESSION["wallet"];
		
		$connecDB = mysqli_connect("localhost", "admin", "489d088b55828582e", "coincash");
		if (!$connecDB) {
			die("Connect error: " . mysqli_connect_error());
		} else {
			$select_usercoins = mysqli_query($connecDB, "SELECT total, available FROM usercoins WHERE wallet = '$wallet'");
			if (mysqli_num_rows($select_usercoins) > 0) {
			    $row = mysqli_fetch_assoc($select_usercoins);
			    $totalcoin = $row["total"];
			    $available = $row["available"];
			}
		}
		$slrate = mysqli_query($connecDB, "SELECT rate FROM info");
		$rate = mysqli_fetch_row($slrate)[0];
		mysqli_close($connecDB);
	}
?>
<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>CoinCash - Kích Captcha kiếm tiền</title>
		<meta name="description" content="Kích Captcha kiếm tền" />
		<meta name="Author" content="LHQ" />
		<!-- ICON -->
		<link rel="icon" type="image/png" href="media/logo-ico.png">
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
		<script type="text/javascript" src="assets/js/clipboard.min.js"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-98371372-2', 'auto');
		  ga('send', 'pageview');
		</script>
	</head>
	<style> 
		p.test {
		    word-wrap: break-word;
			word-break: keep-all;
		}
	</style>
	<body class="min">
		<!-- WRAPPER -->
		<div id="wrapper">
			<aside id="aside">
				<nav id="sideNav"><!-- MAIN MENU -->
					<ul class="nav nav-list">
						<li class="active">
							<a class="dashboard" href="work.php">
								<i class="main-icon fa fa-th-large"></i> <span>Làm việc</span>
							</a>
						</li>
						<li>
							<a href="payment.php">
								<i class="main-icon fa fa-gg-circle"></i> <span>Thanh toán</span>
							</a>
						</li>
						<li>
                            <a href="topclaim.php">
								<i class="main-icon fa fa-users"></i> <span>Bảng xếp hạng</span>
							</a>
						</li>
						<!--
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
						-->
					</ul>
					<!-- SECOND MAIN LIST -->
					<h3 style="display:none;">MORE</h3>
					<ul class="nav nav-list">
						<li>
							<a href="https://www.facebook.com/groups/771262379710284/">
								<i class="main-icon fa fa-link"></i>
								<span class="label label-success pull-right">23</span> <span>Nhóm trên Facebook</span>
							</a>
						</li>
					</ul>
				</nav>
				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
		
			<!-- HEADER -->
			<header id="header">
				<!-- Mobile Button -->
				<button id="mobileMenuBtn"></button>
				<!-- Logo -->
				<span class="logo pull-left">
					<!--<img src="media/logo-ico.png" alt="admin panel" height="40"/>-->
				</span>
				<form method="get" action="https://www.facebook.com/groups/coincash.top/search/" class="search pull-left hidden-xs">
					<input type="text" class="form-control" name="query" placeholder="Tìm kiếm trên Group" />
				</form>
				<nav>
					<!-- OPTIONS LIST -->
					<ul class="nav pull-right">
						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<?php echo '<img class="user-avatar" alt="" src="https://graph.facebook.com/' . $_SESSION["fb_id"] . '/picture?type=large" height="34" width="34" /> '; ?>
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
					<h1>coincash.top - Kích Captchas kiếm tiền</h1>
					<ol class="breadcrumb">
						<li><a>Trang chủ</a></li>
						<li class="active"><a href="work.php">Làm việc</a></li>
					</ol>
				</header>
				<!-- /page title -->
				<div id="content" class="padding-20">
					<div id="panel-1" class="panel panel-default">
						<div class="panel-heading">
							<span class="elipsis"><!-- panel title -->
								<strong id="tittle">Làm việc</strong>
							</span>
							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a class="opt panel_colapse" data-toggle="tooltip" title="Thu nhỏ" data-placement="bottom"></a></li>
								<li><a class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Phóng to" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
							</ul>
							<!-- /right options -->
						</div>
						<div class="panel-body" id="work">
								<p class="test">
									<b>ID: </b><span id="userid"><?php echo $_SESSION["fb_id"]; ?></span>&nbsp;&nbsp;
									<b>Tổng điểm: </b><span id="coin"><?php echo $totalcoin; ?></span>&nbsp;&nbsp;
									<b>Số tiền: </b><span id="money"><?php echo $available; ?></span> VND&nbsp;&nbsp;
									<b>Mã làm việc: </b><span id="wallet"><?php echo $wallet; ?></span>
									<a class="btn1 btn-xs btn-info" data-clipboard-action="copy" data-clipboard-target="#wallet">Sao chép</a>
								</p>
							<hr />
							<div class="row">
								<div class="col-md-12">
									<div class="alert alert-danger margin-bottom-30"><!-- WARNING -->
										
										<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4><strong>Hướng dẫn cơ bản:</strong></h4>
										<p>
											B1: Bạn ấn nút <b>Kiếm tiền ngay</b> để sao chép mã làm việc của bạn. 
											<br>
											B2: Một trang mới sẽ được mở ra, bạn dán (Ctrl+V) mã làm việc đã sao chép vào ô <b>Your XRB account</b> phía trên nút <b>Claim</b> ở trang đó. 
											<br>
											B3: Tích chọn chế độ <b>Auto claim</b> và kích captcha thôi! :)
											<br>
											Lưu ý: 
											<br>
											- Để được hỗ trợ và tiện cho việc quản lí thành viên và đảm bảo chất lượng hơn số lượng, mọi người hãy tham gia vào Group <a href="https://www.facebook.com/groups/771262379710284">COINCASH.TOP</a> nhé.
											<br>
											- Nếu số tiền trống không hoặc mã làm việc trống không thì có nghĩa là bạn chưa được cấp mã làm việc, bạn vui lòng tham tha vào groups, đăng bài để mình cấp mã cho bạn nhé.
											<br>
											- Có thể mở nhiều tab mới để kích nhanh hơn bằng cách ấn nút "Kiếm tiền ngay" 2-3 lần chi đó.
											<br>
											- Tuyệt đối không được sửa chữa Mã làm việc, hệ thống Website sẽ không xác nhận được tiền nếu Mã làm việc sai. Bạn có thể tắt website của mình, nó vẫn tự cộng được điểm vào tài khoản dựa trên mã làm việc.
											<br>
											- Nếu ở trang làm việc hiện thông báo <b>INVALID CLAIMS</b> thì có nghĩa là bạn chưa nhập mã làm việc hoặc mã làm việc không hợp lệ.
											<br>
											- Số tiền sẽ được tự động cộng vào tài khoản mỗi 1 phút và tùy theo tỷ giá của thị trường. Giá của 1 điểm là <b><?php echo $rate; ?>đ</b>
											<br>
											(Nếu như có bất kỳ lỗi nào xãy ra hãy trao đổi với nhóm <a href="https://www.facebook.com/groups/771262379710284">COINCASH.TOP</a> trên Facebook).
										</p>
									</div>
									<div id="alert-status" class="alert alert-success margin-bottom-30" style="display:none;">
										<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<p id = "status"></p>
									</div>
									<button class="btn btn-3d btn-block btn-pink" data-clipboard-action="copy" data-clipboard-target="#wallet" style="display: block; margin-left: auto; margin-right: auto; width: 13rem; margin-top: 0.2rem;">Kiếm tiền ngay!</button> 	
							
                        			<hr />
                        			
									<div class="text-left margin-top-20">
										<a class="btn btn-xs btn-info" href="javascript:;" onclick="jQuery('#pre-1').slideToggle();">Xem lịch sử xác nhận</a>
									</div>
									<pre id="pre-1" class="margin-top-10 text-left noradius text-success softhide"></pre>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			</section>
			<!-- /MIDDLE -->
		<script type="text/javascript" src="assets/js/work.js"></script>
		
	</body>
</html>