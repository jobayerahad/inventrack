<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>vendors</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
	<style>
		body {
			background-color: #f8f9fa;
		}

		.login-container {
			margin-top: 100px;
		}
	</style>
</head>

<body>
	<div class="container login-container">
		<div class="row justify-content-center">
			<div class="col-md-6 col-sm-8">
				<div class="card">
					<div class="card-header text-center">
						<h3>Vendors Registration</h3>
					</div>
					<div class="card-body">

						<!-- Form action set to 'register.php' -->
						<form action="vendor.php" method="POST">
							<div class="form-group">
								<label for="name">Vendors Name:</label>
								<input type="text" class="form-control" name="name" required />
							</div>
							<div class="form-group">
								<label for="contact">Contact:</label>
								<input type="text" class="form-control" name="contact" required />
							</div>

							<div class="form-group">
								<label for="address">Address:</label>
								<input type="text" class="form-control" name="address" required />
							</div>

							<div class="form-group">
								<label for="remarks">Remarks:</label>
								<input type="text" class="form-control" name="remarks" required />
							</div>



							<div>
								<input type="submit" name="submit" class="btn btn-primary" value="Submit">
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>