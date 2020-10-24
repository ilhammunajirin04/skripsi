<?php 

require_once "core/init.php";

require_once "templates/header.php";

if(isset($_SESSION['user'])){
	header('Location: admin');
} 

$error = '';
	
if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$password = $_POST['password'];

	//validasi atau logika
	if(!empty(trim($email)) && !empty(trim($password))){

		$query_read = "SELECT * FROM admin WHERE username='$username'";
		$result_read = mysqli_query($koneksi, $query_read);
	
		if($user = mysqli_num_rows($result_read) != 0){
			$row = mysqli_fetch_assoc($result_read);
			if(password_verify($password, $row['password'])){
				$_SESSION['user'] = $email;
				header('Location: order.php');

			}else{
				$error = 'Username atau password salah';
			}
		}else{
			$error = 'Email belum terdaftar';
		}

	}else{
		$error = 'Data tidak boleh kosong';
	}

}



 ?>



<form action="" method="POST">
	<div class="my-5 container">
		<div class="col-md-6 offset-3">
			<?php if($error) : ?>
		 	<div class="alert alert-danger" role="alert">
			  <?= $error; ?>
			</div>
			<?php endif; ?>
		</div>

		<div class="col-md-6 offset-3">
			<div class="card p-5">
				<div class="card-header text-center mb-3">
					Login
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" name="username" placeholder="Username">
					</div>


					<div class="form-grup">
						<label>Password</label>
						<input class="form-control" type="Password" name="password" placeholder="Password">
					</div>

					<br>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-sm">Login</button>
					</div>
				</div>	
			</div>
		</div>
	</div>
</form>


<?php require_once "templates/footer.php"; ?>
