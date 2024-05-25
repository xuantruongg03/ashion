<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['username'])) {
    $role = $_SESSION['role'];
    $status_login = true;
} else {
    $status_login = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Ashion Template" />
    <meta name="keywords" content="Ashion, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Ashion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="/ashion/src/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/ashion/src/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/ashion/src/css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="/ashion/src/css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="/ashion/src/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="/ashion/src/css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="/ashion/src/css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="/ashion/src/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/ashion/src/css/templatemo-hexashop.css" type="text/css" />
</head>

<body>
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo" style="padding: 0;">
                        <a href="/ashion/src/pages/home.php"><img src="/ashion/src/img/logo.jpg" alt="" /></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active" id="index.php">
                                <a href="/ashion/src/pages/home.php">Trang chủ</a>
                            </li>
                            <!-- <li><a href="#">Thời trang nữ</a></li>
                        <li><a href="#">Thời trang nam</a></li> -->
                            <li><a href="/ashion/src/pages/Sale.php">Sale</a></li>
                            <li>
                                <a href="/ashion/src/pages/Shop.php" id="">Sản phẩm</a>
                                <ul class="dropdown" style="width: 200px;">
                                    <li>
                                        <a href="/ashion/src/pages/Shop.php?type=nam">Thời trang nam</a>
                                    </li>
                                    <li>
                                        <a href="/ashion/src/pages/Shop.php?type=nữ">Thời trang nữ</a>
                                    </li>
                                    <li>
                                        <a href="/ashion/src/pages/Shop.php?type=Trẻ em">Trẻ em</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="/ashion/src/pages/About.php" id="About.php">Về chúng tôi</a></li>
                            <li><a href="/ashion/src/pages/Contact.php" id="Contact.php">Liên hệ</a></li>
                        </ul>
                        <script>
                            // Lấy ra thẻ a có href bằng url hiện tại
                            var current_url = window.location.href;
                            var a_tag = document.querySelectorAll('.header__menu ul li a');
                            a_tag.forEach((item) => {
                                if (item.href == current_url) {
                                    item.parentElement.classList.add('active');
                                } else {
                                    item.parentElement.classList.remove('active');
                                }
                            });
                        </script>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <!-- If user don't login -> redirect to login -->
                        <?php
                        if ($status_login == false) {
                            echo '<div class="header__right__auth">
                                <a href="/ashion/login.php">Đăng nhập</a>
                                <a href="/ashion/register.php">Đăng ký</a>
                                </div>';
                        } else {
                            echo    '<div class="header__right__auth">
                            <a href="/ashion/src/pages/profile.php">Xin chào, ' . $_SESSION['username'] . '</a>
                            <a href="/ashion/src/controllers/logout.php">Đăng xuất</a>
                            </div>';
                        }

                        ?>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li>
                                <a href="#"><span class="icon_heart_alt"></span>
                                    <!-- Lấy ra số lượng yêu thích từ thông tin lưu trong trình duyệt với js -->
                                    <!-- <div class="tip" id="num_like"></div> -->
                                    <script>
                                        var num_like = localStorage.getItem('num_like');
                                        if (num_like != null) {
                                            document.getElementById('num_like').innerHTML = num_like;
                                        }
                                    </script>
                                </a>
                            </li>
                            <li>
                                <a href="/ashion/src/pages/Cart.php"><span class="icon_bag_alt"></span>
                                    <!-- Lấy từ cơ sở dữ liệu ra số lượng sản phẩm trong giỏ hàng -->
                                    <?php
                                    if ($status_login == true) {
                                        // include "/ashion/src/functions/get_cart_number.php";
                                        $servername = "localhost";
                                        $database = "demo1";
                                        $u = "root";
                                        $password = "lexuantruong2k3@";
                                        // Create connection
                                        $conn = new mysqli($servername, $u, $password, $database);
                                        mysqli_set_charset($conn, "utf8");
                                        $username = $_SESSION['username'];
                                        $sql = "SELECT * FROM cart inner join users on users.user_id = cart.user_id WHERE user_username = '$username'";
                                        $result = mysqli_query($conn, $sql);

                                        $num_cart = mysqli_num_rows($result);
                                        // $num_cart = get_cart_number($_SESSION['username']);
                                        echo '<div class="tip">' . $num_cart . '</div>';
                                    }
                                    ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form class="search-model-form" action="/ashion/src/controllers/find.php" method="post">
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm.....">
                </form>
            </div>
        </div>
    </header>
</body>

</html>