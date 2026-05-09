<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monica Resort</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        
        .navbar-custom {
            background-color: #2e4d2e !important;
        }
        .activity-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<?php

$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">Monica Resort</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto"> <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'yurts.php') ? 'active' : ''; ?>" href="yurts.php">Yurts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'activities.php') ? 'active' : ''; ?>" href="activities.php">Activities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'reservations.php') ? 'active' : ''; ?>" href="reservations.php">Reservations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'comments.php') ? 'active' : ''; ?>" href="comments.php">Comments</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
