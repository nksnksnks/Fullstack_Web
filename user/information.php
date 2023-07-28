<?php 
include "header.php";
?>
<?php
    $account = new Account();
    $account_name = $_SESSION["username"];
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $address =  $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $update_account = $account -> update_account($email, $phone_number, $address, $account_name);
    }
?>
<title>Thông tin cá nhân</title>
<style>
input{
  border-radius: 10px;
  border: 1px solid grey;
  padding: 5px 0 5px 10px; 
  width: 70px;
}
.boxbox{
    width: 80%;
    background-color: white;
    margin-left: 10%;
    height: 900px;
    top: -50px;
}
.cart-text{
    position: relative;
    width:130%;
    left:-90%;
    top: -70px;
    padding-bottom: 8px;
    border-bottom: solid 1px;
    padding-right: 300px;
    border-color: rgb(136, 136, 136);
    color: #850661;
}
.container-sp{
    position: relative;
    width: 600px;
    top: -60px;
    left: -90%;
    width: 130%;
    padding: 1.25%;
    border-radius:10px;
    padding: 40px;
    padding-left:60px;
    border-style:solid;
    border-color: rgb(136, 136, 136);
    border-width: 1.5px;
}
.container-dm{
    position: relative;
    left: 13%;
    top: 0px;
}
.information-dm{
    list-style: none;
    text-decoration-line: none;
}
.information-dm{
    left: 50px;
}
.edit{
    border:none;
    background-color: transparent;
    color:#850661;
}
.save-btn{
    position: relative;
    border:none;
    background-color: #850661;
    color: #f2f2f2;
    font-size: 20px;
    border-radius: 10px;
    width:500px;
    height: 50px;
    left: -65%;
    top:-20px;
}
.save-btn:hover{
    text-decoration-line: underline;
    background-color: #a40978;
}
.dm{
    text-decoration: none;
    color: #a40978;
    margin-left: 35px;
    font-size: 18px;
}
</style>
<script type="text/javascript">
    function selectAll(id) {
      document.getElementById(id).select();
    }
  </script>
        <!-- content -->
        <div class= "boxbox">
            <form action="" method="POST" >
            <div class="container-giohang">
                <h3 class="cart-text">Thông tin cá nhân</h3> 
                <div class="container-sp">
                <div class="">
                    <div class="ttcn" style="display:inline-block;">  
                    <div style="color:#9317a3">Tên đăng nhập</div>
                    <!-- readonly -->
                    <input type="text" style="width: 600px;" disabled value="<?php echo $_SESSION['username']?>">
                    </div>
                    <div class="ten">  
                    <div style="color:#9317a3">Email</div>
                    <input required type="text" style="width: 600px;" name="email" id="email" value="<?php echo $show_account['email']?>">
                    </div>
                    <div class="email">  
                    <div style="color:#9317a3">Số điện thoại</div>
                    <input required type="text" style="width: 600px;" id="phone_number" value="<?php echo $show_account['phone_number']?>" name="phone_number">
                    </div>
                    <div class="email">  
                    <div style="color:#9317a3">Địa chỉ</div>
                    <input required name="address" type="text" style="width: 600px;" value="<?php echo $show_account['address']?>">
                    </div>
                    <div class="email">  
                    <div class="sp"></div>
                </div>
                </div>
            </div>
            <button class="save-btn" type="submit"
            onclick="return confirm('Xác nhận thay đổi thông tin cá nhân?')">Cập nhật thông tin</button>
            </form>  
        </div>
    </body>
</html>
