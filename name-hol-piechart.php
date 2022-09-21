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

// doughtnut
$sql = "SELECT * FROM `eventdata` WHERE agentguid='$agentguid' AND approved = 1";
    $result = $conn->query($sql);

    $namePieChart .= $result->num_rows;
    $namePieChart .= ",";
    $namePieChart .= $_SESSION["agentdata"]["allocdays"] - $result->num_rows;



// next day off
function nextDayOff($conn) {
$sql = "SELECT * FROM `eventdata` WHERE date >= NOW() LIMIT 1;";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    $nextDayVal = $row["date"];
    $nextDay = date('l jS \of F Y',strtotime($nextDayVal));
    return $nextDay;
}
}

// holiday remaining
function holidayRemaining($conn)
{
    $agentguid = $_SESSION["agentdata"]["guid"];
    $sql = "SELECT * FROM `eventdata` WHERE agentguid='$agentguid' AND approved = 1";
    $result = $conn->query($sql);

    $remainder = "";
    $holRemaining = $result->num_rows;
    $holRemaining = $_SESSION["agentdata"]["allocdays"] - $result->num_rows;
    $remainder .= $holRemaining;

    return $remainder;
}

?>

