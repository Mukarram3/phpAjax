<?php

require_once("connection.php");

if(isset($_POST["val1"]) && isset($_POST["val2"])){

$val1=$_POST["val1"];
$val2=$_POST["val2"];

}
else{
    $val1=18;
$val2=30;

}

$query="SELECT * FROM `students_serialize` WHERE `age` BETWEEN '$val1' AND '$val2' ";

$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
?>


<tr>
<td align='center'> <?php echo $row["id"]; ?> </td>
<td align='center'> <?php echo $row["name"]; ?> </td>
<td align='center'> <?php echo $row["age"]; ?> </td>
<td align='center'> <?php echo $row["country"]; ?> </td>
<td align='center'> <?php echo $row["gender"]; ?> </td></tr>


<?php
    }

    echo $row;
}
else{
    echo "no data available";
}

?>
