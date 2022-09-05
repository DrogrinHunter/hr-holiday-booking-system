document.addEventListener('DOMContentLoaded', () => {
  const calendarEl = document.getElementById('calendar');

  const calendar = new FullCalendar.Calendar(calendarEl, {
    // plugins: [ interactivePlugin ],
    initialView: 'dayGridMonth',
    defaultDate: 'today',
    selectable: true,
    editable: true,
    // height: auto,
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
          var date = new Date(dateStr + 'T00:00:00'); // will be in local time

          if (!isNaN(date.valueOf())) { // valid?
            calendar.addEvent({
              title: 'dynamic event',
              start: date,
              allDay: true
            });
            alert('Great. Now, update your database...');
          } else {
            alert('Invalid date.');
          }
        }
      }
    },

    events: [
      {
        title: 'All Day Event',
        start: '2022-09-01',
      },
      {
        title: 'Long Event',
        start: '2022-09-07',
        end: '2022-09-10',
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2022-09-09T16:00:00',
      },
      {
        title: 'Meeting',
        start: '2022-09-12T14:30:00',
      },
      {
        title: 'Birthday Party',
        start: '2022-09-13T07:00:00',
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2022-09-28',
      },
    ],
  });

  calendar.render();
});
