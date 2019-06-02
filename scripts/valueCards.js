$(document).ready(function() {
  let i = 1;
  //ADD
  $(".addCardBtn").click(function() {
    i++;
    $("#formRow").append(
      `<div id="formRow` +
        i +
        `">
        <input type="text" id="cardName" name="cardName" />
        <div class="input-field col s12 set-dropdown">
            <select>
                <option value="" disabled selected>Choose Set</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        
        </div>
        <input type="number" id="cardNum" name="cardNum" />
        <div id="foil-container">
            <label for="foil-box ` +
        i +
        `">
                <input type="checkbox" name="foil" class="foil-box" id="foil-box ` +
        i +
        `" />
                <span id="foil-label">Foil</span>
            </label>
        </div>    
    <button type="button" id="` +
        i +
        `" class="deleteCardBtn btn-floating btn-small waves-effect waves-light red">
    <i class="fas fa-trash-alt"></i></button>
</div>`
    );
    // initialize dropdown menu
    $("select").formSelect();
    //DELETE
    $(".deleteCardBtn").click(function() {
      let buttonId = $(this).attr("id");
      $("#formRow" + buttonId).remove();
    });
  });
      // initialize dropdown menu
      $("select").formSelect();
});
