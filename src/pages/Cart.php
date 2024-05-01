<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /ashion/login.php');
}
?>
<?php include '../components/header/header.php' ?>
<?php include '../functions/get_cart_number.php' ?>

<body>
    <section class="" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="#!" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua sắm</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Giỏ hàng</p>
                                            <p class="mb-0">Bạn có <?php echo get_cart_number($_SESSION['username']) ?> sản phẩm trong giỏ hàng </p>
                                        </div>
                                    </div>

                                    <?php
                                    include '../functions/get_product_cart.php';
                                    $cart = get_cart_product($_SESSION['username']);
                                    foreach ($cart as $item) {
                                        $product_id = $item->get_product_id();
                                        $product_name = $item->get_product_name();
                                        $product_image = $item->get_product_image();
                                        $product_detail = $item->get_product_detail();
                                        $quantity = $item->get_quantity();
                                        $total_price = $item->get_total_price();
                                        $cart_id = $item->get_cart_id();
                                        include '../components/product_item/cart_item.php';
                                    }
                                    ?>

                                </div>
                                <div class="col-lg-5">

                                    <form action="/ashion/src/controllers/order.php" method="post" class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <input type="text" name="order" value="" hidden>
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Chi tiết hóa đơn</h5>
                                            </div>
                                            <form class="mt-4">
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="name" name="name" required class="form-control form-control-lg" style="font-size: 14px;" siez="14" placeholder="Họ tên người nhận" />
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="number_phone" name="number_phone" required class="form-control form-control-lg" style="font-size: 14px;" siez="14" placeholder="Số điện thoại nhận" />
                                                </div>

                                                
                                                <div class="form-outline form-white mb-4">
                                                    <textarea type="text" id="address" name="address" required class="form-control form-control-lg" style="font-size: 14px; min-height: 50px;" siez="14" placeholder="Địa chỉ nhận"></textarea>
                                                </div>
                                                
                                                <div class="form-outline form-white mb-4">
                                                    <select class="form-select form-control" name="payment" id="payment">
                                                        <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                                                        <option value="Chuyển khoản ngân hàng">Chuyển khoản ngân hàng</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-outline form-white mb-4">
                                                    <textarea type="text" id="note" name="note" class="form-control form-control-lg" style="font-size: 14px; min-height: 120px;" siez="14" placeholder="Ghi chú đơn hàng"></textarea>
                                                </div>

                                            </form>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Tạm tính</p>
                                                <?php
                                                // <p class="mb-2" id="cal_price" value="$cal_price"> 
                                                include '../functions/get_total_price.php';
                                                $cal_price = get_total_price($_SESSION['username']);
                                                //     echo number_format($cal_price, 0, '', '.')     
                                                echo '<p class="mb-2" id="cal_price" data-price="' . $cal_price . '">' . number_format($cal_price, 0, '', '.') . ' VNĐ</p>';
                                                ?>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Vận chuyển</p>
                                                <p class="mb-2">20.000 VNĐ</p>
                                            </div>

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Tổng tiền</p>
                                                <p class="mb-2" id="total_price"></p>
                                            </div>

                                            <button type="submit" class="btn btn-info btn-block btn-lg">
                                                <div class="d-flex justify-content-between" style="font-size: 14px;">
                                                    <span id="total_btn"></span>
                                                    <span>Thanh toán <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                </div>
                                            </button>
                                            <script>
                                                function formatCurrency(amount) {
                                                    return amount.toLocaleString('vi', {
                                                        style: 'currency',
                                                        currency: 'VND'
                                                    }).replace(/₫/g, 'VNĐ'); // Thay thế ký hiệu đơn vị tiền tệ
                                                }
                                                let cal_price = document.getElementById('cal_price').dataset.price;
                                                const total_price = document.getElementById('total_price');
                                                const total_btn = document.getElementById('total_btn');
                                                cal_price = parseInt(cal_price);
                                                cal_price = cal_price + 20000;
                                                cal_price = formatCurrency(cal_price);
                                                total_price.innerText = cal_price;
                                                total_btn.innerText = cal_price;

                                                //Check format phone
                                                function checkPhone(phone) {
                                                    const re = /^[0-9]{10}$/;
                                                    return re.test(phone);
                                                }

                                                const phone = document.getElementById('number_phone');
                                                phone.addEventListener('input', function() {
                                                    if (!checkPhone(phone.value)) {
                                                        phone.setCustomValidity('Số điện thoại không hợp lệ');
                                                    } else {
                                                        phone.setCustomValidity('');
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<?php include '../components/footer/footer.php' ?>