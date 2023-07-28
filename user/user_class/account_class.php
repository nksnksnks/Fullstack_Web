<?php
//gọi file
require_once "../admin/database.php";
?>
<?php
class Account {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function insert_account(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];

        // Mã khóa mật khẩu
        // $password = md5($password);

        // Kiểm tra xem email hoặc username đã tồn tại chưa
        $check_query = "SELECT * FROM tbl_account WHERE username = '$username' OR email = '$email'";
        $check_result = $this->db->select($check_query);
        if ($check_result && $check_result->num_rows > 0) {
            $error_msg = "";
            while ($row = $check_result->fetch_assoc()) {
                if ($row['username'] == $username) {
                    $error_msg .= "Tên đăng nhập đã được sử dụng. ";
                }
                if ($row['email'] == $email) {
                    $error_msg .= "Email đã được sử dụng. ";
                }
            }
            return $error_msg;
        } else {
            // Nếu chưa tồn tại, thêm tài khoản mới vào cơ sở dữ liệu
            $insert_query = "INSERT INTO tbl_account (username, password, email, phone_number) VALUES ('$username', '$password', '$email', '$phone_number')";
            $insert_result = $this->db->insert($insert_query);
            if ($insert_result) {
                header('Location: login.php');
            } else {
                return "Đã xảy ra lỗi khi thêm tài khoản mới";
            }
        }
    }
    public function check_login($username, $password) {
        $query = "SELECT * FROM tbl_account WHERE username = '$username' AND password = '$password'";
        $result = $this->db->select($query);
        if ($result && $result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    public function show_account($username){
        // $query = "SELECT * FROM tbl_customer ORDER BY customer_id DESC";
        $query = "SELECT * FROM tbl_account ORDER BY username = '$username' DESC";
        $result = $this ->db->select($query);
        $row = $result->fetch_assoc();
        return $row;
    }
    public function update_account($email, $phone_number, $address, $username){
        $query = "UPDATE tbl_account 
        SET email = '$email', 
        phone_number = '$phone_number',
        address = '$address'
        WHERE username = '$username'";
        $result = $this ->db->update($query);
        // ob_start();
        // ob_end_clean();
        // header("Location: " . $_SERVER['PHP_SELF']);
        exit();
        return $result;
    }
    public function update_password($newpassword, $account_id){
        $query = "UPDATE tbl_account
        SET password = '$newpassword'  
        WHERE account_id = '$account_id'";
        $result = $this ->db->update($query);
        return $result;
    }
}
?>