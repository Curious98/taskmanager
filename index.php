<?php include("server.php");?>
<?
//editing the record in table 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM task WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$title = $n['title'];
			$details = $n['details'];
		}
	}
?>
<DOCTYPE html>
<html>
<head>
	<title>Task Manager</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
	<?php 
	echo $_SESSION['message']; 
	unset($_SESSION['message']);
	?>
	</div>
	<?php endif ?>
	<?php $results = mysqli_query($db, "SELECT * FROM task"); ?>
	
	<table>
	<thead>
	<tr>
	<th>Title</th>
	<th>Details</th>
	<th colspan="2">Action</th>
	</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
	<tr>
	<td><?php echo $row['title']; ?></td>
	<td><?php echo $row['details']; ?></td>
	<td>
	<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
	</td>
	<td>
	<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
	</td>
	</tr>
	<?php } ?>
	</table>
	<form method="post" action="server.php" >
	<div class="input-group">
	<input type="hidden" name="id" value="<?php echo"$id";?>">
	</div>
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="title" value="<?php echo"$title";?>">
		</div>
		<div class="input-group">
			<label>Details</label>
			<input type="text" name="details" value="<?php echo"$details";?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
			<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
	</form>
</body>
</html>