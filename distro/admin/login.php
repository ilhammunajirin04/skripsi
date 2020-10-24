<?php 
	require_once('../functions/db.php');
	session_start();

	define('base_url', 'http://localhost/distro/');
	if(isset($_SESSION['admin'])){
		header('Location: index.php');
	} 
	
	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		//validasi atau logika
		if(!empty(trim($username)) && !empty(trim($password))){

			$query_read = "SELECT * FROM admin WHERE username='$username'";
			$result_read = mysqli_query($koneksi, $query_read);
		
			if($user = mysqli_num_rows($result_read) != 0){
				$row = mysqli_fetch_assoc($result_read);
				if(password_verify($password, $row['password'])){
					$_SESSION['admin'] = $username;
					header('Location: index.php');

				}else{
					$error = 'Username atau password salah';
				}
			}else{
				$error = 'Username belum terdaftar';
			}

		}else{
			$error = 'Data tidak boleh kosong';
		}
	
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>assets/bootstrap4/dist/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
</body>
</html>