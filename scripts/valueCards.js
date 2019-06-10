$(document).ready(function() {

  // Ajax call to find sets of cards, beginning with additional function def and event listeners
  function getSets() {
    let here = this.id;
    let n = here.replace(/[^0-9]/g,'');
    let dropdown = document.getElementById('cardSet' + n);
    $.ajax({
      type: "POST",
      url: "../controllers/getcardsetsforform.php",
      data: { card: this.value },
      success: function(data) {
        dropdown.innerHTML = data;
        $("select").formSelect();
      }
    });
  }

  $('input[id^="cardName"]').on("change", getSets);


  // form functionality
  let i = 0;
  //ADD
  $(".addCardBtn").click(function() {
    i++;
    $("#formDiv").append(
      `<div class="formRow`+i+`">
        <input type="text" id="cardName`+i+`" name="cardName`+i+`" class="autocomplete" />
        <div class="input-field col s12 set-dropdown">
            <select id="cardSet`+i+`">
                <option value="" disabled selected>---</option>
            </select>
        </div>
        <input type="number" id="cardNum`+i+`" name="cardNum`+i+`" />
        <div id="foil-container">
            <label for="foil-box `+i+`">
                <input type="checkbox" name="foil" class="foil-box" id="foil-box`+i+`" />
                <span id="foil-label">Foil</span>
            </label>
        </div>    
        <button type="button" id="`+i+`" class="deleteCardBtn btn-floating btn-small waves-effect waves-light red">
        <i class="fas fa-trash-alt"></i></button>
        </div>`
    );

    // initialize dropdown menu
    $("select").formSelect();

    // re-add event listeners
    $('input[id^="cardName"]').on("change", getSets);

    //DELETE
    $(".deleteCardBtn").click(function() {
      let buttonId = $(this).attr("id");
      $(".formRow" + buttonId).remove();
    });
  });

  
  // initialize dropdown menu 
  $("select").formSelect();

  // Ajax call to search for a card name INCOMPLETE
  $('input[id^="cardName"]').on("keyup", function() {
    if(this.value.length <= 1) {
      return;
    }

    if(this.value.length > 1) {
      $.ajax({
        type: "POST",
        url: "../controllers/getcardsbyname.php",
        data: { card: this.value },
        success: function(data) {


        }
      });
    }
  });

  // fetch card prices and display them as placards
  $('#cardFieldForm').on('submit',function(e){
    e.preventDefault();

    let cards = document.getElementById("cardCardsArea");
    cards.innerHTML = "";

    let divs = document.getElementById("formDiv").getElementsByTagName('div');

    for(let i = 0; i < divs.length/4; i++) {
      let name = document.getElementById('cardName'+i).value;
      let set = document.getElementsByClassName('selected')[i].innerHTML;
      set = set.replace('<span>','');
      set = set.replace('</span>','');
      let quantity = document.getElementById('cardNum'+i).value;
      // let isfoil = document.getElementById('foil-box'+i).selected;

      // console.log(name);
      // console.log(set);
      // console.log(quantity);
      
      $.ajax({
        type: 'POST',
        url: "../controllers/getcardvalues.php",
        data: { name: name, set: set, quantity: quantity },
        success: function(card) {
          cards.innerHTML += card;
          document.getElementById('addMyCard').setAttribute('id','addMyCard'+i);
          document.getElementById('myCardName').setAttribute('id','myCardName'+i);
          document.getElementById('myCardSet').setAttribute('id','myCardSet'+i);
          document.getElementById('myCardQuantity').setAttribute('id','myCardQuantity'+i);
          document.getElementById('myCardPrice').setAttribute('id','myCardPrice'+i);
          $('#addMyCard'+i).on('submit',function(e){
            e.preventDefault();

            let name = this[0].value;
            let set = this[1].value;
            let quantity = this[2].value;
            let price = this[3].value;

            console.log(name);
            console.log(set);
            console.log(quantity);
            console.log(price);
            

            $.ajax({
              type: 'POST',
              url: '../controllers/addcardstocollection.php',
              data: { name: name, set: set, quantity: quantity, price: price },
              success: function(msg) {
                console.log(msg);
                M.toast({html: 'Added cards to your collection!'})
              }
            });
          });
        }
      });
      
    }

  });



});
