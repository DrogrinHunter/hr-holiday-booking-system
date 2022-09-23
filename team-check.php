<?php
include('includes/nav.php');
include('includes/css-links.php');
include('includes/footer.php');
include('includes/team-hol-piechart.php');
include('query.php');

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
            <h1 class="display-4"><?php echo $teamname; ?> Team!</h1>
            <p class="lead">Information relating to your team's holiday.</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-success btn-lg" href="team-review.php" role="button">Review Requests</a>
            </p>
        </div>
    </div>

    <div class="team-check-content-wrapper">
        <div class=card-title>
            <h5>Check Your Team's Holiday</h5>
        </div>
        <div class="team-card-wrapper">
            <div class="team-box-body box-changes">
                <h6 class="card-subtitle mb-2"><i class="fa-solid fa-calendar-day"></i> Next Team Member Off:</h6>
                <p class="card-text">
                    <?php echo nextPersonOff($conn); ?>.
                </p>
            </div>
            <div class="team-box-body box-changes">
                <h6 class="card-subtitle mb-2"><i class="fa-solid fa-calendar-week"></i> Who has used most of their holiday?</h6>
                <canvas id="teamHoliday">here</canvas>
            </div>
            <div class="team-box-body box-changes">
                <h6 class="card-subtitle mb-2"><i class="fa-regular fa-calendar-check"></i> Who has to book holiday?</h6>
                <p class="card-text"><?php echo $teamStr; ?></p>
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
        // team check holiday pie chart

        const thctx = document.getElementById('teamHoliday').getContext('2d')
        const dataTeamHoliday = {
            labels: [
                <?php echo $tempAgentArray; ?>
            ],
            datasets: [{
                label: 'Team Members used most of their holiday',
                data: [<?php echo $teamPieChart; ?>], // first figure is used, second is to take 
                backgroundColor: [
                    <?php echo $colour; ?>
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
    </script>

</body>

</html>