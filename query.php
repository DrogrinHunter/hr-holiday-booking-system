<?php
$servername = "localhost";
$username = "c13dev2";
$mysqlpassword = "kkvSLMw#FFd6";
$db = "c0dev2mfmit";
session_start();

header('Content-Type: application/json; charset=utf-8');


//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$date = $_REQUEST["date"];
$name = $_REQUEST["name"];




// Create connection
$conn = new mysqli($servername, $username, $mysqlpassword, $db);
//echo "running<BR>";


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "ok<BR>";


// getusers($conn);
if ($_REQUEST["action"] == "ath") {
 athuser($conn, $email, $password) ;
}

if ($_REQUEST['action'] == "createevent") {
createevent($conn, $name, $date);
}


if ($_REQUEST["action"] == "getevents"){
    getevents($conn);
}
//echo "Email: $email - Password to check: $password";


function getusers($conn) {//

$sql = "SELECT * FROM `users` ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
  }
} else {
 // echo "0 results";
}
}


function createevent($conn, $name, $date) {
    $agentguid = $_SESSION["agentdata"]["guid"];
    $email = $_SESSION["agentdata"]["email"];
    $sql = "INSERT INTO `eventdata` (agentguid, name, date)
    VALUES ('$agentguid', '$name', '$date')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}


function athuser($conn, $email, $password)  {
    $sql = "SELECT * FROM `users` WHERE email='$email' ";
   

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["password"] == md5($password)) {
            echo '{"status": 1}';
            $_SESSION["agentdata"] = $row;
        }else{
            echo '{"status": 0}';
        }
 
    }else{
        echo '{"status": 0}';
    }

}



function getevents($conn) {
    $agentguid = $_SESSION["agentdata"]["guid"];
    $sql = "SELECT * FROM `eventdata` WHERE agentguid='$agentguid' ";
      $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $title = $row["name"];
            $date = $row["date"];
            $id = $row["id"];
        $events[] = 
        [   
            'title' => $title,
            'start' =>  $date,
           ];
     } 
    }else{
        echo '{"status": 0}';
    }



echo json_encode($events);

 

}