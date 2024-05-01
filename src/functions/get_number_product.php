<?php
//Get cart number
function get_number_product($type)
{
    $servername = "localhost";
    $database = "demo1";
    $u = "root";
    $password = "lexuantruong2k3@";
    // Create connection
    $conn = new mysqli($servername, $u, $password, $database);
    mysqli_set_charset($conn, "utf8");

    $sql = "SELECT * FROM products WHERE product_type = '$type'";
    $result = mysqli_query($conn, $sql);

    $num_cart = mysqli_num_rows($result);

    return $num_cart;
}