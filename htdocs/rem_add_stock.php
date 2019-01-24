<?ph
include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()

?>

<!DOCTYPE html>
<html>
<head>
<title>STOCK REGISTER</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="chem.css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript">

function bt1()
{
      document.form.action = " /stock_add_db.php";

}


function bt2()
{
     document.form.action = " /stock_rem_db.php";
}

</script>
<script src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
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


function showRow(row)
{
	var x=row.cells;
	document.getElementById("id").value = x[0].innerHTML;
	document.getElementById("name").value = x[1].innerHTML;
	//document.getElementById("qty").value = x[2].innerHTML;   ( this is for auto value into form feilds)
}

</script>



</head>
<body>
</br>
<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading"><h2> ADD OR REMOVE STOCK </h2></div>
	<div class="panel-body">
	<ul class="nav nav-tabs">
		<li class="active"><a href="rem_add_stock.php"><b>Refresh page</b></a></li>

	</ul></br>
		<div class="col-sm-6">


		<div class=".col-md-6">
          <div class="panel panel-default">
          <div class="bs-example">


		  <div class="form-group">
           <div class="input-group">
            <span class="input-group-addon">SEARCH</span>
            <input type="text" name="search_text" id="search_text" placeholder="Search by Item or Id" class="form-control" />
           </div>
         </div>



	       </div>
          </div>
        </div>





				<table class="table table-striped table-hover" id="main">
				<thead>
				  <tr>
					<th>ID</th>
					<th>Chemical Name</th>
					<th>QTY (KG)</th>
				  </tr>
				</thead>



				<tbody id="result">

				</tbody>
				</table>
			<div class="paging_link"></div>
		</div>
		<div class="col-sm-6">
			<form autocomplete="off" class="form-horizontal" method="post" name="form" >
				<div class="form-group">
				<label class="control-label col-sm-3">ID:</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="id" required placeholder="ID" name="id">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3"> Name:</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="name" required placeholder="Name" name="name" >
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">Suplier:</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="suplier" required placeholder="Suplier" name="suplier">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">INV NO:</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="inv" required placeholder="Invoice Number" name="inv">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">Price:</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="price" required placeholder="Price (per kg)" name="price">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">Quantity:</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="qty" required placeholder="Quantity (kg)" name="qty">
				</div>
			  </div>
			  <div class="form-group">
        <p class="submit">
            <input style="margin-left:155px; width:300px;" type="submit" name="" value="ADD" onclick="bt1();">
        </p>
        <p class="submit">
            <input style="margin-left:155px;width:300px;" type="submit" name="" value="REMOVE" onclick="bt2();">
        </p>
			  </div>
			</form>
		</div>
    </div>
</div>
<div class="panel-footer"></div>


</body>
</html>

<!--
extra part to be cut off after using for cut copy paste
<?php
/*
     if (isset($_POST['submit']))
    {
        $name = $_POST['name'];

        $price = $_POST['price'];

        $qty = $_POST['qty'];

        $total = $price*$qty;

        $id = $_POST['id'];

        $suplier = $_POST['suplier'];

        $inv = $_POST['inv'];

        $d = "CURRENT_DATE();";

//	$query = $mydb->execute('INSERT INTO purchase (productName, productPrice, productQuantity, totalprice, customerID) VALUES ("'.$pname.'","'.$price.'","'.$quantity.'","'.$total.'","'.$custID.'")');


   //   $query = $mydb->execute('INSERT INTO item VALUES ("'.$id.'", "'.$name.'", "'.$suplier.'", "'.$inv.'", "'.$qty.'", "'.$price.'", "'.$d.'")');






  if (!empty($query))
		 {
?>
			<div class="well">
				<h4>Purchase successfull!</h4>
				<div class="row">
				<div class="col-sm-2">Total Price</div><div class="col-sm-10">: <?php echo $total; ?></div>
				</div>
			</div>
<?php
		 } else {
         echo "Error: " ;
         }
      }
?>
	<div class="panel-footer"></div>
	</div>
*/
