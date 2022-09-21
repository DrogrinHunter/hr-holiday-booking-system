<?php
$servername = "localhost";
$username = "c13dev2";
$mysqlpassword = "kkvSLMw#FFd6";
$db = "c0dev2mfmit";
session_start();

// Create connection
$conn = new mysqli($servername, $username, $mysqlpassword, $db);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
};


$teamname = $_SESSION['agentdata']['tuidname'];


function teamname($conn)
{
    $sql = "SELECT * FROM `teaminf`";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $teamname = $row['teamname'];
        $teamtuid = $row['tuid'];
        echo "<option value=$teamtuid>$teamname</option>";
        
    }
}


