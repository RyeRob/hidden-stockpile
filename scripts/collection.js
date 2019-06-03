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

$(document).ready(function() {
  //const root = "http://localhost/";

  $("#collection-tab").on("submit", "#addWatch", function(e) {
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
      }
    );
  });

  $("#collection-tab").on("submit", "#removeWatch", function(e) {
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
      }
    );
  });
});
