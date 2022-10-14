<?php
include('includes/nav.php');
include('includes/css-links.php');
include('query.php');
include('includes/footer.php');

$teamname = $_SESSION['agentdata']['tuidname'];
// $firstname = $_SESSION["agentdata"]["firstname"];

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



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
            <h1 class="display-4">Cancelled Holiday Requests</h1>
            <p class="lead">Review cancelled holiday requests for the <?php echo $teamname ?> Team.</p>

        </div>
    </div>

    <div class="team-check-content-wrapper">
        <div class=card-title>
            <h5>Cancelled Requests</h5>
        </div>

        <div class="custom-table">
            <?php
            $htmltable .= "<table class='custom-table' width='500' border='0' cellpadding='3' padding-bottom='50' >
            <tr>
            <td>Date Cancelled</td>
            <td>User</td>
            <td>Date From</td>
            <td>Date To</td>
            <td>Total Days</td>
            <td>Event Name</td>
            <td>Cancellation Reason</td>
            <td>Approve</td>
            <td>Deny</td>
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

            $sql = "SELECT * FROM `eventdata` WHERE approved = 3";
            $result = $conn->query($sql);
            if (!$result) {
                die("invalid query: " . $conn->error);
            }
            // reading data for each row
            while ($row = $result->fetch_assoc()) {
                $_SESSION["eventdata"] = $row;
                $id = $row["id"];
                $cancelleddate = $row["cancelleddate"];
                $cancelreason = $row["cancelholnotes"];
                $date = $row["date"];
                $reqguid = $row["agentguid"];
                // ---------------------------------------------------------------
                // getting the requested user's name from their agent guid
                $sqlusers = "SELECT * FROM `users` WHERE guid = '$reqguid'";
                $resultsusers = $conn->query($sqlusers);
                $rowusers = $resultsusers->fetch_assoc();
                $reqname = $rowusers["name"];
                // ---------------------------------------------------------------
                $todate = $row["todate"];
                $name = $row["agentdata"]["name"];
                $eventname = $row["name"];
                if ($todate == '0000-00-00 00:00:00') {
                    $dateDiff = 1;
                } else {
                    $dateDiff = dateDiff($date, $todate);
                }
                $htmltable .= "

            <tr>
            <td>$cancelleddate</td>
            <td>$reqname</td>
            <td>$date</td>
            <td>$todate</td>
            <td>$dateDiff</td>
            <td>$eventname</td>
            <td>$cancelreason</td>
                <td onClick=\"approvecancelreqid('$id')\"><i class='fa fa-check' aria-hidden='true'></i>
                <td onClick=\"denycancelreqid('$id')\"><i class='fa-solid fa-xmark'></i></i>
                </td>
            </tr>
            ";
            };
            $htmltable .= "
        </table>
        ";
            echo $htmltable;

            // ------------------------------------------- approving events in the db -------------------------------------------
            function approvecancelreq($conn, $id)
            {
                $sql = "UPDATE `eventdata` SET approved = 4 WHERE id = '$id' ";

                if ($conn->query($sql) === true) {
                    echo "Cancelled holiday event successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            // ------------------------------------------- Deny events in the db -------------------------------------------
            function denycancelreq($conn, $id)
            {
                $sql = "UPDATE `eventdata` SET approved = 2 WHERE id = '$id' ";

                if ($conn->query($sql) === true) {
                    echo "Refused holiday cancellation";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            ?>
        </div>
    </div>
    <!-- End of table of data to approve -->

    <!-- footer -->
    <?php echo $footer ?>


    <!-- Scripts -->
    <script src="assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>