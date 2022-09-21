<?php
include('includes/nav.php');
include('includes/css-links.php');
include('includes/name-hol-piechart.php');
include('includes/footer.php');
session_start();
$firstname = $_SESSION["agentdata"]["firstname"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $cssLinks ?>
</head>

<body>
    <!-- Nav Bar -->
    <?php echo $navbar; ?>
    <!-- Page content -->
    <div class="jumbotron jumbotron-fluid rounded">
        <div class="container">
            <h1 class="display-4">Welcome, <?php echo $firstname ?>!</h1>
            <p class="lead">Information relating to your holiday.</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-success btn-lg" href="name-book.php" role="button">Book more holiday</a>
            </p>
        </div>
    </div>

    <div class="name-hol-content-wrapper">
        <div class=card-title>
            <h5><?php echo $firstname ?>'s Holiday information</h5>
        </div>
        <div class="user-card-wrapper">
            <div class="dash-box-body box-changes">
                <h6 class="card-subtitle mb-2"><i class="fa-solid fa-calendar-day"></i> Your next day off is:</h6>
                <p class="card-text-1 "><?php echo nextDayOff($conn); ?>.</p>
            </div>
            <div class="dash-box-body box-changes">
                <h6 class="card-subtitle mb-2"><i class="fa-solid fa-calendar-week"></i> How many days used</h6>
                <canvas id="userHoliday"></canvas>
            </div>
            <div class="dash-box-body box-changes">
                <h6 class="card-subtitle mb-2"><i class="fa-regular fa-calendar-check"></i> Holiday Remaining</h6>
                <p class="card-text-2"><?php echo holidayRemaining($conn); ?>.</p>
            </div>


        </div>
    </div>
    <!-- End of Card Wrappers-->

    <!-- footer -->
    <?php echo $footer ?>


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        // Doughnuts on user home page

        const uhctx = document.getElementById('userHoliday').getContext('2d')
        const dataUserHoliday = {
            labels: [
                'Used',
                'To Take'
            ],
            datasets: [{
                label: 'Holiday to take',
                data: [<?php echo $namePieChart; ?>], // first figure is used, second is to take 
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
    </script>

</body>

</html>