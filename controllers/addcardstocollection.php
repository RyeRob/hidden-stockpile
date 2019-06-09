<?php

define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include(WEB_ROOT.'/includes/Classes/database.php');
include(WEB_ROOT.'/includes/functions.php');
include(WEB_ROOT.'/includes/Classes/collection.php');

session_start();

$db = Database::getDb();

$user_id = $_SESSION['id'];
$name = $_POST['name'];
$set = $_POST['set'];
$quantity = (int) $_POST['quantity'];
$price = $_POST['price'];

$col = new Collection;

$count = $col->addCards($name, $set, $quantity, 0, $price, 0, $user_id);

if($count) {
    return true;
} else {
    return false;
}