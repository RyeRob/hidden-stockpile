function listCollection() {
  $.post(
    "../controllers/collection-controller.php",
    {
      flag: "refresh"
    },
    function(r) {
      $("#collection-table").html(r);
    }
  );
}
listCollection();

function watchListCollection() {
  $.post(
    "../controllers/collection-controller.php",
    {
      flag: "watchlist"
    },
    function(r) {
      $("#watchlist-table").html(r);
    }
  );
}
watchListCollection();

$(document).ready(function() {
  $("#collection-table").on("submit", "#addWatch", function(e) {
    e.preventDefault();
    let id = $(this)
      .find("input[name='id']")
      .val();
    $.post(
      "../controllers/collection-controller.php",
      {
        id: id,
        flag: "add"
      },
      function(result) {
        $("#error").html(result);
        listCollection();
        watchListCollection();
      }
    );
  });

  $("#collection-table").on("submit", "#removeWatch", function(e) {
    e.preventDefault();
    let id = $(this)
      .find("input[name='id']")
      .val();
    $.post(
      "../controllers/collection-controller.php",
      {
        id: id,
        flag: "remove"
      },
      function(result) {
        $("#error").html(result);
        listCollection();
        watchListCollection();
      }
    );
  });

  $("#collection-table").on("submit", "#deleteCard", function(e) {
    e.preventDefault();
    let id = $(this)
      .find("input[name='id']")
      .val();
    $.post(
      "../controllers/collection-controller.php",
      {
        id: id,
        flag: "delete"
      },
      function(result) {
        $("#error").html(result);
        listCollection();
        watchListCollection();
      }
    );
  });

  $("#watchlist-table").on("submit", "#removeWatchList", function(e) {
    e.preventDefault();
    let id = $(this)
      .find("input[name='id']")
      .val();
    //alert(id);
    $.post(
      "../controllers/collection-controller.php",
      {
        id: id,
        flag: "removeWatchList"
      },
      function(result) {
        $("#error").html(result);
        listCollection();
        watchListCollection();
      }
    );
  });
});
