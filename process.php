<?php include 'database.php' ;


	
	$name=mysqli_real_escape_string($con,$_POST['uname']);
	$msg=mysqli_real_escape_string($con,$_POST['msg']);
	date_default_timezone_set('Asia/Kolkata');
	$time=date('h:i:s a',time());	
	
	if(!isset($name)|| $name==''  || !isset($msg) || $msg=='')
	{
		$error="please fill in ur name nd a msg";
		header("Location: index.php?error=".urlencode($error));
		exit();	
	}
else{
		
		$q="insert into shouts(user,message,time) values('$name','$msg','$time')";

		if(!mysqli_query($con,$q))
		{
			echo "error : ".mysqli_error();
		}
		else
		{
			echo "success";
			header("Location: index.php");
			exit();
		}
	}
