<?php include dirname(dirname(__FILE__)) . "/functions/get_products.php"; ?>

<?php
include dirname(dirname(__FILE__)) . '/components/header/header.php';
?>

<?php
$type = @isset($_GET['type']) ? $_GET['type'] : null;
$subtype = @isset($_GET['subtype']) ? $_GET['subtype'] : null;
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
                                                    <li><a href="/ashion/src/pages/Shop.php?type=Nữ&subtype=Áo">Áo</a></li>
                                                    <li><a href="/ashion/src/pages/Shop.php?type=Nữ&subtype=Váy">Váy</a></li>
                                                    <li><a href="/ashion/src/pages/Shop.php?type=Nữ&subtype=Quần">Quần</a></li>
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
                                                    <li><a href="/ashion/src/pages/Shop.php?type=Nam&subtype=Áo">Áo</a></li>
                                                    <li><a href="/ashion/src/pages/Shop.php?type=Nam&subtype=Quần">Quần</a></li>
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
                                <label for="xxl">
                                    xxl
                                    <input type="checkbox" name="xxl" id="xxl">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xs">
                                    xs
                                    <input type="checkbox" name="xs" id="xs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xss">
                                    xs-s
                                    <input type="checkbox" id="xss" name="xss">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="s">
                                    s
                                    <input type="checkbox" id="s" name="s">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="m">
                                    m
                                    <input type="checkbox" id="m" name="m">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="ml">
                                    m-l
                                    <input type="checkbox" id="ml" name="ml">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="l">
                                    l
                                    <input type="checkbox" id="l" name="l">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xl">
                                    xl
                                    <input type="checkbox" id="xl" name="xl">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row" id="box_products">
                        <?php
                        $sql_product = "SELECT product_id, product_name, product_price, product_rate, product_type, product_sale, product_size FROM products " . ($type != null ? "where product_type = '" . $type . "'" . ($subtype != null ? "and product_sub_type = '" . $subtype . "'" : "") : "") . " order by product_created_at";
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
                            $size = $product->get_size();
                            include dirname(dirname(__FILE__)) . "/components/product_item/product_item2.php";
                        }
                        ?>
                        <!-- <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <script>
                    function filter() {
                        const xxl = document.getElementById('xxl').checked;
                        const xs = document.getElementById('xs').checked;
                        const xss = document.getElementById('xss').checked;
                        const s = document.getElementById('s').checked;
                        const m = document.getElementById('m').checked;
                        const ml = document.getElementById('ml').checked;
                        const l = document.getElementById('l').checked;
                        const xl = document.getElementById('xl').checked;
                        const box_products = document.getElementById('box_products');
                        const product_item2 = document.getElementsByClassName('product_item2');

                        if (!xxl && !xs && !xss && !s && !m && !ml && !l && !xl) {
                            for (let i = 0; i < product_item2.length; i++) {
                                product_item2[i].style.display = 'block';
                            }
                            return;
                        }

                        for (let i = 0; i < product_item2.length; i++) {
                            const size = product_item2[i].querySelector('#size').value;
                            if (size == 'xxl' && xxl) {
                                product_item2[i].style.display = 'block';
                            } else if (size == 'xs' && xs) {
                                product_item2[i].style.display = 'block';
                            } else if (size == 'xss' && xss) {
                                product_item2[i].style.display = 'block';
                            } else if (size == 's' && s) {
                                product_item2[i].style.display = 'block';
                            } else if (size == 'm' && m) {
                                product_item2[i].style.display = 'block';
                            } else if (size == 'ml' && ml) {
                                product_item2[i].style.display = 'block';
                            } else if (size == 'l' && l) {
                                product_item2[i].style.display = 'block';
                            } else if (size == 'xl' && xl) {
                                product_item2[i].style.display = 'block';
                            } else {
                                product_item2[i].style.display = 'none';
                            }
                        }
                    }

                    document.getElementById('xxl').addEventListener('change', filter);
                    document.getElementById('xs').addEventListener('change', filter);
                    document.getElementById('xss').addEventListener('change', filter);
                    document.getElementById('s').addEventListener('change', filter);
                    document.getElementById('m').addEventListener('change', filter);
                    document.getElementById('ml').addEventListener('change', filter);
                    document.getElementById('l').addEventListener('change', filter);
                    document.getElementById('xl').addEventListener('change', filter);
                    
                </script>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <?php include dirname(dirname(__FILE__)) . '/components/footer/footer.php' ?>
</body>