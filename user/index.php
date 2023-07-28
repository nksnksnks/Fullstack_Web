<title>Rakuten</title>
<?php
include "header.php";
require_once "../admin/class/book_class.php";
?>
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
        <ul class="box-content" style="z-index: 5;">
            <?php
            if($show_book){
                $i=0;
                while( $result = $show_book->fetch_assoc()){
                    $i++;
            ?>
            <li class="box-book">
                <a href="book-view.php?book_id=<?php echo $result['book_id']?>" class="thea">
                <img src="../admin/uploads/<?php echo $result['book_img']?>" alt="" class="img-book"  style="height: 400px;">
                <h5 class="name-book" style="transition: all 0.3s ease;"><?php echo $result['book_name']?></h5>
                <h4 class="price-book" style="transition: all 0.3s ease;color: #9a006e;text-align:center;">
                        <?php echo number_format($result['book_price']);?>₫</h4>
                <div class="author-book">Tác giả <span style="color:#9a006e; font-size: 16px;"><?php echo $result['book_author']?></span></div>
                <button class="buy-book">Mua sách</button> 
                </a> 
            </li>
            <?php
                }
            }
            ?>
        </ul>
    </body>
</html>