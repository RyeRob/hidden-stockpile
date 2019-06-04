<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include(WEB_ROOT.'/includes/Classes/database.php');
include(WEB_ROOT.'/includes/functions.php');

$db = Database::getDb();

// get card id
$sql = "SELECT id FROM cards WHERE name = :name ";
$pst = $db->prepare($sql);
$pst->bindParam(':name',$_POST['card']);
$pst->execute();
$cdata = $pst->fetchAll(PDO::FETCH_OBJ);

//get set info
$sqls = "SELECT cards_sets.id, sets.name, sets.code 
        FROM cards_sets 
            INNER JOIN sets 
                ON sets.id = cards_sets.set_id
            INNER JOIN cards
                ON cards.id = cards_sets.card_id
            WHERE cards_sets.card_id = :id ";
$pdost = $db->prepare($sqls);
$pdost->bindParam(':id',$cdata[0]->id);
$pdost->execute();
$sdata = $pdost->fetchAll(PDO::FETCH_OBJ);

$rows = '<option value="" disabled selected>Select Set</option>';

foreach($sdata as $s) {
    $rows .= '<option value="'.$s->id.'">'.$s->name.'</option>';
}

echo $rows;