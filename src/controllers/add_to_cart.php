<?php
session_start();
include '../config/connectDB.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: /ashion/login.php');
}

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM cart WHERE user_id = $user_id and product_id = $product_id";
    $result = mysqli_query($conn, $sql);

    //get product price
    $a = "SELECT product_price FROM products WHERE product_id = $product_id";
    $b = mysqli_query($conn, $a);
    $row = mysqli_fetch_assoc($b);
    $product_price = $row['product_price'];

    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO cart (user_id, product_id, cart_quantity, total_price) VALUES ($user_id, $product_id, 1, $product_price)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>alert("Thêm vào giỏ hàng thành công!")
                window.location.href = "/ashion/src/pages/cart.php";
            </script>';
        } else {
            echo '<script>alert("Thêm vào giỏ hàng thất bại!")
                window.location.href = "/ashion/src/pages/cart.php";
            </script>';
        }
    } else {
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['cart_quantity'];
        $total_price = $product_price * ($quantity + 1);
        $c = "UPDATE cart SET total_price = $total_price WHERE user_id = $user_id and product_id = $product_id";
        $d = "UPDATE cart SET cart_quantity = cart_quantity + 1 WHERE user_id = $user_id and product_id = $product_id";
        $e = mysqli_query($conn, $c);
        $f = mysqli_query($conn, $d);
        if ($f && $e) {
            echo '<script>alert("Thêm vào giỏ hàng thành công!")
                window.location.href = "/ashion/src/pages/cart.php";
            </script>';
        } else {
            echo '<script>alert("Thêm vào giỏ hàng thất bại!")
                window.location.href = "/ashion/src/pages/cart.php";
            </script>';
        }
    }
}
