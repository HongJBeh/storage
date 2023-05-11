 <?php 
    include('cssocietyDB.php');
 ?>
<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <title>Edit Event</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
        <style>
        body {background-color: rgb(201, 76, 76, 0.5);}
        </style>
    </head>

<div class="container my-5 bg-white pt-5 pb-5 rounded">
    <h1>Edit Member</h1>
    
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $id = trim($_GET['id']);
        
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM member WHERE no = '$id'";
        $result = $con->query($sql);
        
        if ($row = $result->fetch_object())
        {
            $no  = $row->No;
            $studentFirstName = $row->StudentFirstName;
            $studentLastName   = $row->StudentLastName;
            $studentID = $row->StudentID;
            $gender  = $row->Gender;
            $address  = $row->Address;
            $state  = $row->State;
            $postcode  = $row->Postcode;
            $city  = $row->City;
            $phoneNo  = $row->PhoneNo;
            $emergencyPhNo  = $row->EmergencyPhNo;
            $relationship  = $row->Relationship;
            $password  = $row->Password;
             
            $result->free();
            $con->close();
        }else
        {
            $no  = trim($_POST["no"]);
            $studentFirstName  = trim($_POST["studentFirstName"]);
            $studentLastName   = trim($_POST["studentLastName"]);
            $studentID = trim($_POST["studentID"]);
            $gender  = trim($_POST["gender"]);
            $address  = trim($_POST["address"]);
            $state  = trim($_POST["state"]);
            $postcode  = trim($_POST["postcode"]);
            $city  = trim($_POST["city"]);
            $phoneNo  = trim($_POST["phoneNo"]);
            $emergencyPhNo  = trim($_POST["emergencyPhNo"]);
            $relationship  = trim($_POST["relationship"]);
            $password  = trim($_POST["password"]);

            
                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                $sql = '
                    UPDATE member
                    SET StudentFirstName = ?, StudentLastName = ?, StudentID = ?, Gender = ?, Address = ?, State = ?, Postcode = ?, City = ?, phoneNo = ?, EmergencyPhNo = ?, Relationship = ?, Password = ?
                    WHERE No = ?
                    ';

                $smt = $con->prepare($sql);
                $smt->bind_param("sssssssssssss", $studentFirstName, $studentLastName, $studentID, $gender, $address, $state, $postcode, $city, $phoneNo, $emergencyPhNo, $relationship, $no,);

                if ($smt->execute())
                {
                    printf('
                        <div class="info">
                        Student <strong>%s</strong> has been updated.
                        [ <a href="adminMember.php">Back to list</a> ]
                        </div>', $studentLastName);

                    //$id = $name = $gender = $program = null;
                }
                else
                {
                    echo '
                        <div class="error">
                        Opps. Database issue. Record not updated.
                        </div>';
                }

                $smt->close();
                $con->close();
            }
        }
    
    ?>
               <form action="" method="post">
                   <table border="1" cellpadding="5" cellspacing="0" class="table">
                    <tr>
                        <td><label for="no">No.   :</label></td>
                        <td>
                        <?php
                        $no = (isset($no))? $no : '';
                        htmlInputText('no', $no, 10);
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="studentFirstName">Student First Name  :</label></td>
                        <td>
                        <?php
                        $studentFirstName = (isset($studentFirstName))? $studentFirstName : '';
                        htmlInputText('studentFirstName', $studentFirstName, 30);
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="studentLastName">Student Last Name   :</label></td>
                        <td>
                        <?php
                        $studentLastName = (isset($studentLastName))? $studentLastName : '';
                        htmlInputText('studentLastName', $studentLastName, 30);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="studentID">StudentID    :</label></td>
                        <td>
                        <?php
                        $studentID = (isset($studentID))? $studentID : '';
                        htmlInputText('studentID', $studentID, 12);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender   :</label></td>
                        <td>
                        <?php
                        $gender = (isset($gender))? $gender : '';
                        htmlInputText('gender', $gender, 1);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="address">Address    :</label></td>
                        <td>
                        <?php
                        $address = (isset($address))? $address : '';
                        htmlInputText('address', $address, 50);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="state">State  :</label></td>
                        <td>
                        <?php
                        $state = (isset($state))? $state : '';
                        htmlInputText('state', $state, 15);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="postcode">Postcode   :</label></td>
                        <td>
                        <?php
                        $postcode = (isset($postcode))? $postcode : '';
                        htmlInputText('postcode', $postcode, 6);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="city">City   :</label></td>
                        <td>
                        <?php
                        $city = (isset($city))? $city : '';
                        htmlInputText('city', $city, 20);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="phoneNo">Phone Number    :</label></td>
                        <td>
                        <?php
                        $phoneNo = (isset($phoneNo))? $phoneNo : '';
                        htmlInputText('phoneNo', $phoneNo, 15);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="emergencyPhNo">Emergency Phone Number   :</label></td>
                        <td>
                        <?php
                        $emergencyPhNo = (isset($emergencyPhNo))? $emergencyPhNo : '';
                        htmlInputText('emergencyPhNo', $emergencyPhNo, 15);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="relationship">Relationship   :</label></td>
                        <td>
                        <?php
                        $relationship = (isset($relationship))? $relationship : '';
                        htmlInputText('relationship', $relationship, 15);
                         ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password">Password   :</label></td>
                        <td>
                        <?php
                        $password = (isset($password))? $password : '';
                        htmlInputText('password', $password, 20);
                         ?>
                        </td>
                    </tr>
                </table>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
        <input type="button" class="btn btn-danger" value="Cancel" onclick="location='adminMember.php'" />
    </form>    

    
</div>



