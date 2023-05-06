<?php
 
$conn = "";
  
try {
    $servername = "localhost";
    $dbname = "cssociety";
    $name = "root";
    $password = "";
  
    $conn = new PDO(
        "mysql:host=$servername; dbname=cssociety",
        $name, $password
    );
     
   $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 
?>

