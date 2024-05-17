<?php include dirname(dirname(__FILE__)) . "/functions/get_products.php"; ?>

<?php
include dirname(dirname(__FILE__)) . '/components/header/header.php';
?>

<?php
$type = @isset($_GET['type']) ? $_GET['type'] : null;
?>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/ashion/index.php"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Bộ lọc</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a data-toggle="collapse" data-target="#collapseOne">Thời trang nữ</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Áo khoát</a></li>
                                                    <li><a href="#">Sơ mi</a></li>
                                                    <li><a href="#">Váy</a></li>
                                                    <li><a href="#">Quần Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo">Thời trang nam</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Áo thun</a></li>
                                                    <li><a href="#">Áo khoát</a></li>
                                                    <li><a href="#">Sơ mi</a></li>
                                                    <li><a href="#">Quần jeans</a></li>
                                                    <li><a href="#">Quần short</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__sizes">
                            <div class="section-title">
                                <h4>Sản phẩm theo size</h4>
                            </div>
                            <div class="size__list">
                                <label for="xxs">
                                    xxs
                                    <input type="checkbox" id="xxs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xs">
                                    xs
                                    <input type="checkbox" id="xs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xss">
                                    xs-s
                                    <input type="checkbox" id="xss">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="s">
                                    s
                                    <input type="checkbox" id="s">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="m">
                                    m
                                    <input type="checkbox" id="m">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="ml">
                                    m-l
                                    <input type="checkbox" id="ml">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="l">
                                    l
                                    <input type="checkbox" id="l">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xl">
                                    xl
                                    <input type="checkbox" id="xl">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php
                        $sql_product = "SELECT product_id, product_name, product_price, product_rate, product_type, product_sale FROM products where product_sale > 0 order by product_created_at";
                        $sql_image = "SELECT product_image_id, product_id, product_image FROM product_images where image_tag = 'avt'";
                        $productList = get_product($sql_product, $sql_image);
                        foreach ($productList as $product) {
                            $product_image = $product->get_product_image();
                            $type = $product->get_type();
                            $product_name = $product->get_product_name();
                            $product_price = $product->get_product_price();
                            $product_rate = $product->get_product_rate();
                            $sale = $product->get_sale();
                            $new = false;
                            $out_of_stock = false;
                            $id = $product->get_product_id();
                            include dirname(dirname(__FILE__)) . "/components/product_item/product_item2.php";
                        }
                        ?>
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <?php include dirname(dirname(__FILE__)) . '/components/footer/footer.php' ?>
</body>