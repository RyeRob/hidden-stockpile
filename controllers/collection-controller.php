<?php
require_once "../includes/Classes/collection.php";
require_once "../includes/Classes/database.php";



//$userId = $_SESSION['id'];
//echo $userId;
$c = new Collection();

if (isset($_POST['watchAddBtn'])) {
    $id = $_POST['id'];
    $updateWatchList = $c->updateWatchList($id, true);
}
if (isset($_POST['watchRemoveBtn'])) {
    $id = $_POST['id'];
    $updateWatchList = $c->updateWatchList($id, false);
}
