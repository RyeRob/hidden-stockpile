<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include(WEB_ROOT.'/includes/Classes/database.php');
include(WEB_ROOT.'/includes/functions.php');

session_start();

$db = Database::getDb();

$name = $_POST['name'];
$set = $_POST['set'];
$quantity = (int) $_POST['quantity'];

$sf = new Scryfall;
$cs = new Cards_Sets;

$data = $sf->getAllPrintedVersionsofCards($name);

// retrieve printing id and pass it into form below
$nameid = $cs->getCardId($name,$db);
$setid = $cs->getSetId($set,$db);
$printingid = $cs->getCardSetId($nameid[0]->id,$setid[0]->id,$db);

$card = '';

foreach($data->data as $p) {
    if(isset($p->set_name)) {
        if($p->set_name == $set) { 
            if(isset($_SESSION['id'])){
                $addform = '
                <form id="addMyCard" action="#" method="post">
                <input type="hidden" id="myPrintingId" value="'.$printingid[0]->id.'" />
                <input type="hidden" id="myCardName" value="'.$name.'" />
                <input type="hidden" id="myCardSet" value="'.$set.'" />
                <input type="hidden" id="myCardQuantity" value="'.$quantity.'" />
                <input type="hidden" id="myCardPrice" value="'.$p->prices->usd.'"/>
                <button class="btn waves-effect waves-light blue" type="submit">Add To Your Collection</button>
                </form>';
            } else {
                $addform = "";
            }

            $card .= '
            <div class="col s12 m7">
                <div class="card horizontal">
                <div class="card-image">
                    <img src="'.$p->image_uris->small.'">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                    <span class="card-title">'.$p->name.'</span>
                    <p>'.$p->set_name.' || $<span class="cardprice">'.$p->prices->usd.'</span></p>
                    <p>You own <span class="cardquantity">'.$quantity.'</span> copies of this card.</p>
                    </div>
                    <div class="card-action">'.
                    $addform
                    .'</div>
                </div>
                </div>
            </div>
            ';

            echo $card;
        }
    }

}