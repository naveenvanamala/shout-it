<?php include 'database.php'; ?>
<?php
//create database
$shouts=mysqli_query($con,"select * from shouts");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shout It!!</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<div id="container">
		<header>
			<h1>Shout It! Shout Box</h1>
		</header>
		<div id="shouts">
			<ul>
				<?php while($row=mysqli_fetch_assoc($shouts)) : ?>
				<li class="shout"><span><?php echo $row["time"]; ?> -</span> <?php echo "<b>".$row['user']."</b>: ".$row['message'];?></li>
				<?php endwhile; ?> 	 	
			</ul>
		</div>
		<div id="input">
			<?php if(isset($_GET['error'])) :?>
				<div class="error" style="background: red; color: white; margin-bottom: 20px; padding: 5px;"><?php echo $_GET['error']; ?></div>

			<?php endif; ?>

			<form method="post" action="process.php">
				<input type="text" name="uname" placeholder="enter ur name">
				<input type="text" name="msg" placeholder="enter a msg">
				<br>
				<input class="shout_btn" type="submit" value="Shout it out">

				
			</form>
		</div>
	</div>
</body>
</html>