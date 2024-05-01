<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Đăng ký tài khoản</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/ashion/src/css/font-awesome.min.css" type="text/css" />

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="/ashion/src/css/style_register.css">
</head>

<body>

    <div class="wrapper" style="background-image: url('/ashion/src/img/bg-registration-form-2.jpg'); background-size: cover;">
        <div class="inner" style="background: url('/ashion/src/img/registration-form-2.jpg'); padding-bottom: 30px;">
            <form action="/ashion/src/controllers/register.php" method="post">
                <h3>Đăng ký tài khoản</h3>
                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="">Họ</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-wrapper">
                        <label for="">Tên</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-wrapper">
                    <label for="">Tài khoản</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" name="re_password" class="form-control" required>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Tôi đồng ý với các điều khoản người dùng.
                        <span class="checkmark"></span>
                    </label>
                </div>
                <button type="submit">Đăng ký ngay</button>
            </form>
            <a href="/ashion/index.php" style="display: flex; align-items: stretch; text-decoration: none; color: #666666; margin-left: 30px; margin-top: 10px; width: fit-content;">
                <i class="fa fa-arrow-left" style="width: 20px; font-size: 15px;"></i>
                <label style="cursor: pointer;">Quay lại trang chủ</label>
            </a>
        </div>
    </div>

</body>

</html>