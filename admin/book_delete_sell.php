<?php
include "class/sell_class.php";
$books_sell = new books_sell; 
$book_sell_id = $_GET['book_sell_id'];
$delete_book = $books_sell -> delete_book_sell($book_sell_id);
?>
