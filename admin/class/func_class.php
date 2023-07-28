<?php
require_once "../admin/database.php";
?>
<?php
class func{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function search($keyword) {
        $keywords = explode(' ', $keyword); // Tách các từ khóa thành một mảng
    
        $query = "SELECT * FROM tbl_book WHERE ";
        $conditions = array();
    
        foreach ($keywords as $kw) {
            $conditions[] = "book_name LIKE '%$kw%'";
        }
    
        $query .= implode(' AND ', $conditions);
    
        $result = $this->db->select($query);
        return $result;
    }
}
?>