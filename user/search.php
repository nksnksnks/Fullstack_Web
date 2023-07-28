
<?php
include "header.php";
require_once "../admin/class/book_class.php";
require_once "../admin/class/func_class.php";
?>
<?php
    $func = new func();
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $keyword =  $_GET['keyword'];
        $search = $func -> search($keyword);
    }
?>
<title>Search: <?php echo $keyword?></title>
<style>
.box-book:hover{
    background-color: #efe2ff;
    transform: scale(1.025);
    z-index: 1; 
    transition: all 0.3s ease;
}
</style>
<?php
$book = new books;
$show_book = $book->show_book();
?>
        <ul class="box-content" style="z-index: 5;padding-bottom: 1100px;">
        <?php
            $i = 1;
            if($search){
                foreach ($search as $result){
                    $book_id = $result['book_id'];
        ?>
            <li class="box-book">
                <a href="book-view.php?book_id=<?php echo $result['book_id']; $i+=1;?>" class="thea">
                <img src="../admin/uploads/<?php echo $result['book_img']?>" alt="" class="img-book"  style="height: 400px;">
                <h5 class="name-book" style="transition: all 0.3s ease;"><?php echo $result['book_name']?></h5>
                <h4 class="price-book" style="transition: all 0.3s ease; color: #9a006e;text-align:center;"><?php echo number_format($result['book_price']);?>₫</h4>
                <div class="author-book">Tác giả <span style="color:#9a006e; font-size: 16px;"><?php echo $result['book_author']?></span></div>
                <button class="buy-book">Mua sách</button> 
                </a> 
            </li>
            <?php
                }
            }
            if($i==1){
                ?>
                <h4 style="text-align: center;">Không có kết quả cho từ khóa: <?php echo $keyword?></h4>
                <?php
            }
            ?>
        </ul>
    </body>
</html>