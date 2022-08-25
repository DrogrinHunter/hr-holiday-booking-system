function opentr(n, arg) {
  if (typeof active !== 'undefined') {
    console.log("Clearing interval");
    active = false;
  }

  $("#main-content").fadeOut("fast", function () {
    $("#main-content").html('');
    $.get(n + ".php", { zone_uuid: arg })
      .done(function (data) {
        $("#main-content").html(data);
        $("#main-content").fadeIn("fast");
      });
  });
}

function menu(n) {
  if (typeof active !== 'undefined') {
    console.log("Clearing interval");
    active = false;
  }

  $("#main-content").fadeOut("fast", function () {
    $("#main-content").html('');
    $.get(n + ".php", function (data) {
      $("#main-content").html(data);
      $("#main-content").fadeIn("fast");
    });
  });
}

// expand menu
function expandmenu(id) {
  $(".sub-items").slideUp("fast");
  $("#" + id).slideDown("fast");
}

setTimeout(menu, 500, "dashboard");

