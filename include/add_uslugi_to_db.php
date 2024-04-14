<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "registeruser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$uslugi_title = $_POST['uslugi_title'];
$uslugi_description = $_POST['uslugi_description'];

if (empty($uslugi_title) || empty($uslugi_description)) {
    echo "Заполните все поля";
} else {
    if (isset($_FILES['img_uslugi'])) {
        $file_name = $_FILES['img_uslugi']['name'];
        $file_tmp = $_FILES['img_uslugi']['tmp_name'];
        $target_dir = "../order/";
        $target_file = $target_dir . basename($file_name);
        
        if (move_uploaded_file($file_tmp, $target_file)) {
            echo "Файл успешно загружен.";
            
            $image_url = $target_file;
            $sql = "INSERT INTO products (title, description, image_url) VALUES ('$uslugi_title', '$uslugi_description', '$image_url')";
            
            if (mysqli_query($conn, $sql)) {
                header("Location: ../store.php");
                exit;
            } else {
                echo "Ошибка при добавлении в базу данных: " . mysqli_error($conn);
            }
        } else {
            echo "Ошибка при загрузке файла.";
        }
    } else {
        echo "Файл не был загружен.";
    }
}

mysqli_close($conn);
?>
