<?php
// These are the scripts and functions I wrote to load the cards and sets into an SQL database.
// These should never be run ever again.

// overrides
ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');

// unpacking the json
// $json = file_get_contents("AllSets.json");
// $sets = json_decode($json);
// $json = file_get_contents("AllCards.json");
// $cards = json_decode($json);

// connect to DB
require_once('../includes/Classes/database.php');
$dbcon = Database::getDb();

$sqls = "SELECT * FROM sets WHERE code = 'RNA'";
$pst = $dbcon->prepare($sqls);
$pst->execute();
$set = $pst->fetch(PDO::FETCH_OBJ);

var_dump($set);

// add all sets
// foreach($sets as $s) {
//     $sql = "INSERT INTO sets (name, code, isonlineonly) VALUES (:name, :code, :isonlineonly) ";

//     $pst = $dbcon->prepare($sql);

//     $pst->bindParam(':name',$s->name);
//     $pst->bindParam(':code',$s->code);

//     $bool = 0;
//     if($s->isOnlineOnly) {
//         $bool = 1;
//     }
//     $pst->bindParam(':isonlineonly',$bool);
    
//     $count = $pst->execute();

//     if($count) {
//         echo $s->name . ' ('.$s->code.') has been added.<br>';
//     } else {
//         echo "There was an error<br>";
//     }
// }

// add all cards
// foreach($cards as $c) {
//     $sql = "INSERT INTO cards (name, isreserved, scryfall_id) VALUES (:name, :isreserved, :scryfall_id) ";

//     $pst = $dbcon->prepare($sql);

//     $pst->bindParam(':name',$c->name);
    
//     $bool = 0;
//     if(isset($c->isReserved)) {
//         $bool = 1;
//     }
//     $pst->bindParam(':isreserved',$bool);
//     $pst->bindParam(':scryfall_id',$c->scryfallOracleId);

//     $count = $pst->execute();

//     if($count) {
//         echo $c->name . 'has been added successfully<br><br>';
//     } else {
//         echo 'There was an error with '.$c->name.'<br><br>';
//     }
// }

//add all cards to sets
// foreach($cards as $c) {
//     $counter = 0;
//     foreach($c->printings as $set) {
//         $sqls = "SELECT * FROM sets WHERE code = :code ";
//         $pst = $dbcon->prepare($sqls);
//         $pst->bindParam(':code',$set);
//         $pst->execute();
//         $set = $pst->fetch(PDO::FETCH_OBJ);

//         $sqlc = "SELECT * FROM cards WHERE name = :name ";
//         $pst = $dbcon->prepare($sqlc);
//         $pst->bindParam(':name',$c->name);
//         $pst->execute();
//         $card = $pst->fetch(PDO::FETCH_OBJ);

//         if($set->id != null) {
//             $sqli = "INSERT INTO cards_sets (card_id, set_id) VALUES (:card_id, :set_id) ";
//             $pdostm = $dbcon->prepare($sqli);
//             $pdostm->bindParam(':card_id',$card->id);
//             $pdostm->bindParam(':set_id',$set->id);
//             $count = $pdostm->execute();
            
//             if($count) {
//                 echo $card->name." (".$card->id.") is in ".$set->name." (".$set->id.")<br>";
//             } else {
//                 echo 'There was an error of some sort with '.$c->name.' ('.$card->id.') in '.$set->name.'<br>';
//             }
//         } else {
//             echo $c->name.' ('.$card->id.') was not added because '.$set->name.' returned null<br>';
//         }



//         // echo '<pre>';
//         // print_r($card);
//         // echo '</pre>';

//         // echo '<pre>';
//         // print_r($set);
//         // echo '</pre>';

//     }
// }