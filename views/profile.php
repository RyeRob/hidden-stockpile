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
                        <table id="top-owned" class="container">
      
                        </table>
                    </div>
                </div>
                <div class="col s6 m6 l6">
                    <div class="dash-list z-depth-2">
                        <h3>Top Watching</h3>
                        <table id="top-watched" class="container">
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="collection-tab" class="col s12 profile-tab">
        <h2>Collection</h2>
        <table id="collection-table" class="container profile-list z-depth-2">

        </table>
    </div>
    <div id="watchlist-tab" class="col s12 profile-tab">
        <h2>Watch List</h2>
        <table id="watchlist-table" class="container profile-list z-depth-2">

        </table>
    </div>
</div>

<?php include(WEB_ROOT . '/views/partials/footer.php'); ?>