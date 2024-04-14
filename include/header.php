<div class="header" id="header">
        <button class="header__burger" id="burger">
            <span></span><span></span><span></span><span></span><span></span>
        </button>
        <div class="header__logo">
            <a href="#">
                <img src="/images/logo.png" alt="Логотип">
            </a>
        </div>  
        <div class="header__menu">
            <ul>
                <li class="list">
                    <a href="news.php">
                        <span class="icon">
                        <ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="text">Новости</span>
                    </a>
                </li>
                <li class="list">
                    <a href="about.php">
                        <span class="icon">
                        <ion-icon name="help-outline"></ion-icon></span>
                        <span class="text">О нас</span>
                    </a>
                </li>
                <li class="list">
                    <a href="store.php">
                        <span class="icon">
                        <ion-icon name="hammer-outline"></ion-icon></span>
                        <span class="text">Услуги</span>
                    </a>
                </li>
                <li class="list">
                    <a href="bucket.php">
                        <span class="icon">
                        <ion-icon name="basket-outline"></ion-icon></span>
                        <span class="text">Заказ</span>
                    </a>
                </li>
                <?php
                    if(isset($_SESSION['email'])) {
                        echo '
                        <li class="list">
                            <a href="../include/logout.php" id="log-out">
                                <span class="icon">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </span>
                                <span class="text">Выйти</span>                           
                            </a>
                        </li>';
                    } else {
                        echo '
                        <li class="list">
                            <a href="#" id="auth">
                                <span class="icon">
                                    <ion-icon name="person-outline"></ion-icon>
                                </span>
                                <span class="text">Профиль</span>                           
                            </a>
                        </li>';
                    }
                    ?>
            </ul>
        </div>
    </div>