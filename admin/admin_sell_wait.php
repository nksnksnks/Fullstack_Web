<?php
include "header.php";
include "class/sell_class.php"
?>
<?php
$book_sell = new books_sell;
$sell = $book_sell -> show_sell_wait();
?>
        <table class="table table-hover">
            <thead>
                <style>
                    th{
                        text-align: center;
                    }
                </style>
              <tr>
                <th scope="col">Stt</th>
                <th scope="col">username</th>
                <th scope="col">email</th>
                <th scope="col">số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Số lượng đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Xử lýㅤㅤㅤㅤㅤㅤ</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    if($sell){
                        $i=0;
                        while( $result = $sell->fetch_assoc()){
                            $show_book_sell = $book_sell -> show_book_sell($result['book_id']);
                            if($show_book_sell)
                                $result2 = $show_book_sell -> fetch_assoc();
                            $show_account_sell = $book_sell -> show_account_sell($result['account_id']);
                            if($show_account_sell)
                                $result3 = $show_account_sell -> fetch_assoc();
                            $i++;
                ?>
            <tr>
                <th scope="row"><?php echo $i?></th>
                <td><?php echo $result3['username']?></td> 
                <td><?php echo $result3['email']?></td>
                <td style="text-align: center;" ><?php echo $result3['phone_number']?></td>
                <td><?php echo $result3['address']?></td>
                <td><?php echo $result2['book_name']?></td>
                <td><?php echo $result2['book_author']?></td>
                <td><?php echo number_format($result2['book_price'])?></td>
                <td style="text-align: center;"><?php echo $result['quantity']?></td>
                <td style="text-align: center;"><?php
                    $check = 0;
                        if($result['sell'] == 0){
                            echo '<span style="color: red;">Chưa xác nhận</span>';
                            $check = 0;
                        }
                        else{
                            echo '<span style="color: green;">Đã xác nhận</span>';
                            $check = 1;
                        }?></td>
                <?php
                if($check_login == 1){
                    if($check == 0){
                ?>
                <td><a  class="btn" href="book_confirm.php?book_sell_id=<?php echo $result['book_sell_id']?>"
                    onclick="return confirm('Bạn có chắc chắn muốn XÁC NHẬN đơn hàng này?')" >Confirm</a> | 
                    <a onclick="return confirm('Bạn có chắc chắn muốn XÓA đơn hàng này?')" class="btn" 
                        href="book_delete_sell.php?book_sell_id=<?php echo $result['book_sell_id']?>">Delete</a></td>
                <?php
                    }else{
                ?>
                    <td style=""><a  class="btn" href="book_complated.php?book_sell_id=<?php echo $result['book_sell_id']?>
                                                        &quantity=<?php echo $result['quantity']?>
                                                        &book_id=<?php echo $result2['book_id']?>" 
                    style="padding-left: 65px; padding-right: 65px;margin: auto; "
                    onclick="return confirm('Bạn có chắc chắn muốn xác nhận HOÀN TẤT đơn hàng này?')">Complate</a>
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