<?php
include('includes/nav.php');
include('includes/css-links.php');
include('query.php');
include('includes/name-hol-piechart.php');
include('includes/footer.php');
// session_start();
$firstname = $_SESSION["agentdata"]["firstname"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/assets/css/team-holiday-css.css">

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
                <p class="card-text-2"><?php echo holidayRemaining($conn); ?></p>
            </div>
        </div>

        <!-- table for users to cancel their own holiday -->
        <div class=card-title-2>
            <h5>Need to cancel any days?</h5>
        </div>
        <div>
            <div class="custom-table">
                <?php
                $htmltable .= "<table class='custom-table' width='500' border='0' cellpadding='3' padding-bottom='50' >
            <tr>
                <td>Requested on</td>
                <td>Date From</td>
                <td>Date To</td>
                <td>Total Days</td>
                <td>Event Name</td>
                <td>Holiday Status</td>
                <td>Cancel Holiday</td>
            </tr>
            ";

                // table query
                $agentguid = $_SESSION["agentdata"]["guid"];
                // function that compares two dates and works out the time in between
                function dateDiff($date, $todate)
                {
                    $date1_ts = strtotime($date);
                    $date2_ts = strtotime($todate);
                    $diff = $date2_ts - $date1_ts;
                    return round($diff / 86400);
                }

                $sql = "SELECT * FROM `eventdata` WHERE agentguid = '$agentguid' ORDER BY date";
                $result = $conn->query($sql);
                if (!$result) {
                    die("invalid query: " . $conn->error);
                }
                // reading data for each row
                while ($row = $result->fetch_assoc()) {
                    $_SESSION["eventdata"] = $row;
                    $id = $row["id"];
                    $submittedon = $row["submittedon"];
                    $date = $row["date"];
                    $todate = $row["todate"];
                    $name = $row["agentdata"]["name"];
                    $eventname = $row["name"];
                    $status = $row["approved"];

                    if ($todate == '0000-00-00 00:00:00') {
                        $dateDiff = 1;
                    } else {
                        $dateDiff = dateDiff($date, $todate);
                    }
                    $htmltable .= "

            <tr>
                <td>$submittedon</td>
                <td>$date</td>
                <td>$todate</td>
                <td>$dateDiff</td>
                <td>$eventname</td>"; 
                
                if ($status == 0) {
                    $holstatus = 'Requested';
                } elseif ($status == 1) {
                    $holstatus = 'Approved';
                } elseif ($status == 2) {
                    $holstatus = 'Denied';
                } elseif ($status == 3) {
                    $holstatus = 'Cancellation Requested';
                } elseif ($status == 4) {
                    $holstatus = 'Cancellation Approved';
                }
                
                $htmltable .=
                "<td>$holstatus</td>";

                $faCross = "";

                if ($status == 3 || $status == 2 || $status == 4) {
                    $onClick = "";
                    $faCross = "";
                } else {
                    // $faCross = "that";
                    $onClick = "swalCancelHol('$id')";
                    $faCross = "<i class='fa fa-times' aria-hidden='true' ></i>";
                };
                
                $htmltable .="
                <td style='text-align: center' onClick=$onClick>$faCross</td>
            </tr>
            ";
                };
                $htmltable .= "
        </table>
        ";
                echo $htmltable;
                ?>
            </div>

            <!-- End of Card Wrappers-->
        </div>

        <!-- footer -->
        <?php echo $footer ?>


        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="assets/js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

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

            async function swalCancelHol(eventid) {


                const {
                    value: text
                } = await Swal.fire({
                    input: 'textarea',
                    inputLabel: 'Message',
                    inputPlaceholder: 'Type your message here...',
                    inputAttributes: {
                        'aria-label': 'Type your message here'
                    },
                    showCancelButton: true
                })

                if (text) {
                    // alert("set eventid: " + eventid + " with readon: " + text)
                    $.get("query.php", {
                        id: eventid,
                        reason: text,
                        action: "usercancelevent"
                    }).done(function(data) {
                        swalCancelHolidayAlert();
                    });

                }

            }
        </script>
</body>

</html>