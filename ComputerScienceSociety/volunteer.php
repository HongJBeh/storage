
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Computer Science Society</title>
<link href="topbtn.css" rel="stylesheet" type="text/css" />
<script src="topbtn.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="mainStyle.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link href="volunteerRegistration.css" rel="stylesheet"/>

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

    
    
  <div class="container">
      <form action="" id="volunteer" name="volunteer" method="post">        
   <?php
      include('HelperMember.php');
      
      
         
      if (!empty($_POST))
    {
        $id           = trim($_POST['id']);
        $firstname    = trim($_POST['firstname']);
        $lastname     = trim($_POST['lastname']);
         isset($_POST['gender'])?$gender=$_POST['gender'] : $gender=NULL;
        $address      = trim($_POST['address']);
        isset($_POST['states'])?$States=$_POST['states'] : $States=NULL;
        $postcode     = trim($_POST['postcode']);
        $city         = trim($_POST['city']);
        $phNum        = trim($_POST['phNum']);
        $emerphNum    = trim($_POST['emerphNum']);
        $relship      = trim($_POST['relship']);
        $password     = trim($_POST['password']);
        $comfirmPass  = trim($_POST['comfirmPass']);
    
        $error['id']           = validateStudentID($id);
        $error['firstname']    = validateStudentFirstName($firstname);
        $error['lastname']     = validateStudentLastName($lastname);
        $error['gender']       = validateGender($gender);
        $error['states']       = validateStates($States);
        $error['address']      = validateStudentAddress($address);
        $error['postcode']     = validateStudentPostcode($postcode);
        $error['city']         = validateStudentCity($city);
        $error['phNum']        = validateStudentPhNum($phNum);
        $error['emerphNum']    = validateStudentEmerPhNum($emerphNum);
        $error['relship']      = validateStudentRelationship($relship);
        $error['password']     = validateStudentPassword($password);
        $error['comfirmPass']  = validateStudentConfirmPassword($comfirmPass,$password);
        $error = array_filter($error); //remove null values
        
        
            if (empty($error))
        {
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = '
                INSERT INTO member(StudentFirstName,StudentLastName,StudentID, Gender, Address, State,	Postcode, City, PhoneNo, EmergencyPhNo, Relationship, Password)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ';
            
            $smt = $con->prepare($sql);
            // s - string, b - blob, i - integer, d - double
            $smt->bind_param("ssssssssssss", $firstname,$lastname,$id, $gender, $address,$States,$postcode,$city,$phNum,$emerphNum,$relship,$comfirmPass);
            $smt->execute();
          
           
            if ($smt->affected_rows > 0)
            {
                printf('
                    <div class="info">
                    
                    Student <strong>%s %s</strong> has been inserted.
                   
                    </div>', $firstname,$lastname);
                
                $id = $firstname= $lastname= $comfirmPass = $gender =$address= $States= $city= $postcode= $phNum= $emerphNum= $relship = null;
            }
            else
            { 
                echo '
                    <div class="error">
                    Opps. Database issue. Record not inserted.
                    </div>';
            }
               $smt->close();
            $con->close();
        }
        
        else
        {
            echo '<ul class="error">';
            foreach ($error as $value) {
                echo "<li>$value</li>";
            }
            echo '</ul>';
        }
        
    }
    
            
   ?>
              
            
              <h1>Volunteer Form</h1>
                
               <label for="name">Student Name :</label>
                
                    <?php
                        $firstname = (isset($firstname))? $firstname : '';
                        htmlInputText('firstname', $firstname, 20,'First Name');
                     
                    ?>
               
                    <?php
                     
                        $lastname = (isset($lastname))? $lastname : '';
                        htmlInputText('lastname', $lastname, 50,'Last Name');
                    ?>
               <br><br>
                 <label for="id">Password :</label>
              <?php
                        $password = (isset($password))? $password : '';
                        htmlInputPassword('password', $password, 30,'Password');
                    ?>
                
                
                   <td>
                       <label for="id">Confirm Password :</label>
                    <?php
                        $comfirmPass = (isset($comfirmPass))? $comfirmPass : '';
                        htmlInputPassword('comfirmPass', $password, 30,'Re-enter');
                    ?>
                       <br><br>
                <label for="id">Student ID :</label>
             
                    <?php
                        $id = (isset($id))? $id : '';
                        htmlInputText('id', $id, 10,'Student ID');
                    ?>
                <br><br>
                <label for="gender">Gender :</label>
               <input type="radio" name='gender' id="male" value="M" >
               <label for="male">Male</label>
                <input type="radio" name='gender' id="female" value="F" >
                  <label for="male">Female</label>
                <br><br>
             <label for="address">Address :</label>
              <?php
                        $address = (isset($address))? $address : '';
                        htmlInputText('address', $address, 100,'Address');
                    ?>
             
             <br><br>
               <label for="State">State :</label>
              <select id="State" name='states'>
       <option value='' > --Select--</option>
                   <option value='Johor'> Johor</option>
             <option value='Kedah'>Kedah</option>
             <option value='Kelantan'>Kelantan</option>
             <option value='Malacca'>Malacca</option>
             <option value='Negeri Sembilan'> Negeri Sembilan</option>
                <option value='Pahang'>Pahang</option>
                <option value='Penang'>Penang</option>
                <option value='Perak'>Perak</option>
                <option value='Perlis'>Perlis</option>
                <option value='Sabah'>Sabah</option>
                <option value='Sarawak'>Sarawak</option>
                <option value='Selangor'>Selangor</option>
                <option value='Terengganu'>Terengganu</option>
               <option value='Kuala Lumpur'>Kuala Lumpur</option>
                <option value='Labuan'>Labuan</option>
                <option value='Putrajaya'>Putrajaya</option>
               </select>
             
                      
               <label for="postcode">Postcode :</label>
               <?php
                        $postcode = (isset($postcode))? $postcode : '';
                        htmlInputText('postcode', $postcode, 5,'Postcode');
                    ?>
               <label for="city">City :</label>
               <?php
                        $city = (isset($city))? $city : '';
                        htmlInputText('city', $city, 20,'City');
                    ?>
               <br><br>
               <label for="phNum">Phone No :</label>
               <?php
                        $phNum= (isset($phNum))? $phNum : '';
                        htmlInputText('phNum', $phNum, 11,'012 345 6789');
                    ?>
               <br><br>
                <label for="emerPhNum">Emergency Phone No :</label>
               <?php
                        $emerphNum= (isset($emerphNum))? $emerphNum : '';
                        htmlInputText('emerphNum', $emerphNum, 11,'012 345 6789');
                    ?>
                   <label for="relShip">Relationship :</label>
               <?php
                        $relship= (isset($relship))? $relship : '';
                        htmlInputText('relship', $relship, 20,'Parent / Guardian');
                    ?>
                   <br><br>
                    <input type="submit" id="done" name="done" value="Submit"/>
        <input type="button" id="done" value="Cancel" onclick="location='MainPage.php'">
        </form>
</div>
    

<footer class="bg-dark text-center text-white">

  <div class="container pt-4">

    <footer class="bg-dark text-center text-white">
    <section class="mb-2">

      <div class="row">

        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="event.php" class="nav-link text-white link-primary ">Event</a>
            </li>
            <li>
              <a href="volunteer.php" class="nav-link text-white link-primary">Volunteer</a>
            </li>
          </ul>
        </div>


        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Contact Us</h5>

          <ul class="list-unstyled">
              <li>  <p>TARUC Penang Branch Campus</p></li>
              <li><p>Publicity Committee</p></li>
            <li>
              <a class="text-white link-primary" href="mailto:ooizh-pm21@student.tarc.edu.my">ooizh-pm21@student.tarc.edu.my</a>
            </li>
          </ul>
        </div>


        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
                <a class="btn btn-outline-primary btn-floating m-2" href="https://www.facebook.com/TARUCPBCSS/about/?ref=page_internal" role="button">
                  <i class="fab fa-facebook-f"></i>
                </a>

                <a class="btn btn-outline-primary btn-floating m-2" style="width:39px; text-align: center;" href="https://www.instagram.com/cs_taruc/?hl=en" role="button">
                  <i class="fab fa-instagram"></i>
                </a>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>

  <hr style="color:rgb(97, 97, 97);background-color:rgb(37, 37, 37)">
  <div class="text-center pb-2 text-bg-dark">
    <p class="text-white"><small>@Computer Science Society Taruc Penang</small></p>
  </div>
</footer>

</body>
</html>