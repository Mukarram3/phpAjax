<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dynamic Dependent Select Box</title>
  <link rel="stylesheet" href="css/style9.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<h1>Dynamic Dependent Select Box in<br> PHP & jQuery Ajax</h1>
		</div>
		<div id="content">
			<form id="form-data" method="">
        <label>Country : </label>
        <select id="country">
        	<option value="">Select Country</option>
        </select>
				<br><br>
        <label>State : </label>
        <select id="state">
        	<option value=""></option>
        </select>
        <input type="submit" style="margin-top:40px" value="save" class="submit btn btn-primary">

      </form>
    

		</div>
	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

      function loadData(){

      $.ajax({

          url: "ajax-load-country-state.php",
          type: "post",
          success: function(res){

            $("#country").append(res);
             
          }

      });

      }

      loadData();

      $("#country").on("change",function(){

          var cid=$("#country").val();

          if(cid!=""){

            $.ajax({

            url: "ajax-load-state.php",
            type: "post",
            data: {cid: cid},
            success: function(res){

            $("#state").html(res);
   
            }

            });
            
          }
          else{
            $("#state").html("");
          }

          

      });


$(".submit").click(function(e){

e.preventDefault();

var cid=$("#country").val();
var sid=$("#state").val();

if(cid!="" && sid!=""){

  $.ajax({

url: "ajax-insert-country-state.php",
type: "post",
data: {cid: cid, sid:sid},
success: function(res){
  if(res==1){
    
    alert("Data saved successfuly");
    $("#form-data").trigger("reset");
    $("#state").html("");

  }
  else{
    alert("cannot saved record");
  }
}

});

}
else{
  alert("please enter all fields");
}



});



  	
  });
</script>
</body>
</html>
