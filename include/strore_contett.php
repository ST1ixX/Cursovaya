<?php
    include 'bd.php';
    // Запрос к базе данных
    $sql = "SELECT id, title, description, image_url FROM products";
    $result = $conn->query($sql);
?>

