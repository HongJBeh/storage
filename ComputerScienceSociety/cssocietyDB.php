<?php

define('DB_SERVER', 'airasia.cpfvj1jupn9o.us-east-1.rds.amazonaws.com');

define('DB_USERNAME', 'airasia');

define('DB_PASSWORD', 'airasia1234');

define('DB_DATABASE', 'Airasia');

function htmlinputText($name, $value = '', $maxlength = '')
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s">',
            $name, $name, $value, $maxlength);
}

function validateEvent($event){
    if($event == null){
        return 'Please Enter the <strong>Event Name</strong>.';
    }
}

function validateVenue($venue){
    if($venue == null){
        return 'Please Enter the <strong>venue</strong>.';
    }
}

function validateDay($day){
    if($day == null){
        return 'Please Enter the <strong>Day</strong>.';
    }
}

function validateTime($time){
    if($time == null){
        return 'Please Enter the <strong>Time</strong>.';
    }
}

function validateDescription($description){
    if($description == null){
        return 'Please Enter the <strong>description </strong>.';
    }
}

function validateAdmin($admin){
    if($admin == null){
        return '<strong>admin </strong> cannot be empty.';
    }
}
function validateAdminID($adminID){
    if($adminID == null){
        return '<strong>adminID </strong> cannot be empty.';
    }
}
function validatePassword($password){
    if($password == null){
        return '<strong>password </strong> cannot be empty.';
    }
}

?>

