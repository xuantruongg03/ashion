<?php
//Get cart number
function get_cart_number($username)
{
    $servername = "localhost";
    $database = "demo1";
    $u = "root";
    $password = "lexuantruong2k3@";
    // Create connection
    $conn = new mysqli($servername, $u, $password, $database);
    mysqli_set_charset($conn, "utf8");

    $sql = "SELECT * FROM cart inner join users on users.user_id = cart.user_id WHERE user_username = '$username'";
    $result = mysqli_query($conn, $sql);

    $num_cart = mysqli_num_rows($result);

    return $num_cart;
}
