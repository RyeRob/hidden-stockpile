<?php

class Collection
{

    private $db;
    public function __construct()
    {
        $this->db = Database::getDb();
    }

    //add cards
    public function addCards($name, $set, $quantity, $foil, $price, $watchlist, $user_id)
    {
        $query = "INSERT INTO card_collection (name, set, quantity, foil, price, watch_list, user_id)
        VALUES (:name, :set, :quantity, :foil, :price, :watch_list, :user_id)";

        $pst = $this->db->prepare($query);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':set', $set);
        $pst->bindParam(':quantity', $quantity);
        $pst->bindParam(':foil', $foil);
        $pst->bindParam(':price', $price);
        $pst->bindParam(':watch_list', $watchlist);
        $pst->bindParam(':user_id', $user_id);
        
        return $pst->execute();
    }

    //list cards
    public function listCards($user_id)
    {
        $query = "SELECT * FROM card_collection WHERE user_id = :user_id";

        $pst = $this->db->prepare($query);
        $pst->bindParam(':user_id', $user_id);
        $pst->execute();

        return $pst->fetchAll(\PDO::FETCH_OBJ);
    }

    //delete  cards
    public function deleteCard($id)
    {
        $query = "DELETE FROM card_collection WHERE id = :id";

        $pst = $this->db->prepare($query);
        $pst->bindParam(':id', $id);

        return $pst->execute();

    }

    //update price of every card in this table
    //will set this to run on an interval and loop through each card
    public function updatePrice($id, $price)
    {
        $query= "UPDATE card_collection SET price = :price WHERE id = :id";

        $pst = $this->db->prepare($query);
        $pst->bindParam(':price', $price);
        $pst->bindParam(':id', $id);

        return $pst->execute();
    }

    //change watch list boolean
    //runs on button click event in collection.js
    public function updateWatchList($id, $watchlist)
    {
        $query= "UPDATE card_collection SET watch_list = :watch_list WHERE id = :id";

        $pst = $this->db->prepare($query);
        $pst->bindParam(':watch_list', $watchlist);
        $pst->bindParam(':id', $id);

        return $pst->execute();
    }
}
