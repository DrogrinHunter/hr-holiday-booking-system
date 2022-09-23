// ------------------------------------------------------------- Add event to DB -------------------------------------------------------------
function addEventToDB() {
  console.log("here");
  $.get("query.php", { name: $("#title").val(), date: $("#date").val(), action: "createevent" })
    .done(function (data) {
      alert("Data Loaded: " + data);
    });

  eventSubmitAlert();
}

// ------------------------------------------------------------- Add user to DB -------------------------------------------------------------
function createUser() {
  console.log("here");
  $.get("query.php", { firstname: $('#firstname').val(), name: $("#name").val(), password: $("#psw").val(), email: $("#email").val(), team: $("#teamfield").val(), action: "createuser" })
    .done(function (data) {
      console.log("user created")
      alert("Data Loaded: " + data);
    });

    newUserAlert();
}
// ------------------------------------------------------------- Alert for new user -------------------------------------------------------------
function newUserAlert() {
  Swal.fire({
    icon: 'success',
    title: 'User has been created!',
    showConfirmButton: true,
    timer: 4000
  }).then(function () {
    location.replace("team-check.php");
  });
}
// ------------------------------------------------------------- Booking Holiday button -------------------------------------------------------------
function eventSubmitAlert() {
  Swal.fire({
    icon: 'success',
    title: 'Thanks!',
    text: 'We have submitted your holiday request.',
    showConfirmButton: true,
    timer: 4000
  }).then(function () {
    location.replace("name-holiday.php");
  });
}

// ------------------------------------------------------------- Approve holiday button -------------------------------------------------------------
function holidayApproveAlert() {
  Swal.fire({
    icon: 'success',
    title: 'Holiday Approved!',
    showConfirmButton: true,
    timer: 4000
  }).then(function () {
    location.replace("team-review.php");
  });
}

