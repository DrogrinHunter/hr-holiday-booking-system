<?php
include('query.php');
include('includes/nav.php');
include('includes/css-links.php');
include('includes/footer.php');

$firstname = $_SESSION["agentdata"]["firstname"];
$name = $_SESSION["agentdata"]["name"];
$teamname = $_SESSION['agentdata']['tuidname'];
$teamleader = $_SESSION['agentdata']['teamleader'];
$email = $_SESSION['agentdata']['email'];
$mobile = $_SESSION['agentdata']['mobile'];
$jobtitle = $_SESSION['agentdata']['jobtitle'];
$officeloc = $_SESSION['agentdata']['officeloc'];
$homeadd = $_SESSION['agentdata']['homeadd'];
$workinghours = $_SESSION['agentdata']["workinghours"];
$lunchtimes = $_SESSION['agentdata']["lunchtimes"];


$icon = substr($firstname, 0, 1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $cssLinks ?>
</head>

<body>
    <!-- Nav Bar -->
    <?php echo $navbar; ?>

    <!-- Main Content -->
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                            <div class="wrapper-circle">
                                    <div class="icon">
                                        <?php echo $icon; ?>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h4><?php echo $name ?></h4>
                                    <p class="text-secondary mb-1"><?php echo $jobtitle ?></p>
                                    <p class="text-muted font-size-sm"><?php echo $officeloc ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $name ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $email ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $mobile ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $homeadd ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Working Hours</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $workinghours ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Lunch Times</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $lunchtimes ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contract</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    FILE
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Holiday Amount Remaining</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo holidayRemaining($conn); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Days Used</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo holidayUsed($conn); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>

        </div>
    </div>

    <!-- footer -->
    <?php echo $footer ?>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>