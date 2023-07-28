<?php
include "header.php";
include "class/book_class.php";
?>
<?php
    $book = new books;
    $show_book_SP = $book -> show_book_SP();
?>
<style>
    .input-content{
        background-color:rgb(200, 200, 200);
        color:black;
    }
  .box-content-price{
    position: absolute;
    position: 0;
    height: 100%;
    width: 100%;
    left: 30%;
    bottom: 0%;
  }
</style>
<form class="content-box" method="POST" enctype="multipart/form-data">
      <div class="cate-autho">
        <div class="box-content-name">
          <div class="text-content required">Tiêu đề</div>
          <input required type="text" name="book_name" class="input-content input-name" 
          style="width: 24.8%; height: 12%;"
          value="<?php echo $show_book_SP['book_name']?>" disabled>
        </div>
        <div class="box-content-author">
          <div class="text-content required">Tác giả</div>
          <input required type="text" name="book_author" class="input-content input-name" style="width: 24.8%; height: 12%;"
          value="<?php echo $show_book_SP['book_author']?>" disabled>
        </div>
      </div>
      <div class="box-content-desc">
        <div class="text-content">Mô tả về sách</div>
        <textarea name="book_desc" id="" style=" width: 50.5%;height:325px;resize:none;" class="input-content" disabled> 
        <?php echo $show_book_SP['book_desc']?></textarea>
      </div>
      <div class="box-content-date">
        <div class="text-content required">Ngày phát hành</div>
        <input required type="date" name="book_date" class="input-content input-name" style="width: 24.8%; height: 12%;"
        value="<?php echo $show_book_SP['book_date']?>" disabled>
      </div>
      <div class="box-content-pages">
        <div class="text-content">Số trang</div>
        <input type="text" name="book_pages" class="input-content input-name" style="width: 24.8%; height: 12%;"
        value="<?php echo $show_book_SP['book_pages']?>" disabled> 
      </div>
      <div class="box-content-category">
        <div class="text-content required">Thể loại</div>
        <select disabled name="book_category" id="" class="input-content input-name" style="width: 24.8%; height: 12%;">
            <option value="Tiểu thuyết"><?php echo $show_book_SP['book_category']?></option>
            <option value="Tiểu thuyết">Tiểu thuyết</option>
            <option value="Truyện tranh">Truyện tranh</option>
            <option value="Ngôn tình">Ngôn tình</option>
            <option value="Kĩ năng sống">Kĩ năng sống</option>
            <option value="Ngoại ngữ">Ngoại ngữ</option>
            <option value="Chính trị">Chính trị</option>
        </select>
        <div class="box-content-price">
          <div class="text-content required">Giá bán</div>
          <input type="text" name="book_price" class="input-content input-name" style="width: 24.8%; height: 12%;"
          value="<?php echo $show_book_SP['book_price']?>" disabled> 
        </div>
      </div>
      </div>
      <div class="line"></div>
      <input name="book_img" required type="file" class="img-book" onchange="previewImage(event)" disabled>
      <div class="img">
        <img id="preview" src="uploads/<?php echo $show_book_SP['book_img']?>" alt="Preview" class="imgg">
      </div>
      <script>
        function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
          var imgElement = document.getElementById('preview');
          imgElement.src = reader.result;
        };

        reader.readAsDataURL(input.files[0]);
      }
      </script>
      <a type="submit" class="btn-submit" style="text-align:center;text-decoration: none;padding-top: 5px;"
       href="book-edit.php?book_id=<?php echo $show_book_SP['book_id']?>">Edit book</a>
    </form>
    </body>
</html>