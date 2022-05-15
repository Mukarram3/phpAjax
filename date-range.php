<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax</title>
  <!-- jquery ui css -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- style.css -->
  <link rel="stylesheet" href="css/style4.css">
</head>

<body>
  <div id="main">
    <div id="header">
        <h1>Search in Date Range <br>using PHP & Ajax</h1>
    </div>
    <div id="date-wrap">
      <label for="from">From</label>
      <input type="text" id="from" autocomplete="off">
      <label for="to">to</label>
      <input type="text" id="to" autocomplete="off">
    </div>
      <p>Animations:<br>
  <select id="anim">
    <option value="show">Show (default)</option>
    <option value="slideDown">Slide down</option>
    <option value="fadeIn">Fade in</option>
    <option value="blind">Blind (UI Effect)</option>
    <option value="bounce">Bounce (UI Effect)</option>
    <option value="clip">Clip (UI Effect)</option>
    <option value="drop">Drop (UI Effect)</option>
    <option value="fold">Fold (UI Effect)</option>
    <option value="slide">Slide (UI Effect)</option>
    <option value>None</option>
  </select>
</p>
      <p>Format options:<br>
  <select id="format">
    <option value="mm/dd/yy">Default - mm/dd/yy</option>
    <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
    <option value="d M, y">Short - d M, y</option>
    <option value="d MM, y">Medium - d MM, y</option>
    <option value="DD, d MM, yy">Full - DD, d MM, yy</option>
    <option value="&apos;day&apos; d &apos;of&apos; MM &apos;in the year&apos; yy">With text - &apos;day&apos; d &apos;of&apos; MM &apos;in the year&apos; yy</option>
  </select>
</p>
      <p>
  <select id="locale">
    <option value="ar">Arabic (&#x202B;(&#x627;&#x644;&#x639;&#x631;&#x628;&#x64A;&#x629;</option>
    <option value="zh-TW">Chinese Traditional (&#x7E41;&#x9AD4;&#x4E2D;&#x6587;)</option>
    <option value>English</option>
    <option value="fr" selected="selected">French (Fran&#xE7;ais)</option>
    <option value="he">Hebrew (&#x202B;(&#x5E2;&#x5D1;&#x5E8;&#x5D9;&#x5EA;</option>
  </select></p>
    <div id="content">
      <table id="table-data" border="0" width="100%" cellpadding="10px">
        <thead>
          <th width="50px">Id</th>
          <th>Name</th>
          <th width="130px">AGE</th>
          <th width="130px">country</th>
          <th width="130px">gender</th>
          <th width="130px">DOB</th>

        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
  <!-- jquery -->
  <script src="js/jquery.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
  <script>
    
    $(document).ready(function(){

        var minDate;
        var maxDate;
        $( "#datepicker" ).datepicker();
        
        // animation
        
    $( "#anim" ).on( "change", function() {
      $( "#from" ).datepicker( "option", "showAnim", $( this ).val() );
        $( "#to" ).datepicker( "option", "showAnim", $( this ).val() );
    });
        
        // date formate options
        
        $( "#format" ).on( "change", function() {
      $( "#from" ).datepicker( "option", "dateFormat", $( this ).val() );
            $( "#to" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
        
        //  font style option
        
        
        $( "#locale" ).on( "change", function() {
      $( "#from" ).datepicker( "option",
        $.datepicker.regional[ $( this ).val() ] );
            console.log($( this ).val());
            $( "#to" ).datepicker( "option",
        $.datepicker.regional[ $( this ).val() ] );
    });
        
        
        var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
            showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date",
          changeMonth: true,
          numberOfMonths: 1,
          changeYear: true,
          yearRange: "1990:2005"
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
          minDate==$(this).val();
        if(minDate!="" && maxDate!=""){
            loadTable(minDate,maxDate);
        }
        }),
      to = $( "#to" ).datepicker({
          showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date",
        changeMonth: true,
          numberOfMonths: 1,
          changeYear: true,
          yearRange: "1990:2005"
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
        maxDate==$(this).val();
        if(minDate!="" && maxDate!=""){
            loadTable(minDate,maxDate);
        }
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }



function loadTable(date1,date2){
    $.ajax({

        url: "ajax-date-range.php",
        type: "post",
        data: {date1: date1, date2: date2},
        success: function(res){
            $("#table-data tbody").html(res);
        }

    });
}


loadTable(minDate,maxDate);


    });
  
  </script>

</body>
</html> 


