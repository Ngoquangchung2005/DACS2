<?php
include 'components/connection.php';
session_start();



if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('location: login.php');
    exit();
}


if (isset($_GET['order_code'])) {
    $order_code = $_GET['order_code'];

    // Lấy thông tin đơn hàng
    $order_query = mysqli_query($conn, "SELECT * FROM orders WHERE order_code = '$order_code' AND user_id = '{$_SESSION['user_id']}'");

    // Kiểm tra nếu đơn hàng không tồn tại
    if (mysqli_num_rows($order_query) == 0) {
        echo "<script>alert('Đơn hàng không tồn tại!'); window.location='order.php';</script>";
        exit();
    }

    $order = mysqli_fetch_assoc($order_query);

    // Lấy chi tiết các sản phẩm trong đơn hàng
    $order_details_query = mysqli_query($conn, "SELECT * FROM order_details WHERE order_code = '$order_code'");
} else {
    header('location: order.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style type="text/css">
        <?php include 'style.css'; ?>
    </style>
      <?php include 'components/header.php'; ?>
</head>

<body>
  
    <div class="main">
        <div class="banner">
            <h1>Chi tiết đơn hàng</h1>
        </div>
        <div class="title2">
            <a href="order.php">Quay lại Lịch sử đơn hàng</a>
        </div>
        <section class="order-details">
            <div class="order-summary">
                <h2>Thông tin đơn hàng</h2>
                <p><strong>Mã đơn hàng:</strong> <?= $order['order_code']; ?></p>
                <p><strong>Tên khách hàng:</strong> <?= $order['name']; ?></p>
                <p><strong>Email:</strong> <?= $order['email']; ?></p>
                <p><strong>Số điện thoại:</strong> <?= $order['number']; ?></p>
                <p><strong>Địa chỉ:</strong> <?= $order['address']; ?></p>
                <p><strong>Loại địa chỉ:</strong> <?= $order['address_type']; ?></p>
                <p><strong>Phương thức thanh toán:</strong> <?= $order['method']; ?></p>
                <p><strong>Trạng thái:</strong> <?= $order['status'] === 'pending' ? 'Đang xác nhận' : 'Đã xác nhận'; ?></p>
            </div>
            <div class="order-products">
                <h2>Chi tiết sản phẩm</h2>
                <table border="1" cellspacing="0" cellpadding="10">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $grand_total = 0;
                        while ($detail = mysqli_fetch_assoc($order_details_query)) {
                            $total = $detail['price'] * $detail['qty'];
                            $grand_total += $total;
                        ?>
                            <tr>
                                <td><?= $detail['name']; ?></td>
                                <td><?= $detail['qty']; ?></td>
                                <td><?= number_format($detail['price'], 2); ?> VNĐ</td>
                                <td><?= number_format($total, 2); ?> VNĐ</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="grand-total">
                    <h3>Tổng số tiền: <?= number_format($grand_total, 2); ?> VNĐ</h3>
                </div>
            </div>
        </section>
    </div>
    <?php include 'components/footer.php'; ?>
</body>

</html>
