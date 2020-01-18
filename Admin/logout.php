<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin Logout...!</title>
	<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
</head>
<body>
	<?php
	session_start();

	if (isset($_SESSION['admin']))
	{
		unset($_SESSION['admin']);
		session_destroy();
		?>
			<script>
				sweetAlert(
						{
							title: "Logout !You are free private Browsing...!!",
							text: "Just wait for a Second",
							type: "success"
						},
						function () {
						window.location.href = 'index.php';
				});
			</script>
		<?php
		exit();
	}
	?>
</body>
</html>
