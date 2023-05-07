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
    <h1>Delete Event</h1>
    
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $id = trim($_GET['id']);
        
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM events WHERE EventID = '$id'";
        $result = $con->query($sql);
        
        if ($row = $result->fetch_object())
        {
            $eventID  = $row->EventID;
            $event    = $row->Event;
            $venue   = $row->Venue;
            $day     = $row->Day;
            $time    = $row->Time;
            $description = $row->Description;
            
            printf('
                <p class="h4 text-danger py-4">
                    Are you sure you want to delete the following event?
                </p>
                <table border="1" cellpadding="5" cellspacing="0" class="table">
                    <tr>
                        <td>Event ID    :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Event Name  :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Venue       :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Day         :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Time        :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Description :</td>
                        <td>%s</td>
                    </tr>
                </table><br/>
                <form action="" method="post">
                    <input type="hidden" name="eventID" value ="%s" />
                    <input type="hidden" name="event" value ="%s" />
                    <input class="btn btn-success" type="submit" name="yes" value="Yes" />
                    <input class="btn btn-danger" type="button" value="Cancel" onclick="location=\'adminEditE.php\'" />
                </form>',
                $eventID, $event, $venue, $day, $time, $description, $eventID, $event);
        }
        
        $result->free();
        $con->close();
    }
    else
    {
        $eventID   = trim($_POST["eventID"]);
        $event    = trim($_POST["event"]);
       
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = '
            DELETE FROM events
            WHERE EventID = ?
            ';
            
        $smt = $con->prepare($sql);
        // s - string, b - blob, i - integer, d - double
        $smt->bind_param("s", $eventID);
        $smt->execute();
            
        if ($smt->affected_rows > 0)
        {
            printf('
                <div class="info p-2">
                 Event <strong>%s</strong> has been successfully deleted.
                [ <a href="adminEditE.php">Back to list</a> ]
                </div>', $event);
                
            //$id = $name = $gender = $program = null;
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