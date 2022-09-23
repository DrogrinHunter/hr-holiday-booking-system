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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

// doughtnut
$sql = "SELECT * FROM `eventdata` WHERE agentguid='$agentguid' AND approved = 1";
$result = $conn->query($sql);

$namePieChart .= $result->num_rows;
$namePieChart .= ",";
$namePieChart .= $_SESSION["agentdata"]["allocdays"] - $result->num_rows;
?>
