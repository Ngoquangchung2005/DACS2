<?php
include 'components/connection.php';

// Lấy tham số từ AJAX
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$category = isset($_GET['category']) ? intval($_GET['category']) : 0;

// Số sản phẩm mỗi trang
$limit = 6;
$start_from = ($page - 1) * $limit;

// Câu lệnh SQL
$query = "SELECT * FROM products WHERE 1";
if ($search) {
    $query .= " AND name LIKE '%$search%'";
}
if ($category) {
    $query .= " AND iddm = '$category'";
}

$total_query = $query;
$query .= " LIMIT $start_from, $limit";

// Thực hiện truy vấn
$select_products = mysqli_query($conn, $query);
$total_records = mysqli_query($conn, str_replace("SELECT *", "SELECT COUNT(*)", $total_query));
$total_records = mysqli_fetch_array($total_records)[0];
$total_pages = ceil($total_records / $limit);

// Tạo HTML sản phẩm
$products_html = '';
if (mysqli_num_rows($select_products) > 0) {
    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
        $products_html .= '
            <form action="" method="post" class="box">
                <img src="img/' . $fetch_products['image'] . '" class="img">
                <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bx bx-heart"></i></button>
                    <a href="view_page.php?pid=' . $fetch_products['id'] . '" class="bx bxs-show"></a>
                </div>
                <h3 class="name">' . $fetch_products['name'] . '</h3>
                <input type="hidden" name="product_id" value="' . $fetch_products['id'] . '">
                <div class="flex">
                    <p class="price">Giá ' . $fetch_products['price'] . ' VNĐ / kg</p>
                    <p class="quantity">Số lượng còn: ' . $fetch_products['quantity'] . '</p>
                    <p class="sold">Đã bán: ' . $fetch_products['sold'] . '</p>
                </div>
                <a href="checkout.php?get_id=' . $fetch_products['id'] . '" class="btn">Mua Ngay</a>
            </form>';
    }
} else {
    $products_html = '<p class="empty">Không có sản phẩm nào.</p>';
}

// Tạo HTML phân trang
$pagination_html = '';
for ($i = 1; $i <= $total_pages; $i++) {
    $pagination_html .= '<li><a href="#" class="pagination-link" data-page="' . $i . '">' . $i . '</a></li>';
}

// Trả kết quả dạng JSON
echo json_encode([
    'products' => $products_html,
    'pagination' => $pagination_html
]);
?>
