<html>
<head>
	<title>Add Books</title>
</head>
<body>
<?php
include_once("crudoperation.php");
if(isset($_POST['Submit'])) {	
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$author = mysqli_real_escape_string($con, $_POST['author']);
	$publisher = mysqli_real_escape_string($con, $_POST['publisher']);
	$date_published = mysqli_real_escape_string($con, $_POST['date_published']);
		if(empty($title) || empty($author) || empty($publisher) || empty($date_published)){				
		if(empty($title)) {
			echo "<font color='red'> Title field is empty.</font><br/>";
		}
		
		if(empty($author)) {
			echo "<font color='red'>Author field is empty.</font><br/>";
		}
		if(empty($publisher)) {
			echo "<font color='red'>Copyright field is empty.</font><br/>";
		}
		
		if(empty($date_published)) {
			echo "<font color='red'>Number of books field is empty.</font><br/>";
		}
				
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		 $sql="INSERT INTO `library`(`id`, `title`,`author`,`publisher`,`date_published`) VALUES ('','$title','$author','$publisher','$date_published')";
		 $result = mysqli_query($con,$sql);
		echo "<font color='green'>New book added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
