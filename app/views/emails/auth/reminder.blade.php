<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		 <p>Dear customer,</p>
        <p>      </p> 
		<div>
			<p>To reset your password, please complete this form: {{ URL::to('password/reset', array($token)) }}</p> 
			<p>This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.</p> 
			<p>Cheers </p> 
			<p>The Delightful Bus Company</p> 
		</div>
	</body>
</html>
