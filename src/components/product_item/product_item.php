<!-- 

- Đây là file chứa nội dung của một sản phẩm
    - Mỗi sản phẩm sẽ được hiển thị theo dạng một thẻ div với class là product__item
    - Mỗi sản phẩm sẽ có các thông tin sau:
        + product_image: Ảnh của sản phẩm
        + product_name: Tên của sản phẩm
        + product_rate: Đánh giá của sản phẩm
        + product_price: Giá của sản phẩm
        + new: Sản phẩm mới hay không (true/false)
        + sale: Sản phẩm đang giảm giá hay không (% giảm giá)
        + type: Loại sản phẩm
        + out_of_stock: Sản phẩm hết hàng hay không (true/false)
 -->


<form action="/ashion/src/controllers/add_to_cart.php" method="post" class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $type ?>">
    <input type="text" hidden name="product_id" value="<?php echo $id ?>">
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
            <!-- Hiển thị đánh giá -->
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
            <div class="product__price"><?php echo number_format($product_price, 0, '', '.') ?> VNĐ</div>
        </div>
    </div>
</form>