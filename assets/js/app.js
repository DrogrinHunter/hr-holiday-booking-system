

// ------------------------------------------------------------- Date Selection -------------------------------------------------------------
$(function () {
  $("#date").datepicker({
    numberOfMonths: 3,
    showButtonPanel: true,
    dateFormat: 'yy-mm-dd'
  });
});

// ------------------------------------------------------------- Date Selection -------------------------------------------------------------
function addEventToDB() {
  console.log("here");
  $.get("query.php", { name: $("#title").val(), date: $("#date").val(), action: "createevent" })
    .done(function (data) {
      alert("Data Loaded: " + data);
    });

  eventSubmitAlert();
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

