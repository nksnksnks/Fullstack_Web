<?php
include "class/sell_class.php";
$sell = new books_sell;
$book_sell_id = $_GET['book_sell_id'];
$update_status = $sell -> update_status($book_sell_id);
?> 
