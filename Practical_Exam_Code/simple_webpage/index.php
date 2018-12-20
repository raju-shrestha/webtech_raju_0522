<?php  include('server.php'); ?>

<html>
<head>
	<title>XAM</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
		function validate()
		{
				var name = document.forms["validateForm"]["username"];
				var pass = document.forms["validateForm"]["pwd"];

				if(name.value == "")
				{
					alert("enter name");
				}

				if (pass.value =="") {
					alert("enter mobile NO");
				}
				
		}
	</script>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Number</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['number']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>


	<form method="post" action="server.php" name="validateForm" onsubmit="return validate()">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Number</label>
<input type="number" name="number" value="<?php echo $number; ?>">
		</div>
		<div class="input-group">
<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>		</div>
	</form>
</body>
</html>