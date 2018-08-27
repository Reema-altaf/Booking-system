<?php  include('config.php'); ?>
<?php
	if (isset($_GET['edit'])) {
		$Customerid = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer WHERE Customer-ID=$Customerid");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$Customername = $n['Customername'];
			$Street = $n['Street'];
      $zipcode = $n['zipcode'];
      $city = $n['city'];
      $meetingdate = $n['meetingdate'];
      $Createdat = $n['Createdat'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Customer</title>
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
<?php $results = mysqli_query($db, "SELECT * FROM customer"); ?>

<table>
	<thead>
		<tr>
			<th>Customername</th>
      <th>Street</th>
      <th>Zipcode</th>
			<th >city</th>
      <th>meetingdate</th>
      <th>Created At</th>
			<th >Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
     <td><?php echo $row['Customername']; ?></td>
      <td><?php echo $row['Street']; ?></td>
      <td><?php echo $row['zipcode']; ?></td>
			<td><?php echo $row['city']; ?></td>
      <td><?php echo $row['meetingdate']; ?></td>
      <td><?php echo $row['Createdat']; ?></td>
      <td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="config.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

  <form method="post" action="config.php" >
		<div class="input-group">
		<input type="hidden" name="id" value="<?php echo $Customerid; ?>">
	</div>
<div class="input-group">

  <label>Customername</label>
  <input type="text" name="Customername" value="<?php echo $Customername; ?>">
</div>
<div class="input-group">
  <label>Street</label>
  <input type="text" name="Street" value="<?php echo $Street; ?>">
</div>
<div class="input-group">
  <label>ZipCode</label>
  <input type="text" name="zipcode" value="<?php echo $zipcode; ?>">
</div>
<div class="input-group">
  <label>City</label>
  <input type="text" name="city" value="<?php echo $city; ?>">
</div>
<div class="input-group">
  <label>MeetingDate</label>
  <input type="text" name="meetingdate" value="<?php date_default_timezone_set("Europe/Stockholm"); echo date("Y-m-d H:i:s"); ?>">
  <?php  echo date("Y-m-d H:i:s");?>
</div>
<div class="input-group">
  <label>Createdat</label>
  <input type="text" name="createdat" value="<?php echo $Createdat; ?>">
</div>
<div class="input-group">
  <?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
	<input class="btn" type="button" value="back" onclick="location='index.php'" />
<?php endif ?>
</div>
</form>
</body>
</html>
