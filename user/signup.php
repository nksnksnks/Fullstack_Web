<?php
include "user_class/account_class.php";
// require_once "../user/class-user/oder_class.php";
?>
<?php
$account = new Account;
if($_SERVER['REQUEST_METHOD']==='POST'){
    $insert_account = $account -> insert_account($_POST);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng ký</title>
        <link rel="stylesheet" href="css/signup.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="Background">
        <form action="" method="POST">
            <!-- <img class="image" src="image.png" alt=""> -->
            <div class="Subject-box">
                <img class="img-subject" src="img/white-logo.png" alt="">
                <h2 class="Introduction">Website mua bán online hàng đầu Việt Nam</h2>
                </div>
            </div>
            <div class="Login-box">
                <p class="login">Đăng ký</p>
                <input required class="Login_input" name="email" type="text" placeholder="Enter your email">
                <input required class="Login_inputt" type="text" name="phone_number" placeholder="Enter your phone number">
                <input required class="pass_input" type="text" name="username" placeholder="Enter your usersname">
                <input required class="Login_inputtt" type="password" name="password" placeholder="Enter your password">
                <button class="submit" type = "submit" target="_blank">Đăng ký</button>
            </div>
        </form>
    </body>
    <script>
        <?php if(isset($insert_account) && $insert_account !== ''): ?>
        alert("<?php echo $insert_account; ?>");
        <?php endif; ?>
    </script>
</html>