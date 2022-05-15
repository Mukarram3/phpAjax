<?php

require_once("connection.php");

$search=$_POST["search"];

$query="SELECT * FROM `students` WHERE `first_name` LIKE '%$search%' OR `last_name` LIKE '%$search%' ";

$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
?>


<tr><td> <?php echo $row["id"]; ?> </td>
<td> <?php echo $row["first_name"]; ?> </td>
<td> <?php echo $row["last_name"]; ?> </td>
<td> <button class="delete-btn" data-id=" <?php echo $row["id"]; ?> ">Delete</button> <button class="edit-btn" data-eid=" <?php echo $row["id"]; ?> ">Edit</button></td></tr>


<?php
    }

    echo $row;

}
else{
    echo "no data available";
}

?>
