  $(document).ready(function () {
    $(".box-post").slice(0, 5).show();
    if ($(".box-post").length == 0) {
        $("#loadMoreother").text("No Content").addClass("noContentfollowsomeone");
    }
    else if ($(".box-post").length <= 5) {
        $("#loadMoreother").text("").addClass("noContentinvis");
    }
    $("#loadMoreother").on("click", function (e) {
      e.preventDefault();
      $(".box-post:hidden").slice(0, 5).slideDown();
      if ($(".box-post:hidden").length == 0) {
        $("#loadMoreother").text("No More Content").addClass("noContent");
      }
    });
  });