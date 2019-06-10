<?php
session_start();
define('WEB_ROOT', $_SERVER['DOCUMENT_ROOT']);
include(WEB_ROOT . '/includes/Classes/database.php');
include(WEB_ROOT . '/includes/functions.php');
include(WEB_ROOT . '/includes/Classes/collection.php');



$db = Database::getDb();

$user_id = $_SESSION['id'];
$name = $_POST['name'];
$set = $_POST['set'];
$quantity = (int)$_POST['quantity'];
$price = $_POST['price'];

// $sql = "INSERT INTO card_collection (name, set, quantity, foil, price, watch_list, user_id) 
//     VALUES (:name, :set, :quantity, 0, :price, 0, :user_id) ";
// $pst = $db->prepare($sql);
// $pst->bindParam(':name',$name);
// $pst->bindParam(':set',$set);
// $pst->bindParam(':quantity',$quantity);
// $pst->bindParam(':price',$price);
// $pst->bindParam(':user_id',$user_id);
// $count = $pst->execute();


if ($count) {
    return true;
} else {
    return false;
}
