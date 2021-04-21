<?php

$conn = mysqli_connect("localhost", "pruebapractica", "pruebapractica", "pruebapractica");

$id = $_GET["id"];
echo $id;

if ($conn->connect_error) {

     die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM `compra` WHERE id = '$id'";
$result = $conn->query($sql);

header("Location: index.php");

?>
