<!DOCTYPE html>
<html lang="ru">
<head>
    <?php session_start(); ?>
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
            if(isset($_SESSION['email']) && $_SESSION['user_roles'] == 1){
                echo '<a href="#" id="add_uslug">
                        <div class="adm_btn">
                            <span class="icon">
                                <ion-icon name="add-outline"></ion-icon>
                            </span>
                            <span class="text">Добавить услугу</span>  
                        </div>
                    </a>';
            }
        ?>   
            <div class="card__container">
                <div class="card__container">
                <?php
                    require 'include/strore_contett.php';

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="card">';
                            echo '<img src="' . $row["image_url"] . '" alt="">';
                            echo '<div class="card__content">';
                            echo '<h3>' . $row["title"] . '</h3>';
                            echo '<p>' . $row["description"] . '</p>';
                            echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" class="btn buyBtn">';
                            echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
                            echo '<button type="submit" name="buy" class="buy-button">';
                            echo '<span class="icon"><ion-icon name="cart-outline"></ion-icon></span>';
                            echo '<span class="text">Купить</span>';
                            echo '</button>';
                            echo '</form>';
                            if(isset($_SESSION['email']) && $_SESSION['user_roles'] == 1) {
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
                    $conn->close();

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                        $delete_id = $_POST['id'];
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "DELETE FROM products WHERE id=$delete_id";
                        if ($conn->query($sql) === TRUE) {
                            echo '<meta http-equiv="refresh" content="0">'; 
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                        $conn->close();
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy'])) {
                        $product_id = $_POST['product_id'];
                        $user_id = $_SESSION['id'];
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } 
                        $sql = "INSERT INTO purchases (user_id, product_id) VALUES ('$user_id', '$product_id')";

                        if ($conn->query($sql) === TRUE) {
                            echo '<script>alert("Товар успешно добавлен в корзину!");</script>';
                        } else {
                            echo '<script>alert("Для добавления товара в корзину необходимо авторизоваться!");</script>';
                        }
                        $conn->close();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
