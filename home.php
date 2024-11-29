<?php
include 'components/connection.php';
session_start();
// Kiểm tra xem người dùng đã đăng nhập chưa
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
if (isset($_POST['logout'])) {
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
    <title>Green Coffe -Trang Chủ</title>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="main">

        <section class="home-section">
            <div class="custom-slider-wrapper">
                <div class="custom-slider">
                    <div class="container">
                        <div class="slide">
                            <div class="item" style="background-image: url('img/slider.jpg');">
                                <div class="content">
                                    <h1>Chào mừng bạn đã đến với Shop GreenTea</h1>
                                    <p>Trải nghiệm hương vị trà xanh nguyên chất, đậm đà tinh hoa thiên nhiên.</p>
                                    <a href="view_products.php" class="btn">Mua ngay</a>
                                </div>
                            </div>
                            <div class="item" style="background-image: url('img/1.png');">
                                <div class="content">
                                    <h1>Khám phá hương vị mới</h1>
                                    <p>Tận hưởng từng ngụm trà tự nhiên từ GreenTea.</p>
                                    <a href="view_products.php" class="btn">Khám phá ngay</a>
                                </div>
                            </div>
                            <div class="item" style="background-image: url('img/9.jpg');">
                                <div class="content">
                                    <h1>Đậm đà vị trà xanh</h1>
                                    <p>Thức uống lành mạnh, tinh túy từ thiên nhiên.</p>
                                    <a href="view_products.php" class="btn">Mua ngay</a>
                                </div>
                            </div>
                            <div class="item" style="background-image: url('img/slider.jpg');">
                                <div class="content">
                                    <h1>Green Coffee - Trà đậm chất thiên nhiên</h1>
                                    <p>Tinh túy từ thiên nhiên, sảng khoái mỗi ngày.</p>
                                    <a href="view_products.php" class="btn">Xem ngay</a>
                                </div>
                            </div>
                            <div class="item" style="background-image: url('img/1.png'); ">
                                <div class="content">
                                    <h1>GreenTea - Chất lượng vượt trội</h1>
                                    <p>Thức uống vì sức khỏe của bạn.</p>
                                    <a href="view_products.php" class="btn">Thử ngay</a>
                                </div>
                            </div>
                        </div>

                        <div class="buttonn">
                            <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--- home slide end--->
        <section class="thumb">
            <div class='box-container'>
                <div class="box">
                    <img src="img/thumb2.jpg">
                    <h3>Trà Xanh</h3>
                    <p>Hương vị thanh mát, giúp giải độc và thư giãn cơ thể.</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="img/thumb0.jpg">
                    <h3>trà chanh</h3>
                    <p>Vị trà chanh tươi mát, tăng cường sức đề kháng mỗi ngày.</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="img/thumb1.jpg">
                    <h3>green coffe</h3>
                    <p>Thức uống năng lượng tự nhiên,đốt cháy mỡ thừa.</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="img/thumb.jpg">
                    <h3>green tea</h3>
                    <p>Chất lượng trà xanh nguyên chất, mang đến sự sảng khoái .</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="box-container">
                <div class="box">
                    <img src="img/about-us.jpg">
                </div>
                <div class="box">
                    <img src="img/download.png">
                    <span>Trà tốt cho sức khỏe</span>
                    <h1>Tiết kiệm tới 50%</h1>
                    <p>Trà không chỉ giúp giải khát mà còn mang lại nhiều lợi ích cho sức khỏe như cải thiện tiêu hóa, tăng cường hệ miễn dịch và hỗ trợ giảm cân.</p>
                </div>
            </div>
        </section>
        <section class="shop">
            <div class="title">
                <img src="img/download.png">
                <h1> Sản phẩm thịnh hành </h1>
            </div>
            <div class="row">
                <img src="img/about.jpg">
                <div class="row-detail">
                    <img src="img/basil.jpg">
                    <div class="top-footer">
                        <h1>Một tách trà xanh giúp bạn khỏe mạnh</h1>
                    </div>
                </div>
            </div>
            <div class="box-container">
                <div class="box-container">
                    <?php
                    
                    $query = "SELECT * FROM products ORDER BY sold DESC LIMIT 6";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="box">
                            <img src="img/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                            <h3><?php echo $row['name']; ?></h3>
                            
                          
                            <a href="view_product.php?id=<?php echo $row['id']; ?>" class="btn">Mua ngay</a>
                        </div>
                    <?php } ?>
                </div>
        </section>
        </section>
        <section class="shop-category">
            <div class="box-container">
                <div class="box">
                    <img src="img/6.jpg">
                    <div class="detail">
                        <span>ƯU ĐÃI LỚN</span>
                        <h1>Giảm thêm 15%</h1>
                        <a href="view_products.php" class="btn">Mua ngay</a>
                    </div>
                </div>
                <div class="box">
                    <img src="img/7.jpg">
                    <div class="detail">
                        <span>Hương vị mới</span>
                        <h1>quán cà phê</h1>
                        <a href="view_products.php" class="btn"> Mua ngay</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="services">
            <div class="box-container">
                <div class="box">
                    <img src="img/icon2.png">
                    <div class="detail">
                        <h3>Tiết kiệm tuyệt vời</h3>
                        <p>Tiết kiệm lớn mỗi đơn hàng</p>
                    </div>

                </div>
                <div class="box">
                    <img src="img/icon1.png">
                    <div class="detail">
                        <h3>Hỗ trợ 24*7</h3>
                        <p>Hỗ trợ trực tiếp</p>
                    </div>

                </div>
                <div class="box">
                    <img src="img/icon0.png">
                    <div class="detail">
                        <h3>Phiếu quà tặng</h3>
                        <p>Voucher vào mỗi dịp lễ hội</p>
                    </div>

                </div>
                <div class="box">
                    <img src="img/icon.png">
                    <div class="detail">
                        <h3>Giao hàng trên toàn thế giới</h3>
                        <p>Drop ship toàn quốc</p>
                    </div>

                </div>
            </div>

        </section>
        <section class="brand">
            <div class="box-container">
                <div class="box">
                    <img src="img/brand (1).jpg">
                </div>
                <div class="box">
                    <img src="img/brand (2).jpg">
                </div>
                <div class="box">
                    <img src="img/brand (3).jpg">
                </div>
                <div class="box">
                    <img src="img/brand (4).jpg">
                </div>
                <div class="box">
                    <img src="img/brand (5).jpg">
                </div>
            </div>
        </section>

        <?php include 'components/footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script>
        let next = document.querySelector('.next');
        let prev = document.querySelector('.prev');

        next.addEventListener('click', function() {
            let items = document.querySelectorAll('.item');
            document.querySelector('.slide').appendChild(items[0]);
        });

        prev.addEventListener('click', function() {
            let items = document.querySelectorAll('.item');
            document.querySelector('.slide').prepend(items[items.length - 1]);
        });

        setInterval(function() {
            next.click();
        }, 3000);
    </script>
    <?php include 'components/alert.php'; ?>


</body>

</html>