<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax</title>
  <link rel="stylesheet" href="css/style3.css">
</head>
<body>
  <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>Load Records using Select Box <br>
        with PHP & Ajax</h1>
      </td>
    </tr>
    <tr>
      <td id="table-form">
        <form id="form">
          Select country : <select id="city-box">
                          <option value="">Select country</option>
                        </select>
        </form>
      </td>
    </tr>
    <tr>
        <td>
        <form id="search-form">
     
     <div id="autocomplete">
       <input type="text" id="city-box2" placeholder="Enter country" autocomplete="off">
       <div>
           <ul id="cityList">


               
           </ul>
       </div>
     </div>
     <input type="submit" id="search-btn">
   </form>
        </td>
    </tr>
    <tr>
      <td id="table-data">

      <table  width="100%" border="1" cellspacing="0" cellpadding="10px">
      <thead>
          <th>id</th>
          <th>name</th>
          <th>gender</th>
          <th>country</th>
      </thead>

      <tbody id="data">
      
      </tbody>

      </table>

      </td>
    </tr>
  </table>
    
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

//    load select box country 

      $.ajax({

          url: "ajax-load-selectbox-country.php",
          type: "post",
          success: function(res){

              $("#city-box").append(res);

          }

      });

      // load table data

     

      $("#city-box").change(function(){

          country=$(this).val();
          if(country==""){
            $("#data").html("Please select country");
          }
          else{
              $.ajax({

                  url: "ajax-load-selectbox-data2.php",
                  type: "post",
                  data: {country: country},
                  success: function(res){
                    $("#form").trigger("reset");
                      $("#data").html(res);
                  }

              });
          }

      });


      //   auto complete textbox

$(document).on("keyup","#city-box2",function(){

    country=$(this).val();

    if(country!=""){
    
    $.ajax({

        url: "ajax-autocomplete-input.php",
        type: "post",
        data: {country: country},
        success: function(res){

            $("#cityList").show().html(res);

        }

    });

}
else{
    $("#cityList").fadeOut();
}

});


$(document).on("click","#cityList li",function(){

    $("#city-box2").val($(this).text());
    $("#cityList").fadeOut();

});


$(document).on("click","#search-btn",function(e){

    e.preventDefault();     //  prevent to save the page 

    country=$("#city-box2").val();
    if(country==""){
        alert("please enter city name");
    }
    else{
        $.ajax({

url: "ajax-load-selectbox-data2.php",
type: "post",
data: {country: country},
success: function(res){

    $("#search-form").trigger("reset");
    $("#data").html(res);

}

});
    }

});


  });
</script>
</body>

</html>
