<?php 
session_start(); 
if(!isset($_SESSION["wallet"]) OR !isset($_SESSION["fb_id"]) OR !isset($_SESSION["time"])) {
	header("Location: /");
}
$connecDB = mysqli_connect("localhost", "admin", "489d088b55828582e", "coincash");
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
		
		<link href="assets/css/raiblock.css" rel="stylesheet" type="text/css">
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
						<li>
							<a href="work.php">
								<i class="main-icon fa fa-th-large"></i> <span>Làm việc</span>
							</a>
						</li>
						<li>
							<a href="payment.php">
								<i class="main-icon fa fa-gg-circle"></i> <span>Thanh toán</span>
							</a>
						</li>
						<li class="active">
                            <a href="topclaim.php">
								<i class="main-icon fa fa-users" ></i> <span>Bảng xếp hạng</span>
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
						<li class="active"><a href="topclaim.php">Bảng xếp hạng</a></li>
					</ol>
				</header>
				<!-- /page title -->
				<div id="content" class="padding-20">
					


					<div class="row">
					
						<!-- LEFT -->
						<div class="col-md-6">


					

							<!-- Panel Danger -->
							<div id="panel-misc-portlet-color-l3" class="panel panel-danger">

								<div class="panel-heading">

									<span class="elipsis"><!-- panel title -->
										<strong>Bảng xếp hạng</strong>
									</span>

									<!-- right options -->
									<ul class="options pull-right list-inline">
										<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Thu nhỏ" data-placement="bottom"></a></li>
										<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Phóng to" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
										<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Đóng" data-placement="bottom"><i class="fa fa-times"></i></a></li>
									</ul>
									<!-- /right options -->

								</div>
								<div class="panel-body">
						
									  <h2>Số điểm kiếm được cao nhất</h2>
									                                                                                    
									  <div class="table-responsive">          
										  <table class="table">
										  
										    <tr>
										        <th>#</th>
										        <th>Tên Facebook</th>
										        <th>Tổng điểm</th>
										        <th>Tổng tiền</th>
										    </tr>
										    <?php
		                        
		                                        if (!$connecDB) {
		                                
		                                        	die("Connect error: " . mysqli_connect_error());
		                                
		                                        } else {
		                                	       	$select_top = mysqli_query($connecDB, "SELECT users.name, usercoins.total, usercoins.money from usercoins join users on usercoins.wallet=users.wallet WHERE usercoins.total >= 7000 ORDER BY usercoins.total DESC LIMIT 40");
		                                	       	if(! $select_top ) {
		                                			   die('select error: ' . mysql_error());
		                                			} 
		                                	       	$i=0;
		                                			while($row = mysqli_fetch_assoc($select_top)) {
		                                			    $i++;
		                                		      	echo "

		                                	<tr>
										        	<td>" . $i ."</td>
		                                		    <td>" . $row['name'] . "</td>	
		                                		    <td>" . number_format($row['total']) . "</td>
		                                		    <td>" . number_format($row['money']) . " đ</td>
		                                	</tr>";
		                                		    }
		                                        }    
		                                    ?>
										  
										  </table>
									  </div>

								</div>
							</div>
							<!-- /Panel Danger -->

						</div>

						<!-- RIGHT -->
						<div class="col-md-6">

							<!-- Panel Info -->
							<div id="panel-misc-portlet-color-r2" class="panel panel-info">

								<div class="panel-heading">

									<span class="elipsis"><!-- panel title -->
										<strong>Bảng lịch sử cập nhật</strong>
									</span>

									<!-- right options -->
									<ul class="options pull-right list-inline">
										<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Thu nhỏ" data-placement="bottom"></a></li>
										<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Phóng to" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
										<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Đóng" data-placement="bottom"><i class="fa fa-times"></i></a></li>
									</ul>
									<!-- /right options -->

								</div>

								<!-- panel content -->
								<div class="panel-body">
								   	<h2>Số điểm kiếm được gần đây</h2>
									                                                                                    
									  <div class="table-responsive">          
										  <table class="table">
										  
										    <tr>
										        <th>#</th>
										        <th>Tên Facebook</th>
										        <th>Số điểm</th>
										        <th>Thời gian cập nhật</th>
										    </tr>
										    <?php
		                        
		                                        if (!$connecDB) {
		                                
		                                        	die("Connect error: " . mysqli_connect_error());
		                                
		                                        } else {
		                                	    	$select_top = mysqli_query($connecDB, "SELECT users.name, usercoins.history_claim, usercoins.last_update FROM usercoins join users on usercoins.wallet=users.wallet WHERE usercoins.history_claim > 0 ORDER BY usercoins.last_update DESC LIMIT 40");
		                                	       	if(! $select_top ) {
		                                			   die('select error: ' . mysql_error());
		                                			} 
		                                	       	$i=0;
		                                			while($row = mysqli_fetch_assoc($select_top)) {
		                                			    $i++;
		                                		      	echo "

						                    <tr>
													<td>" . $i ."</td>
						                            <td>" . $row['name'] . "</td>	
						                            <td>" . $row['history_claim'] . "</td>
						                            <td>" . $row['last_update'] . "</td>
						                    </tr>";
		                                		    }
		                                        }    
		                                    ?>
										  
										  </table>
									  </div>
								   	
								
								</div>
								<!-- /panel content -->

							</div>
							<!-- /Panel Info -->

							

						</div>
					</div>

			</section>
	</body>
</html>