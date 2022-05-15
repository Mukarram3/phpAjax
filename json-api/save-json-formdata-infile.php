

<?php

require_once("..//connection.php");

if(isset($_POST["submit"])){



if($_POST["fullname"] !="" && $_POST["age"]!="" && $_POST["city"]!=""){

  if(file_exists("json-data-file/student_data.json")){

    $encode_data=file_get_contents("json-data-file/student_data.json");
    $decode_data=json_decode($encode_data, true);
    $new_data=[
      "name"=>$_POST["fullname"],
      "age"=>$_POST["age"],
      "city"=>$_POST["city"],

    ];
    $decode_data[]=$new_data;
    $myall_data=json_encode($decode_data, JSON_PRETTY_PRINT);
    if(file_put_contents("json-data-file/student_data.json",$myall_data)){
      echo "successfuly saved data";
    }
    else{
      echo "cannot successfuly saved data";
    }

  }
  else{
    echo "File does not exist";
  }

}
else{
  echo "All fields are required";
}


}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & JSON File</title>
  <link rel="stylesheet" href="../css/style10.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>Save Form Data in JSON File</h1>
    </div>

    <div id="table-data">
      <form id="submit_form" method="post" action="">  
        <table width="100%" cellpadding="10px">
          <tr>
            <td width="150px"><label>Name</label></td>
            <td><input type="text" name="fullname" autocomplete="off" /></td>
          </tr>
          <tr>
            <td><label>Age</label></td>
            <td><input type="number" name="age" autocomplete="off" /></td>
          </tr>
          <tr>
            <td><label>City</label></td>
            <td>
              <input type="text" name="city" autocomplete="off" />   
            </td>
          </tr>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="submit" id="submit" /></td>
          </tr>
        </table>
      </form>  
    </div>
  </div>

</body>
</html>
