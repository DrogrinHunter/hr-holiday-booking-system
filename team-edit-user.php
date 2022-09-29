<?php
include('query.php');
include('includes/nav.php');
include('includes/css-links.php');
include('includes/footer.php');

$agentguid = $_REQUEST['agentid'];

$sql = "SELECT * FROM `users` WHERE guid = '$agentguid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$firstname = $row['firstname'];
$name = $row["name"];
$teamname = $row['tuidname'];
$teamleader = $row['teamleader'];
$email = $row['email'];
$mobile = $row['mobile'];
$jobtitle = $row['jobtitle'];
$officeloc = $row['officeloc'];
$homeadd = $row['homeadd'];
$workinghours = $row["workinghours"];
$lunchtimes = $row["lunchtimes"];

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
                                    <input type="text" value="<?php echo $name ?>" id="name">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="<?php echo $firstname ?>" id="firstname">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="<?php echo $email ?>" id="email">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="<?php echo $mobile ?>" id="mobile">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="<?php echo $homeadd ?>" id="homeadd">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="<?php echo $jobtitle ?>" id="jobtitle">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Working Hours</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select id="workinghours">
                                        <option disabled selected value> <?php echo $workinghours ?> </option>
                                        <option value="08:00 - 16:30">08:00 - 16:30</option>
                                        <option value="08:30 - 17:00">08:30 - 17:00</option>
                                        <option value="08:45 - 17:30">08:45 - 17:30</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Lunch Times</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select id="lunchtimes">
                                        <option disabled selected value> <?php echo $lunchtimes ?> </option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Office Location</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select id="officeloc">
                                        <option selected value> <?php echo $officeloc ?> </option>
                                        <option value="STR">STR</option>
                                        <option value="Worcester">Worcester</option>
                                        <option value="Data Centre">Data Centre</option>
                                    </select>
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
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-info" onclick="editUser('<?php echo $agentid; ?>')">Save</button>
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