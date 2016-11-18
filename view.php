<?php
$query=mysql_connect("localhost","root","");
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	
	<?php
	if(!empty($_GET['msg']))
	{
		echo $_GET['msg'];
	}
	?>

	<div id="container">
		<div class="col-sm-offset-2 col-md-8"> 
			<br><br>
			<h1 style="text-align: center;text-decoration: underline;">HOLIDAY'S LIST</h1>
			<a class="btn btn-success" href="home.php">HOME</a>
			<table class="table table-striped table-hover table-bordered" style="text-align: center;">

				<tr>
					<td>ID</td>
					<td>DATE</td>
					<td>EVENT</td>
					<td>Delete</td>
					<!--td>Update</td-->
				</tr>
				
				<?php
				$i=0;
				$sql="SELECT * FROM `sust_student`";
				$result_set=mysql_query($sql);
				while($row=mysql_fetch_array($result_set))
				{
					?>
					<tr>
						<?php $id=$row['user_id1'] ?>
						<td><?php echo $i+=1; ?></td>
						<td><?php echo $row['date'] ?></td>
						<td><?php echo $row['event'] ?></td>
						<td>
							<form action='delete.php?id=<?php echo $row['user_id1'];?>' method="post">
								<input type="hidden" name="Did" value="<?php echo $row['user_id1']; ?>">
								<input type="submit" value="Delete" name="submit" style="background-color: #E53A18;color: blue; border-radius: 5px;"></form>
							</td>
							<!--td>
								<form action='home.php?uid=<//?php echo $row['user_id1'];?>' method="post">
									<input type="hidden" name="Uid" value="<?php //echo $row['user_id1']; ?>">
									<input type="submit" value="Update" name="submit" style="background-color: #61CB33;color: blue; border-radius: 5px;"></form>
								</td-->
							</tr>
							<?php
						}
						?>
					</table> 
				</div>
			</div>
		</body>
		</html>