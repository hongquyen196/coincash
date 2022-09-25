<?php 	
	session_start();
	if (!empty($_SESSION["wallet"]) && !empty($_SESSION["fb_id"]) && !empty($_SESSION["time"]) && !empty($_SESSION["total"]) && !empty($_SESSION['id']))
		header("Location: work.php");
?>
<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Đăng nhập</title>
		<meta name="description" content="" />
		<!-- ICON -->
		<link rel="icon" type="image/png" href="media/logo-ico.png">
		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />

		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-98371372-2', 'auto');
		  ga('send', 'pageview');
		</script>
	</head>
	<body>
		<div class="padding-15">
			<div class="login-box">
				
				<div class="alert alert-warning noradius">Hiện tại không thể đăng nhập với tài khoản mới, vui lòng tham gia vào <a href="https://www.facebook.com/groups/771262379710284/">COINCASH.TOP</a> hoặc liên hệ <a href="https://www.facebook.com/hongquyen196">Quyền</a> để được giúp đỡ đăng nhập!</div>
			
				<!-- login form -->
				<form class="sky-form boxed ">
					<header><i class="fa fa-users"></i>  Đăng nhập với 1 nhấn!</header>
					
					<fieldset>					
						<?php
						 $website = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";  
						 echo '<a style="display: block; margin-left: auto; margin-right: auto; width: 20rem; margin-top: 0.2rem;" class="btn btn-lg btn-reveal btn-green" href="https://www.facebook.com/dialog/oauth?client_id=178854842643402&redirect_uri=' . $website . 'login.php&scope=public_profile">'; ?>
							<i class="et-facebook"></i>
							<span>Đăng nhập ngay!</span>
						</a>
					</fieldset>
					<fieldset>
						<!--<a href="work-test.php">Xem bên trong có gì?</a>-->
					</fieldset>
				</form>
				<!-- /login form -->
				<div class="alert alert-success noradius">
					Nếu là lần đầu tiên Đăng nhập sẽ yêu cầu quyền lấy thông tin cá nhân Công khai của bạn như Tên và ID. Ngoài ra sẽ không lấy bất cứ quyền nào, không lưu cookie hay access_token. 
					<br>
					Nhấn vào <a target="_blank" href="https://www.facebook.com/login.php?next=https%3A%2F%2Fwww.facebook.com%2Fn%2F%3Fnotifications%26mid%3Dx46fdf8G5af4213825a3G0Gdx">đây</a> để đăng xuất khỏi Facebook.
				</div>
				<hr />
				<div class="text-center">
					Tham gia và theo dõi nhóm của chúng tôi:
				</div>
				<div class="socials margin-top-10 text-center">
					<a style="width: 14rem;" href="https://www.facebook.com/groups/771262379710284/" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
				</div>
			</div>
			<br>
		
			<footer class="footer">
				<p><center>Phiên bản <a href="http://raicash.com" target="_blank">raicash.com</a> được phát triển bởi <a href="https://www.facebook.com/hongquyen196" target="_blank">Quyền</a> &copy; 2017 - Cập nhật lần cuối: 14/07/2017</center></p>
			</footer>	
		</div>
	</body>
</html>