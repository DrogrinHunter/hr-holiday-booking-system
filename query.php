<?php
$servername = "localhost";
$username = "c13dev2";
$mysqlpassword = "kkvSLMw#FFd6";
$db = "c0dev2mfmit";
session_start();

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$date = $_REQUEST["date"];
$todate = $_REQUEST["todate"];
$name = $_REQUEST["name"];
$team = $_REQUEST["team"];
$email = $_REQUEST["email"];
$firstname = $_REQUEST["firstname"];
$agentguid = $_SESSION["agentdata"]["guid"];
$teamname = $_SESSION['agentdata']['tuidname'];
$id = $_REQUEST["id"];
$mobile = $_REQUEST["mobile"];
$jobtitle = $_REQUEST["jobtitle"];
$workinghours = $_REQUEST["workinghours"];
$officeloc = $_REQUEST["officeloc"];
$homeadd = $_REQUEST["homeadd"];
$lunchtimes = $_REQUEST["lunchtimes"];
$agentid = $_REQUEST["agentid"];


// Create connection
$conn = new mysqli($servername, $username, $mysqlpassword, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// creating users in the database
if ($_REQUEST["action"] == "createuser") {
    createuser($conn, $firstname, $name, $password, $team, $email, $workinghours, $mobile, $jobtitle, $officeloc, $homeadd, $lunchtimes);
}
// edit users in the database
if ($_REQUEST["action"] == "edituser") {
    edituser($conn, $firstname, $name, $email, $workinghours, $mobile, $jobtitle, $officeloc, $homeadd, $lunchtimes, $agentid);
}
// authorising users signing in
if ($_REQUEST["action"] == "ath") {
    athuser($conn, $email, $password);
}
// creating an event in the calendar
if ($_REQUEST['action'] == "createevent") {
    createevent($conn, $name, $date, $todate);
}
// retrieving events from the calendar
if ($_REQUEST["action"] == "getevents") {
    getevents($conn);
}
// approving events in the calendar
if ($_REQUEST["action"] == "approveevent") {
    approveevent($conn, $id);
    exit;
}
// denying events in the calendar 
if ($_REQUEST["action"] == "denyevent") {
    denyevent($conn, $id);
    exit;
}

// ------------------------------------------- Getting users from db - depreciated -------------------------------------------
function getusers($conn)
{ //
    $sql = "SELECT * FROM `users` ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["email"] . "<br>";
        }
    } else {
        // echo "0 results";
    }
}

// ------------------------------------------- Authorising users -------------------------------------------
function athuser($conn, $email, $password)
{
    header('Content-Type: application/json; charset=utf-8');
    $sql = "SELECT * FROM `users` WHERE email='$email' AND status=1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["password"] == md5($password)) {
            echo '{"status": 1}';
            // team unique id
            $teamtuid = $row['tuid'];
            $sqlteam = "SELECT * FROM `teaminf` WHERE tuid='$teamtuid'";
            $resultteam = $conn->query($sqlteam);
            $rowteam = $resultteam->fetch_assoc();

            $row['tuidname'] = $rowteam['teamname'];
            $_SESSION["agentdata"] = $row;
        } else {
            echo '{"status": 0}';
        }
    } else {
        echo '{"status": 0}';
    }
}

// ------------------------------------------- Get names of all groups -------------------------------------------
// --------------- This is for add-user.php ---------------

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

// ------------------------------------------- Creating user in the db -------------------------------------------
// --------------- This is for add-user.php ---------------

