<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Главная</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Products</a></li>
            <li class="nav-item"><a href="#" class="nav-link">New product</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Feedback</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Admin</a></li>
        </ul>
    </header>
</div>
<?php include 'application/views/' . $content_view; ?>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>