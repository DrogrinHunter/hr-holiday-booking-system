<?php
include('query.php');
include('includes/nav.php');
include('includes/css-links.php');
include('includes/footer.php');

?>


<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/css/table-css.css">

<head>
    <?php echo $cssLinks ?>
</head>

<body>
    <!-- Nav Bar -->
    <?php echo $navbar; ?>
    <!-- page title -->
    <div class=card-title>
        <h5>Edit User Profiles</h5>
    </div>
    <!-- table of users -->
    <div class="custom-table-edit-user">
        <?php
        $htmltable .= "<table class='custom-table-edit-user' width='500' border='0' cellpadding='3' padding-bottom='50' >
            <tr>
                <td>User</td>
                <td>Team</td>
                <td>Edit</td>
            </tr>
            ";
        // query to pull user's out of the db - this is specific to the TL that signs in.
        $teamtuid = $_SESSION["agentdata"]["tuid"];
        // $sqlteaminf = "SELECT * FROM `users` WHERE tuid = '$teamtuid'";
        $sqlteaminf = "SELECT * FROM `users` ORDER BY name ASC";
        $result = $conn->query($sqlteaminf);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $teamtuid = $row["tuid"];
                $name = $row["name"];
                $agentguid = $row["guid"];

                $sqlteamname = "SELECT * FROM `teaminf` WHERE tuid = '$teamtuid'";
                $resultteamname = $conn ->query($sqlteamname);
                $rowteamname = $resultteamname->fetch_assoc();
                $allteamname = $rowteamname['teamname'];

                $htmltable .= "
                    <tr>
                    <td>$name</td>
                    <td>$allteamname</td>
                    <td><button type='button' onclick=\"openProfile('$agentguid')\" class='btn btn-info'>Edit User</button></td>
                    </td>
                    </tr>
                    ";
            }
        };
        $htmltable .= "
        </table>
        ";
        echo $htmltable;

        ?>
        <!-- footer -->
        <?php echo $footer ?>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>