<?php 
include "header.php";
?>
<title>Đổi mật khẩu</title>
<style>
.container{
  width: 80%;
  height : 1000px;
  margin-left: 10%;
  top: 60px;
  background-color: white; 
}
.container-2{
  border: 1px solid grey;
  border-radius: 20px;
  width: 60%;
  height: auto;
  padding: 30px;
  padding-left: 60px;
  margin: auto;
  margin-top : 60px;
}
input{
  border-radius: 10px;
  border: 1px solid grey;
  padding: 5px 0 5px 10px; 
  width: 70px;
}
.button-change{
  margin-top: 20px; 
  border-radius: 10px;
  border: 1px solid #9317a3;
  padding: 10px 50px 10px 50px;
  font-size: 20px;
  margin-left: 415px;
  background-color: white;
  color: #9317a3;
  right:0;
}
.button-change:hover{
  background-color: #9317a3;
  color: white;

}
</style>
  <?php
     $account = new Account;
     $account_id = $show_account['account_id'];
     if($_SERVER['REQUEST_METHOD']==='POST'){
        $password =  $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $newpassword2 = $_POST['newpassword2'];
        if($password == $show_account['password']){
          if($newpassword == $newpassword2){
            $update_password = $account -> update_password($newpassword, $account_id);
            $error = "Đổi mật khẩu thành công";
            // header('Location: ../logout.php');
          }
          else{
            $error = "Mật khẩu mới không trùng khớp";
          }
        }
        else{ 
          $error = "Mật khẩu không chính xác";
        }
     }
  ?>
        <!-- content -->
        <form action="" method="POST" class="container">
          <div class = "container-2">
            <h3 class="cart-text">Đổi mật khẩu</h3>
            <div class="container-sp">
              <div class="">
                <div class="ttcn" style="display:inline-block;">  
                  <div style="color:#9317a3">Mật khẩu hiện tại</div>
                  <input type="password" style="width: 600px;" value="" name = "password">
                </div>
                <div class="ten">  
                  <div style="color:#9317a3">Mật khẩu mới</div>
                  <input type="password" style="width: 600px;" name = "newpassword">
                </div>
                <div class="email">  
                  <div style="color:#9317a3">Nhập lại mật khẩu mới</div>
                  <input type="password" style="width: 600px;" value="" name="newpassword2">
                </div>
                <div class="sp"></div>
              </div>
            </div>
          <button class="button-change">Xác nhận</button>
          </div>
        </form>  
    </body>
    <script>
        <?php if(isset($error) && $error !== ''): ?>
        alert("<?php echo $error; ?>");
        <?php endif; ?>
    </script>
</html>
