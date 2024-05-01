

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="/ashion/src/css/style_icomoon.css">

	<link rel="stylesheet" href="/ashion/src/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="/ashion/src/css/font-awesome.min.css" type="text/css" />

	<link rel="stylesheet" href="/ashion/src/css/owl.carousel.min.css" type="text/css" />

	<link rel="stylesheet" href="./style.css" type="text/css">

	<title>Đăng nhập</title>
</head>

<body>

	<div class="d-lg-flex half">
		<div class="bg order-1 order-md-2" style="background-image: url('src/img/bg_1.jpg')"></div>
		<div class="contents order-2 order-md-1">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-md-7">
						<h3>Đăng nhập vào <strong>Ashion</strong></h3>
						<p class="mb-4">
							Đăng nhập để mua sắm, theo dõi đơn hàng, nhận ưu đãi và nhiều hơn nữa.
						</p>
						<form action="/ashion/src/controllers/login.php" method="post">
							<div class="form-group first">
								<label for="username">Tài khoản</label>
								<input type="text" class="form-control" style="height: 25px;" id="username" name="username" />
							</div>
							<div class="form-group last mb-3">
								<label for="password">Mật khẩu</label>
								<input type="password" class="form-control" style="height: 25px;" id="password" name="password" />
							</div>

							<div class="d-flex mb-5 align-items-center">
								<label class="control control--checkbox mb-0"><span class="caption">Nhớ mật khẩu</span>
									<input type="checkbox" checked="checked" />
									<div class="control__indicator"></div>
								</label>
								<span class="ml-auto"><a href="#" class="forgot-pass">Quên mật khẩu</a></span>
							</div>

							<input type="submit" value="Đăng nhập" class="btn btn-block btn-primary" />
						</form>
						<a href="/ashion/index.php" style="display: flex; align-items: center; text-decoration: none; color: #666666; margin-top: 30px; width: fit-content;">
							<i class="fa fa-arrow-left" style="width: 20px; font-size: 15px;"></i>
							<label style="cursor: pointer; margin: 0;">Quay lại trang chủ</label>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="/ashion/src/js/jquery-3.3.1.min.js"></script>
	<script src="/ashion/src/js/popper.min.js"></script>
	<script src="/ashion/src/js/bootstrap.min.js"></script>
	<script src="/ashion/src/js/main_login.js"></script>
</body>

</html>