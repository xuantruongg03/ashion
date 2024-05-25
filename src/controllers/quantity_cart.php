<?php 
session_start();
include '../config/connectDB.php';

if(isset($_POST["action"])){
    $cart_id = $_POST["cart_id"];
    $product_id = $_POST["product_id"];

    // Get product price, product sale
    $sql1 = "SELECT * FROM products WHERE product_id = $product_id";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $pr = $row1["product_price"];
    $sale = $row1["product_sale"];

    //Get cart quantity
    $sql2 = "SELECT * FROM cart WHERE cart_id = $cart_id";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $quantity = $row2["cart_quantity"];

    $sql = "";
    if($_POST["action"] == "plus_cart"){
        $pr = $pr - ($pr * $sale / 100);
        $sql = "UPDATE cart SET cart_quantity = cart_quantity + 1, total_price = total_price + $pr WHERE cart_id = $cart_id";
    }
    if($_POST["action"] == "mins_cart"){
        if($quantity == 1){
            echo "<script>alert('Số lượng sản phẩm không thể nhỏ hơn 1')</script>";
            header("Location: /ashion/src/pages/cart.php");
        }
        $pr = $pr - ($pr * $sale / 100);
        $sql = "UPDATE cart SET cart_quantity = cart_quantity - 1, total_price = total_price - $pr WHERE cart_id = $cart_id";
    }

    if($sql != ""){
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location: /ashion/src/pages/cart.php");
        }
    }
}