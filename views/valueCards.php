<?php
define('WEB_ROOT', $_SERVER['DOCUMENT_ROOT']);
include(WEB_ROOT . '/views/partials/header.php');
include(WEB_ROOT . '/views/partials/menu.php');
?>

<div class="wrap" id="enterCardsForms">
    <h1>Enter Cards</h1>
    <form action="" method="post" id="cardFieldForm" name="cardFieldForm">
        <div id="formRow">
            <input type="text" id="cardName" name="cardName"  />
            <select id="cardSet" name="cardSet" autocomplete="off">
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
            </select>
            <input type="number" id="cardNum" name="cardNum" />
            <button type="button" class="addCardBtn btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">+</i></button>
        </div>
        <button type="submit" name="submitCardsBtn" class="btn waves-effect waves-light" id="submitCardsBtn">Submit</button>
    </form>
</div>

<?php include(WEB_ROOT . '/views/partials/footer.php'); ?>