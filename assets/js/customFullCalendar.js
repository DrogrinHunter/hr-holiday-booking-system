// adds to local storage 

var storage = {};

function addEventLocal(title, date) {
  
  console.log(title, date);
  if (storage[date] == undefined) {
    console.log('this is empty')
  } else {
    console.log('hello')
  }
  localStorage.setItem('database', JSON.stringify(storage));

};

var masterEvents = {};
// retrieves calendar events
function retrieveEventLocal(title, date){
var storage = localStorage.getItem('database');
retrieveEventLocal.push(`{"title": ${title}}, "start":${date}`);
if (storage !== null) {
  console.log(storage);
  

}}

console.log(masterEvents);

// calendar 

document.addEventListener('DOMContentLoaded', () => {
  const calendarEl = document.getElementById('calendar');
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    defaultDate: 'today',
    selectable: true,
    editable: true,
    headerToolbar: {
      left: 'title',
      center: 'addEventButton',
      right: 'prev,next today'
    },
    customButtons: {
      addEventButton: {
        text: 'Add an event!',
        click: function () {
          var dateStr = prompt('Enter a date in YYYY-MM-DD format');
          var date = new Date(dateStr + 'T00:00:00');
          var title = prompt('Event Title: ');

          if (!isNaN(date.valueOf())) { // valid?
            calendar.addEvent({
              title: title,
              start: date,
              allDay: true
            });
            addEventLocal(title, date);

            alert('Great. Now, update your database...');
          } else {
            alert('Invalid date.');
          }
        }
      }
    },

    events: masterEvents,

  });
  calendar.render();
});
