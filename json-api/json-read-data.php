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
      <h1>Read Json Data</h1>
    </div>

    <div id="table-data">
      
    </div>
  </div>



<script src="js/jquery.js"></script>
<script>

$(document).ready(function(){

$.ajax({

    url: "https://jsonplaceholder.typicode.com/posts",
    type: "GET",
    success: function(res){
        $.each(res,function(key,val){

            $("#table-data").text(val);

        });
    }

});

});

</script>
</body>
</html>
