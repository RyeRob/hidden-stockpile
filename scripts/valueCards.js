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
        <input type="text" id="cardName`+i+`" name="cardName`+i+`" class="autocomplete validate" required="" aria-required="true" />
        <div class="input-field col s12 set-dropdown">
            <select id="cardSet`+i+`" required="" aria-required="true">
                <option value="" disabled selected>---</option>
            </select>
        </div>
        <input type="number" id="cardNum`+i+`" name="cardNum`+i+`" value="1" class="validate" required="" aria-required="true" />
        <div id="foil-container">
            <label for="foil-box `+i+`">
                <input type="checkbox" name="foil" class="foil-box" id="foil-box`+i+`" disabled />
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

  // add cards to collection function
  function addCardstoCollection(e) {
    e.preventDefault();

    let cardsetid = this[0].value;
    let name = this[1].value;
    let set = this[2].value;
    let quantity = this[3].value;
    let price = this[4].value;

    console.log(cardsetid);
    console.log(name);
    console.log(set);
    console.log(quantity);
    console.log(price);
    

    $.ajax({
      type: 'POST',
      url: '../controllers/addcardstocollection.php',
      data: { cardsetid: cardsetid, name: name, set: set, quantity: quantity, price: price },
      success: function(msg) {
        console.log(msg);
        M.toast({html: 'Added cards to your collection!'})
      }
    });
  }

  // $('#addMyCard'+i).on('submit',function(e){

  // });

  function makeSummaryCard() {
    $("#cardsSummary").addClass("card");

    let cardval = document.getElementsByClassName("cardprice");
    let cardquant = document.getElementsByClassName("cardquantity");

    console.log(cardval.length);
    console.log(cardquant.length);

    var sum = 0;
    var quant = 0;

    for (let x = 0; x < cardval.length; x++) {
      let s = cardval[x].innerHTML;
      console.log('jio');
      sum = sum + s.toFixed(2);
    }

    for (let y = 0; y < cardquant.length; y++) {
      let s = parseInt(cardquant[y].innerHTML);
      console.log('asdasd');
      quant = quant + s;
    }

    // console.log(sum);
    // console.log(quant);

    $("#cardsSummary").html(`
      <div class="card-content">
        <p>You have <span id="countcards"></span> cards worth approximately $<span id="sumval"></span>.
      </div>
    `);

    $('#countcards').html(quant);
    $('#sumval').html(sum);

  }

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
          document.getElementById('myPrintingId').setAttribute('id','myPrintingId'+i);
          document.getElementById('myCardName').setAttribute('id','myCardName'+i);
          document.getElementById('myCardSet').setAttribute('id','myCardSet'+i);
          document.getElementById('myCardQuantity').setAttribute('id','myCardQuantity'+i);
          document.getElementById('myCardPrice').setAttribute('id','myCardPrice'+i);
          
          let pricedcards = document.querySelectorAll('*[id^="addMyCard"]');
          console.log('# of priced cards: '+pricedcards.length);
          for(let i = 0; i < pricedcards.length; i++) {
            document.querySelector("#addMyCard"+i).addEventListener('submit',addCardstoCollection);
          }
        }
      });
      
    }

    // makeSummaryCard();

  });

});
