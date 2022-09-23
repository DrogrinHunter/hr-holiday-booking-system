
// team check holiday section

const thctx = document.getElementById('teamHoliday').getContext('2d')
const dataTeamHoliday = {
  labels: [
    'TM1',
    'TM2',
    'TM3',
    'TM4',
    'TM5',
  ],
  datasets: [{
    label: 'Team Members used most of their holiday',
    data: [28,17,6,22,4], // first figure is used, second is to take 
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(177, 236, 55)',
      'rgb(149, 152, 236)',
      'rgb(142, 133, 133)'
    ],
    hoverOffset: 4
  }]
};

const teamHoliday = new Chart(thctx, {
    type: 'pie',
    data: dataTeamHoliday,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Who has taken the most holiday this year:'
            }
        }
    }
});