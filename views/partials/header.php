<?php
$config = include BASE_PATH . '/config/config.php';
$base_url = $config['base_url'];

// Get the current script name or path
$currentPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$currentPath = str_replace('inventrack/', '', $currentPath); // Adjust for base folder if necessary

// Check if user is authenticated
$isAuthenticated = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?= $base_url ?>/favicon.ico" type="image/x-icon">
	<title>InvenTrack</title>

	<!-- Latest Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<!-- Font Awesome Icons -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>
	<!-- Navigation Bar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= $base_url ?>/home">
				<img src="<?= $base_url ?>/images/logo-white.png" alt="Logo" style="width: auto; height: 2.5rem" />
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<!-- Show different options based on authentication -->
					<?php if ($isAuthenticated): ?>
						<li class="nav-item">
							<a class="nav-link <?= $currentPath === 'home' || $currentPath === '' ? 'active' : '' ?>" href="<?= $base_url ?>/home">Home</a>
						</li>

						<li class="nav-item">
							<a class="nav-link <?= $currentPath === 'categories' ? 'active' : '' ?>" href="<?= $base_url ?>/categories">Categories</a>
						</li>

						<li class="nav-item">
							<a class="nav-link <?= $currentPath === 'items' ? 'active' : '' ?>" href="<?= $base_url ?>/items">Items</a>
						</li>

						<li class="nav-item">
							<a class="nav-link <?= $currentPath === 'requests' ? 'active' : '' ?>" href="<?= $base_url ?>/requests">Requests</a>
						</li>

						<li class="nav-item">
							<a class="nav-link <?= $currentPath === 'vendors' ? 'active' : '' ?>" href="<?= $base_url ?>/vendors">Vendors</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<?= htmlspecialchars($_SESSION['user_name']) ?>
							</a>

							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="<?= $base_url ?>/profile">Profile</a></li>

								<li>
									<hr class="dropdown-divider">
								</li>

								<li><a class="dropdown-item" href="<?= $base_url ?>/logout">Logout</a></li>
							</ul>
						</li>
					<?php else: ?>
						<li class="nav-item">
							<a class="nav-link <?= $currentPath === 'login' ? 'active' : '' ?>" href="<?= $base_url ?>/login">Login</a>
						</li>

						<li class="nav-item">
							<a class="nav-link <?= $currentPath === 'register' ? 'active' : '' ?>" href="<?= $base_url ?>/register">Register</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Main Content -->
	<main class="container py-4" style="min-height: calc(100dvh - 7.6rem)">