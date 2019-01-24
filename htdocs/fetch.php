<?php

include('db.class.php'); // call db.class.php

$mydb = new db(); // create a new object, class db()

$conn = $mydb->connect();

if(isset($_POST["query"]))
{

$q = $_POST["query"];

$results = $conn->prepare("SELECT * FROM stock WHERE name LIKE '%" . $q . "%'
OR id LIKE '%".$q."%' OR qty LIKE '%".$q."%'
");


}
else
{

 $results = $conn->prepare("SELECT * FROM stock ");

}

$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
	 echo '<tr onclick="javascript:showRow(this);">' .
    '<td>' . $row['id'] . '</td>' .
    '<td>' . $row['name'] . '</td>' .
    '<td>' . $row['qty'] . '</td>' .
	'</tr>';
}


?>
