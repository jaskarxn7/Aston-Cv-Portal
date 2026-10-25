<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstonCV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .hero { background: linear-gradient(135deg, #1353B4, #3a003b); color: white; padding: 80px 0; }
        .card:hover { transform: translateY(-8px); box-shadow: 0 10px 25px rgba(19,83,180,0.2)!important; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-graduation-cap"></i> AstonCV</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="index.php">Browse CVs</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a class="nav-link" href="update.php">My CV</a>
                <a class="nav-link" href="logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link" href="login.php">Login</a>
                <a class="nav-link" href="register.php">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container mt-4">