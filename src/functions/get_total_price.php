<?php
//Get cart number
function get_total_price($username)
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

    $cal_price = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $cal_price += $row['total_price'];
    }

    return $cal_price;
}
