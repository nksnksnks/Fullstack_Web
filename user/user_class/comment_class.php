<?php
//gọi file
require_once "../admin/database.php";
?>
<?php
class comment {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function insert_comment(){
        $username = $_SESSION['username'];
        $book_id = $_GET['book_id'];
        $text_comment = $_POST['text_comment1'];
        $vote_star = $_POST['vote_star'];
        $insert_query = "INSERT INTO tbl_comments (username, book_id, text_comment, vote_star) VALUES ('$username', '$book_id', '$text_comment', '$vote_star')";
        $insert_result = $this->db->insert($insert_query);
        return $insert_result;
    }
    public function show_comment(){
        $book_id = $_GET['book_id'];
        $select_query = "SELECT * FROM tbl_comments WHERE book_id='$book_id' ORDER BY book_id DESC ";
        $select_result = $this->db->select($select_query);
        return $select_result;
    }
    public function update_comment($text_comment, $vote_star, $username, $book_id){
        $query = "UPDATE tbl_comments SET text_comment='$text_comment', vote_star='$vote_star' WHERE username = '$username' AND book_id = '$book_id'";
        $result = $this ->db->update($query);
        return $result;
    }

}
?>