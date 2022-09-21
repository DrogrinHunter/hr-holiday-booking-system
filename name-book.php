<?php
include('includes/nav.php');
include('includes/css-links.php');
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

    <!------------------------------- Nav bar ------------------------------->
    <?php echo $navbar; ?>
    <!------------------------------- Page content ------------------------------->
    <div class="book-hol-content-wrapper">
        <div class="jumbotron jumbotron-fluid rounded">
            <div class="container">
                <h1 class="display-4">Need to book some holiday, <?php echo $firstname; ?>?</h1>
                <p class="lead">Fill the form out below.</p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-success btn-lg" href="name-holiday.php" role="button">Check your holiday
                        allowance</a>
                </p>
            </div>
        </div>
        <div class=card-title>
            <h5>Book your holiday, <?php echo $firstname; ?>!</h5>
        </div>
        <!------------------------------- Form Booking ------------------------------->
        <section class="container-fluid">
            <div class="row bg-color-contact">
                <div class="col">
                    <h3 class="contact-heading text-center">Got a date in mind?</h3>
                    <h5 class="uppercase text-center">Book all the information below!</h5>

                    <div class="center-form" id="contact-form">
                        <form>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Event" required />
                            <!-- <input type="email" name="email" id="emailaddress" class="form-control" placeholder="Email Address" required /> -->
                            <input type="text" id="date" name="date" placeholder="Choose your date">
                            <div class="form-row text-center">
                                <div class="col">
                                    <button type="button" class="btn btn-secondary" id="sndHolReq" onclick="addEventToDB()">Send Holiday
                                        Request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!------------------------------- footer ------------------------------->
        <?php echo $footer; ?>

        <!-- Scripts -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/overcast/jquery-ui.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="assets/js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>
            $(function() {
                $("#date").datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true,
                    dateFormat: 'yy-mm-dd'
                });
            });
        </script>



</body>

</html>