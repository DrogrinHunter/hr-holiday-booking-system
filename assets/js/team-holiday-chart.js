
// team check holiday section

const thctx = document.getElementById('teamHoliday').getContext('2d')
const dataTeamHoliday = {
  labels: [
    'Used',
    'To Take'
  ],
  datasets: [{
    label: 'Holiday to take',
    data: [28, 5], // first figure is used, second is to take 
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
    ],
    hoverOffset: 4
  }]
};

const teamHoliday = new Chart(thctx, {
  type: 'bar',
  data: dataTeamHoliday,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Team holiday'
      }
    }
  },
});