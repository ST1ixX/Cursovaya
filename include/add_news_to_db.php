<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "registeruser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$news_title = $_POST['news_title'];
$news_text = $_POST['news_text'];

if (empty($news_title) || empty($news_text)) {
    echo "Заполните все поля";
} else {
    $sql = "INSERT INTO `news` (news_title, news_text) VALUES ('$news_title', '$news_text')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../news.php");
        exit; 
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };
}

mysqli_close($conn);
?>
