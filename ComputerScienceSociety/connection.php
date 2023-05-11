<?php
 
$conn = "";
  
try {
    $servername = "airasia-db.cpfvj1jupn9o.us-east-1.rds.amazonaws.com";
    $dbname = "Airasia";
    $name = "airasia";
    $password = "airasia123";
  
    $conn = new PDO(
        "mysql:host=$servername; dbname=Airasia",
        $name, $password
    );
     
   $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 
?>

