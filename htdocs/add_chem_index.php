<?php
    include_once 'connect.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $sql ="INSERT INTO stock VALUES ('$id','$name','$price','$qty');";

    mysqli_query($conn,$sql);

    header('Location: /chem_index.php');

    die();


$conn->close();
?>
