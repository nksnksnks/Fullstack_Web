<?php
include "class/book_class.php";
$book = new books;
$book_id = $_GET['book_id'];
$delete_book = $book -> delete_book($book_id);
?>
