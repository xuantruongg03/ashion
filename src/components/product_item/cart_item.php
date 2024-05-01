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
                <div style="width: 70px;">
                    <h5 class="fw-normal mb-0" style="font-size: 14px;">SL: <?php echo $quantity ?></h5>
                </div>
                <div >
                    <h5 class="mb-0" style="width: 150px; font-size: 14px;"><?php echo number_format($total_price, 0, '', '.') ?> VNĐ</h5>
                </div>
                <a href="/ashion/src/controllers/delete_cart.php?id=<?php echo $cart_id ?>" style="color: red; width: 20px;"><i class="fa fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>