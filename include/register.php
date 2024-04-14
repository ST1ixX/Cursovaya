<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "registeruser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection Failed". mysqli_connect_error());
}

$email_reg = $_POST['email_reg'];
$phone_reg = $_POST['phone_reg'];
$password_reg = $_POST['password_reg'];
$repeat_password_reg = $_POST['repeat_password_reg'];

if (empty($email_reg) || empty($phone_reg) || empty($password_reg) || empty($repeat_password_reg)) {
    echo "Заполните все поля";
} else {
    if($password_reg != $repeat_password_reg){
        echo "Пароли не совпадают";
    } else {
        $hashed_password = password_hash($password_reg, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (phone, email, password ) VALUES ('$phone_reg','$email_reg', '$hashed_password')";

        if($conn->query($sql) === true){
    
            header("Location: ../about.php");
            
        } else {
            echo "Ошибка: " . $conn->error;
        };
    }
}

?>
