<?php
require_once "../admin/database.php";
?>
<?php
class books_sell{
    private $db;
    public function __construct(){
        $this -> db = new Database;
    }
    public function show_sell_wait(){
        $query = "SELECT * FROM tbl_book_sell ORDER BY book_sell_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_book_sell($book_id){
        $query = "SELECT * FROM tbl_book WHERE book_id = $book_id";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_account_sell($account_id){
        $query = "SELECT * FROM tbl_account WHERE account_id = $account_id";
        $result = $this ->db->select($query);
        return $result;
    }
    public function update_status($book_sell_id){
        $query = "UPDATE tbl_book_sell SET sell = 1 WHERE book_sell_id = $book_sell_id";
        $result = $this ->db->update($query);
        header('Location: admin_sell_wait.php');
        return $result;
    }
    public function delete_book_sell($book_sell_id){
        $query2 = "DELETE FROM tbl_book_sell WHERE book_sell_id = '$book_sell_id'";
        $result = $this ->db->delete($query2);
        header('Location: admin_sell_wait.php');
        return $result;
    }
    public function complated($book_id, $quantity, $book_sell_id){
        $query = "UPDATE tbl_book SET book_sold = book_sold + $quantity WHERE book_id = $book_id";
        $result = $this ->db->update($query);

        $query0 = "SELECT * FROM tbl_book_sell WHERE book_sell_id = '$book_sell_id'";
        $result0 = $this ->db-> select($query0);
        $row = $result0 -> fetch_assoc();
        $book_sell_id = $row['book_sell_id'];
        $account_id = $row['account_id'];
        $book_id = $row['book_id'];
        // Lấy thông tin sách 
        $query3 = "SELECT * FROM tbl_book WHERE book_id = '$book_id'";
        $result3 = $this ->db-> select($query3);
        $row2 = $result3 -> fetch_assoc();
        $book_name = $row2['book_name'];
        $book_author = $row2['book_author'];
        $book_price = $row2['book_price']; 

        $quantity = $row['quantity'];
        $query1 = "INSERT INTO book_complated(book_sell_id, account_id, book_id, quantity, book_name, book_author, book_price) 
        VALUES ('$book_sell_id', '$account_id', '$book_id', '$quantity', '$book_name', '$book_author', '$book_price')";
        $result1 = $this ->db->insert($query1);

        $query2 = "DELETE FROM tbl_book_sell WHERE book_sell_id = $book_sell_id";
        $result2 = $this ->db->delete($query2);
        header('Location: admin_sell_wait.php');
        return $result;
    }
} 