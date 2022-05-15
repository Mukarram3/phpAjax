<?php

require_once("connection.php");

$cid=$_POST["cid"];

    $query="SELECT * FROM `state_tb` WHERE `country`= '$cid' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
?>

<option value="<?php echo $row["sid"]; ?>"><?php echo $row["sname"]; ?></option>

<?php
    }

    echo $row;

}

    

?>

