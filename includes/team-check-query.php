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

// Create connection
$conn = new mysqli($servername, $username, $mysqlpassword, $db);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
};

// next person off
function nextPersonOff($conn) {
    $agentguid = $_SESSION["agentdata"]["guid"];

    $sql = "SELECT * FROM `eventdata` WHERE date >= NOW() AND approved=1 ORDER BY date ASC LIMIT 1;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $eventguid = $row["agentguid"];

        $sqlUserName = "SELECT name FROM `users` WHERE guid = '$eventguid'";
        $resultUserName = $conn->query($sqlUserName);
        $rowUserName = $resultUserName->fetch_assoc();

        
        $username = $rowUserName["name"];


        // $nextPerson = date('l jS \of F Y',strtotime($nextDayVal));
        return $username;
    }
    }
