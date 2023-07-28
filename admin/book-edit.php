<?php
include "header.php";
include "class/book_class.php";
?>
<?php
    $book = new books;
    $show_book_SP = $book -> show_book_SP();
?>
<?php
$book = new books;
if($_SERVER['REQUEST_METHOD']==='POST'){
    $book_id = $_GET['book_id'];
    $book_name = $_POST['book_name'];
    $book_category= $_POST['book_category'];
    $book_author = $_POST['book_author'];
    $book_date= $_POST['book_date'];
    $book_pages = $_POST['book_pages'];
    $book_img= $_FILES['book_img'];
    $book_desc= $_POST['book_desc'];
    $book_price= $_POST['book_price'];
    $update_book = $book -> update_book($book_id , $book_name, $book_category, $book_author, $book_date, $book_pages, $book_img, $book_desc, $book_price);
}
?>
<style>
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
          <input required type="text" name="book_name" class="input-content input-name" style="width: 24.8%; height: 12%;"
          value="<?php echo $show_book_SP['book_name']?>" >
        </div>
        <div class="box-content-author">
          <div class="text-content required">Tác giả</div>
          <input required type="text" name="book_author" class="input-content input-name" style="width: 24.8%; height: 12%;"
          value="<?php echo $show_book_SP['book_author']?>" >
        </div>
      </div>
      <div class="box-content-desc">
        <div class="text-content">Mô tả về sách</div>
        <textarea name="book_desc" id="" style=" width: 50.5%;height:325px;resize:none;" class="input-content" > 
        <?php echo $show_book_SP['book_desc']?></textarea>
      </div>
      <div class="box-content-date">
        <div class="text-content required">Ngày phát hành</div>
        <input required type="date" name="book_date" class="input-content input-name" style="width: 24.8%; height: 12%;"
        value="<?php echo $show_book_SP['book_date']?>" >
      </div>
      <div class="box-content-pages">
        <div class="text-content">Số trang</div>
        <input type="text" name="book_pages" class="input-content input-name" style="width: 24.8%; height: 12%;"
        value="<?php echo $show_book_SP['book_pages']?>" > 
      </div>
      <div class="box-content-category">
        <div class="text-content required">Thể loại</div>  
        <select  name="book_category" id="" class="input-content input-name" style="width: 24.8%; height: 12%;">
            <option value="Tiểu thuyết"><?php echo $show_book_SP['book_category']?></option>
            <option value="Tiểu thuyết">Tiểu thuyết</option>
            <option value="Kinh tế">Kinh tế</option>
            <option value="Ngôn tình">Ngôn tình</option>
            <option value="Kĩ năng sống">Kĩ năng sống</option>
            <option value="Ngoại ngữ">Ngoại ngữ</option>
            <option value="Chính trị">Chính trị</option>
        </select>
        <div class="box-content-price">
          <div class="text-content required">Giá bán</div>
          <input type="number" name="book_price" class="input-content input-name" style="width: 24.8%; height: 12%;"
          value="<?php echo $show_book_SP['book_price']?>" > 
        </div>
      </div>
      </div>
      <div class="line"></div>
      <input name="book_img" type="file" class="img-book" onchange="previewImage(event)" value="uploads/<?php echo $show_book_SP['book_img']?>" >
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
      <button type="submit" class="btn-submit"
      onclick="return confirm('Bạn có chắc chắn muốn cập nhật cuốn sách này không?')">Update book</button>
    </form>
    </body>
</html>