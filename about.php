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
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Green Coffee - Về Chúng Tôi</title>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>Về Chúng Tôi</h1>
        </div>
        <div class="title2">
            <a href="home.php">Trang chủ</a><span>/ Chúng tôi</span>
        </div>
        <div class="about-category">
            <div class="box">
                <img src="img/3.webp">
                <div class="detail">
                    <span>Cà phê</span>
                    <h1>Lemon Green</h1>
                    <a href="view_products.php" class="btn">Mua Ngay</a>
                </div>
            </div>
            <div class="box">
                <img src="img/about.png">
                <div class="detail">
                    <span>Cà phê</span>
                    <h1>Lemon Teanaem</h1>
                    <a href="view_products.php" class="btn">Mua Ngay</a>
                </div>
            </div>
            <div class="box">
                <img src="img/2.webp">
                <div class="detail">
                    <span>Cà phê</span>
                    <h1>Lemon Teanaem</h1>
                    <a href="view_products.php" class="btn">Mua Ngay</a>
                </div>
            </div>
            <div class="box">
                <img src="img/1.webp">
                <div class="detail">
                    <span>Cà phê</span>
                    <h1>Lemon Green</h1>
                    <a href="view_products.php" class="btn">Mua Ngay</a>
                </div>
            </div>
        </div>
        <section class="services">
            <div class="title">
                <img src="img/download.png" class="logo">
                <h1>Tại Sao Chọn Chúng Tôi</h1>
                <p>Chúng tôi luôn cam kết cung cấp sản phẩm và dịch vụ tốt nhất, đảm bảo sự hài lòng của khách hàng trong mỗi lần mua sắm.</p>
            </div>
            <div class="box-container">
                <div class="box">
                    <img src="img/icon2.png">
                    <div class="detail">
                        <h3>Tiết Kiệm Lớn</h3>
                        <p>Tiết kiệm lớn trong mỗi đơn hàng</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/icon1.png">
                    <div class="detail">
                        <h3>Hỗ Trợ 24/7</h3>
                        <p>Hỗ trợ tận tình một kèm một</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/icon0.png">
                    <div class="detail">
                        <h3>Phiếu Quà Tặng</h3>
                        <p>Nhận phiếu quà tặng vào mỗi dịp lễ hội</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/icon.png">
                    <div class="detail">
                        <h3>Giao Hàng Toàn Cầu</h3>
                        <p>Chúng tôi giao hàng đến khắp nơi trên thế giới</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="about">
            <div class="row">
                <div class="img-box">
                    <img src="img/3.png" alt="">
                </div>
                <div class="detail">
                    <h1>Tham Quan Showroom Của Chúng Tôi</h1>
                    <p>Showroom của chúng tôi là một biểu hiện của sự sáng tạo với các bố trí hoa và cây xanh độc đáo. Dù bạn đang tìm kiếm những bông hoa đẹp nhất cho ngày cưới hay chỉ đơn giản muốn làm mới không gian, Blossom With Love sẽ luôn sẵn sàng hỗ trợ bạn.</p>
                    <a href="view_products.php" class="btn">Mua Ngay</a>
                </div>
            </div>
        </div>
        <div class="testimonial-container">
            <div class="title">
                <img src="img/download.png" class="logo">
                <h1>Khách Hàng Nói Gì Về Chúng Tôi</h1>
                <p>Chúng tôi luôn nhận được những phản hồi tích cực từ phía khách hàng, minh chứng cho chất lượng dịch vụ và sản phẩm của chúng tôi.</p>
            </div>
            <div class="container">
                <div class="testimonial-item active">
                    <img src="img/01.jpg">
                    <h1>Sara Smith</h1>
                    <p>Sản phẩm rất tốt và rất phù hợp với mọi lứa tuổi,phù hợp với sức khỏe người tiêu dùng.</p>
                </div>
                <div class="testimonial-item">
                    <img src="img/02.jpg">
                    <h1>Jone Smith</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="testimonial-item">
                    <img src="img/03.jpg">
                    <h1>Selena Smith</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="left-arrow" onclick="nextSlide()"><i class="bx bxs-left-arrow-alt"></i></div>
                <div class="right-arrow" onclick="prevSlide()"><i class="bx bxs-right-arrow-alt"></i></div>
            </div>
        </div>
        <?php include 'components/footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>

</body>

</html>