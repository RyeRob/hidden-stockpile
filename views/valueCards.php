<?php
define('WEB_ROOT', $_SERVER['DOCUMENT_ROOT']);
include(WEB_ROOT . '/views/partials/header.php');
include(WEB_ROOT . '/views/partials/menu.php');
?>

<div id="cardCardsArea">
</div>

<div class="wrap" id="enterCardsForms">
    <h1>Enter Cards</h1>
    <form action="#" method="post" id="cardFieldForm" name="cardFieldForm">
        <div id="formDiv">
        <div class="formRow0">
            <input type="text" id="cardName0" name="cardName0" class="autocomplete" />
            
            <div class="input-field  col s12 set-dropdown">
                <select id="cardSet0">
                    <option value="" disabled selected>---</option>
                </select>
                <label>Card Set</label>        
            </div>
            <input type="number" id="cardNum0" name="cardNum0" />
            <div id="foil-container">
                <label for="foil-box">
                    <input type="checkbox" name="foil" class="foil-box" id="foil-box0" />
                    <span id="foil-label">Foil</span>
                </label>
            </div>
            <button type="button" class="addCardBtn btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">+</i></button>
        </div>
        </div>
        <button type="submit" name="submitCardsBtn" class="btn waves-effect waves-light" id="submitCardsBtn">Submit</button>
    </form>
</div>
<?php include(WEB_ROOT . '/views/partials/footer.php'); ?>