<?php
// creating a class to handle calls to our localhost database containing card and set data
class Cards_Sets {

    public function getCardId($name,$db) {
        $sql = 'SELECT id FROM cards WHERE name = :name ';
        $pst = $db->prepare($sql);
        $pst->bindParam(':name',$name);
        $pst->execute();

        return $pst->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getSetId($set,$db) {
        $sql = 'SELECT id FROM sets WHERE name = :name ';
        $pst = $db->prepare($sql);
        $pst->bindParam(':name',$set);
        $pst->execute();

        return $pst->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getCardSetId($cardid,$setid,$db) {
        $sql = 'SELECT id FROM cards_sets WHERE card_id = :card_id AND set_id = :set_id ';
        $pst = $db->prepare($sql);
        $pst->bindParam(':card_id',$cardid);
        $pst->bindParam(':set_id',$setid);
        $pst->execute();

        return $pst->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getCardIdandSetId($cardsetid,$db) {
        $sql = 'SELECT card_id, set_id FROM cards_sets WHERE id = :id ';
        $pst = $db->prepare($sql);
        $pst->bindParam(':id',$cardsetid);
        $pst->execute();

        return $pst->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getCardName($cardid,$db) {
        $sql = 'SELECT name FROM cards WHERE id = :id ';
        $pst = $db->prepare($sql);
        $pst->bindParam(':id',$cardid);
        $pst->execute();

        return $pst->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getSetName($setid,$db) {
        $sql = 'SELECT name FROM sets WHERE id = :id ';
        $pst = $db->prepare($sql);
        $pst->bindParam(':id',$setid);
        $pst->execute();

        return $pst->fetchAll(\PDO::FETCH_OBJ);
    }
}