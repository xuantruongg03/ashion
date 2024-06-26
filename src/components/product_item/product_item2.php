<form action="/ashion/src/controllers/add_to_cart.php" method="post" class="col-lg-4 col-md-6 product_item2">
<input type="text" hidden name="product_id" value="<?php echo $id ?>">
<input type="text" hidden id="size" name="size" value="<?php echo $size ?>">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="<?php echo $product_image ?>">
            <?php
            if ($out_of_stock) {
                echo '<div class="label stockout stockblue">Hết hàng</div>';
            }
            if ($new) {
                echo '<div class="label new">New</div>';
            }
            if ($sale) {
                echo '<div class="label sale">Sale</div>';
            }
            ?>
            <ul class="product__hover">
                <li>
                    <a href="<?php echo $product_image ?>" class="image-popup"><span class="arrow_expand"></span></a>
                </li>
                <li>
                    <a href="#" title="Thêm vào yêu thích"><span class="icon_heart_alt"></span></a>
                </li>
                <li>
                    <button type="submit" style="background: none; border:none" title="Thêm vào giỏ hàng"><a href="#"><span class="icon_bag_alt"></span></a></button>
                </li>
            </ul>
        </div>
        <div class="product__item__text">
            <h6><a href="#"><?php echo $product_name ?></a></h6>
            <div class="rating">
                <?php
                if ($product_rate == 0) {
                    echo '<p></p>Chưa có đánh giá</p>';
                } else {
                    for ($i = 0; $i < $product_rate; $i++) {
                        echo '<i class="fa fa-star" style = "margin-right: 0;"></i>';
                    }
                }
                ?>
            </div>
            <!-- Hiển thị giá sản phẩm -->
            <?php 
            if ($sale > 0) {
                $product_price_sale = $product_price - $product_price * $sale / 100;
                echo '<div class="product__price" style="text-decoration: line-through; font-weight:500; font-size: 14px;">' . number_format($product_price, 0, '', '.') . ' VNĐ</div>';
            }
            ?>
            <div class="product__price"><?php echo number_format($product_price_sale, 0, '', '.') ?> VNĐ</div>
        </div>
    </div>
</form>