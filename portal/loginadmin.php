<?php 

require '../koneksi.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
  $query = mysqli_query($conn, $sql);
  $cek = mysqli_num_rows($query);
  
  if($cek > 0){
    session_start();
    $_SESSION['email'] = $email;
	$_SESSION["status"] = 'loginadmin';
    $result = mysqli_query($conn, "SELECT id_admin FROM admin WHERE email='$email' AND password='$password'");
		if ($result && mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id_admin'];
		}
    header("location:../admin/berandaadmin.php");
  } else {
    echo "<script>alert('Gagal Login');</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login As Admin</title>
	
		    
	<!-- Load Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<style>
	.card:nth-child(1) {
		background-color: #2E5F7D;
		color: #fff;
	}
	.card:nth-child(2) {
		background-color: #8CB27F;
		color: #fff;
	}
	.card:nth-child(3) {
		background-color: #EAE7EE;
		color: #000;
	}
	</style>

</head>

<body>
	
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="text-center">Login</h4>
					</div>

					<div class="card-body">
						<form method="post" action="">


<!-- ini letak buat masukkin formnya -->
							<div class="form-group">
								<label for="Email">Email</label>
								<input type="email" name="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" required>
							</div>

							<button type="submit" class="btn btn-primary btn-block">Login</button>

						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Load Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
