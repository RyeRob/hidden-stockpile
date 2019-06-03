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


    //Print list after changes are made
    if ($flag == "refresh") {


        $c = new Collection();
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
                    <td>$id</td>
                    <td>$card->set</td>
                    <td>$card->quantity</td>
                    <td>$card->foil</td>
                    <td>" . "$" . "$card->price</td>
                    <td>" . $watchBtn . "</td>
                    </tr>";
        }
        echo "</tbody>";
    }
}
