<?php 
include('cssocietyDB.php');

?>

<!DOCTYPE html>
<<html>
    <head>
        <title>Join Event</title>
        <meta charset="UTF-8">
        
        <link href="topbtn.css" rel="stylesheet" type="text/css" />
        <script src="topbtn.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="mainStyle.css" rel="stylesheet">
        
        
        
    </head>
    
    
    
    
    
    
    <body>

        
        
        
        
        
        <div class="container my-5 bg-white pt-5 pb-5 rounded">
            <h2>Join Event</h2>
            <form action="" method="post">
                <div class="form-group pb-2">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" autocomplete="off">
                </div>
                <div class="form-group pb-2">
                    <label>Student ID</label>
                    <input type="text" class="form-control" name="studentID" placeholder="12XXX12345" autocomplete="off">
                </div>
               <div class="form-group pb-2">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="xxx@gmail.com" autocomplete="off">
               </div>
               <div class="form-group pb-2">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="0123456789" autocomplete="off">
               </div>
               <div class="form-group pb-2">
                   <label>Event ID</label>
                   <input type="text" class="form-control" name="eventID" placeholder="Enter Event ID" autocomplete="off">
               </div>
                <?php       
                    if(isset($_POST['submit'])){
                        $name = trim($_POST['name']);
                        $studentID = trim($_POST['studentID']);
                        $email = trim($_POST['email']);
                        $phone = trim($_POST['phone']);
                        $eventID = trim($_POST['eventID']);

                        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                        $sql= '
                                INSERT INTO memjoin(name, studentID, email, phone, eventID)
                                VALUES (?, ?, ?, ?,?)
                                ';

                        $smt = $con->prepare($sql);
                        $smt->bind_param("sssss", $name, $studentID, $email, $phone, $eventID);
                        $smt->execute();

                        if ($smt->affected_rows > 0)
                            {
                                printf('
                                    <div class="info pt-4 pb-4 text-success text-strong">
                                    <strong>%s</strong> has been joined.
                                    [ <a href="event.php">Back to list</a> ]
                                    </div>', $name);

                                $name = $studentID = $email = $phone = $eventID = null;
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
               ?>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <input type="button" class="btn btn-danger" value="Cancel" onclick="location='event.php'" />

    </body>
</html>
