<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Ajax Pagination</title>
  <link rel="stylesheet" href="css/style1.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>PHP & Ajax Serialize Form</h1>
    </div>

    <div id="table-data">
      <form id="submit_form">  
        <table width="100%" cellpadding="10px">
          <tr>
            <td width="150px"><label>Name</label></td>
            <td><input type="text" name="fullname" id="fullname" /></td>
          </tr>
          <tr>
            <td><label>Age</label></td>
            <td><input type="number" name="age" id="age" /></td>
          </tr>
          <tr>
            <td><label>Gender</label></td>
            <td>
              <input type="radio" name="gender" value="male" /> Male  
              <input type="radio" name="gender" value="female" /> Female
            </td>
          </tr>
          <tr>
            <td><label>Country</label></td>
            <td>
              <select name="country">
                 <option value="ind">India</option>
                 <option value="pk">Pakistan</option>
                 <option value="ban">Bangladesh</option>
                 <option value="ne">Nepal</option>
                 <option value="sl">Srilanka</option>
              </select>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input type="button" name="submit" id="submit" value="Submit" /></td>
          </tr>
        </table>
      </form>  
      <div id="response"></div>  
    </div>
  </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script>
  $(document).ready(function(){

    $("#submit").click(function(){

name=$("#fullname").val();
age=$("#age").val();

if(name=="" || age== "" || !$('input:radio[name=gender]').is(':checked')){
 
  $("#response").fadeIn().addClass("error-msg").removeClass(".success-msg").html("All fields are required");
  $("#response").fadeOut(5000);

}
else{

  $.ajax({

    url: "ajax-serialize.php",
    type: "post",
    data: $("#submit_form").serialize(),
    beforesend: function(){
      $("#response").fadeIn().addClass("process-msg").removeClass(".error-msg success-msg").html("Loading...");
    },
    success: function(res){
      $("#submit_form").trigger("reset");
      $("#response").fadeIn().addClass("success-msg").removeClass(".error-msg").html(res);
  $("#response").fadeOut(5000);
    }

  });

}


    });
    
  });
</script>
</body>
</html>
