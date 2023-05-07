<?php  
$servername = "localhost";
$uname = "root";
$passw = "";
$databname = "cssociety";


$conn = mysqli_connect($servername, $uname, $passw, $databname);

if(isset($_POST['submit'])){
    
    if(!empty($_POST['name']) && !empty($_POST['studentID']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['eventID'])){
        
        $name = $_POST['name'];
        $studentID = $_POST['studentID'];
        $email = $_POST['email']; 
        $phone = $_POST['phone']; 
        $eventID = $_POST['eventID']; 
        
        $query = "insert into memjoin(name,studentID,email,phone,eventID) values('$name', '$studentID', '$email', '$phone', '$eventID')";
        
        $run = mysqli_query($conn,$query) or die(mysqli_error());
        
        if($run){
            echo "form submitted successfully";
        }
        else{
            echo "form not submitted";
        }
        
    }
    else{
        echo "all fields required";
    }
    
}



?>