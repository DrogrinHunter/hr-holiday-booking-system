
// adds to local storage 

var storage = {};



function addEventLocal(title, date) {
  
  console.log(title, date);
 
    $.get( "query.php", { name: title, date: date, action:"createevent"} )
      .done(function( data ) {
        alert( "Data Loaded: " + data );
      });
      
      
};

// calendar 

document.addEventListener('DOMContentLoaded', () => {
  const calendarEl = document.getElementById('calendar');
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    defaultDate: 'today',
    selectable: false,
    editable: false,
    headerToolbar: {
      left: 'title',
      // center: 'addEventButton',
      right: 'prev,next today'
    },
    // customButtons: {
    //   addEventButton: {
    //     text: 'Add an event!',
    //     click: function () {
    //       var dateStr = prompt('Enter a date in YYYY-MM-DD format');
    //       var date = new Date(dateStr + 'T00:00:00');
    //       var title = prompt('Event Title: ');

    //       if (!isNaN(date.valueOf())) { // valid?
    //         calendar.addEvent({
    //           title: title,
    //           start: date,
    //           allDay: true
    //         });
    //         addEventLocal(title, dateStr);
           
    //         eventAdded();
    //       } else {
    //         invDate();
    //       }
    //     }
    //   }
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