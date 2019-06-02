<?php

class Collection
{

    private $db;
    public function __construct()
    {
        $this->db = Database::getDb();
    }

    //add cards
    public function addCards($name, $set, $quantity, $foil, $price, $user_id)
    {
        $query = "INSERT INTO card_collection (name, set, quantity, foil, price, user_id)
        VALUES (:name, :set, :quantity, :foil, :price, :user_id)";

        $pst = $this->db->prepare($query);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':set', $set);
        $pst->bindParam(':quantity', $quantity);
        $pst->bindParam(':foil', $foil);
        $pst->bindParam(':price', $price);
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
    public function updatePrice($price)
    {
        $query= "UPDATE card_collection SET price = :price";

        $pst = $this->db->prepare($query);
        $pst->bindParam(':price', $price);

        return $pst->execute();
    }
}
