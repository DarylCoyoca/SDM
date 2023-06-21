<?php
include("crudoperation.php");
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM `library` WHERE id=$id");
header("Location:index.php");
?>