$(document).ready(function() {
  let i = 1;
  //ADD
  $(".addCardBtn").click(function() {
    i++;
    $("#formRow").append(
      `<div id="formRow` +
        i +
        `"> <input type="text" id="cardName" name="cardName" />
    <select id="cardSet" name="cardSet" autocomplete="off">
        <option value="a" selected>A</option>
        <option value="b">B</option>
        <option value="c">C</option>
    </select>
    <input type="number" id="cardNum" name="cardNum" />
    <button type="button" id="` +
    i +
    `" class="deleteCardBtn btn-floating btn-small waves-effect waves-light red">
    <i class="fas fa-trash-alt"></i></button>
</div>`
    );
    //DELETE
    $(".deleteCardBtn").click(function() {
      let buttonId = $(this).attr("id");
      $("#formRow" + buttonId).remove();
    });
  });
    // initialize dropdown menu
    $('select').formSelect();
});
