<!DOCTYPE html>
<html lang="ru">
<head>
    <?php session_start(); ?>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=20b011ec-7c4a-4ea2-9eae-a8df4f417667&lang=ru_RU"></script>
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Строительная фирма ЮГ-строй инвест</title>
    <script defer src="js/store.js"></script>
    <link rel="shortcut icon" href="/images/main_logo.png" type="image/x-icon">
    <?php include 'include/popup_forms.php'; ?>
</head>
<body id= "index__body">
    <?php require './include/header.php'; ?>
    <div class="index__main">
        <div class="wrapper">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "registeruser";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Ошибка подключения: " . $conn->connect_error);
            }

            if (isset($_SESSION['email'])) {
                $user_id = $_SESSION['id'];
                $user_role = $_SESSION['user_roles']; // Получаем роль пользователя

                if ($user_role == 1) {
                    $sql = "SELECT * FROM purchases";
                } else {
                    $sql = "SELECT * FROM purchases WHERE user_id = $user_id";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $product_id = $row["product_id"];
                        $product_sql = "SELECT * FROM products WHERE id = $product_id";
                        $product_result = $conn->query($product_sql);
                        $product_data = $product_result->fetch_assoc();

                        // Получение информации о пользователе
                        $user_id = $row["user_id"];
                        $user_sql = "SELECT * FROM users WHERE id = $user_id";
                        $user_result = $conn->query($user_sql);
                        $user_data = $user_result->fetch_assoc();

                        echo '<div class="user_order_container">';
                        echo '<div class="image_order_container">';
                        echo '<img src="' . $product_data["image_url"] . '" alt="">';
                        echo '</div>';
                        echo '<div class="order_info_container">';
                        echo '<div class="order_title">' . $product_data["title"] . '</div>';

                        // Добавление подписей "Email:" и "Телефон:"
                        echo '<div class="user_order_info">';
                        echo '<div class="user_label">Email:</div>';
                        echo '<div class="user_email">' . $user_data["email"] . '</div>';
                        echo '<div class="user_label">Телефон:</div>';
                        echo '<div class="user_number">' . $user_data["phone"] . '</div>';
                        echo '</div>';

                        // Добавление кнопки удаления (видимой только для администратора)
                        if ($user_role == 1) {
                            echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" class="btn deleteBtn">';
                            echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                            echo '<button type="submit" name="delete" class="delete-button">';
                            echo '<span class="icon"><ion-icon name="trash-outline"></ion-icon></span>';
                            echo '<span class="text">Удалить</span>';
                            echo '</button>';
                            echo '</form>';
                        }

                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 результатов";
                }
            } else {
                echo '<script>alert("Для доступа к этому контенту необходимо авторизоваться.");</script>';
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                $delete_id = $_POST['id'];
                $sql = "DELETE FROM purchases WHERE id=$delete_id";
                if ($conn->query($sql) === TRUE) {
                    echo '<meta http-equiv="refresh" content="0">'; 
                } else {
                    echo "Ошибка при удалении записи: " . $conn->error;
                }
            }

            $conn->close();
        ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
