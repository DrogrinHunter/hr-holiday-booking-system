// Doughnuts on user home page

const uhctx = document.getElementById('userHoliday').getContext('2d')
const dataUserHoliday = {
  labels: [
    'Used',
    'To Take'
  ],
  datasets: [{
    label: 'Holiday to take',
    data: [<?php asdasd; ?>], // first figure is used, second is to take 
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
    ],
    hoverOffset: 4
  }]
};

const userHoliday = new Chart(uhctx, {
  type: 'doughnut',
  data: dataUserHoliday,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'left',
      },
      title: {
        display: true,
        text: 'Your holiday'
      }
    }
  },
});
