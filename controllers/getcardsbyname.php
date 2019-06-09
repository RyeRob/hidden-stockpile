<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include(WEB_ROOT.'/includes/Classes/database.php');

$db = Database::getDb();

$str = '%'.$_POST['card'].'%';

$sql = "SELECT name FROM cards WHERE name LIKE :str ";
$pst = $db->prepare($sql);
$pst->bindParam(':str',$str);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);

// $cards = json_encode($data);
$cards = array();

foreach($data as $d) {
    $cards[$d->name] = null;
}

$cards = json_encode($cards);

echo $cards;
