<?php
session_start();



if ($_SESSION["agentdata"] == "") {
    header('Location: login.php');
    exit;

}




?>