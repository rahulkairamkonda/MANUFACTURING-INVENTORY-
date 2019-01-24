<?php
    include_once 'connect.php';

    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $id = $_POST['id'];
    $suplier = $_POST['suplier'];
    $inv = $_POST['inv'];

   /* for insert into purchase records database */
   $sql ="INSERT INTO item (id,name,suplier,inv,qty,price) VALUES ('$id','$name','$suplier','$inv','$qty','$price');";

   mysqli_query($conn,$sql);
  /* end of code */

    $sql_3 = "SELECT qty,price FROM stock WHERE id='$id' ";

    if($result = mysqli_query($conn, $sql_3))
    {
    if(mysqli_num_rows($result) > 0)
    {

        while($row = mysqli_fetch_array($result)){
         $dbqty = $row['qty'];
         $dbprice = $row['price'];
       }

        mysqli_free_result($result);
    }
    else
    {
        echo "No records matching your query were found.";
    }
    }


    $sql_1 = "UPDATE stock SET qty=qty+'$qty' WHERE id='$id' ";

    $tot = $qty * $price ;        //total of user purchase in rs

    $tot_db = $dbqty * $dbprice ; // total of stock in rs

    $tot_qty = $qty + $dbqty;     // total of qty in kg in db

    $a = $tot+$tot_db;

    $new_price = $a/$tot_qty ;

    $sql_2 = "UPDATE stock SET price='$new_price' WHERE id='$id' ";

    mysqli_query($conn,$sql_1);
    mysqli_query($conn,$sql_2);

    header('Location: /rem_add_stock.php');

    die();


$conn->close();
?>
