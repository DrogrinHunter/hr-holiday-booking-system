// ------------------------------------------------------------- Add event to DB -------------------------------------------------------------
function addEventToDB() {
  console.log("here");
  $.get("query.php", {
    name: $("#title").val(),
    date: $("#date").val(),
    todate: $("#toDate").val(),
    action: "createevent"
  })
    .done(function (data) {
      console.log("Data Loaded: " + data);
      // alert("Data Loaded: " + data);
    });

  eventSubmitAlert();
}

// ------------------------------------------------------------- Add an additional event to DB -------------------------------------------------------------
function addAdditionalEventToDB() {
  console.log("here");
  $.get("query.php", {
    name: $("#title").val(),
    date: $("#date").val(),
    todate: $("#toDate").val(),
    agentid: $("#userfield").val(),
    approvedStatus: $("#eventfield").val(),
    action: "createadditionalevent"
  })
    .done(function (data) {
      console.log("Data Loaded: " + data);
      // alert("Data Loaded: " + data);
    });
  additionalEventSubmitAlert();
}

// ------------------------------------------------------------- Add user to DB -------------------------------------------------------------
function createUser() {
  console.log('here');
  $.get('query.php', {
    firstname: $('#firstname').val(),
    name: $('#name').val(),
    password: $('#psw').val(),
    team: $('#teamfield').val(),
    email: $('#email').val(),
    workinghours: $('#workinghours').val(),
    mobile: $('#mobile').val(),
    jobtitle: $('#jobtitle').val(),
    officeloc: $('#officeloc').val(),
    homeadd: $('#homeadd').val(),
    lunchtimes: $('#lunchtimes').val(),
    action: 'createuser'
  })
    .done(function (data) {
      console.log("user created")
      alert("Data Loaded: " + data);
    });

  newUserAlert();
}

// ------------------------------------------------------------- Edit user in DB -------------------------------------------------------------
var dataChange = false;

function editUser(agentid) {
  console.log('here');

  $.get('query.php', {
    firstname: $('#firstname').val(),
    name: $('#name').val(),
    email: $('#email').val(),
    workinghours: $('#workinghours').val(),
    mobile: $('#mobile').val(),
    jobtitle: $('#jobtitle').val(),
    officeloc: $('#officeloc').val(),
    homeadd: $('#homeadd').val(),
    lunchtimes: $('#lunchtimes').val(),
    agentid: agentid,
    action: 'edituser'
  })
    .done(function (data) {
      console.log("user edited");

      console.log("Data Loaded: " + data);
      dataChange = false;
    });

  editUserAlert();
}
// ------------------------------------------------------------- checking for changes and notifying users that changes have been made -------------------------------------------------------------
function userChangedData() {
  dataChange = true;
}

