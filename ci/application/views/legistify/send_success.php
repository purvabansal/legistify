<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>User queries</title> 
	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('bootstrap/css/bootstrap.css');?>" rel="stylesheet">
</head>
<body>
	<?php
		echo "<h3>".$msg."</h3>";
		echo "<br>";
	
		$i = 1;
		
		foreach ($results as $result)
		
	{
		?>
	<h3> User <?php echo $i; ?> Queries with details:- </h3>
	<!--<form method="post" action="legistify/upload">-->
	<form enctype='multipart/form-data' action='upload/do_upload' method='post' class='form-horizontal'>
	<?php 
		$id = $result->id;
		$timestamp = date('M j Y g:i A', strtotime($result->time));
		$message = $result->message;
		$email = $result->email;
		?>
		<div class='form-group'>
			<label class='col-sm-2 control-label'>Date and Time  </label>
			<div class='col-sm-10'>
				<input type='text' class='form-control' placeholder="<?php echo $timestamp;?>" readonly /> 
			</div>
		</div>
		<div class='form-group'>
			<label class='col-sm-2 control-label'>User's Message  </label>
			<div class='col-sm-10'>
				<input type='text' class='form-control' placeholder="<?php echo $message; ?>" readonly /> 
			</div>
		</div>
			
		</div>
		<div class='form-group'>
			<label class='col-sm-2 control-label'>Message to the user  </label>
			<div class='col-sm-10'>
				<textarea name="message" rows="5" cols="40" placeholder ="Message to the user goes here!!!" class="form-control"></textarea>
			</div>
		</div>
		<div class='form-group'>
			<div class="col-sm-offset-2 col-sm-10">
			<input type="file" name="userfile" size="20" class="btn btn-default" />
			</div>
		</div>
	
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value="Send" class="btn btn-success"/>
		</div>
	</div>
	</form>

	
	<?php


		$i+=1;
		}
		
	?>
</body>
</html>