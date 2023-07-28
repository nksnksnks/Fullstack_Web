<?php
include "header.php";
include "class/book_class.php";
?>
<?php
    $book = new books;
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $insert_book = $book -> insert_book($_POST, $_FILES);
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
  .btn-submit:hover{
        background-color: #a00875;
        color: white;
}
</style>
<form class="content-box" method="POST" enctype="multipart/form-data">
      <div class="cate-autho">
        <div class="box-content-name">
          <div class="text-content required">Tiêu đề</div>
          <input required type="text" name="book_name" class="input-content input-name" style="width: 24.8%; height: 12%;">
        </div>
        <div class="box-content-author">
          <div class="text-content required">Tác giả</div>
          <input required type="text" name="book_author" class="input-content input-name" style="width: 24.8%; height: 12%;">
        </div>
      </div>
      <div class="box-content-desc">
        <div class="text-content">Mô tả về sách</div>
        <textarea name="book_desc" id="" style=" width: 50.5%;height:325px;resize:none;" class="input-content"></textarea>
      </div>
      <div class="box-content-date">
        <div class="text-content required">Ngày phát hành</div>
        <input required type="date" name="book_date" class="input-content input-name" style="width: 24.8%; height: 12%;">
      </div>
      <div class="box-content-pages">
        <div class="text-content">Số trang</div>
        <input type="text" name="book_pages" class="input-content input-name" style="width: 24.8%; height: 12%;">
      </div>
      <div class="box-content-category" style="z-index: 5;">

        <div class="text-content required">Thể loại</div>
        <select name="book_category" id="" class="input-content input-name" style="width: 24.8%; height: 12%;z-index: 9;">
            <option value="Tiểu thuyết">Tiểu thuyết</option>
            <option value="Truyện tranh">Kinh tế</option>
            <option value="Ngôn tình">Ngôn tình</option>
            <option value="Kĩ năng sống">Kĩ năng sống</option>
            <option value="Ngoại ngữ">Ngoại ngữ</option>
            <option value="Chính trị">Chính trị</option>
        </select>
        <div class="box-content-price required" style="z-index: 9;"> 
          <div class="text-content required">Giá bán</div>
          <input required type="text" name="book_price" class="input-content input-name" style="width: 24.8%; height: 12%;z-index:10;">
        </div>
      </div>
      </div>
      </div>
      <div class="line"></div>
      <input name="book_img" required type="file" class="img-book" onchange="previewImage(event)">
      <div class="img">
        <img id="preview" src="#" alt="Preview" class="imgg">
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
      <button type="submit" class="btn-submit" style="z-index: 20;"
      onclick="return confirm('Bạn có chắc chắn thêm cuốn sách này không ?')">Insert book</button>
    </form>
    </body>
<script>
  <?php if(isset($insert_book) && $insert_book !== ''): ?>
  alert("<?php echo $insert_book; ?>");
  <?php endif; ?>
</script> 
</html>