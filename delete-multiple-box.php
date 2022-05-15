<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Delete Multiple Data</title>
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>
  <div id="main">
    <div id="header">
        <h1>Delete Multiple Data with <br>PHP & Ajax CRUD</h1>
    </div>
    <div id="sub-header">
      <button id="delete-btn">Delete</button>
    </div>
    <table border='0' class="tabledata" width='100%' cellpadding='10px' cellspacing='2'>

              <thead>
                  
                <th width='46px'></th>
                <th width='38px'>Id</th>
                <th width='144px'>Name</th>
                <th width='78px'>Age</th>
                <th width='57px'>City</th>
              </thead>

              <tbody id="table-data"></tbody>


    </table>

   
  </div>

  <div id="error-message"></div>
  <div id="success-message"></div>
  
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript"></script>
<script>

$(document).ready(function(){

function loaddata(){

    $.ajax({

        url: "ajax-load-select-box-data.php",
        type: "post",
        success: function(res){
$("#table-data").html(res);
        }

});

}

loaddata();



$("#delete-btn").click(function(){

    id=[];

    $(":checkbox:checked").each(function(key){

id[key]=$(this).val();


});

    if(id.length==0){
        alert("please select atleast one checkbox");
    }
    else{
        if(confirm("Are you sure to delete..?")){

            $.ajax({

                url: "ajax-delete-multiple-box.php",
                type: "post",
                data: {id: id},
                success: function(res){
                   if(res==1){
                    $("#success-msg").html("Record deleted").slideDown().slideUp(5000);
                    $("#error-msg").slideUp();
                    loaddata();
                   }else{
                    $("#error-msg").html("No Record deleted").slideDown().slideUp(5000);
                    $("#success-msg").slideUp();
                   }

                }

            });

        }
    }

   
    

});


});

</script>
</body>

</html>
