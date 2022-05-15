<?php

require_once("connection.php");

$country=$_POST["country"];

$query="SELECT * FROM `students_serialize` WHERE `country` = '$country' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
?>


<tr>
<td align='center'> <?php echo $row["id"]; ?> </td>
<td align='center'> <?php echo $row["name"]; ?> </td>
<td align='center'> <?php echo $row["gender"]; ?> </td>
<td align='center'> <?php echo $row["country"]; ?> </td></tr>


<?php
    }

    echo $row;
}
else{
    echo "no data available";
}

?>
