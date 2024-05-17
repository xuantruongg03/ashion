<?php
session_start();
include '../config/connectDB.php';
// include '/ashion/src/functions/get_product_cart.php';
if (
    isset($_POST['order'])
) {
    $name = $_POST['name'];
    $number_phone = $_POST['number_phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $payment = $_POST['payment'];
    $user_id = $_SESSION['user_id'];

    //Get cart product
    // $cart_product = get_cart_product($_SESSION['username']);

    $sql = "SELECT products.product_name, products.product_id, products.product_price, 
        cart.product_detail, product_images.product_image, cart.cart_quantity, cart.total_price
    FROM ((cart inner join users on users.user_id = cart.user_id) 
            inner join products on products.product_id = cart.product_id)
            inner join product_images on products.product_id = product_images.product_id
    WHERE users.user_id = '$user_id' and product_images.image_tag = 'avt'";
    $result = mysqli_query($conn, $sql);

    $num_cart = mysqli_num_rows($result);
    if ($num_cart == 0) {
        header('Location: /ashion/src/pages/Cart.php');
    }
    while ($row = mysqli_fetch_assoc($result)) {
        //check product quantity
        $sql = "SELECT product_quantity FROM products WHERE product_id = " . $row['product_id'];
        $result = mysqli_query($conn, $sql);
        $product_quantity = mysqli_fetch_assoc($result)['product_quantity'];
        if ($product_quantity < $row['cart_quantity']) {
            echo '<script>alert("Sản phẩm ' . $row['product_name'] . ' không đủ số lượng")</script>';
        }

        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_image = $row['product_image'];
        $product_detail = $row['product_detail'];
        $quantity = $row['cart_quantity'];
        $total_price = $row['total_price'];
        //Insert order
        $sql = "INSERT INTO orders (user_id, order_name, order_phone, order_address, order_note, order_total_price, product_id, quantity, order_status, payment_method) 
        VALUES ($user_id, '$name', '$number_phone', '$address', '$note', $total_price, $product_id, $quantity, 'Chờ xử lý', '$payment')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql = "DELETE FROM cart WHERE user_id = $user_id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('Location: /ashion/src/pages/OrderSuccess.php');
            } else {
                header('Location: /ashion/src/pages/Cart.php');
            }
        } else {
            header('Location: /ashion/src/pages/Cart.php');
        }
    }

    mysqli_close($conn);
}
