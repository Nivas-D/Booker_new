<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>Please click on the following link to reset your password</h1>
<?php echo  env('APP_URL').'/reset-password-email/'.$encrypted_id; ?>
</body>
</html>
