<?php
include "class/sell_class.php";
?>
<?php
    $books_sell = new books_sell; 
    $book_sell_id = $_GET['book_sell_id'];
    $quantity = $_GET['quantity'];
    $book_id = $_GET['book_id'];
    $complated = $books_sell -> complated($book_id, $quantity, $book_sell_id);
?> 
