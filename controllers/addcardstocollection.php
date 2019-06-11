<?php
session_start();
define('WEB_ROOT', $_SERVER['DOCUMENT_ROOT']);
include(WEB_ROOT . '/includes/Classes/database.php');
include(WEB_ROOT . '/includes/functions.php');
include(WEB_ROOT . '/includes/Classes/collection.php');



$db = Database::getDb();

$card_set_id = $_POST['cardsetid'];
$user_id = $_SESSION['id'];
$name = $_POST['name'];
$set = $_POST['set'];
$quantity = (int)$_POST['quantity'];
$price = $_POST['price'];


$sql = "INSERT INTO collections (user_id, card_set_id, quantity, isfoil, watch_list, price) VALUES (:user_id, :card_set_id, :quantity, 0, 0, :price) ";
$pst = $db->prepare($sql);
$pst->bindParam(':user_id',$user_id);
$pst->bindParam(':card_set_id',$card_set_id);
$pst->bindParam(':quantity',$quantity);
$pst->bindParam(':price',$price);
$count = $pst->execute();

return $count;
