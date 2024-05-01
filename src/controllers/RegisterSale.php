<?php
include '../config./connectDB.php';
$email = $_POST['email'];
$result_email = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM email_sale"));
if ($result_email['email_sale'] != $email) {
    $sql = "INSERT INTO email_sales (email_sale) VALUES ('$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Fail";
    }
} else {
    echo "Email been used";
}
mysqli_close($conn);
