<?php
define('DB_SERVER', 'airasiadb.cpfvj1jupn9o.us-east-1.rds.amazonaws.com');

define('DB_USERNAME', 'airasia');

define('DB_PASSWORD', 'airasia123');

define('DB_DATABASE', 'Airasia');




function htmlInputText($name, $value = '', $maxlength = '',$place)
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s" placeholder="%s">',
            $name, $name, $value, $maxlength,$place);
}
function htmlInputPassword($name, $value = '', $maxlength = '',$place)
{
    printf('<input type="password" name="%s" id="%s" value="%s" maxlength="%s" placeholder="%s">',
            $name, $name, $value, $maxlength,$place);
}
function htmlRadioList($name, $items, $selectedValue = '')
{
    foreach ($items as $value => $text)
    {
        printf('
            <input type="radio" name="%s" id="%s" value="%s" %s>
            <label for="%s">%s</label>',
            $name, $value, $value,
            $value == $selectedValue ? 'checked="checked"' : '',
            $value, $text);
    }
}
function htmlSelect($name, $items, $selectedValue = '', $default = '')
{
    printf('<select name="%s" id="%s" > ', $name, $name);
    
    if ($default != null) {
       return "Invalid States";
    }
    
}
function validateStudentID($id)
{
    if ($id == null)
    {
        return 'Please enter <strong>Student ID</strong>.';
    }
    else if (!preg_match('/^\d{2}[A-Z]{3}\d{5}$/', $id))
    {
        return '<strong>Student ID</strong> is of invalid format. Format: 99XXX99999.';
    }
    else if (isStudentIDExist($id))
    {
        return '<strong>Student ID</strong> given already exist. Try another.';
    }
}

function isStudentIDExist($id)
{
    $exist = false;

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $id  = $con->real_escape_string($id);
    $sql = "SELECT * FROM member WHERE StudentID = '$id'";

    if ($result = $con->query($sql))
    {
        if ($result->num_rows > 0)
        {
            $exist = true;
        }
    }

    $result->free();
    $con->close();

    return $exist;
}
function validateStudentFirstName($firstname)
{
    if ($firstname == null) 
    {
        return 'Please enter <strong>Student Name</strong>.';
    }
    else if (strlen($firstname) > 15)
    {
        return '<strong>Student First Name</strong> must not more than 15 letters.';
    }
    else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $firstname))
    {
        return 'There are invalid letters in <strong>Student First Name</strong>.';
    }
}

function validateStudentLastName($lastname)
{
    if ($lastname == null) 
    {
        return 'Please enter <strong>Student Name</strong>.';
    }
    else if (strlen($lastname) > 50)
    {
        return '<strong>Student Last Name</strong> must not more than 50 letters.';
    }
    else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $lastname))
    {
        return 'There are invalid letters in <strong>Student Last Name</strong>.';
    }
}


function validateStudentAddress($address)
{
    if ($address == null) 
    {
        return 'Please enter <strong>Address</strong>.';
    }
    else if (strlen($address) > 100)
    {
        return '<strong>Address</strong> must not more than 100 letters.';
    }
 
    
}

function validateStudentRelationship($relship)
{
    if ($relship == null) 
    {
        return 'Please enter <strong>Relationship</strong>.';
    }
    else if (strlen($relship) > 20)
    {
        return '<strong>Relationship</strong> must not more than 0 letters.';
    }
    else if (!preg_match('/^[A-Za-z  @,\'\.\-\/]+$/', $relship))
    {
        return 'There are invalid letters in <strong>Relationship</strong>.';
    }
}

function validateStudentPassword($password){
    $uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if($password==null){
    return 'Please enter<strong>Password</strong>';
}

else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 || strlen($password)>30) {
    return 'Password should be at least 8 characters or no more then 30 characters in length and should include at least one upper case letter, one number, and one special character.';
}

}
function validateStudentConfirmPassword($confirmPass,$password){
    if($confirmPass==null){
        return 'Please enter <strong>Confirm Password</strong>';
    }
 else if ($confirmPass !== $password)
    {
        return 'Invalid <strong>passoword</strong> code detected.';
    }
 
}


function validateStudentCity($city)
{
    if ($city == null) 
    {
        return 'Please enter <strong>City</strong>.';
    }
    else if (strlen($city) > 20)
    {
        return '<strong>City</strong> must not more than 20 letters.';
    }
    else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $city))
    {
        return 'There are invalid letters in <strong>City</strong>.';
    }
}

function validateStudentPostcode($postcode)
{
    if ($postcode == null) 
    {
        return 'Please enter <strong>Postcode</strong>.';
    }
    else if (strlen($postcode) > 5 || strlen($postcode)<5)
    {
        return '<strong>Postcode</strong> must not more than or less than 5 number.';
    }
    else if (!preg_match('/^\d{5}$/', $postcode))
    {
        return 'There are invalid number in <strong>Postcode</strong>.';
    }
}

function validateStudentPhNum($phNum)
{
    if ($phNum == null) 
    {
        return 'Please enter <strong>Phone Number</strong>.';
    }
    else if (strlen($phNum) > 11 || strlen($phNum)<10)
    {
        return '<strong>Phone Number</strong> must not more than 11 number or less than 10 number.';
    }
    else if (!preg_match('/^\d+$/', $phNum))
    {
        return 'There are invalid number in <strong>Phone Number</strong>.';
    }
}

function validateStudentEmerPhNum($emerphNum)
{
    if ($emerphNum == null) 
    {
        return 'Please enter <strong>Emergency Phone Number</strong>.';
    }
    else if (strlen($emerphNum) > 11 || strlen($emerphNum)<10)
    {
        return '<strong>Emergency Phone Number</strong> must not more than 11 number or less than 10 number.';
    }
    else if (!preg_match('/^\d+$/', $emerphNum))
    {
        return 'There are invalid number in <strong>Emergency Phone Number</strong>.';
    }
}

function validateGender($gender)
{
    if ($gender == null)
    {
        return 'Please select a <strong>Gender</strong>.';
    }
 
}

function validateStates($States)
{
    if ($States == null)
    {
        return 'Please select a <strong>State</strong>.';
    }

}

?>
