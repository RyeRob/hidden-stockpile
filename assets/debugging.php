<?php
session_write_close();
session_start();
require_once "../includes/Classes/collection.php";
require_once "../includes/Classes/database.php";
require_once '../includes/functions.php';

$db = Database::getDb();
$c = new Collection;
$cs = new Cards_Sets;

$userId = $_SESSION['id'];

$list = $c->topList($userId);

echo "
<thead>
<tr>
    <th>Card Name</th>
    <th>Price</th>
</tr>
</thead>
<tbody>";
foreach ($list as $card) {
    $id = $card->card_set_id;
    $cardsetids = $cs->getCardIdandSetId($id,$db);

    $cardname = $cs->getCardName($cardsetids[0]->card_id,$db);
    $cname = $cardname[0]->name;

    echo "         
            <tr>
                <td>$cname</td>
                <td>" . "$" . "$card->price</td>
        
            </tr>";
}
echo "</tbody>";