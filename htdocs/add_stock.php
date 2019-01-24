<?php

    $connect = mysqli_connect("localhost", "root", "", "omsai");
    $output = '';

// seacrh is below this line

    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($connect, $_POST["query"]);
     $query = "
      SELECT * FROM stock
      WHERE name LIKE '%".$search."%'
      ";
    }
    else {
      $query = "
   SELECT * FROM stock ORDER BY name ";
    }


    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
     $output .= '
      <div class="table-responsive">
      <HR>
      <h1>LIVE STOCK FEED</h1>
       <table class="table table bordered">
        <tr>
         <th>ID</th>
         <th>NAME</th>
         <th>QTY (KG)</th>
         <th>PRICE (PER KG)</th>
        </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["name"].'</td>
        <td>'.$row["qty"].'</td>
        <td>'.$row["price"].'</td>
      </tr>
      ';
     }
     echo $output;
    }
    else
    {
     echo 'Data Not Found';
    }

    die();


$conn->close();

/* https://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html */

?>
