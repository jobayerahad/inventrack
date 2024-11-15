<?php
session_start();
include '../config/config.php';
include '../config/database.php';
include '../views/header.php';

// Check if the user is logged in, otherwise redirect
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

// Initialize database
$db = new Database();
$conn = $db->getConnection();
?>

<div class="container mt-5">
    <h1>Dashboard</h1>
    <p>Welcome to the InvenTrack management dashboard!</p>

    <!-- Dashboard Cards -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Items</h5>
                    <p class="card-text">View and manage all items in inventory.</p>
                    <a href="items.php" class="btn btn-light">View Items</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Branch Requests</h5>
                    <p class="card-text">Handle requests from branches for repairs or new items.</p>
                    <a href="requests.php" class="btn btn-light">View Requests</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Vendors</h5>
                    <p class="card-text">Manage vendors and track repairs and orders.</p>
                    <a href="vendors.php" class="btn btn-dark">Manage Vendors</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../views/footer.php'; ?>