function createuser($conn, $firstname, $name, $email, $password, $team, $workinghours, $mobile, $jobtitle, $officeloc, $homeadd, $lunchtimes)
{
    header('Content-Type: application/json; charset=utf-8');
    $hashpassword = md5($password);
    $sql = "INSERT INTO `users` (firstname, name, guid, email, password, tuid, allocdays, status, workinghours, mobile, jobtitle, officeloc, homeadd, lunchtimes)
    VALUES ('$firstname', '$name', uuid(), '$email', '$hashpassword', '$team', 28, 1, '$workinghours', '$mobile', '$jobtitle', '$officeloc', '$homeadd', '$lunchtimes')";

    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// ------------------------------------------- edit user in the db -------------------------------------------
// --------------- This is for team-edit-user.php ---------------
function edituser($conn, $firstname, $name, $email, $workinghours, $mobile, $jobtitle, $officeloc, $homeadd, $lunchtimes, $agentid)
{
    // header('Content-Type: application/json; charset=utf-8');

    $sql = "UPDATE `users`
    SET    name='$name',
           email='$email',
           firstname='$firstname',
           mobile='$mobile',
           jobtitle='$jobtitle',
           officeloc='$officeloc',
           homeadd='$homeadd',
           workinghours='$workinghours',
           lunchtimes='$lunchtimes'
    WHERE  guid='$agentid'";
    if ($conn->query($sql) === true) {
        echo "User created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// ------------------------------------------- Creating events in the db -------------------------------------------
// --------------- This is for name-book.php ---------------
function createevent($conn, $name, $date, $todate)
{
    $agentguid = $_SESSION["agentdata"]["guid"];
    $currentdate = date("Y-m-d H:i:s");
    $email = $_SESSION["agentdata"]["email"];
    $sql = "INSERT INTO `eventdata` (agentguid, submittedon, name, date, approved, todate)
    VALUES ('$agentguid', '$currentdate', '$name', '$date', 0, '$todate')";

    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// ------------------------------------------- Getting events from the db -------------------------------------------
function getevents($conn)
{
    header('Content-Type: application/json; charset=utf-8');
    $agentguid = $_SESSION["agentdata"]["guid"];
    // $sql = "SELECT * FROM `eventdata` WHERE agentguid='$agentguid' AND approved=1";
    $sql = "SELECT * FROM `eventdata`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row["name"];
            $date = $row["date"];
            $date = date('Y-m-d', strtotime($date));
            $todate = $row["todate"];
            $todate = date('Y-m-d', strtotime($todate));
            $id = $row["id"];
            $approved = $row["approved"];
            if ($approved == 1) {
                $style = "green";
            } elseif ($approved == 0) {
                $style = "orange";
            } else {
                $style = "red";
            }
            $events[] = ['title' => $title, 'start' => $date, 'end' => $todate, 'color' => $style];
        }
    } else {
        echo '{"status": 0}';
    }
    echo json_encode($events);
}

// ------------------------------------------- Getting user's next day off -------------------------------------------
// --------------- This is for name-holiday.php ---------------

// next day off
function nextDayOff($conn)
{
    $sql = "SELECT * FROM `eventdata` WHERE date >= NOW() LIMIT 1;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nextDayVal = $row["date"];
        $nextDay = date('l jS \of F Y', strtotime($nextDayVal));
        return $nextDay;
    }
}

// ------------------------------------------- Getting user's remaining days of their holiday -------------------------------------------
// --------------- This is for name-holiday.php ---------------

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

// ------------------------------------------- Getting next user off for Team Review -------------------------------------------
// --------------- This is for ream-review.php ---------------
// next person off
function nextPersonOff($conn)
{
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

// ------------------------------------------- Getting which users are off today -------------------------------------------
// --------------- This is for index.php ---------------
function usersOffToday($conn)
{
    $agentguid = $_SESSION["agentdata"]["guid"];

    $datefrom = date("Y-m-d");
    $sql = "SELECT * FROM `eventdata` WHERE date = ('$datefrom 00:00:00') AND approved=1 ORDER BY date ASC;";
    $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $eventguid = $row["agentguid"];

            $sqlUserName = "SELECT name FROM `users` WHERE guid = '$eventguid'";
            $resultUserName = $conn->query($sqlUserName);
            $rowUserName = $resultUserName->fetch_assoc();

            $username = "";
            $username .= "$rowUserName[name] <br>";

            echo $username;
        }
    }
}

// ------------------------------------------- Getting which users are off this week -------------------------------------------
// --------------- This is for index.php ---------------
function usersOffThisWeek($conn)
{
    $agentguid = $_SESSION["agentdata"]["guid"];

    $datefrom = date("Y-m-d");
    $dateto = Date('Y-m-d', strtotime('+7 days'));
    $sql = "SELECT * FROM `eventdata` WHERE date BETWEEN ('$datefrom 00:00:00') AND ('$dateto 00:00:00') AND approved=1 GROUP BY agentguid ORDER BY date;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $eventguid = $row["agentguid"];

            $sqlUserName = "SELECT name FROM `users` WHERE guid = '$eventguid'";
            $resultUserName = $conn->query($sqlUserName);
            $rowUserName = $resultUserName->fetch_assoc();

            $username = "";
            $username .= "$rowUserName[name] <br>";

            echo $username;
        }
    }
}
