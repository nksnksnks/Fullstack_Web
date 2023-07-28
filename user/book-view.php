
<?php 
include "header.php"; 
require_once "../admin/class/book_class.php";
include "user_class/comment_class.php";
include "user_class/book_user_class.php";
?>
<?php
    $book = new books;
    $show_book_SP = $book -> show_book_SP();  
?>
<title><?php echo $show_book_SP['book_name'] ?></title>
<?php
$comment = new comment;
$bookss = new bookss;
$inorup = 0;

if($_SERVER['REQUEST_METHOD']==='POST'){
  if (isset($_POST['text_comment1'])) {
    $insert_comment = $comment -> insert_comment();
  }
  if(isset($_POST['text_comment2'])){
    $text_comment = $_POST['text_comment2'];
    $vote_star = $_POST['vote_star'];
    $username = $_SESSION['username'];
    $book_id = $_GET['book_id'];
    $update_comment = $comment -> update_comment($text_comment, $vote_star, $username, $book_id);
  }
  if(isset($_POST['quantity'])){
    $book_id =  $_GET['book_id'];
    $account_id = $account_id;
    $quantity = $_POST['quantity'];
    $insert_sell = $bookss -> insert_sell($book_id, $account_id, $quantity);
  }
}
$show_comment = $comment -> show_comment();
$show_comment2 = $comment -> show_comment();
?>
<style>
.box-star{
    position: absolute;
    top: 141px;
    margin-left: 30px; 
}
.rating {
    position: absolute;
    display: flex;
    width: 100%;
    justify-content: center;
    overflow: hidden;
    flex-direction: row-reverse;
    height: 150px;
    position: relative;
    top: 0;
  }
  
  .rating-0 {
    filter: grayscale(100%);
  }
  
  .rating > input {
    display: none;
  }
  
  .rating > label {
    cursor: pointer;
    width: 40px;
    height: 40px;
    margin-top: auto;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 76%;
    transition: .3s;
  }
  
  .rating > input:checked ~ label,
  .rating > input:checked ~ label ~ label {
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  }
  
  
  .rating > input:not(:checked) ~ label:hover,
  .rating > input:not(:checked) ~ label:hover ~ label {
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  }
  input.starr { display: none; }
   
   label.starr {
       left:0;
       float: right;
       padding: 10px;
       font-size: 36px; 
       color: #444;
       transition: all .2s;
   }
   label.starr:hover { transform: rotate(-15deg) scale(1.3); }
  .sold-product{
    position: absolute;
    left: 45%;
    top: 150px;
  }
  /* .price-product{
      
  } */
  .name-product{
      position: absolute;
      left: 45%;
      color: #9a006e;
      top: 90px;
  }
  .category-product{
      position: absolute;
      left: 45%;
      top: 240px;
  }
  .date-product{
      position: absolute;
      left: 45%;
      top: 300px;
  }

  .pages-product{
      position: absolute;
      left: 45%;
      top: 270px;
  }
  .author-product{
      position: absolute;
      left: 45%;
      top: 210px;
  }
  .soluong{
    position: absolute;
    left: 45%;
    top: 335px;
}
.box-soluong{
    position: absolute;
    left: 45%;
    top: 365px;
}
.buy{
    position: absolute;
    left: 45%;
    top: 420px;
    margin: auto;
    border: 1px solid #9a006e;
    width: 30%;
    height: 40px;
    background-color: #ffffff;
    color: #9a006e;
    font-size: 20px;
    border-radius: 10px;
}
.desc{
    position: absolute;
    left: 45%;
    top: 465px;
    font-size: 30px;
}
.desc-text{
    position: absolute;
    width: 50%;
    left: 45%;
    top: 510px;
}
</style>
        <form class="box-product" method="POST">
          <img src="../admin/uploads/<?php echo $show_book_SP['book_img'] ?>" alt="" class="img-product">
          <h3 class="name-product"><?php echo $show_book_SP['book_name'] ?></h3>
          <div class="sold-product">(Đã bán: <span style="color:#850661"><?php echo $show_book_SP['book_sold'] ?></span>)</div>
          <h3 class="price-product" style="position: absolute;left: 45%; top: 170px;color: #9a006e;font-size: 220%;"><?php echo number_format($show_book_SP['book_price'])?>₫</h3>
          <div class="author-product">Tác giả: <span style="color:#850661; font-size:20px;"><?php echo $show_book_SP['book_author'] ?></span></div>
          <div class="category-product">Thể loại: <span style="color:#850661; font-size:20px;"><?php echo $show_book_SP['book_category'] ?></span></div>
          <div class="date-product">Ngày xuất bản: <span style="color:#850661; font-size:20px;"><?php $date = date("d/m/Y", strtotime($show_book_SP['book_date'])); echo $date; ?></span></div>
          <div class="pages-product">Số trang: <span style="color:#850661; font-size:20px;"><?php echo $show_book_SP['book_pages'] ?></span></div>
          <div class="soluong">Số lượng:</div>
            <div class="quantity-area w-100 box-soluong">
              <script>
                  function minusQuantity() {
                    var input = document.getElementById('quantity');
                    var value = parseInt(input.value);
                    if (value > 1) {
                      input.value = value - 1;
                    }
                  }

                function plusQuantity() {
                  var input = document.getElementById('quantity');
                  var value = parseInt(input.value);
                  input.value = value + 1;
                }
              </script>
              <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
              <input type="text" id="quantity" value="1" min="1" class="quantity-input" style="width:50px;" name="quantity">
              <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
            </div>
            <div class="desc">Mô tả</div>
            <div class="desc-text"><?php echo nl2br($show_book_SP['book_desc']) ?>
            </div>
            <button class="buy" 
                onclick="return confirm('Bạn có chắc chắn muốn đặt cuốn sách này?')"
                >Đặt sách</button>
        </form>
        <form action="" class="box-danhgia" method="post">
          <?php
            $sum = 0;
            $dem = 0;
            $check_comment = 0;
            $comment = '';
            $vote_star = 0;
            $id_commentt = 0;
            if($show_comment){
              while( $result = $show_comment -> fetch_assoc()){
                $sum += $result['vote_star'];
                $dem += 1;
                if($result['username'] == $_SESSION['username'] && $result['book_id'] == $_GET['book_id']){
                  $check_comment = 1;
                  $comment = $result['text_comment'];
                  $vote_star = $result['vote_star'];
                  $id_commentt = $result['id_comment'];
                }
              }
            }
            if($dem!= 0){
              $tb = number_format($sum/$dem, 1);
            }
            else{
              $tb = number_format(0, 1);
            }
          ?>
            <div class="line-cmt">Đánh giá sản phẩm</div>
            <div class="point">
              <div style="font-size: 20px;margin-left: 20px;"> 
                <span style="font-size: 30px;color:#850661;"><?php echo $tb?></span>
                trên 5
                <span style="font-size: 15px;color:#850661;">(<?php echo $dem?> Đánh giá)</span> </div>
                <div style="margin-left: 20px;">
                  <?php for( $i = 5; $i > 0 ; $i--){
                    $tb -= 1;
                    if($tb >= 0){
                      ?>
                      <i class="bi bi-star-fill" style="color: #850661"></i>
                      <?php
                    }
                    elseif($tb > -1 && $tb < 0){
                      ?>
                      <i class="bi bi-star-half" style="color: #850661"></i>
                      <?php
                    }
                    else{
                      ?>
                      <i class="bi bi-star" style="color: #850661"></i>
                      <?php
                    }
                  }?>
                </div>
            </div>
            <div>
            <?php 
              if($check_comment == 0){
            ?>
              <div class="box-star">
                  <div class="rating"> 
                    <input type="radio" name="vote_star" id="rating-5" value="5" checked>
                    <label class="starr star-5" for="rating-5" checked></label>
                    <input type="radio" name="vote_star" id="rating-4" value="4">
                    <label class="starr star-4" for="rating-4"></label>
                    <input type="radio" name="vote_star" id="rating-3" value="3">
                    <label class="starr star-3" for="rating-3"></label>
                    <input type="radio" name="vote_star" id="rating-2" value="2">
                    <label class="starr star-2" for="rating-2"></label>
                    <input type="radio" name="vote_star" id="rating-1" value="1">
                    <label class="starr star-1" for="rating-1"></label>
                  </div>
              </div>
              </div>
              <input type="text" placeholder="Đánh giá của bạn" class="box-comment" name="text_comment1" required>
              <button class="btn-cmt" type="submit">Đánh giá</button>
            <?php
            }
            else{
            ?>
              <div class="box-star">
                  <div class="rating"> 
                    <input type="radio" name="vote_star" id="rating-5" value="5" <?php if ($vote_star == 5) { echo 'checked'; } ?>>
                    <label class="starr star-5" for="rating-5"></label>
                    <input type="radio" name="vote_star" id="rating-4" value="4" <?php if ($vote_star == 4) { echo 'checked'; } ?>>
                    <label class="starr star-4" for="rating-4"></label>
                    <input type="radio" name="vote_star" id="rating-3" value="3" <?php if ($vote_star == 3) { echo 'checked'; } ?>>
                    <label class="starr star-3" for="rating-3"></label>
                    <input type="radio" name="vote_star" id="rating-2" value="2" <?php if ($vote_star == 2) { echo 'checked'; } ?>>
                    <label class="starr star-2" for="rating-2"></label>
                    <input type="radio" name="vote_star" id="rating-1" value="1" <?php if ($vote_star == 1) { echo 'checked'; } ?>>
                    <label class="starr star-1" for="rating-1"></label>
                  </div>
              </div>
              </div>
              <input type="text" placeholder="Đánh giá của bạn" class="box-comment" name="text_comment2" 
                required value="<?php echo $comment; $inorup = 1;?>" style="">
              <button id="button" class="btn-cmt" type="submit" style="padding: 0 49px 0 49px; z-index: 2;">Cập nhật</button>
            <?php
            }?>
            <div style="margin-top: 200px;"></div>
              <?php
                if($show_comment2){
                  while( $result2 = $show_comment2 -> fetch_assoc()){
              ?>
              <div class="show-cmt" style="margin: 40px 400px 0 30px; 
                border-bottom: 1px solid #850661;
                padding: 0 0 20px 0;">
                  <div style="margin-bottom: 5px;">
                    <?php echo $result2['username']?> 
                    <span>
                    <?php
                    $i = 0;
                    while($i < $result2['vote_star']){
                      $i+=1?>
                      <i class="bi bi-star-fill" style="color: #850661"></i>
                    <?php
                    }
                    while($i < 5){
                      $i+=1;
                    ?>
                      <i class="bi bi-star" style="color: #850661"></i></span>
                    <?php
                    }
                    ?>
                  </div>
                <div style="margin-left: 40px;font-size: 20px;"><?php echo $result2['text_comment']?></div>
              </div>
              <?php
                }
              }?>
        </form>
    </body>
</html>