<?php include dirname(dirname(__FILE__)) . "/functions/get_products.php"; ?>

<?php include dirname(dirname(__FILE__)) . '/components/header/header.php' ?>

<?php include dirname(dirname(__FILE__)) . '/functions/get_number_product.php' ?>

<body>
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
    <div class="offcanvas-menu-overlay"></div>


    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0" style="flex: 0 0 70% !important; max-width: 75%;">
                    <div class="categories__item categories__large__item set-bg" data-setbg="/ashion/src/img/categories/category-1.jpg"?>
                        <div class="categories__text">
                            <h1>Thời trang nữ</h1>
                            <p>
                                Từ những chiếc váy duyên dáng,
                                áo blouse nhẹ nhàng, đến những bộ suit năng động,
                                thời trang nữ luôn biến hóa không ngừng để phù hợp với mọi hoàn cảnh và sở thích.
                                Ở đây chúng tôi có những gì bạn cần.
                            </p>
                            <a href="/ashion/src/pages/shop.php">Mua ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-x" style="flex: 0 0 30% !important; width: 100%">
                    <div class="col" style="padding:  0 !important;">
                        <div class=" p-0">
                            <div class="categories__item set-bg" data-setbg="/ashion/src/img/categories/category-2.jpg">
                                <div class="categories__text">
                                    <h4>Thời trang nam</h4>
                                    <!-- <p>358 sản phẩm</p> -->
                                    <p><?php echo get_number_product('Nam') ?> sản phẩm</p>
                                    <a href="/ashion/src/pages/shop.php">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-0">
                            <div class="categories__item set-bg" data-setbg="/ashion/src/img/categories/category-3.jpg">
                                <div class="categories__text">
                                    <h4>Thời trang trẻ em</h4>
                                    <!-- <p>273 sản phẩm</p> -->
                                    <p><?php echo get_number_product('Trẻ em') ?> sản phẩm</p>
                                    <a href="/ashion/src/pages/shop.php">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Sản phẩm mới</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Tất cả</li>
                        <li data-filter=".Nữ">Nữ</li>
                        <li data-filter=".Nam">Nam</li>
                        <li data-filter=".Trẻ em">Trẻ em</li>
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                <!-- Lấy danh sách sản phẩm và hieenr thị -->
                <?php
                // Thêm file connectDB.php
                include dirname(dirname(__FILE__)) . "/config/connectDB.php";

                // Lấy danh sách sản phẩm
                $products = "SELECT product_id, product_name, product_price, product_rate, product_type FROM products order by product_created_at desc limit 8";
                $product_image = "SELECT product_image_id, product_id, product_image FROM product_images where image_tag = 'avt'";
                $result_products = mysqli_query($conn, $products);
                $result_product_image = mysqli_query($conn, $product_image);
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
                        $out_of_stock = false;
                        $id = $row['product_id'];
                        include dirname(dirname(__FILE__)) . "/components/product_item/product_item.php";
                    }
                } else {
                    echo "0 results";
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="/ashion/src/img/banner/banner-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Uy tín</span>
                                <h2>Uy tín tạo nên thương hiệu</h2>
                                <a href="/ashion/src/pages/shop.php">Mua ngay</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Chất lượng</span>
                                <h2>Cam kết đầu ra sản phẩm</h2>
                                <a href="/ashion/src/pages/shop.php">Mua ngay</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Chloe Collection</span>
                                <h2>The Project Jacket</h2>
                                <a href="/ashion/src/pages/shop.php">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Trend Section Begin -->
    <section class="trend spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Thịnh hành</h4>
                        </div>
                        <?php
                        $sql_product = "SELECT product_id, product_name, product_price, product_rate, product_type, product_sale, product_size FROM products where product_trending = 1 order by product_created_at desc limit 3";
                        $sql_image = "SELECT product_image_id, product_id, product_image FROM product_images where image_tag = 'avt'";
                        $productList = get_product($sql_product, $sql_image);
                        foreach ($productList as $product) {
                            $product_image = $product->get_product_image();
                            $type = $product->get_type();
                            $product_name = $product->get_product_name();
                            $product_price = $product->get_product_price();
                            $product_rate = $product->get_product_rate();
                            $sale = false;
                            $new = false;
                            $out_of_stock = false;
                            $id = $product->get_product_id();
                            include dirname(dirname(__FILE__)) . "/components/product_item/trend_item.php";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Mua nhiều nhất</h4>
                        </div>
                        <?php
                        $a = "SELECT product_id, product_name, product_price, product_rate, product_type, product_sale, product_size FROM products where product_best_seller = 1 order by product_created_at desc limit 3";
                        $b = "SELECT product_image_id, product_id, product_image FROM product_images where image_tag = 'avt'";
                        $productList = get_product($a, $b);
                        foreach ($productList as $product) {
                            $product_image = $product->get_product_image();
                            $type = $product->get_type();
                            $product_name = $product->get_product_name();
                            $product_price = $product->get_product_price();
                            $product_rate = $product->get_product_rate();
                            $sale = false;
                            $new = false;
                            $out_of_stock = false;
                            $id = $product->get_product_id();
                            include dirname(dirname(__FILE__)) ."/components/product_item/trend_item.php";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Nổi bật nhất</h4>
                        </div>
                        <?php
                        $sql_product = "SELECT product_id, product_name, product_price, product_rate, product_type, product_sale, product_size FROM products where product_featured = 1 order by product_created_at desc limit 3";
                        $sql_image = "SELECT product_image_id, product_id, product_image FROM product_images where image_tag = 'avt'";
                        $productList = get_product($sql_product, $sql_image);
                        foreach ($productList as $product) {
                            $product_image = $product->get_product_image();
                            $type = $product->get_type();
                            $product_name = $product->get_product_name();
                            $product_price = $product->get_product_price();
                            $product_rate = $product->get_product_rate();
                            $sale = false;
                            $new = false;
                            $out_of_stock = false;
                            $id = $product->get_product_id();
                            include dirname(dirname(__FILE__)) . "/components/product_item/trend_item.php";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trend Section End -->

    <!-- Discount Section Begin -->
    <section class="discount">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="discount__pic">
                        <img src="/ashion/src/img/discount.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="discount__text">
                        <div class="discount__text__title">
                            <span>Giảm giá</span>
                            <h2>Mùa hè 2024</h2>
                            <h5><span>Sale</span> 50%</h5>
                        </div>
                        <div class="discount__countdown" id="countdown-time">
                            <div class="countdown__item">
                                <span>22</span>
                                <p>Days</p>
                            </div>
                            <div class="countdown__item">
                                <span>18</span>
                                <p>Hour</p>
                            </div>
                            <div class="countdown__item">
                                <span>46</span>
                                <p>Min</p>
                            </div>
                            <div class="countdown__item">
                                <span>05</span>
                                <p>Sec</p>
                            </div>
                        </div>
                        <a href="#">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-car"></i>
                        <h6>Miễn phí ship</h6>
                        <p>Cho sản phẩm từ 99.000 VNĐ</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>Hoàn tiền</h6>
                        <p>Nếu sản phẩm có vấn đề</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-support"></i>
                        <h6>Hỗ trợ 24/7</h6>
                        <p>Đội ngũ hỗ trợ thường xuyên</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-headphones"></i>
                        <h6>Bảo mật thông tin</h6>
                        <p>Cam kết an toàn thông tin người dùng </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <?php include dirname(dirname(__FILE__)) . '/components/footer/footer.php' ?>
</body>
