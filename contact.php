<?php
include 'components/connection.php';
session_start();
// Kiểm tra xem người dùng đã đăng nhập chưa
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
if (isset($_SESSION['logout'])) {
    session_destroy();
    header("location: login.php");
}
?>
<style type="text/css">
    <?php include 'style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Green Coffe -Liên hệ</title>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>Liên hệ với chúng tôi</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>/ liên hệ với chúng tôi</span>
        </div>

        <section class="services">
            <div class="box-container">
                <div class="box">
                    <img src="img/icon2.png">
                    <div class="detail">
                        <h3>tiết kiệm tuyệt vời</h3>
                        <p>tiết kiệm lớn mỗi đơn hàng</p>
                    </div>

                </div>
                <div class="box">
                    <img src="img/icon1.png">
                    <div class="detail">
                        <h3>24*7 support</h3>
                        <p>one-on-one support</p>
                    </div>

                </div>
                <div class="box">
                    <img src="img/icon0.png">
                    <div class="detail">
                        <h3>phiếu quà tặng</h3>
                        <p>voucher vào mỗi dịp lễ hội</p>
                    </div>

                </div>
                <div class="box">
                    <img src="img/icon.png">
                    <div class="detail">
                        <h3>giao hàng trên toàn thế giới</h3>
                        <p>dropship trên toàn thế giới</p>
                    </div>

                </div>
            </div>

        </section>
        <div class="form-container">
            <form method="post">
                <div class="title">
                    <img src="img/download.png" class="logo">
                    <h1>Để lại tin nhắn</h1>
                </div>
                <div class="input-field">
                    <p>tên của bạn *</p>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <p>email của bạn *</p>
                    <input type="email" name="email">
                </div>
                <div class="input-field">
                    <p>số của bạn *</p>
                    <input type="text" name="number">
                </div>
                <div class="input-field">
                    <p>your message *</p>
                    <textarea name="message"></textarea>
                </div>
                <button type="submit" name="submit-btn" class="btn">send message</button>
            </form>

        </div>
        <div class="address">
            <div class="title">
                <img src="img/download.png" class="logo">
                <h1>chi tiết liên lạc</h1>
                <p>Công ty trà Việt Nam </p>
            </div>
            <div class="box-container">
                <div class="box">
                    <i class="bx bxs-map-pin"></i>
                    <div>
                        <h4>Địa chỉ</h4>
                        <p>Đà Nẵng,Thừa Thiên Huế</p>
                    </div>
                </div>
                <div class="box">
                    <i class="bx bxs-phone-call"></i>
                    <div>
                        <h4>Địa chỉ</h4>
                        <p>88668899000</p>
                    </div>
                </div>
                <div class="box">
                    <i class="bx bxs-map-pin"></i>
                    <div>
                        <h4>email</h4>
                        <p>chungngo269@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'components/footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>

</body>

</html>