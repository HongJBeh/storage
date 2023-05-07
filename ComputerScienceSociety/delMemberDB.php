 <?php 
    include('cssocietyDB.php');
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Event</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
        <style>
        body {background-color: rgb(201, 76, 76, 0.5);}
        </style>
    </head>
<body>
<div class="container my-5 bg-white pt-5 pb-5 rounded">
    <h1>Delete Member</h1>
    
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $id = trim($_GET['id']);
        
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM member WHERE No = '$id'";
        $result = $con->query($sql);
        
        if ($row = $result->fetch_object())
        {
            $no  = $row->No;
            $studentFirstName    = $row->StudentFirstName;
            $studentLastName   = $row->StudentLastName;
            $studentID  = $row->StudentID;
            $gender  = $row->Gender;
            $address  = $row->Address;
            $state  = $row->State;
            $postcode  = $row->Postcode;
            $city  = $row->City;
            $phoneNo = $row->PhoneNo;
            $emergencyPhNo  = $row->EmergencyPhNo;
            $relationship  = $row->Relationship;
            $password  = $row->Password;
            
            printf('
                <p class="h4 text-danger py-4">
                    Are you sure you want to delete the following Member?
                </p>
                <table border="1" cellpadding="5" cellspacing="0" class="table">
                    <tr>
                        <td>No.   :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Student First Name  :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Student Last Name    :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Student ID    :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Gender    :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Address   :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>State  :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Postcode   :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>City   :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>PhoneNo   :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>EmergencyPhNo    :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Relationship    :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Password    :</td>
                        <td>%s</td>
                    </tr>
                </table><br/>
                <form action="" method="post">
                    <input type="hidden" name="no" value ="%s" />
                    <input type="hidden" name="studentLastName" value ="%s" />
                    <input class="btn btn-success" type="submit" name="yes" value="Yes" />
                    <input class="btn btn-danger" type="button" value="Cancel" onclick="location=\'adminMember.php\'" />
                </form>',
                $no, $studentFirstName, $studentLastName, $studentID, $gender, $address, $state, $postcode, $city, $phoneNo, $emergencyPhNo, $relationship, $password, $no, $studentFirstName);
        }
        
        $result->free();
        $con->close();
    }
    else
    {
        $no   = trim($_POST["no"]);
        $studentLastName    = trim($_POST["studentLastName"]);
       
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = '
            DELETE FROM member
            WHERE no = ?
            ';
            
        $smt = $con->prepare($sql);
        $smt->bind_param("s", $no);
        $smt->execute();
            
        if ($smt->affected_rows > 0)
        {
            printf('
                <div class="info p-2">
                 Member <strong>%s</strong> has been successfully deleted.
                [ <a href="adminAdm.php">Back to list</a> ]
                </div>', $studentLastName);
        }
        else
        {
            echo '
                <div class="error">
                Database Error. Record not deleted.
                </div>';
        }
            
        $smt->close();
        $con->close();
    }
    
    ?>
    
</div>
</body>
</html>