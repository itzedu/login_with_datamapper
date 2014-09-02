<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body>
<div id="container">
<?php 	if (!empty($this->session->flashdata('error')))
		{
			$errors = $this->session->flashdata('error');
			foreach($errors as $error) {
				echo $error;
			}
		}		
 ?>
	<div id='login'>
            <form action='/logins/login' method="post">
                <p>
                    <label>Email: </label>
                    <input type='text' name='email'>
                </p>
                <p>
                    <label>Password: </label>
                    <input type='password' name='password'>
                </p>
                <input type='submit' value='Login'>
            </form>
   	</div>

    <div id='registration'>
        <form action='/users/create_user' method="post">
            <p>
                <label>First Name:</label>
                <input type='text' name='first_name'>
            </p>
            <p>
                <label>Last Name:</label>
                <input type='text' name='last_name'>
            </p>
            <p> 
                <label>Email Address:</label>
                <input type='text' name='email'>
            </p>
            <p>
                <label>Password:</label>
                <input type='password' name='password'>
            </p>
            <p>
                <label>Confirm Password:</label>
                <input type='password' name='confirm_password'>
            </p>
            <input type='submit' value='Register'>
        </form>
    </div>
</div>
</body>
</html>