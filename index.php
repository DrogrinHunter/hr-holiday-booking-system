<?php
include('query.php');
include('includes/nav.php');
include('includes/css-links.php');
include('includes/check-perms.php');
include('includes/footer.php');

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
    <div class="maincontent-wrapper main-font">
        <div class=card-title>
            <h5>Dashboard</h5>
        </div>
        <div class="card-wrapper">
            <div class="main-box-body box-changes">
                <h6 class="card-subtitle mb-2 bold"><i class="fa-solid fa-calendar-day"></i> Who's Off Today</h6>
                <!-- <p class="card-text"><?php //usersOffToday($conn); ?></p> -->
                <p class="card-text">Coming soon</p>
            </div>
            <div class="main-box-body box-changes">
                <h6 class="card-subtitle mb-2 bold"><i class="fa-solid fa-calendar-week"></i> Who's Off This Week</h6>
                <p class="card-text"><?php usersOffThisWeek($conn) ?></p>
            </div>
            <!-- <div class="main-box-body box-changes">
                <h6 class="card-subtitle mb-2 bold">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
            <div class="main-box-body box-changes">
                <h6 class="card-subtitle mb-2 bold">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div> -->
        </div>
        <!-- End of Card Wrappers-->
        <!-- Calendar -->
        <div class="calendar-wrapper">
            <div id="calendar">
                <p style="float: left;">
                    <span class="dot-approved"></span> Approved Event 
                    <span class="dot-requested"></span> Requested Event 
                    <span class="dot-denied"></span> Denied Event 
                    <span class="dot-sickness"></span> Sickness
                    <span class="dot-maternity"></span> Maternity Leave
                    <span class="dot-paternity"></span> Paternity Leave
                </p>
                <!-- <p style="float: left;"><span class="dot-approved"></span> Approved Event <span class="dot-requested"></span> Requested Event <span class="dot-denied"></span> Denied Event <span class="dot-sickness"></span> Sickness</p> -->
                <!-- <p><span class="dot-requested"></span> Requested Event</p> -->
                <!-- <p><span class="dot-denied"></span> Denied Event</p> -->
                <!-- <p><span class="dot-sickness"></span> Sickness</p> -->
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php echo $footer ?>

    <div class="cookie-banner" style="display: none">
        <p>
            By using our website, you agree to our
            <a id="cookie-link" href="https://bit.ly/3CZDWjo" target="_blank">cookie policy</a>
        </p>
        <button class='close'>&times;</button>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="module" src="assets/js/customFullCalendar.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/cookieBanner.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/full-calendar/main.js"></script>
    <script src="assets/full-calendar/locales-all.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</body>

</html>