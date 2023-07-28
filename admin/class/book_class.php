<?php
require_once "../admin/database.php";
?>
<?php
class books{
    private $db;
    public function __construct(){
        $this -> db = new Database; 
    }
    public function insert_book(){
        $book_name =  $_POST['book_name'];
        $book_category =  $_POST['book_category'];
        $book_author =  $_POST['book_author']; 
        $book_date =  $_POST['book_date'];
        $book_pages =  $_POST['book_pages'];
        $book_desc =  $_POST['book_desc'];
        $book_price = $_POST['book_price'];
        $book_img =  $_FILES['book_img']['name'];
        $book_sold = 0;
        $check_query = "SELECT * FROM tbl_book WHERE book_name = '$book_name'";
        $check_result = $this->db->select($check_query);
        $error_msg = "";
        if ($check_result && $check_result->num_rows > 0) {
            while ($row = $check_result->fetch_assoc()) {
                if ($row['book_name'] == $book_name) {
                    $error_msg .= "Sách đã tồn tại trong cơ sở dữ liệu. ";
                }
            }
            return $error_msg;
        }
        else{
            $error_msg .= "Thêm sách thành công!!! ";
            move_uploaded_file($_FILES['book_img']['tmp_name'],"uploads/".$_FILES['book_img']['name']);
            $query = "INSERT INTO tbl_book (book_name, book_category, book_author, book_date, book_pages, book_img, book_desc, book_price, book_sold) 
                                    VALUES ('$book_name', '$book_category', '$book_author', '$book_date', '$book_pages', '$book_img', '$book_desc', '$book_price', '$book_sold')";
            $result = $this ->db->insert($query);
            header("Location: index.php");
            return $error_msg;
        }
    }
    public function show_book(){
        $query = "SELECT * FROM tbl_book ORDER BY book_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
    public function delete_book($book_id){
        $query = "SELECT book_img FROM tbl_book WHERE book_id = '$book_id'";
        $result = $this->db->select($query);
        $filename = $result->fetch_assoc();
        $image_path = "uploads/". $filename['book_img'];
        if (file_exists($image_path)) {
            // Xóa ảnh khỏi thư mục
            unlink($image_path);
        }
        $query3 = "DELETE FROM tbl_book_sell WHERE book_id = '$book_id'";
        $result3 = $this ->db->delete($query3);

        $query4 = "DELETE FROM tbl_comments WHERE book_id = '$book_id'";
        $result4 = $this ->db->delete($query4);
        
        $query2 = "DELETE FROM tbl_book WHERE book_id = '$book_id'";
        $result2 = $this ->db->delete($query2);
        header('Location: index.php');
        return $result2;
    }
    public function show_book_SP(){
        if(isset($_GET['book_id'])){
            $book_id = $_GET['book_id'];
            $query = "SELECT * FROM tbl_book 
                      WHERE book_id = $book_id
                      ORDER BY book_id DESC";
            $result = $this ->db->select($query);
            $row = $result->fetch_assoc();
            return $row;
        }
    }
    public function update_book($book_id , $book_name, $book_category, $book_author, $book_date, $book_pages, $book_img, $book_desc, $book_price){
        $query = "UPDATE tbl_book 
        SET book_name = '$book_name', 
        book_category = '$book_category', 
        book_author = '$book_author', 
        book_date = '$book_date',
        book_pages = '$book_pages',
        book_desc = '$book_desc',
        book_price = '$book_price'
        WHERE book_id = '$book_id'";
        $result = $this ->db->update($query);
        if(isset($_FILES['book_img']) && $_FILES['book_img']['error'] == UPLOAD_ERR_OK) {
            $query3 = "SELECT * FROM tbl_book WHERE book_id = $book_id";
            $result3 = $this->db->select($query3);
            $filename = $result3->fetch_assoc();
            $image_path = "uploads/". $filename['book_img'];
            if (file_exists($image_path)) {
                // Xóa ảnh khỏi thư mục
                unlink($image_path);
            }
            $book_img =  $_FILES['book_img']['name'];
            move_uploaded_file($_FILES['book_img']['tmp_name'],"uploads/".$_FILES['book_img']['name']);
            $query2 = "UPDATE tbl_book 
                        SET book_img = '$book_img'
                        WHERE book_id = '$book_id'";
            $result2 = $this ->db->update($query2);
        }
        // header('Location: index.php');
        return $result;
    }
}
