<?php
session_write_close();
session_start();
require_once "../includes/Classes/collection.php";
require_once "../includes/Classes/database.php";

$c = new Collection();

if (isset($_POST['flag']) && ($_SESSION['id'])) {

    $userId = $_SESSION['id'];
    $flag = $_POST['flag'];
    //Update Watch List
    if ($flag == "add") {
        $id = $_POST['id'];
        $updateWatchList = $c->updateWatchList($id, true);
    }
    if ($flag == "remove") {
        $id = $_POST['id'];
        $updateWatchList = $c->updateWatchList($id, false);
    }

     //Delete card from Collection
     if ($flag == "delete") {
        $id = $_POST['id'];
        $deleteCard = $c->deleteCard($id);
    }
    
    //Print list after changes are made
    if ($flag == "refresh") {

        $collection = $c->listCards($userId);

        echo "
        <thead>
            <tr>
                <th>Card Name</th>
                <th>Set</th>
                <th>Quantity</th>
                <th>Foil</th>
                <th>Price</th>
                <th>Watch List</th>
            </tr>
        </thead>
    <tbody>";

        foreach ($collection as $card) {
            if ($card->foil == true) $card->foil = 'Yes';
            //Change watchlist button
            $id = $card->id;
            if ($card->watch_list == true) {
                $watchBtn = "<form method='POST' id='removeWatch'>
                        <input type='hidden' name='id' value='$id' />
                        <button type='submit' name='watchRemoveBtn' class='watchRemoveBtn'>REMOVE</button>
                        </form>";
            } else {
                $watchBtn = "<form method='POST' id='addWatch'>
                        <input type='hidden' name='id' value='$id' />
                        <button type='submit' name='watchAddBtn' class='watchAddBtn'>ADD</button>
                        </form>";
            }

            echo "
                    <tr>
                    <td>$card->name</td>
                    <td>$card->set</td>
                    <td>$card->quantity</td>
                    <td>$card->foil</td>
                    <td>" . "$" . "$card->price</td>
                    <td>" . $watchBtn . "</td>
                    <td> 
                        <form method='POST' id='deleteCard'>
                            <input type='hidden' name='id' value='$id' />
                            <button type='submit' class='watchRemoveBtn'>X</button>
                        </form>
                    </td>
                    </tr>";
        }
        echo "</tbody>";
    }
    if ($flag == "removeWatchList") {
        $id = $_POST['id'];
        $updateWatchList = $c->updateWatchList($id, false);
    }
    //Lists cards in watchlist if watch_list == true
    if ($flag == "watchlist") {

        $watchlist = $c->listCards($userId);

        echo "
    <thead>
        <tr>
            <th>Card Name</th>
            <th>Set</th>
            <th>Quantity</th>
            <th>Foil</th>
            <th>Price</th>
        </tr>
    </thead>
<tbody>";
        foreach ($watchlist as $card) {
            $id = $card->id;
            $deleteBtn = "<form method='POST' id='removeWatchList'>
            <input type='hidden' name='id' value='$id' />
            <button type='submit' class='watchRemoveBtn'>REMOVE</button>
            </form>";

            if ($card->watch_list == true) {
                echo "         
                    <tr>
                        <td>$card->name</td>
                        <td>$card->set</td>
                        <td>$card->quantity</td>
                        <td>$card->foil</td>
                        <td>" . "$" . "$card->price</td>
                        <td>$deleteBtn</td>
                
                    </tr>";
            }
        }
        echo "</tbody>";
    }
}
