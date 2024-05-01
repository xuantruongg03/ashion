<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /ashion/login.php');
}
?>
<?php include '../components/header/header.php' ?>

<body>
    <div class="justify-content-center align-items-center mt-5" style="margin-bottom: 50px;">
        <div>
            <div class="mb-4 text-center" >
                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            </div>
            <div class="text-center" style="margin-bottom: 50px;">
                <h1>Cảm ơn !</h1>
                <p style="margin: 20px 0;">Cảm ơn bạn đã đặt sản phẩm của công ty chúng tôi. Chúng tôi sẽ sớm liên lạc với bạn để xác nhận đơn hàng. Hãy chú ý điện thoại của bạn!</p>
                <a href="/ashion/index.php" class="btn" style="background-color: #CA1515; color: white; border-radius: 20px;">Tiếp tục mua sắm</a>
            </div>
        </div>
</body>
<?php include '../components/footer/footer.php' ?>