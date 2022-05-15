<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Drag & Drop Using Dropzone With PHP</title>
  <link rel="stylesheet" href="css/style8.css">
  <link rel="stylesheet" href="css/dropzone.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<h1>Drag & Drop Upload Files<br> Using Dropzone With PHP</h1>
		</div>
		<div id="content">
      <form class="dropzone" id="file_upload"></form>
      <button id="upload_btn">Upload</button>
		</div>
        <div class="message success"></div>
        <div class="message error"></div>
	</div>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/dropzone.js"></script>
  <script>

$(".error").hide();
    $(".success").hide();

    Dropzone.autoDiscover =false;

  var mydropzone= new Dropzone("#file_upload",{

    

      url: "ajax-drag-drop-image.php",
      uploadMultiple: true,
      parallelUploads: 3,
      autoProcessQueue: false,
      success: function(file,res){

          if(res){
              $(".success").show();
              $(".error").hide();
              $(".success").html(res);
          }
          else{
            $(".success").hide();
              $(".error").show();
              $(".error").html(res);
          }

      }

  });

  $("#upload_btn").click(function(){

    mydropzone.processQueue();

  });


   
  </script>
</body>
</html>
