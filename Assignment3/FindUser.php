<?php
include('config.php');
?>
<?php
if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	 $sql = "SELECT * FROM `users` WHERE users.username='$username'";
    $result = mysqli_query($conn, $sql);
}
?>
<html>
    <head>
        <title>User Details</title>
    </head>
<body>
	<form action="FindUser.php" method="POST">
		Enter the Username:<input type="text" name="username" placeholder="Type Your Username" required><br>
		 <input type="submit" name="submit" value="Click Here To Submit Your Data">

	</form>
	
<?php
   
if (isset($_POST['submit'])) 
{

    if($result->num_rows > 0){
    ?>

    <table border="1px">
		<thead>
			<tr>
				<th>Name</th>
				<th>E-Mail</th>
				<th>Gender</th>
				<th>City</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			
            <?php
			// while($row = $result->fetch_array())
			while($row = $result->fetch_assoc()){?>
			<tr>
				<td><?php echo $row['username']?></td>
				<td><?php echo $row['email']?></td>
				<td><?php echo $row['gender']?></td>
				<td><?php echo $row['city']?></td>
				<td><a href="edit.php?id=<?php echo $row['id']?>">
				<input type="button" value="Edit"></a></td>
				<td><a href="delete.php?id=<?php echo $row['id']?>">
				<input type="button" value="Delete" onclick='return confirmation()'></a></td>
            </tr>
           <?php } ?>
		</tbody>
	</table>
<?php    }
else
{
	echo "No User Found";
}
}
?>
<script type="text/javascript">
	function confirmation(){
		var x=confirm('Are you sure you want to delete');
		if (x==true) {return true;}
		else{window.location.href='details.php'}
			return false;
	}
</script>
</body>
</html>