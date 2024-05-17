<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <div>
                    <img src="<?php echo $product_image ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                </div>
                <div class="ms-3 ml-3">
                    <h5 style="font-size: 14px;"><?php echo $product_name ?></h5>
                    <p class="small mb-0"><?php echo $product_detail ?></p>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center " style="justify-content: between;">
                <div style="width: 90px; display: flex; align-items: center;">
                    <form action="/ashion/src/controllers/quantity_cart.php" method="post">
                        <input type="text" hidden name="action" value="mins_cart">
                        <input type="text" hidden name="cart_id" value="<?php echo $cart_id ?>">
                        <input type="text" hidden name="product_id" value="<?php echo $product_id ?>">
                        <button style="cursor: pointer; border:none; background-color: white; font-size: 16px; margin-right: 5px;">-</button>
                    </form>
                    <h5 class="fw-normal mb-0" style="font-size: 14px;">SL: <?php echo $quantity ?></h5>
                    <form action="/ashion/src/controllers/quantity_cart.php" method="post">
                        <input type="text" hidden name="action" value="plus_cart">
                        <input type="text" hidden name="cart_id" value="<?php echo $cart_id ?>">
                        <input type="text" hidden name="product_id" value="<?php echo $product_id ?>">
                        <button style="cursor: pointer; border:none; background-color: white; font-size: 16px; margin-left: 5px;">+</button>
                    </form>
                </div>
                <div>
                    <h5 class="mb-0" style="width: 150px; font-size: 14px;"><?php echo number_format($total_price, 0, '', '.') ?> VNĐ</h5>
                </div>
                <a href="/ashion/src/controllers/delete_cart.php?id=<?php echo $cart_id ?>" style="color: red; width: 20px;"><i class="fa fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>