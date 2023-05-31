<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
<section class="login-page">

        <article class="box">
        <h1>Login</h1>
            <form method="post">
        <table>
            <tr>
                <td><label for="username"> Tên truy cập</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td><label for="password">Mật khẩu</td>
                <td><input name="password" type="password" /></td>
            </tr>
            <tr>
                <td>
                    <input class="submit" name="login-submit" value="Đăng nhập" type="submit"/>
                
            </tr>
            <tr>
                <td>
            Chưa có tài khoản? <a href="./signup.php" class="to-signup">Đăng ký</a>
                </td>    
        </tr>

        </table>
            </form>
</body>
</html>
<?php
    include 'connect.php';
    // Kiểm tra nếu người dùng đã nhấn nút đăng nhập
    if (isset($_POST['login-submit'])) {
        // Lấy thông tin từ form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kiểm tra các trường dữ liệu có bị bỏ trống hay không
        if (empty($username) || empty($password)) {
            // Nếu có trường dữ liệu bị bỏ trống, hiển thị thông báo lỗi
            echo "Vui lòng nhập đầy đủ thông tin";
        } else {
            $query = "SELECT username, password FROM signup WHERE username='$username'";

$result = mysqli_query($conn, $query) or die( mysqli_error($conn));

//Lấy mật khẩu trong database ra
$row = mysqli_fetch_array($result);
 
//So sánh 2 mật khẩu có trùng khớp hay không
if ($password != $row['password']) {

   echo ' không tìm thấy thông tin của bạn cung cấp';
exit;
}

if (!$result) {
echo 'Đăng nhập thất bại';
} else {

echo 'Đăng nhập thành công';
}
  

die();
$conn->close();
}
        }
    
?>

