function listCollection() {
  $.post(
    "../controllers/collection-controller.php", {
      flag: "refresh"
    },
    function (r) {
      $("#collection-table").html(r);
    }
  );
}
listCollection();

function watchListCollection() {
  $.post(
    "../controllers/collection-controller.php", {
      flag: "watchlist"
    },
    function (r) {
      $("#watchlist-table").html(r);
    }
  );
}
watchListCollection();

function topOwned() {
  $.post(
    "../controllers/collection-controller.php", {
      flag: "topowned"
    },
    function (r) {
      $("#top-owned").html(r);
    }
  );
}
topOwned();

function topWatch() {
  $.post(
    "../controllers/collection-controller.php", {
      flag: "topwatch"
    },
    function (r) {
      $("#top-watched").html(r);
    }
  );
}
topWatch();

$(document).ready(function () {
  $("#collection-table").on("submit", "#addWatch", function (e) {
    e.preventDefault();
    let id = $(this)
      .find("input[name='id']")
      .val();
    // alert(id);
    $.post(
      "../controllers/collection-controller.php", {
        id: id,
        flag: "add"
      },
      function (result) {
        $("#error").html(result);
        listCollection();
        watchListCollection();
        topOwned();
        topWatch();
      }
    );
  });

  $("#collection-table").on("submit", "#removeWatch", function (e) {
    e.preventDefault();
    let id = $(this)
      .find("input[name='id']")
      .val();
    $.post(
      "../controllers/collection-controller.php", {
        id: id,
        flag: "remove"
      },
      function (result) {
        $("#error").html(result);
        listCollection();
        watchListCollection();
        topOwned();
        topWatch();
      }
    );
  });

  $("#collection-table").on("submit", "#deleteCard", function (e) {
    e.preventDefault();
    let id = $(this)
      .find("input[name='id']")
      .val();
    $.post(
      "../controllers/collection-controller.php", {
        id: id,
        flag: "delete"
      },
      function (result) {
        $("#error").html(result);
        listCollection();
        watchListCollection();
        topOwned();
        topWatch();
      }
    );
  });

  $("#watchlist-table").on("submit", "#removeWatchList", function (e) {
    e.preventDefault();
    let id = $(this)
      .find("input[name='id']")
      .val();
    //alert(id);
    $.post(
      "../controllers/collection-controller.php", {
        id: id,
        flag: "removeWatchList"
      },
      function (result) {
        $("#error").html(result);
        listCollection();
        watchListCollection();
        topOwned();
        topWatch();
      }
    );
  });
});