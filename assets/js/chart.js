// Doughnuts on user home page

const ctx = document.getElementById('userHoliday').getContext('2d')
const data = {
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

const userHoliday = new Chart(ctx, {
  type: 'doughnut',
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'left',
      },
      title: {
        display: true,
        text: 'Chart.js Doughnut Chart'
      }
    }
  },
});