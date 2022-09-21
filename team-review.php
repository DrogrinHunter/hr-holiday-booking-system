<?php
include('php-extras/nav.php');
include('php-extras/css-links.php');
include('review-holiday-query.php');


$id = $_REQUEST["id"];

if ($_REQUEST["action"] == "approveevent") {
    approveevent($conn, $id);
    exit;
}


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
            <h1 class="display-4">Review Holiday for the {team}!</h1>
            <p class="lead">Approve or deny holiday for your team.</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-success btn-lg" href="team-check.php" role="button">Check your team's holiday</a>
            </p>
        </div>
    </div>

    <div class="team-check-content-wrapper">
        <div class=card-title>
            <h5>Approve or Deny Requests</h5>
        </div>
        <!-- <div class="team-card-wrapper">
            <div class="team-box-body box-changes">
                <h6 class="card-subtitle mb-2"><i class="fa-solid fa-calendar-day"></i> Next Team Member Off:</h6>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a dolor vel dolor
                    convallis lacinia. Morbi dictum aliquet ante, vitae ornare justo commodo at. Donec aliquam tincidunt
                    facilisis. Aliquam vulputate nulla nibh, ut faucibus mauris lacinia eu. Nam rutrum nisi id diam
                    aliquam, eu imperdiet felis aliquet. Proin ut turpis lorem.
                </p>
            </div>
            <div class="team-box-body box-changes">
                <h6 class="card-subtitle mb-2"><i class="fa-solid fa-calendar-week"></i> Who has used most of their
                    holiday?</h6>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a dolor vel dolor
                    convallis lacinia. Morbi dictum aliquet ante, vitae ornare justo commodo at. Donec aliquam tincidunt
                    facilisis. Aliquam vulputate nulla nibh, ut faucibus mauris lacinia eu. Nam rutrum nisi id diam
                    aliquam, eu imperdiet felis aliquet. Proin ut turpis lorem.</p>
            </div>
            <div class="team-box-body box-changes">
                <h6 class="card-subtitle mb-2"><i class="fa-regular fa-calendar-check"></i> Who has to book holiday?
                </h6>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a dolor vel dolor
                    convallis lacinia. Morbi dictum aliquet ante, vitae ornare justo commodo at. Donec aliquam tincidunt
                    facilisis. Aliquam vulputate nulla nibh, ut faucibus mauris lacinia eu. Nam rutrum nisi id diam
                    aliquam, eu imperdiet felis aliquet. Proin ut turpis lorem.</p>
            </div> 
        </div>-->
        <div class="custom-table">
            <?php
            $htmltable .= "<table class='custom-table' width='500' border='0' cellpadding='3' padding-bottom='50' >
            <tr>
                <td>Date</td>
                <td>Approve</td>
            </tr>
            ";

            // table query
            $agentguid = $_SESSION["agentdata"]["guid"];
            // $agentguid = $_SESSION["eventdata"]["id"];


            // $sql = "SELECT * FROM `eventdata` WHERE agentguid='$agentguid' AND approved = 0";
            $sql = "SELECT * FROM `eventdata` WHERE approved = 0";
            $result = $conn->query($sql);
            if (!$result) {
                die("invalid query: " . $conn->error);
            }
            // reading data for each row
            while ($row = $result->fetch_assoc()) {
                $_SESSION["eventdata"] = $row;
                $id = $row["id"];
                $name = $row["agentdata"]["name"];
                $eventname = $row["name"];
                $date = $row["date"];
                $htmltable .= "

            <tr>
                <td>$date - $eventname</td>
                <td onClick=\"approveid('$id')\"><i class='fa fa-check' aria-hidden='true'></i>
                </td>
            </tr>
            ";
            };
            $htmltable .= "
        </table>
        ";
            echo $htmltable;

            // ------------------------------------------- approving events in the db -------------------------------------------
            function approveevent($conn, $id)
            {
                $sql = "UPDATE `eventdata` SET approved = 1 WHERE id = '$id' ";

                if ($conn->query($sql) === true) {
                    echo "Approved event successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            ?>
        </div>
    </div>
    <!-- End of table of data to approve -->

    <!-- footer -->
    <div class="footer-content">
        <p>MFM-IT Holiday Booking System</p>
    </div>


    <!-- Scripts -->
    <script src="assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // ------------------------------------------------------------- Approve event -------------------------------------------------------------
        function approveid(id) {
            console.log("here");
            $.get("team-review.php", { //review-holiday-query.php has the db connection
                    id: id,
                    action: "approveevent"
                })
                .done(function(data) {
                    holidayApproveAlert();
                });



        }
    </script>
</body>

</html>