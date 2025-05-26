<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="mb-4 text-center">Dashboard</h2>
            <?php
            $total_customers = $conn->query("SELECT COUNT(*) as total FROM customers")->fetch_assoc()['total'];
            $total_readings = $conn->query("SELECT COUNT(*) as total FROM readings WHERE MONTH(reading_date) = MONTH(CURDATE())")->fetch_assoc()['total'];
            $total_usage = $conn->query("SELECT SUM(units_used) as total FROM readings")->fetch_assoc()['total'];
            ?>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary h-100 shadow-sm">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-users fa-2x mb-2"></i>
                            <h5 class="card-title">Total Customers</h5>
                            <h3 class="card-text"><?php echo $total_customers; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success h-100 shadow-sm">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-tachometer-alt fa-2x mb-2"></i>
                            <h5 class="card-title">Readings This Month</h5>
                            <h3 class="card-text"><?php echo $total_readings; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info h-100 shadow-sm">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-tint fa-2x mb-2"></i>
                            <h5 class="card-title">Total Water Consumed</h5>
                            <h3 class="card-text"><?php echo $total_usage; ?> Units</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>