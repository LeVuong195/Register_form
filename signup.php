<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
    <style>


    </style>
</head>
<body>
<h1>Form user</h1>
    <section class="box">

        <article class="box-signup">
            <form method="post">
        <table>
            <tr>
                <td><label for="username"> Tên truy cập</td>
                <td><input type="text" name="username"/><span>*</span></td>
            </tr>
            <tr>
                <td><label for="password">Mật khẩu</td>
                <td><input name="password" type="password" /><span>*</span></td>
            </tr>
            <tr>
                <td><label for="confirm-password">Nhập lại mật khẩu</label></td>
                <td><input name="confirm-password" type="password" /><span>*</span></td>
            </tr>
            <tr>
                <td><label for="tinhthanh">Tỉnh thành</td>
                <td>
                <select name="tinhthanh">
                    <option value="Hanoi">Hanoi</option>
                    <option value="HCM">HCM</option>
                    <option value="Danang">Danang</option>
                </select><span>*</span>
                </td>
            </tr>
            <tr>
                <td><label for="fullname">Họ và tên</td>
                <td><input type="text" name="fullname"/><span>*</span></td>
            </tr>
            <tr>
                <td><label for="diachi">Địa chỉ</td>
                <td><input type="text" name="diachi"/><span>*</span></td>
            </tr>
            <tr>
                <td><label for="phone">Số điện thoại</td>
                <td><input type="number" name="phone"/><span>*</span></td>
            </tr>
            <tr>
                <td><label for="email">Email</td>
                <td><input type="email" name="email"/><span>*</span></td>
            </tr>
            <tr>
                <td><label for="date">Ngày sinh</td>
                <td><input type="date" name="date"/><span>*</span></td>
            </tr>
            <tr>
                <td>
                    <input class="submit" name="signin-submit" value="Đăng ký" type="submit"/> </td>
                <td><span>*</span> là bắt buộc nhập</td>
            </tr>
            <tr>
                <td>
                    <p>Đã có tài khoản? Hãy</p><span><a class="dn" href="login.php">Đăng Nhập</a></span>
                </td>
            </tr>

        </table>
            </form>

            <?php

    
        include 'connect.php';
            $error = "";
            $username = $password = $tinhthanh = $fullname = $diachi = $phone = $email = $date = "";
        if(isset($_POST['signin-submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm-password'];
            $tinhthanh = $_POST['tinhthanh'];
            $fullname = $_POST['fullname'];
            $diachi = $_POST['diachi'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $date = $_POST['date'];




    if(empty($username)){
        $error = "Vui lòng nhập Tên truy cập";
    } elseif(empty($password)){
        $error = "Vui lòng nhập Mật khẩu";

    } elseif(empty($confirm_password)){
        $error = "Vui lòng nhập lại Mật khẩu";
    } elseif($password !== $confirm_password){
        $error = "Mật khẩu nhập lại không khớp";

    } elseif(empty($tinhthanh)){
        $error = "Vui lòng chọn Tỉnh thành";
    } elseif(empty($fullname)){
        $error = "Vui lòng nhập Họ và tên";
    } elseif(empty($diachi)){
        $error = "Vui lòng nhập Địa chỉ";
    } elseif(empty($phone)){
        $error = "Vui lòng nhập Số điện thoại";
    } elseif(empty($email)){
        $error = "Vui lòng nhập Email";
    } elseif(empty($date)){
        $error = "Vui lòng nhập Ngày sinh";
    } else {
        echo "Tên truy cập: " . $username . "<br>";
        echo "Mật khẩu: " . $password . "<br>";
        echo "Tỉnh thành: " . $tinhthanh . "<br>";
        echo "Họ và tên: " . $fullname . "<br>";
        echo "Địa chỉ: " . $diachi . "<br>";
        echo "Số điện thoại: " . $phone ."<br>";
        echo "Email: " . $email . "<br>";
        echo "Ngày sinh: " . $date . "<br>";

       
    }
}
if(!empty($error)){
    echo $error;

    
}else{
    $sql = "INSERT INTO signup (username, password, tinhthanh, fullname, diachi, phone, email, date)
    VALUES ('$username', '$password', '$tinhthanh', '$fullname', '$diachi', '$phone', '$email', '$date')";
    $query=mysqli_query($conn,$sql);
    if(!$query){
        echo 'Lưu dữ liệu thất bại';

    }else{
        echo 'Lưu dữ liệu thành công';
    }}
?>
        </article>



    </section>
</body>
</html>