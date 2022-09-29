
// adds to local storage 
// no longer used 
// var storage = {};



// function addEventLocal(title, date) {

//   console.log(title, date);

//   $.get("query.php", { name: title, date: date, action: "createevent" })
//     .done(function (data) {
//       alert("Data Loaded: " + data);
//     });


// };

// calendar 

document.addEventListener('DOMContentLoaded', () => {
  const calendarEl = document.getElementById('calendar');
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    defaultDate: 'today',
    // nextDayThreshold: '22:59:00',
    selectable: false,
    editable: false,
    headerToolbar: {
      left: 'title',
      // center: 'addEventButton',
      right: 'prev,next today'
    },

    // Need to look at event mouse over or hover
    // eventRender: function (info) {
    //   var tooltip = new Tooltip(info.el, {
    //     title: info.event.extendedProps.description,
    //     placement: 'top',
    //     trigger: 'hover',
    //     container: 'body'
    //   });
    // },


    events: 'query.php?action=getevents',

  });
  calendar.render();
});


function eventAdded() {
  Swal.fire({
    icon: 'success',
    title: 'Holiday has now gone for approval!',
    text: 'Check back later to see if it has been approved.',
    showConfirmButton: false,
    timer: 2000
  })

}

function invDate() {
  Swal.fire({
    icon: 'error',
    title: 'Event not added, check your date.',
    showConfirmButton: false,
    timer: 2000
  })
}