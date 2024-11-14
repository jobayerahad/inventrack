<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Products Catagory</title>
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
						<h3>Products Catagory</h3>
					</div>
					<div class="card-body">

						<!-- Form action set to 'register.php' -->
						<form action="product_cat.php" method="POST">
							<div class="form-group">
								<label for="product_name">Product Name:</label>

								<select name="name">
									<option value="cpu">CPU</option>
									<option value="monitor">Monitor</option>
									<option value="ups">UPS</option>
									<option value="printerb">Printer LJ(B)</option>
									<option value="printers">Printer LJ(S)</option>
									<option value="micr">MICR</option>
									<option value="router">Router</option>
									<option value="switch">Switch</option>
									<option value="scanner">Scanner</option>

								</select>

							</div>

							<div class="form-group">
								<label for="brand ">Brand:</label>
								<select name="brand">

									<option value="hp">HP</option>
									<option value="dell">Dell</option>
									<option value="lenovo">Lenovo</option>
									<option value="kstar">Kstar</option>
									<option value="cannon">Cannon</option>
									<option value="cisco">Cisco</option>
									<option value="cisco">BDcom</option>
								</select>
							</div>

							<div>
								<input type="submit" name="submit" class="btn btn-primary" value="Input">
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

</html>