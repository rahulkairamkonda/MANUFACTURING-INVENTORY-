<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">


    <script src="search_js_1.js"></script>
    <script src="search_js_2.js"></script>

    <link href="search.css" rel="stylesheet"/>
    <link rel="stylesheet" href="main2.css">

    <title>LIVE STOCK</title>
  </head>
  <body style="margin:50px; margin-top:10px;">
    <from autocomplete="off">
      <label for="name"><h1>Name</h1></label>
      <input type="text" name="name" placeholder="Name.." id="search_text">
    </form>

    <div id="result"></div>

  </body>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"add_stock.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
