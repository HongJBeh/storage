<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "cssociety";

    $con = mysqli_connect($hostname,$username,$password,$dbName);
    $sql = "Select Event from events";
    $res = mysqli_query($con,$sql);
    
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <title>Computer Science Society Events</title>
        
        <meta charset="UTF-8">
        <script type="text/javascript" src="eventsel.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
        <link href="eventStyle.css" rel="stylesheet" type="text/css" />
        <link href="topbtn.css" rel="stylesheet" type="text/css" />
        <script src="topbtn.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="mainStyle.css" rel="stylesheet">
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        
        
    </head>
    <body>
        <button onclick="topFunction()" id="upButton" title="Go to top">Top</button>
    <header  class="p-3 text-bg-dark">
        <div class="container">
            <div class=" d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li> 
                <a class="nav-link fs-5 pe-4 text-white link-primary" href="MainPage.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                  </svg>
                </a>
                </li>
                <li> <a class="nav-link fs-5 px-2 text-white link-primary" href="event.php">Event</a></li> 
                <li> <a class="nav-link fs-5 px-2 text-white link-primary" href="volunteer.php">Volunteer</a></li>  
             </ul>
             
             <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-4" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
              </form>

             <div class="text-end">
                <a class="nav-link px-2 text-white link-primary" href="login.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>
                </a>
              </div>

            </div>
        </div>
    </header>
        <div class="container p-5">
        <center>
            <h1>Computer Science Events:</h1>
        <select id="society" onchange="selectEvent()">
            <option disabled="disable" selected="true">------------------------------Select Event------------------------------</option>
            <?php while($rows = mysqli_fetch_array($res)){
                ?>
            <option value=" <?php echo $rows['Event']; ?> " > <?php echo $rows['Event']; ?> </option>
                
            <?php
            }
            ?>
            
        </select>
        
        <table class="table table-dark table-striped">
            <thead>
                <th style="width: 5%"> ID </th>
                <th style="width: 20%"> Event </th>
                <th style="width: 15%"> Venue </th>
                <th style="width: 10%"> Day </th>
                <th style="width: 10%"> Time </th>
                <th style="width: 25%"> Description </th>
            </thead>
            <tbody id="ans">
                <a href="eventJoin.php">
                <button>Join Event</button>
            </a>
            </tbody>
        </table>
        </center>
 
        </div>
            
           
    </body>
</html>
