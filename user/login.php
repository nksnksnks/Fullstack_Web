<?php
require_once "user_class/account_class.php";
?>

<?php
$account = new Account;
if($_SERVER['REQUEST_METHOD']==='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $account->check_login($username, $password);
    if ($result) {
        // Nếu đăng nhập thành công, lưu thông tin tài khoản vào session
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $result['username'];
        $_SESSION['email'] = $result['email'];
        header('Location: index.php');
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không chính xác";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="css/login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="Background">
        <form method="POST" action="login.php">
            <!-- <img class="image" src="image.png" alt=""> -->
            <div class="Subject-box">
                <img class="img-subject" src="img/white-logo.png" alt="">
                <h2 class="Introduction">Website mua sách online hàng đầu Việt Nam</h2>
                </div>
            </div>
            <div class="Login-box">
                <p class="login">Đăng nhập</p>
                <input class="Login_input" type="text" placeholder="Enter your usersname" name="username">
                <input class="pass_input" type="password" placeholder="Enter your password" name ="password">
                <!-- <label class="checkbox"><input type="checkbox">Ghi nhớ</label> -->
                <button class="submit" type = "submit" name="login">Đăng nhập</button>
                <button class="googlesubmit" type="submit"><a href="signup.php" style="color:white; text-decoration: none;" >Đăng ký</a></button>
                <div class="box-line">
                    <div id="line"></div>
                    <div class="box">Hoặc</div>
                </div>
            </div>
        </form>
    </body>
    <script>
        <?php if(isset($error) && $error !== ''): ?>
        alert("<?php echo $error; ?>");
        <?php endif; ?>
    </script>
</html>