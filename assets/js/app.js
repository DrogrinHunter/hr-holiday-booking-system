// This is for the side bars 
function opentr(n, arg) {
  if (typeof active !== 'undefined') {
    console.log("Clearing interval");
    active = false;
  }

  $("#main-content").fadeOut("fast", function () {
    $("#main-content").html('');
    $.get(n + ".php", { zone_uuid: arg })
      .done(function (data) {
        $("#main-content").html(data);
        $("#main-content").fadeIn("fast");
      });
  });
}

function menu(n) {
  if (typeof active !== 'undefined') {
    console.log("Clearing interval");
    active = false;
  }

  $("#main-content").fadeOut("fast", function () {
    $("#main-content").html('');
    $.get(n + ".php", function (data) {
      $("#main-content").html(data);
      $("#main-content").fadeIn("fast");
    });
  });
}

// expand menu
function expandmenu(id) {
  $(".sub-items").slideUp("fast");
  $("#" + id).slideDown("fast");
}

setTimeout(menu, 500, "dashboard");

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

// ----------------------------------------------------------- 
function submitForm() {
  alert("Thank you for submitting your request, someone will get back to you as soon as possible.");
  return false;
}