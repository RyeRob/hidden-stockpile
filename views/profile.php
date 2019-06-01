<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include( WEB_ROOT.'/views/partials/header.php' );
include( WEB_ROOT.'/views/partials/menu.php' );
?>
<div class='wrap'>
<div class="row">
    <div class="col s12">
        <ul class="tabs tabs-fixed-width">
            <li class="tab col s3"><a class="active" href="#dashboard-tab">Dashboard</a></li>
            <li class="tab col s3"><a href="#collection-tab">Collection</a></li>
            <li class="tab col s3"><a href="#watchlist-tab">Watch List</a></li>
        </ul>
    </div>
    <div id="dashboard-tab" class="col s12 profile-tab">

    </div>
    <div id="collection-tab" class="col s12 profile-tab">
        <h2>Collection of Cards</h2>
        <table class="list-wrap">
            <thead>
            <tr>
                <th>Card Name</th>
                <th>Set</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
                <?php //foreach loop
                    echo 
                    '<tr>
                        <td>Hidden Stockpile</td>
                        <td>Aether Revolt</td>
                        <td>$0.50</td>
                    </tr>'
                ?>
            </tbody>
        </table>
    </div>
    <div id="watchlist-tab" class="col s12 profile-tab">
    <h2>Watchlist</h2>
        <table class="list-wrap">
            <thead>
            <tr>
                <th>Name</th>
                <th>Item Name</th>
                <th>Item Price</th>
            </tr>
            </thead>
            <tbody>
                <?php //foreach loop
                    echo 
                    '<tr>
                        <td>Hidden Stockpile</td>
                        <td>Aether Revolt</td>
                        <td>$0.50</td>
                    </tr>'
                ?>
            </tbody>
        </table>
    </div>
    </div> 
</div>


<?php include( WEB_ROOT.'/views/partials/footer.php' ); ?>