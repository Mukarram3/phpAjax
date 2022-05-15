<?php

require_once("connection.php");

$id=$_POST["id"];

$query="SELECT * FROM `students` WHERE `id`='$id' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
?>


    <tr>
      <td>First name</td>
      <td><input type="text" value=" <?php echo $row["first_name"]; ?> " id="edit-fname">
      <input type="text" hidden value=" <?php echo $row["id"]; ?> " id="edit-id">
      </td>
      </tr>
      <td>Last name</td>
      <td><input type="text" value=" <?php echo $row["last_name"]; ?>" id="edit-lname"></td>
      </tr>
      <td></td>
      <td><input type="submit" id="edit-submit"></td>
    </tr>

<?php
    }
}
else{
    echo "no data available";
}

?>
