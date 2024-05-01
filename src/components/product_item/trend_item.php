<div class="trend__item">
    <div class="trend__item__pic">
        <img src="<?php echo $product_image ?>" alt="" style="width: 90px; height: 90px" />
    </div>
    <div class="trend__item__text">
            <h6><a href="#" style="color: black;"><?php echo $product_name ?></a></h6>
            <!-- Hiển thị đánh giá -->
            <div class="rating">
                <?php
                    if($product_rate == 0) {
                        echo '<p></p>Chưa có đánh giá</p>';
                    } else {
                        for ($i = 0; $i < $product_rate; $i++) {
                            echo '<i class="fa fa-star" style = "margin-right: 0;"></i>';
                        }
                    }
                ?>
            </div>
            <!-- Hiển thị giá sản phẩm -->
            <div class="product__price"><?php echo number_format($product_price, 0, '', '.') ?> VNĐ</div>
        </div>
</div>