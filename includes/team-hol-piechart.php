<?php
$servername = "localhost";
$username = "c13dev2";
$mysqlpassword = "kkvSLMw#FFd6";
$db = "c0dev2mfmit";

session_start();

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$date = $_REQUEST["date"];
$name = $_REQUEST["name"];
$agentguid = $_SESSION["agentdata"]["guid"];
$tuidsession = $_SESSION["agentdata"]["tuid"];


// Create connection
$conn = new mysqli($servername, $username, $mysqlpassword, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$sql = "SELECT * FROM `users` WHERE tuid = '$tuidsession'";
$result = $conn->query($sql);
// $userData = $result->fetch_assoc();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tempAgentGuid = $row["guid"];
        $tempAgentName = $row["name"];
        $daysRemaining = $row["allocdays"];

        // Team Pie Chart
        $sqlTeam = "SELECT * FROM `eventdata` WHERE agentguid='$tempAgentGuid' AND approved = 1";
        $resultTeam = $conn->query($sqlTeam);
        // $namePieChart .= $resultTeam->num_rows;
        $red = rand(50, 255);
        $green = rand(50, 255);
        $blue = rand(50, 255);

        $colour .= "'rgb($red, $green, $blue)',";
        $numDays = $resultTeam->num_rows;
        $teamPieChart .= "$numDays,";
        // $teamPieChart .= $_SESSION["agentdata"]["allocdays"] - $resultTeam->num_rows;
        
        $tempAgentArray .= "'$tempAgentName',";


        // getting days left in hol alloc to book
        $tempDaysToBook = $daysRemaining - $numDays;
        $teamStr .= "$tempAgentName - $tempDaysToBook <br>";
    

    }

}

?>