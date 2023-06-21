
<?php
include_once("crudoperation.php");
$result = mysqli_query($con, "SELECT * FROM `library` ORDER BY id DESC"); 
?>


<html>
<head>	
	<title>Books List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
</head>
body {
  font-family: "Lato", sans-serif;
}
.navbar{
	display: flex;
	height: 80px;
	justify-content: center;
	align-items: center;
	background-color: maroon;
	position: sticky;
	top: 0;
}
.navbar .logo{
	color: white;
	font-size: 2rem;
	position: margin-left;
}
.navbar .logo span{
	color: blue;
}
.navbar ul {
	list-style: none;
	display: flex;
}
.navbar ul li {
	padding: 10px 10px;
	position: relative;
}
.navbar ul li a{
	text-decoration: none;
	color: white;
	padding: 8px 5px;
	transition: all .5s ease;
}
.navbar ul li a:hover{
	background-color: white;
	color: black;
	box-shadow: 0 0 10px white;
}
.dropdown_menu{
	display: none; 
}
.navbar ul li:hover .dropdown_menu{
	display: block;
	position: absolute;
	left: 0px;
	top: 100%;
	background-color: maroon;
}

.dropdown_menu ul{
	display: block;
	margin: 10px;
}
.dropdown_menu ul li{
	width: 150px;
	padding: 10px;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
}
form.example button {
  float: left;
  width: 20px;
  padding: 2px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
.identifier{
	font-family: "Lato", sans-serif;
	display: flex;
	height: 37px;
	justify-content: center;
	align-items: center;
	background-color: grey;
	top: 0;
	color: white;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>
   <div class="navbar"> 
   <div class="logo">OC<span>E-Library.</span></div>
	  
	  <ul>
	  
		<li><a href="home.html">Home</a></li>
		<li><a href="issued_books.php">Issued Books</a></li>
		<li><a href="returned_books.php">Returned Books</a></li>
		<li><a href="add_books.html">Add Books</a></li>
		<li><a href="users.php">Users</a></li>
		

	  </ul>
	</div>
	
<div class="identifier">
<h1>List of Books</h1>
</div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for book title.." title="Type in a book title">
<table id="customers">
  <tr>
		<th>Title</th>
		<th>Author</th>
		<th>Copyright</th>
		<th>Number of books</th>		
		<th>Actions</th>
  </tr>
  	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['title']."</td>";
		echo "<td>".$res['author']."</td>";	
		echo "<td>".$res['publisher']."</td>";
		echo "<td>".$res['date_published']."</td>";				
		echo "<td><a href=\"edit_books.php?id=$res[id]\">Edit</a> | <a href=\"delete_books.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this Book Info?')\">Delete</a></td>";		
	}
	?>
</table>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>


