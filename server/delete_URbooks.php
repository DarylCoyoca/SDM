<?php
include("crudoperation.php");
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM `issued_books` WHERE id=$id");
header("Location:unreturned_books.php");
?>