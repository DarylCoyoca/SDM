<?php
include_once("crudoperation.php");
if(isset($_POST['update'])) 
{	
	$id = mysqli_real_escape_string($con, $_POST['id']);
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$author = mysqli_real_escape_string($con, $_POST['author']);
	$publisher = mysqli_real_escape_string($con, $_POST['publisher']);
	$date_published= mysqli_real_escape_string($con, $_POST['date_published']);
		if(empty($title) || empty($author) || empty($publisher) || empty($date_published) ){				
		if(empty($title)) {
			echo "<font color='red'> Title field is empty.</font><br/>";
		}
		
		if(empty($author)) {
			echo "<font color='red'>Author field is empty.</font><br/>";
		}
		if(empty($publisher)) {
			echo "<font color='red'>Publisher field is empty.</font><br/>";
		}
		if(empty($date_published)) {
			echo "<font color='red'>Date Published field is empty.</font><br/>";
		}
				
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";		
	} else {	
		$result = mysqli_query($con, "UPDATE `library` SET `id`='$id',`title`='$title',`author`='$author',`publisher`='$publisher',`date_published`='$date_published' WHERE `id`=$id");
		header("Location: index.php");
	}
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM `library` WHERE `id`=$id");
while($res = mysqli_fetch_array($result))
{
	$title = $res['title'];
	$author = $res['author'];
	$publisher = $res['publisher'];
	$date_published = $res['date_published'];		
}
?>

<html>
  <head>
  <style>
  body{
	  background-image: url('image/library1.jpg');
	  background-repeat: no-repeat;
      background-size: cover;
  }
  .login-box {
  background-color: grey;
  opacity: 2;
  margin: auto;
  width: 400px;
  height: 580px;
  border-radius: 3px;
}
h1 {
  color: white;
  text-align: center;
  padding-top: 20px;
}

h4 {
  text-align: center;
  color: white;
}

form{
  width: 400px;
  margin-left: 20px;
}

form label{
  color: white;
  display: flex;
  margin-top: 20px;
  font-size: 20px;
   opacity: 2;
}

form input {
  width: 347px;
  padding: 10px;
  border: none;
  border: 2px solid gray;
  border-radius: 6px;
  outline: none;
}
button {
  background-color: #04AA6D;
  color: white;
  padding: 10px;
  margin: 20px 0;
  border: none;
  border: 2px solid grey;
  border-radius: 6px;
  cursor: pointer;
  width: 347px;
}
button:hover {
  opacity: 0.8;
}
.cancelbtn{
	width: 70px;
	background-color: darkred;
	list-style: none;
	color: white;
	margin: 8px 0;
}
.cancelbtn a{
	list-style: none;
	color: white;
}
  </style>
  </head>
  <body>
    <div class="login-box">
      <h1>Edit book data</h1>
	  
	 <form action="edit_books.php" method="post">
	  <div class="container">
	  
		<label for="title"><b>Title</b></label>
		<input type="text" name="title" value="<?php echo $title;?>">
		
		<label for="author"><b>Author</b></label>
		<input type="text"  name="author" value="<?php echo $author;?>">
		
		<label for="publisher"><b>Copyright</b></label>
		<input type="text"  name="publisher" value="<?php echo $publisher;?>">
		
		<label for="date_published"><b>Number of books</b></label>
		<input type="number"  name="date_published" value="<?php echo $date_published;?>">
		
		<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
		<button type="submit" class="submit" name="update" value="Update">Edit</button>
		<button type="button" class="cancelbtn"><a href="home.html">Cancel</a></button>
		
	  </div>
	</form>
 
    </div>
  </body>
</html>