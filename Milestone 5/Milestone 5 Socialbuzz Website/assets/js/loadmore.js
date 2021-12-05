  $(document).ready(function () {
    $(".box-post").slice(0, 5).show();
    if ($(".box-post").length == 0) {
        $("#loadMore").text("Follow a User!").addClass("noContentfollowsomeone");
    }
    else if ($(".box-post").length <= 5) {
        $("#loadMore").text("").addClass("noContentinvis");
    }
    $("#loadMore").on("click", function (e) {
      e.preventDefault();
      $(".box-post:hidden").slice(0, 5).slideDown();
      if ($(".box-post:hidden").length == 0) {
        $("#loadMore").text("No More Content").addClass("noContent");
      }
    });
  });