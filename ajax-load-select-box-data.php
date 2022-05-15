<?php

require_once("connection.php");

$query="SELECT * FROM `students_serialize` ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
?>


<tr><td align='center'> <input type="checkbox" value="<?php echo $row["id"]; ?>" class="id"> </td>
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
