<?php

require_once("connection.php");



  if(isset($_POST['date1']) && isset($_POST['date2'])){
    $min = $_POST['date1'];
    $max = $_POST['date2'];
    $sql = "SELECT * FROM `students_serialize` WHERE dob BETWEEN '$min' AND '$max'";
  }
  else{
    $sql = "SELECT * FROM `students_serialize` ORDER BY id asc";
  }

  $result = mysqli_query($conn,$sql);

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $dob = date('d M, Y',strtotime($row['dob']));

      ?>
                <tr>
<td align='center'> <?php echo $row["id"]; ?> </td>
<td align='center'> <?php echo $row["name"]; ?> </td>
<td align='center'> <?php echo $row["age"]; ?> </td>
<td align='center'> <?php echo $row["country"]; ?> </td>
<td align='center'> <?php echo $row["gender"]; ?> </td>
<td align='center'> <?php echo $dob; ?> </td></tr>

<?php

    }
    echo $row;
  }else{
    echo "<h2>No Record Found.</h2>";
  }

?>
