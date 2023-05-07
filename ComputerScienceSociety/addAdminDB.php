 <?php 
    include('cssocietyDB.php');
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Event</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
        <style>
        body {background-color: rgb(201, 76, 76, 0.5);}
        </style>
    </head>
    <body>

        <div class="container my-5 bg-white pt-5 pb-5 rounded">
            <h2>Add New Admin</h2>
            <form action="" method="post">
                <div class="form-group pb-2">
                    <label for="admin">Admin</label>
                    <input type="text" class="form-control" name="admin" placeholder="Enter the Admin Name" autocomplete="off">
                </div>
                <div class="form-group pb-2">
                    <label for="adminID">Admin ID</label>
                    <input type="text" class="form-control" name="adminID" placeholder="Enter the Admin ID" autocomplete="off">
                </div>
                <div class="form-group pb-2">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Enter the Password" autocomplete="off">
                </div>
                
                   <?php       
                    if(isset($_POST['submit'])){
                        $admin = trim($_POST['admin']);
                        $adminID = trim($_POST['adminID']);
                        $password = trim($_POST['password']);
                        
                        $error['admin']    = validateAdmin($admin);
                        $error['adminID']  = validateAdminID($adminID);
                        $error['password'] = validatePassword($password);
                        $error = array_filter($error);
                        
                        if(empty ($error))
                        {
                        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                        $sql= '
                                INSERT INTO admin(adminName, adminID, adminPassword)
                                VALUES (?, ?, ?)
                                ';

                        $smt = $con->prepare($sql);
                        $smt->bind_param("sss", $admin, $adminID, $password);
                        $smt->execute();

                        if ($smt->affected_rows > 0)
                            {
                                printf('
                                    <div class="info pt-4 pb-4 text-success">
                                    New Admin <strong>%s</strong> has been inserted.
                                    [ <a href="adminAdm.php">Back to list</a> ]
                                    </div>', $admin);

                                $admin = $adminID = $password = null;
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
                                echo '<ul class="error text-danger">';
                                foreach ($error as $value) {
                                    echo "<li>$value</li>";
                                }
                                echo '</ul>';
                            }
                    }
               ?>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <input type="button" class="btn btn-danger" value="Cancel" onclick="location='adminAdm.php'" />
               
               
            </form>
        </div>
    </body>
</html>