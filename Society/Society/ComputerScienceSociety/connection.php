<?php
 
$conn = "";
  
try {
    define('DB_SERVER', 'airasia-db.cpfvj1jupn9o.us-east-1.rds.amazonaws.com');

    define('DB_USERNAME', 'airasia');

    define('DB_PASSWORD', 'airasia123');

    define('DB_DATABASE', 'Airasia');
  
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

