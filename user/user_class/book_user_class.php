<?php
require_once "../admin/database.php";
?>
<?php
class bookss{
    private $db;
    public function __construct(){
        $this -> db = new Database;
    }
    public function insert_sell($book_id, $account_id, $quantity){
        $query = "INSERT INTO tbl_book_sell (account_id, book_id, quantity) VALUES ('$account_id', '$book_id', '$quantity')";
        $result = $this ->db->insert($query);
        // header('Location:../user/sell_wait.php');
        return $result;
    }
    public function show_sell(){
        $query = "SELECT * FROM tbl_book_sell ORDER BY book_id DESC";
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
        $query2 = "DELETE FROM tbl_book WHERE book_id = '$book_id'";
        $result = $this ->db->delete($query2);
    
        header('Location: index.php');
        return $result;
    } 
    public function delete_book_sell($book_sell_id){
        $query2 = "DELETE FROM tbl_book_sell WHERE book_sell_id = '$book_sell_id'";
        $result = $this ->db->delete($query2);
        header('Location: ../user/sell_wait.php');
        return $result;
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
    public function update_book($book_id , $book_name, $book_category, $book_author, $book_date, $book_pages, $book_img, $book_desc){
        $query = "UPDATE tbl_book 
        SET book_name = '$book_name', 
        book_category = '$book_category', 
        book_author = '$book_author', 
        book_date = '$book_date',
        book_pages = '$book_pages',
        book_desc = '$book_desc'
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
        header('Location: index.php');
        return $result;
    }
//------------------------------complated-----------------------------
    public function show_sell_complated(){
        $query = "SELECT * FROM book_complated ORDER BY book_sell_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_book_sell_complated($book_id){
        $query = "SELECT * FROM book_complated WHERE book_id = $book_id";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_account_sell_complated($account_id){
        $query = "SELECT * FROM tbl_account WHERE account_id = $account_id";
        $result = $this ->db->select($query);
        return $result;
    }
    public function check_book_exist($book_id){
        $error_msg = "";
        $check_query = "SELECT * FROM tbl_book WHERE book_id = $book_id";
        $check_result = $this->db->select($check_query);
        if ($check_result && $check_result->num_rows > 0) {
            $error_msg .= "Sách đã bị xóa khỏi trang web...";
        }
        return $error_msg;
    }
}
?> 