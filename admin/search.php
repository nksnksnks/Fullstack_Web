<?php 
include "header.php";
include "class/func_class.php";
?>
<?php
    $func = new func();
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $keyword =  $_GET['keyword'];
        $search = $func -> search($keyword);
    }
?>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Stt</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Ngày phát hành</th>
                <th scope="col">Số trang</th>
                <th scope="col">Số lượng đã bán</th>
                <th scope="col">Chỉnh sửa</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    if($search){
                        $i = 1;
                        foreach ($search as $result){
                            $book_id = $result['book_id'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i; $i+=1;?></th>
                        <td><?php echo $result['book_name']?></td>
                        <td><?php echo $result['book_author']?></td>
                        <td><?php echo $result['book_category']?></td>
                        <td><?php echo $result['book_date']?></td>
                        <td><?php echo $result['book_pages']?></td>
                        <td><?php echo $result['book_sold']?></td>
                        <td><a  class="btn" href="book-view.php?book_id=<?php echo $result['book_id']?>" >View</a> | 
                            <a href="book-delete.php?book_id=<?php echo $result['book_id']?>" 
                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" class="btn">Delete</a></td>
                    </tr>
                    <?php
                    }
                }
              ?>
            </tbody>
        </table>
    </body>
</html>
