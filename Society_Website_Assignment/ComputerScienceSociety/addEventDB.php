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
            <h2>Add Event</h2>
            <form action="" method="post">
                <div class="form-group pb-2">
                    <label for="event">Event</label>
                    <input type="text" class="form-control" name="event" placeholder="Enter Event Title" autocomplete="off">
                         
                </div>
                <div class="form-group pb-2">
                    <label for="venue">Venue</label>
                    <input type="text" class="form-control" name="venue" placeholder="Enter the Venue" autocomplete="off">
                </div>
               <div class="form-group pb-2">
                    <label for="day">Day</label>
                    <input type="text" class="form-control" name="day" placeholder="Enter Event Day" autocomplete="off">
               </div>
               <div class="form-group pb-2">
                    <label for="time">Time</label>
                    <input type="text" class="form-control" name="time" placeholder="Enter Event Time" autocomplete="off">
               </div>
               <div class="form-group pb-2">
                   <label for="description">Description</label>
                   <input type="text" class="form-control" name="description" placeholder="Enter Event Description" autocomplete="off">
               </div>
                <?php       
                    if(isset($_POST['submit'])){
                        $event = trim($_POST['event']);
                        $venue = trim($_POST['venue']);
                        $day = trim($_POST['day']);
                        $time = trim($_POST['time']);
                        $description = trim($_POST['description']);
                        
                        $error['event'] = validateEvent($event);
                        $error['venue'] = validateVenue($venue);
                        $error['day'] = validateDay($day);
                        $error['time'] = validateTime($time);
                        $error['description'] = validateDescription($description);
                        $error = array_filter($error);
                        
                        if (empty($error))
                        {
                                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                $sql= '
                                        INSERT INTO events(Event, Venue, Day, Time, Description)
                                        VALUES (?, ?, ?, ?,?)
                                        ';

                                $smt = $con->prepare($sql);
                                $smt->bind_param("sssss", $event, $venue, $day, $time, $description);
                                $smt->execute();

                                if ($smt->affected_rows > 0)
                                    {
                                        printf('
                                            <div class="info pt-4 pb-4 text-success text-strong">
                                            New Events <strong>%s</strong> has been inserted.
                                            [ <a href="adminAddE.php">Back to list</a> ]
                                            </div>', $event);

                                        $event = $venue = $day = $time = $description = null;
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
                        else{
                        echo '<ul class="error text-danger">';
                        foreach ($error as $value) {
                            echo "<li>$value</li>";
                        }
                        echo '</ul>';
                    }
                    }
               ?>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <input type="button" class="btn btn-danger" value="Cancel" onclick="location='adminAddE.php'" />
               
               
            </form>
        </div>
    </body>
</html>
