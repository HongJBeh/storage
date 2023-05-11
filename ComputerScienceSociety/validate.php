<?php
 
include_once('connection.php');
  
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $adminID = test_input($_POST["adminID"]);
    $adminPassword = test_input($_POST["adminPassword"]);
    $stmt = $conn->prepare("SELECT * FROM admin");
    $stmt->execute();
    $users = $stmt->fetchAll();
     
    foreach($users as $user) {
         
        if(($user['adminID'] == $adminID) &&
            ($user['adminPassword'] == $adminPassword)) {
                header("location: adminMain.php");
        }
        else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
}
 
?>


