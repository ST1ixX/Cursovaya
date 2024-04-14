<?php
session_start(); // Начинаем сессию

require 'bd.php';

$email_login = $_POST['email_login'];
$password_login = $_POST['password_login'];

if (empty($email_login) || empty($password_login)) {
    echo "Заполните все поля";
} else {
    $sql = "SELECT * FROM `users` WHERE email = '$email_login'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) { 
        $user_info = mysqli_fetch_assoc($result);
        
        if (password_verify($password_login, $user_info['password'])) {
            $_SESSION['email'] = $email_login;
        
            $_SESSION['user_roles'] = $user_info['user_roles'];

            $_SESSION['id'] = $user_info['id'];
        
            header("Location: ../about.php");
            exit();
        } else {
            echo "Ошибка: Неправильный пароль";
        }
    } else {
        echo "Ошибка: Пользователь с таким email не найден";
    }
}
?>
