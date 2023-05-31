
<?php
$conn = mysqli_connect("localhost", "soap", "123456", "register_form");
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

// Hiển thị danh sách user
$sql = "SELECT * FROM signup";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>City</th><th>Fullname</th><th>Address</th><th>Phone</th><th>Email</th><th>DOB</th><th>Action</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['tinhthanh'] . "</td>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['diachi'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td><a href='edit_user.php?id=" . $row['id'] . "'>Sửa</a> | <a href='#' onclick='deleteUser(" . $row['id'] . ")'>Xóa</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có user nào.";
}

// Hiển thị danh sách sản phẩm theo công ty
$sql = "SELECT * FROM gianhang";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $last_company = "";
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['company'] != $last_company) {
            echo "<h2>" . $row['company'] . "</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Action</th></tr>";
            $last_company = $row['company'];
        }
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['pro_name'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td><a href='edit_product.php?id=" . $row['id'] . "'>Sửa</a> | <a href='#' onclick='deleteProduct(" . $row['id'] . ")'>Xóa</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có sản phẩm nào.";
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
