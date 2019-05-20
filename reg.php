<?php
include('include/database_connection.php');

if(isset($_SESSION['is_completed']))
{
	header("location:index.php");
}

if($_POST['reg'])
	{
        $query_check = "SELECT * FROM users WHERE email = :email";
	    $statement = $connect->prepare($query_check);
	    $statement->execute(array('email'	=>	$_POST["email"));
	    $count = $statement->rowCount();
	if($count === 0)
	{
		$result = $statement->fetchAll();
        $query = "INSERT INTO users (name, email, id_number, pass) VALUES (:name, :email, :id_number, :pass)";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':name'			=>	$_POST['name'],
				':email'				=>	$_POST['email'],
				':id_number'			=>	$_POST['id_number'],
				':pass'	=>	$_POST['pass']
			)
		);
		$result = $statement->fetchAll();
		if($statement)
		    {
            echo '<script>alert("Done sign up");</script>';
            $query_login = "SELECT * FROM users WHERE email = :email";
            $statement = $connect->prepare($query_login);
            $statement->execute(
                array(
                        'email'	=>	$_POST["email"]
                    )
            );
            $count = $statement->rowCount();
            if($count > 0)
            {
                $result = $statement->fetchAll();
                foreach($result as $row)
                {
                     
                        if(($_POST["pass"] == $row["pass"]))
                        {
                        
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['user_name'] = $row['name'];
                            $_SESSION['is_completed']=$row['is_completed'];
                            header("location:cv.php");
                        }
                        else
                        {
                            echo '<script>alert("error password");</script>'; 
                        }
                     
                }
            }
            else
            {
                echo '<script>alert("error email");</script>';
                }
		}
	}
	else
	{
		echo '<script>alert("This email is already registered !");</script>';
		}
}
		
	

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" style='margin-top: -135px;' method='post'>
					<span class="login100-form-title p-b-43">
                    Sign Up
					</span>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid full name is required">
						<input class="input100" type="text" name="name">
						<span class="focus-input100"></span>
						<span class="label-input100">Full Name</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid ID Number is required">
						<input class="input100" type="number" name="id_number">
						<span class="focus-input100"></span>
						<span class="label-input100">ID Number</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					 
			

					<div class="container-login100-form-btn">
						<input type='submit' value='sign up' class="login100-form-btn" name='reg'>
					</div>
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							
							<a href="login.php" >
							or login 
						</a>
						</span>
					</div>
					 

					 
				</form>

				<div class="login100-more" style="background-image: url('images/logo.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>