<!DOCTYPE html>
<html lang="ru">
<head>
    <?php session_start(); ?>
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Строительная фирма ЮГ-строй инвест</title>
    <script defer src="js/news.js"></script>
    <link rel="shortcut icon" href="/images/main_logo.png" type="image/x-icon">
    <?php include 'include/popup_forms.php'; ?>
</head>
<body id= "index__body">
    <?php require './include/header.php'; ?>
    <div class="index__main">
        <div class="wrapper"> 
        <?php
            if(isset($_SESSION['email']) && $_SESSION['user_roles'] == 1){
                echo '<a href="#" id="add_news">
                        <div class="adm_btn">
                            <span class="icon">
                                <ion-icon name="add-outline"></ion-icon>
                            </span>
                            <span class="text">Добавить новость</span>  
                        </div>
                    </a>';
            }
        ?>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "registeruser";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, news_title, news_text FROM news ORDER BY id DESC "; 
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="news">';
                        echo '<div class="news_card">';
                        echo '<div class="dell_news"></div>';
                        echo '<div class="news_title">' . $row["news_title"] . '</div>';
                        echo '<div class="news_text">' . $row["news_text"] . '</div>';
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
                    echo "0 results";
                }
                $conn->close();

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                    $delete_id = $_POST['id'];
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "DELETE FROM news WHERE id=$delete_id";
                    if ($conn->query($sql) === TRUE) {
                        echo '<meta http-equiv="refresh" content="0">'; 
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                    $conn->close();
                }
                ?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
