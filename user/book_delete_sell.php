<?php
include "user_class/book_user_class.php";
$book = new bookss;
$book_sell_id = $_GET['book_sell_id'];
$delete_book = $book -> delete_book_sell($book_sell_id);
?>
