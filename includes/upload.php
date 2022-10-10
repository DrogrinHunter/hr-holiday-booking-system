<?php
include('../query.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$agentguid = $_SESSION["currentagentguid"];

$statusMsg = '';

// File upload path
$targetDir = "../assets/userfiles/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
  // Allow certain file formats
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
  if (in_array($fileType, $allowTypes)) {
    // Upload file to server
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
      // Insert image file name into database
      $sql = "INSERT INTO `userfiles` (filename, agentguid, uploadedon) VALUES ('$fileName', '$agentguid', NOW())";
      $insert = $conn->query($sql);

      if ($insert) {
        $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
      } else {
        $statusMsg = "File upload failed, please try again.";
      }
    } else {
      $statusMsg = "Sorry, there was an error uploading your file.";
    }
  } else {
    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
  }
} else {
  $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
