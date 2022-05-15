<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax CRUD</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>PHP & Ajax CRUD</h1>

        <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div>
      </td>
    </tr>
    <tr>
      <td id="table-form">
        <form id="addForm">
          First Name : <input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Last Name : <input type="text" id="lname">
          <input type="submit" id="save-button" value="Save">
        </form>
      </td>
    </tr>



    <tr>

    <td id="table-data">

    <table border="1" cellspacing="0" cellpadding="10px" width="100%">

    <thead>

    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Action</th>

    </thead>
    <tbody class="table-data2">
    
    </tbody>

    </table>

    </td>

    </tr>


  </table>

  <div id="error-message"></div>
  <div id="success-message"></div>
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10px" width="100%">
      
      </table>
      <div id="close-btn">X</div>
    </div>
  </div>

<script src="js/jquery.js"></script>
<script>



  $(document).ready(function(){


//    load data 


function loadTable(){

$.ajax({

url: "ajax-load.php",
type: "post",
success: function(res){
$(".table-data2").html(res)
}

});

}


loadTable();




   //  inert data

   $("#save-button").click(function(e){

e.preventDefault();
fname=$("#fname").val();
lname=$("#lname").val();

$.ajax({

url: "ajax-insert.php",
type: "post",
data: {fname: fname, lname:lname},
success: function(res){
  if(res==1){
    loadTable();
    $("#success-message").html("record inserted");
    $("#success-message").show();

  }
  else{
    $("#error-message").html("record not inserted");
  }
}

});

});


//  delete data




$(document).on("click",".delete-btn",function(){

if(confirm("ARE you sure to delete")){

id= $(this).data("id");
element=this;

$.ajax({

url: "ajax-delete.php",
data: {id: id},
type: "post",
success: function(res){

if(res==1){
  loadTable();
  $(element).closest("tr").fadeOut();
  $("#success-message").html("Data Deleted").slideDown();
  $("#error-message").slideUp();

}
else{
  $("#error-message").html("no data deleted").slideDown(5000);
}

}
});

}

});



//   edit data


$(document).on("click",".edit-btn",function(){

$("#modal").show();

id= $(this).data("eid");
$.ajax({

  url: "load-update-form.php",
data: {id: id},
type: "post",
success: function(res){
$("#modal-form table").html(res);
}

});



});

$("#close-btn").click(function(){
  $("#modal").hide();
});


$(document).on("click","#edit-submit",function(){  

id=$("#edit-id").val();
fname=$("#edit-fname").val();
lname=$("#edit-lname").val();

$.ajax({

url: "ajax-update-form.php",
data: {id: id, fname: fname, lname: lname},
type: "post",
success: function(res){
if(res==1){
  $("#modal").hide();
  loadTable();
}


}

});

  });



//      live search


$(document).on("keyup","#search",function(){

search=$(this).val();

$.ajax({

url: "ajax-live-search.php",
data: {search: search},
type: "post",
success: function(res){

  $(".table-data2").html(res);

}
  



});

});





  });

  

   
</script>
</body>

</html>
