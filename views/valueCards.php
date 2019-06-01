<?php
define('WEB_ROOT', $_SERVER['DOCUMENT_ROOT']);
include(WEB_ROOT . '/views/partials/header.php');
include(WEB_ROOT . '/views/partials/menu.php');
?>

<div class="wrap" id="enterCardsForms">
    <h1>Enter Cards</h1>
    <form action="#" method="post" id="cardFieldForm" name="cardFieldForm">
        <div id="formRow">
            <input type="text" id="cardName" name="cardName"  />
            <div class="input-field">
                <select id="cardSet">
                    <option value="" disabled selected>Choose Set</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Card Set</label>
            </div>
            <input type="number" id="cardNum" name="cardNum" />
            <button type="button" class="addCardBtn btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">+</i></button>
        </div>
        <button type="submit" name="submitCardsBtn" class="btn waves-effect waves-light" id="submitCardsBtn">Submit</button>
    </form>
</div>
<?php include(WEB_ROOT . '/views/partials/footer.php'); ?>