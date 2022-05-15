<?php

require_once("connection.php");

    $query="SELECT * FROM `country_tb` ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
?>

<option value="<?php echo $row["cid"]; ?>"><?php echo $row["cname"]; ?></option>

<?php
    }

    echo $row;

}

    

?>

