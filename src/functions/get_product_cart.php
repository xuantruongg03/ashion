<?php

class ProductCart {
    public $product_id;
    public $product_name;
    public $product_image;
    public $product_detail;
    public $quantity;
    public $total_price;
    public $cart_id;

    public function __construct($product_id, $product_name, $product_image, $product_detail, $quantity, $total_price, $cart_id)
    {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_image = $product_image;
        $this->product_detail = $product_detail;
        $this->quantity = $quantity;
        $this->total_price = $total_price;
        $this->cart_id = $cart_id;
    }

    public function get_product_id()
    {
        return $this->product_id;
    }

    public function get_product_name()
    {
        return $this->product_name;
    }

    public function get_product_image()
    {
        return $this->product_image;
    }

    public function get_product_detail()
    {
        return $this->product_detail;
    }

    public function get_quantity()
    {
        return $this->quantity;
    }

    public function get_total_price()
    {
        return $this->total_price;
    }

    public function get_cart_id()
    {
        return $this->cart_id;
    }
}
//Get cart number
function get_cart_product($username)
{
    $servername = "localhost";
    $database = "demo1";
    $u = "root";
    $password = "lexuantruong2k3@";
    // Create connection
    $conn = new mysqli($servername, $u, $password, $database);
    mysqli_set_charset($conn, "utf8");

    $sql = "SELECT cart_id, products.product_name, products.product_id, products.product_price, 
        cart.product_detail, product_images.product_image, cart.cart_quantity, cart.total_price
    FROM ((cart inner join users on users.user_id = cart.user_id) 
            inner join products on products.product_id = cart.product_id)
            inner join product_images on products.product_id = product_images.product_id
    WHERE user_username = '$username' and product_images.image_tag = 'avt'";
    $result = mysqli_query($conn, $sql);

    $products = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_image = $row['product_image'];
        $product_detail = $row['product_detail'];
        $quantity = $row['cart_quantity'];
        $total_price = $row['total_price'];
        $cart_id = $row['cart_id'];

        $product = new ProductCart($product_id, $product_name, $product_image, $product_detail, $quantity, $total_price, $cart_id);
        array_push($products, $product);
    }

    return $products;
}
