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
            <h2>Add New Admin</h2>
            
            <?php
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $id = trim($_GET['id']);
        
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM admin WHERE no = '$id'";
        $result = $con->query($sql);
        
        if ($row = $result->fetch_object())
        {
            $adminName      = $row->adminName;
            $adminID    = $row->adminID;
            $adminPassword  = $row->adminPassword;
        }
        
        $result->free();
        $con->close();
    }
    else
    {
        $no             = trim($_POST["no"]);
        $adminName      = trim($_POST["adminName"]);
        $adminID        = trim($_POST["adminID"]);
        $adminPassword  = trim($_POST["adminPassword"]);
        
        $error['admin']    = validateAdmin($admin);
        $error['adminID']  = validateAdminID($adminID);
        $error['password'] = validatePassword($password);
        $error = array_filter($error);
        
        if(empty ($error))
        {
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = '
                UPDATE admin
                SET adminName = ?, adminID = ?, adminPassword = ?
                WHERE no = ?
                ';
            
            $smt = $con->prepare($sql);
            $smt->bind_param("ssss", $adminName, $adminID, $adminPassword, $no);
            
            if ($smt->execute())
            {
                printf('
                    <div class="info text-success">
                    Admin <strong>%s</strong> has been updated.
                    [ <a href="adminAdm.php">Back to list</a> ]
                    </div>', $adminName);
                
                $no = $adminName = $adminID = $adminPassword = null;
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
            echo '<ul class="error text-danger">';
            foreach ($error as $value) {
                echo "<li>$value</li>";
            }
            echo '</ul>';
        }
        ?>
            
            <form action="" method="post">
                <div class="form-group pb-2">
                    <label for="no">No</label>
                    <input type="text" class="form-control" name="no" autocomplete="off" placeholder="<?php
                        $no = (isset($no))? $no : '';
                        htmlInputText('mo', $no, 30);
                    ?>">
                </div>
                <div class="form-group pb-2">
                    <label for="adminName">Admin</label>
                    <input type="text" class="form-control" name="adminName" autocomplete="off" placeholder="<?php
                        $adminName = (isset($adminName))? $adminName : '';
                        htmlInputText('adminName', $adminName, 30);
                    ?>">
                </div>
                <div class="form-group pb-2">
                    <label for="adminID">Admin ID</label>
                    <input type="text" class="form-control" name="adminID" autocomplete="off" placeholder="<?php
                        $adminID = (isset($adminID))? $adminID : '';
                        htmlInputText('adminID', $adminID, 30);
                    ?>">
                </div>
                <div class="form-group pb-2">
                    <label for="adminPassword">Password</label>
                    <input type="text" class="form-control" name="adminPassword" autocomplete="off" placeholder="<?php
                        $adminPassword = (isset($adminPassword))? $adminPassword : '';
                        htmlInputText('adminPassword', $adminPassword, 16);
                    ?>">
                </div>
                     <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <input type="button" class="btn btn-danger" value="Cancel" onclick="location='adminAdm.php'" />
               
            </form>
        </div>
    </body>
</html>
