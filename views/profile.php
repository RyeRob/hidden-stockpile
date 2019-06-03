<?php
define('WEB_ROOT', $_SERVER['DOCUMENT_ROOT']);
include(WEB_ROOT . '/views/partials/header.php');
include(WEB_ROOT . '/views/partials/menu.php');
require_once "../includes/Classes/collection.php";
require_once "../includes/Classes/database.php";
?>
<div class="row wrap">
    <div class="col s12">
        <ul class="tabs z-depth-2 tabs-fixed-width">
            <li class="tab col s3"><a class="active" href="#dashboard-tab">Dashboard</a></li>
            <li class="tab col s3"><a href="#collection-tab">Collection</a></li>
            <li class="tab col s3"><a href="#watchlist-tab">Watch List</a></li>
        </ul>
    </div>
    <div id="dashboard-tab" class="col s12 profile-tab">
        <div class="container">
            <h2>Dashboard</h2>
            <div class="row">
                <div class="col s6 m6 l6">
                    <div class="dash-list z-depth-2">
                        <h3>Top Owned</h3>
                        <table class="container">
                            <thead>
                                <tr>
                                    <th>Card Name</th>
                                    <th>Change</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php //foreach loop
                                echo
                                    '<tr>
                                        <td>Hidden Stockpile</td>
                                        <td>$0.50</td>
                                    </tr>'
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col s6 m6 l6">
                    <div class="dash-list z-depth-2">
                        <h3>Top Watching</h3>
                        <table class="container">
                            <thead>
                                <tr>
                                    <th>Card Name</th>
                                    <th>Change</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php //foreach loop
                                echo
                                    '<tr>
                                        <td>Hidden Stockpile</td>
                                        <td>$0.50</td>
                                    </tr>'
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="collection-tab" class="col s12 profile-tab">
        <h2>Collection</h2>
        <table class="container profile-list z-depth-2">
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
            <tbody>
                <?php //foreach loop
                $userId = $_SESSION['id'];
                //echo $userId;
                $c = new Collection();
                $collection = $c->listCards($userId);

                foreach ($collection as $card) {

                    if ($card->foil == true) $card->foil = 'Yes';

                    $id = $card->id;
                    //Change watchlist button
                    if ($card->watch_list == true) {
                        $watchBtn = "<form action='../controllers/collection-controller.php' method='POST'>
                        <input type='hidden' name='id' value='$id' />
                        <button type='submit' name='watchRemoveBtn' class='watchRemoveBtn'>REMOVE</button>
                        </form>";
                    } else {
                        $watchBtn = "<form action='../controllers/collection-controller.php' method='POST'>
                        <input type='hidden' name='id' value='$id' />
                        <button type='submit' name='watchAddBtn' class='watchAddBtn'>ADD</button>
                        </form>";
                    }


                    echo "<tr>
                           <td>$id</td>
                           <td>$card->set</td>
                           <td>$card->quantity</td>
                           <td>$card->foil</td>
                           <td>" . "$" . "$card->price</td>
                           <td>" . $watchBtn . "</td>
                           </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div id="watchlist-tab" class="col s12 profile-tab">
        <h2>Watch List</h2>
        <table class="container profile-list z-depth-2">
            <thead>
                <tr>
                    <th>Card Name</th>
                    <th>Set</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php //foreach loop

                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include(WEB_ROOT . '/views/partials/footer.php'); ?>