function savedChangesAlert() {

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
// ------------------------------------------------------------- Alert for editing a user -------------------------------------------------------------
function editUserAlert() {
  Swal.fire({
    icon: 'success',
    title: 'User has been edited!',
    showConfirmButton: true,
    timer: 4000
  })
  // .then(function () {
  //   location.replace("team-user-list.php");
  // });
}
// ------------------------------------------------------------- Booking Holiday button -------------------------------------------------------------
// --------------- This is for name-book.php ---------------

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

// ------------------------------------------------------------- Booking Additional Holiday button -------------------------------------------------------------
// --------------- This is for book-hol.php ---------------
function additionalEventSubmitAlert() {
  Swal.fire({
    icon: 'success',
    title: 'Thanks!',
    text: 'Additional events added.',
    showConfirmButton: true,
    timer: 4000
  }).then(function () {
    location.replace("index.php");
  });
}
// ------------------------------------------------------------- Approve event -------------------------------------------------------------
// --------------- This is for team-review.php ---------------

function approveid(id) {
  console.log("here");
  $.get("team-review.php", { // query.php has the db connection
    id: id,
    action: "approveevent"
  })
    .done(function (data) {
      holidayApproveAlert();
    })
    .fail(function (data) {
      console.log(data)
    });
}

// ------------------------------------------------------------- Deny event -------------------------------------------------------------
// --------------- This is for team-review.php ---------------

function denyHolId(id) {
  console.log("here");
  $.get("team-review.php", { // query.php has the db connection
    id: id,
    action: "denyevent"
  })
    .done(function (data) {
      denyHolidayAlert();
    });
}

// ------------------------------------------------------------- Approve holiday button -------------------------------------------------------------
// --------------- This is for team-review.php ---------------

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

// ------------------------------------------------------------- Deny holiday button -------------------------------------------------------------
// --------------- This is for team-review.php ---------------

function denyHolidayAlert() {
  Swal.fire({
    icon: 'error',
    title: 'Holiday Denied!',
    text: 'Holiday Request has been denied',
    showConfirmButton: true,
    timer: 4000
  }).then(function () {
    location.replace("team-review.php");
  });
}
// ------------------------------------------------------------- Approve Cancellation Request -------------------------------------------------------------
// --------------- This is for team-cancelled-holidays.php ---------------

function approvecancelreqid(id) {
  console.log("here");
  $.get("team-cancelled-holidays.php", { // query.php has the db connection
    id: id,
    action: "approvecancelreq"
  })
    .done(function (data) {
      approveCancelReqAlert();
    });
}

// ------------------------------------------------------------- Deny Cancellation Request -------------------------------------------------------------
// --------------- This is for team-cancelled-holidays.php ---------------

function denycancelreqid(id) {
  console.log("here");
  $.get("team-cancelled-holidays.php", { // query.php has the db connection
    id: id,
    action: "denycancelreq"
  })
    .done(function (data) {
      denyCancelReqAlert();
    });
}

// ------------------------------------------------------------- Approve Cancellation button -------------------------------------------------------------
// --------------- This is for team-cancelled-holidays.php ---------------

function approveCancelReqAlert() {
  Swal.fire({
    icon: 'success',
    title: 'Holiday Cancellation Approved!',
    showConfirmButton: true,
    timer: 4000
  }).then(function () {
    location.replace("team-cancelled-holidays.php");
  });
}

// ------------------------------------------------------------- Deny Cancellation button -------------------------------------------------------------
// --------------- This is for team-cancelled-holidays.php ---------------

function denyCancelReqAlert() {
  Swal.fire({
    icon: 'error',
    title: 'Cancellation Request Denied!',
    text: 'Holiday Cancellation Request has been denied',
    showConfirmButton: true,
    timer: 4000
  }).then(function () {
    location.replace("team-cancelled-holidays.php");
  });
}

// ------------------------------------------------------------- User submitted request to cancel holiday alert -------------------------------------------------------------
// --------------- This is for name-holiday.php ---------------

function swalCancelHolidayAlert() {
  Swal.fire({
    icon: 'info',
    title: 'Holiday Cancellation Request!',
    text: 'Your request to cancel holiday has been submitted',
    showConfirmButton: true,
    timer: 4000
  }).then(function () {
    location.replace("name-holiday.php");
  });
}

// ------------------------------------------------------------- Open Profile -------------------------------------------------------------
// --------------- This is for team-user-list.php ---------------
function openProfile(agentguid) {
  location.replace("team-edit-user.php?agentid=" + agentguid);

}

// ------------------------------------------------------------- users off on a certain date -------------------------------------------------------------
// --------------- This is for team-user-list.php ---------------
function usersOffOnDate(date) {
  console.log("test")
  $.get("query.php", { action: "usersOffOnDay", date: date })
    .done(function (htmldata) {

      Swal.fire({
        title: 'Who\'s off already',
        icon: 'info',
        html:
          htmldata,
        showCancelButton: false,
        focusConfirm: false,
      })
      console.log(htmldata);
    });
}
// ------------------------------------------------------------- download files for user profile / team edit user -------------------------------------------------------------


function downloadFileNow(fileURL) {
  window.open("query.php?action=fileDownload&fileURL=" + fileURL, "_blank") || window.location.replace("query.php?action=fileDownload&fileURL=" + fileURL);
}