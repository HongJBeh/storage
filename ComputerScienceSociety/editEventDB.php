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
            <h2>Edit Event</h2>
            
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $id = trim($_GET['id']);

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = "SELECT * FROM events WHERE EventID = '$id'";
            $result = $con->query($sql);

            if ($row = $result->fetch_object())
            {
                $event    = $row->Event;
                $venue   = $row->Venue;
                $day     = $row->Day;
                $time    = $row->Time;
                $description = $row->Description;
            }

            $result->free();
            $con->close();
        }
        else
        {
            $event = trim($_POST["event"]);
            $venue = trim($_POST["venue"]);
            $day = trim($_POST["day"]);
            $time = trim($_POST["time"]);
            $description = trim($_POST["description"]);
            
            $error['event'] = validateEvent($event);
            $error['venue'] = validateVenue($venue);
            $error['day'] = validateDay($day);
            $error['time'] = validateTime($time);
            $error['description'] = validateDescription($description);
            $error = array_filter($error);
            if(empty ($error)){
                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                $sql = '
                    UPDATE events
                    SET Venue = ?, Day = ?, Time = ?, Description = ?
                    WHERE Event = ?
                    ';

                $smt = $con->prepare($sql);
                // s - string, b - blob, i - integer, d - double
                $smt->bind_param("sssss", $venue, $day, $time, $description ,$event);

                if ($smt->execute())
                {
                    printf('
                        <div class="info pt-4 pb-4 text-success text-strong">
                        Event <strong>%s</strong> has been updated.
                        [ <a href="adminEditE.php">Back to Event Management</a> ]
                        </div>', $event);

                    //$id = $name = $gender = $program = null;
                }
                else
                {
                    echo '
                        <div class="error">
                        Database Error. Record is not updated.
                        </div>';
                }

                $smt->close();
                $con->close();
        }else
        {
            echo '<ul class="error text-warning">';
            foreach ($error as $value) {
                echo "<li>$value</li>";
            }
            echo '</ul>';
        }
    }
        ?>
        
            
            <form action="" method="post">
                <div class="form-group pb-2">
                    <label for="event">Event</label>
                    <input type="text" class="form-control" name="event" autocomplete="off" placeholder="
                        <?php
                        $event = (isset($event))? $event : '';
                        htmlInputText('event', $event, 191);
                        ?>
                </div>
                <div class="form-group pb-2">
                    <label for="venue">Venue</label>
                    <input type="text" class="form-control" name="venue"  autocomplete="off" placeholder="
                           <?php
                        $venue = (isset($venue))? $venue : '';
                        htmlInputText('venue', $venue, 191);
                        ?>
                </div>
               <div class="form-group pb-2">
                    <label>Day</label>
                    <input type="text" class="form-control" name="day" autocomplete="off" placeholder="
                        <?php
                        $day = (isset($day))? $day : '';
                        htmlInputText('day', $day, 191);
                        ?>
               </div>
               <div class="form-group pb-2">
                    <label for="time">Time</label>
                    <input type="text" class="form-control" name="time" autocomplete="off" placeholder="
                        <?php
                        $time = (isset($time))? $time : '';
                        htmlInputText('time', $time, 191);
                        ?>
               </div>
               <div class="form-group pb-2">
                   <label for="description">Description</label>
                   <input type="text" class="form-control" name="description" autocomplete="off" placeholder="
                       <?php
                        $description = (isset($description))? $description : '';
                        htmlInputText('description', $description, 191);
                        ?> 
               </div>
                
                <input type="submit" class="btn btn-primary" name="update" value="Update">
                <input type="button" class="btn btn-danger" value="Cancel" onclick="location='adminEditE.php'" />
            </form>
        </div>
    </body>
</html>
