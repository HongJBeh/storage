<?php  
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "cssociety";
    
    $k = $_POST['id'];
    $k = trim($k);

    $con = mysqli_connect($hostname,$username,$password,$dbName);
    $sql = "Select * from events where Event='{$k}'";
    $res = mysqli_query($con,$sql);

    while($rows = mysqli_fetch_array($res)){
?>
<tr>
    <td> <?php echo $rows['EventID']; ?> </td>
    <td> <?php echo $rows['Event']; ?> </td>
    <td> <?php echo $rows['Venue']; ?> </td>
    <td> <?php echo $rows['Day']; ?> </td>
    <td> <?php echo $rows['Time']; ?> </td>
    <td> <?php echo $rows['Description']; ?> </td>
</tr>

<?php
    }
    echo $sql;
?>