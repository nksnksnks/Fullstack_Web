<?php
include "header.php";
include "user_class/book_user_class.php";
?>
<?php
$book_sell = new bookss;
$sell = $book_sell -> show_sell_complated(); 
?>
<title>Lịch sử mua hàng</title>
<script>
    function showNotification() {
        alert("Sách đã bị xóa khỏi trang web");
    }
</script>
<style>
    .btn{
        border: 1px solid #a00875;
        padding: 5px; 
        padding-left: 20px;
        padding-right: 20px;
        border-radius: 5px;
    }
    .btn:hover{
        background-color: #a00875;
        color: white;
    }
</style>
        <table class="table table-hover">
            <thead>
                <style>
                    th{
                        text-align: center;
                    }
                </style>
              <tr>
                <th scope="col">Stt</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Số lượng đặt</th>
                <th scope="col">Viewㅤㅤㅤㅤㅤㅤ</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    if($sell){
                        $i=0;
                        while( $result = $sell->fetch_assoc()){
                          if($result['account_id'] == $account_id){
                            $i+=1;
                            $show_book_sell_complated = $book_sell->show_book_sell_complated($result['book_id']); 
                            if ($show_book_sell_complated) {
                                $result2 = $show_book_sell_complated->fetch_assoc();
                            }
                            $show_account_sell_complated = $book_sell->show_account_sell_complated($result['account_id']);
                            if ($show_account_sell_complated) {
                                $result3 = $show_account_sell_complated->fetch_assoc();
                            }
                ?>
            <tr>
                <th scope="row"><?php echo $i?></th>
                <td><?php echo $result3['username']?></td>
                <td><?php echo $result3['email']?></td>
                <td style="text-align: center;" ><?php echo $result3['phone_number']?></td>
                <td><?php echo $result2['book_name']?></td>
                <td><?php echo $result2['book_author']?></td>
                <td><?php echo number_format($result2['book_price'])?>₫</td>
                <td style="text-align: center;"><?php echo $result['quantity']?></td>
                <?php
                $check = $book_sell -> check_book_exist($result['book_id']);
                if($check != ""){
                ?>
                    <td><a  class="btn" href="book-view.php?book_id=<?php echo $result['book_id']?>" >View</a></td>
                <?php 
                }
                else{
                ?>
                    <td><button class="btn" disabled>Sách đã bị xóa</button></td>
                <?php
                }
                ?>
            </tr>
            <?php

                    }
                  }
                } 
            ?>
            </tbody>
        </table>
    </body>
</html> 