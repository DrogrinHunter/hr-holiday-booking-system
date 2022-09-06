<?php 
    include('nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="assets/full-calendar/main.css">
    <title>Holiday Booking System</title>
</head>

<body>
    <!-- Nav Bar -->
    <?php echo $navbar; ?>

    <!-- Page content -->
    <div class="maincontent-wrapper main-font">
        <div class=card-title>
            <h5>Dashboard</h5>
        </div>
        <div class="card-wrapper">
            <div class="main-box-body box-changes">
                <h6 class="card-subtitle mb-2 bold"><i class="fa-solid fa-calendar-day"></i> Who's Off Today</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
            <div class="main-box-body box-changes">
                <h6 class="card-subtitle mb-2 bold"><i class="fa-solid fa-calendar-week"></i> Who's Off This Week</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
            <div class="main-box-body box-changes">
                <h6 class="card-subtitle mb-2 bold">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
            <div class="main-box-body box-changes">
                <h6 class="card-subtitle mb-2 bold">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>
        <!-- End of Card Wrappers-->
        <!-- Calendar -->
        <div class="calendar-wrapper">
            <div id="calendar">
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="footer-content">
        <p>Footer</p>
    </div>

    <div class="cookie-banner" style="display: none">
        <p>
            By using our website, you agree to our
            <a id="cookie-link" href="https://bit.ly/3CZDWjo" target="_blank">cookie policy</a>
        </p>
        <button class='close'>&times;</button>
    </div>


    <!-- Scripts -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/customFullCalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/cookieBanner.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"
        integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/full-calendar/main.js"></script>
    <script src="assets/full-calendar/locales-all.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>


</body>

</html>