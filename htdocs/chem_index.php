<?php

include_once 'connect.php';

$rowSQL = mysqli_query($conn,"SELECT MAX(id) AS max FROM stock;");
$row = mysqli_fetch_array( $rowSQL );
$largestNumber = $row['max'];
$largestNumber = $largestNumber + 1;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body {
  margin: 30px;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }

  .header-right {
    float: none;
  }
}
</style>
    <link rel="stylesheet" href="chem.css">
    <title>Chemical index</title>
  </head>
  <body>

    <div class="header">
      <a href="chem_index.php" class="logo">ADD NEW CHEMICALS (WITH INITIAL COST AND QTY)</a>
    </div>

    <form autocomplete="off" action="add_chem_index.php" method="post" class="form">

      <p class="id">
        <label for="id">ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="id" id="id" value="<?php echo $largestNumber; ?>" placeholder="ENTER ID">&nbsp;&nbsp;
      </p>

      <p class="name">
        <label for="name">NAME</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="name" id="name" value="" placeholder="ENTER Name">
      </P>

      <p class="name">
        <label for="price">PRICE</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="price" id="name" value="" placeholder="ENTER Price">
      </P>

      <p class="name">
        <label for="name">QTY</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="qty" id="name" value="" placeholder="ENTER Qty">
      </P>

      <p class="submit">
        <input type="submit" name="" value="SUBMIT">
      </p>

    </form>


  </body>
</html>
