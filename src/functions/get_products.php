<?php
class ProductModel
{
    public $product_id;
    public $product_name;
    public $product_price;
    public $product_rate;
    public $product_image;
    public $new;
    public $sale;
    public $type;
    public $out_of_stock;


    // Constructor
    public function __construct($product_id, $product_name, $product_price, $product_rate, $product_image, $new, $sale, $type, $out_of_stock)
    {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->product_rate = $product_rate;
        $this->product_image = $product_image;
        $this->new = $new;
        $this->sale = $sale;
        $this->type = $type;
        $this->out_of_stock = $out_of_stock;
    }

    //Getter
    public function get_product_id()
    {
        return $this->product_id;
    }

    public function get_product_name()
    {
        return $this->product_name;
    }

    public function get_product_price()
    {
        return $this->product_price;
    }

    public function get_product_rate()
    {
        return $this->product_rate;
    }

    public function get_product_image()
    {
        return $this->product_image;
    }

    public function get_new()
    {
        return $this->new;
    }

    public function get_sale()
    {
        return $this->sale;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function get_out_of_stock()
    {
        return $this->out_of_stock;
    }
}
function get_product($sql_product, $sql_image)
{
    // Thêm file connectDB.php
    $servername = "localhost";
    $database = "demo1";
    $username = "root";
    $password = "lexuantruong2k3@";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    mysqli_set_charset($conn, "utf8");
    // include "src/model/Product.php";
    $rs = array();

    // Lấy danh sách sản phẩm
    // $products = "SELECT product_id, product_name, product_price, product_rate, product_type FROM products order by product_created_at desc limit 8";
    // $product_image = "SELECT product_image_id, product_id, product_image FROM product_images where image_tag = 'avt'";
    $result_products = mysqli_query($conn, $sql_product);
    $result_product_image = mysqli_query($conn, $sql_image);
    $image = array();
    while ($row = mysqli_fetch_assoc(($result_product_image))) {
        $image[$row['product_id']] = $row['product_image'];
    }
    if (mysqli_num_rows($result_products) > 0) {
        while ($row = mysqli_fetch_assoc($result_products)) {
            $product_image = $image[$row['product_id']];
            $type = $row['product_type'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_rate = $row['product_rate'];
            $sale = false;
            $new = false;
            $id = $row['product_id'];
            $out_of_stock = false;
            $product = new ProductModel($id, $product_name, $product_price, $product_rate, $product_image, $new, $sale, $type, $out_of_stock);
            array_push($rs, $product);
        }
    }
    mysqli_close($conn);

    return $rs; // Return the result array
}
