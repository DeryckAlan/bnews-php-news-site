<?php
require "config/database.php";

//get singup form data if singup button was clicked
if(isset($_POST['submit'])){
	$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
	$username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$avatar = $_FILES['avatar'];

	//validate input values
	if(!$firstname){
		$_SESSION['singup'] = "Enter Your First Name";
	}elseif(!$lastname){
		$_SESSION['singup'] = "Enter Your Last Name";
	}elseif(!$email){
		$_SESSION['singup'] = "Enter Your Email";
	}elseif(!$username){
		$_SESSION['singup'] = "Enter Your User name";
	}elseif(strlen($createpassword) < 8 || strlen($confirmpassword) <  8){
		$_SESSION['singup'] = "Password must contein more than 8 digits";
	}elseif(!$avatar['name']){
		$_SESSION['singup'] = "Select a image for avatar";
	}
	else{
		//check if passwords match
		if($createpassword !== $confirmpassword){
			$_SESSION['singup'] = "Password do not match";
		}

		else{
			$hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
			
			//check if username or email already exists in database
			$user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

			$user_check_query = mysqli_query($connection, $user_check_query);

			if(mysqli_num_rows($user_check_query) > 0){
				$_SESSION['singup'] = "User name or email already in use";
			}
			else{
				//work on avatar
				//rename avatar
				$time = time(); //makes each image unique using courrent timestamp
				$avatar_name = $time . $avatar['name'];
				$avatar_tmp_name = $avatar['tmp_name'];
				$avatar_destination_path = 'images/'. $avatar_name;

				//make sure file is an image
				$allowed_files = ['png', 'jpeg', 'jpg'];
				$extention = explode('.', $avatar_name);
				$extention = end($extention);

				if(in_array($extention, $allowed_files)){
					//make sure image is not too large
					if($avatar['size'] < 1000000){
						//upload avatar
						move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
					}
					else{
						$_SESSION['singup'] = 'File size too large. Try another file';
					}
				}
				else{
					$_SESSION['singup'] = "File should be a png, jpeg or jpg";
				}
			}
		}
	}

	//redirect back to singup page id there any problem
	if(isset($_SESSION['singup'])){
		//pass form back to singup page
		$_SESSION['singup-data'] = $_POST;
		header('location: '. ROOT_URL . 'singup.php');
		die();
	}
	else{
		//insert new users into users table
		$insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin='0'";

		$insert_user_result = mysqli_query($connection, $insert_user_query);

		if(!mysqli_errno($connection)){
			//redirect to login page with success message
			$_SESSION['singup-success'] = "Registration suceessful. Log in!";
			header('location: ' . ROOT_URL . 'singin.php');
			die();
		}
	}
}

else{
	//if buttons was'nt clicked
	header("location: " . ROOT_URL . "singup.php");
	die(); 
}