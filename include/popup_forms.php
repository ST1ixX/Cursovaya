<div class="popup-store" id="store__modal">
        <div class="modal__store">
            <button id="store-close-btn">
                <img src="images/cross.png" alt="Закрыть">
            </button>
            <form action="../include/add_news_to_db.php" method="post" id="add_news_form" >
                <h2>Добавить новость</h2>
                <label for="email">Заголовок новости
                    <input type="text" id="news_title" placeholder="Заголовок" name="news_title" class="input__conteiner">
                </label>
                <label for="news_text">Текст новости
                    <input type="text" id="news_text" placeholder="Текст" name="news_text" class="input__conteiner">
                </label>
                <button type="submit" name="add" id="add_news_btn">Добавить новость</button>
            </form>
        </div>
    </div>
    <div class="modal__box" id="my-modal">
        <div class="modal__content">
            <button id="close-btn">
                <img src="images/cross.png" alt="Закрыть">
            </button>
            <form action="include/login.php" method="post" id="login-form" >
                <h2>Log in</h2>
                <label for="email">Email
                    <input type="email" id="email" placeholder="Почта" name="email_login" class="input__conteiner">
                </label>
                <label for="password">Password
                    <input type="password" id="password" placeholder="Пароль" name="password_login" class="input__conteiner">
                </label>
                <label for="remember-me">Запомнить меня
                    <input type="checkbox" id="remember-me">
                </label>
                <input type="submit" value="Войти" name="sign" id="submit__btn">
                <a href="#" id="foggot__password">Забыли пароль?</a>
                <label for="register__btn">
                    <a href="#" id="register__btn">
                        <input type="submit" value="Зарегистрироваться" name="sign" id="reg_auth">
                    </a>
                </label>
            </form>
        </div>
    </div>
    <div class="popup__register" id="reg__modal">
        <div class="modal__register">
            <button id="close-reg-btn">
                <img src="images/cross.png" alt="Закрыть">
            </button>
            <form action="include/register.php" method="post" id="register-form" >
                <h2>Register</h2>
                <label for="email">Email
                    <input type="email" id="email_reg" placeholder="Почта" name="email_reg" class="input__conteiner">
                </label>
                <label for="phone">Контактный номер телефона
                    <input type="tel" id="phone" placeholder="Телефон" name="phone_reg" class="input__conteiner">
                </label>
                <label for="password">Password
                    <input type="password" id="password_reg" placeholder="Пароль" name="password_reg" class="input__conteiner">
                </label>
                <label for="repeat_password">Повторите пароль
                    <input type="password" id="repeat_password" placeholder="Повторите пароль" name="repeat_password_reg" class="input__conteiner">
                </label>
                <button type="submit" name="sign" id="reg_btn">Зарегистрироваться</button>
            </form>
        </div>
    </div>

    <div class="popup-uslugi" id="uslugi__modal">
        <div class="modal__uslugi">
            <button id="uslugi-close-btn">
                <img src="images/cross.png" alt="Закрыть">
            </button>
            <form action="../include/add_uslugi_to_db.php" method="post" enctype="multipart/form-data" id="add_news_form" >
                <h2>Добавить услугу</h2>
                <label for="uslugi_title">Заголовок услуги
                    <input type="text" id="uslugi_title" placeholder="Заголовок" name="uslugi_title" class="input__conteiner">
                </label>
                <label for="uslugi_description">Описание услуги
                    <input type="text" id="uslugi_description" placeholder="Текст" name="uslugi_description" class="input__conteiner">
                </label>
                <label for="img_uslugi">Добавить изображение услуги
                    <input type="file" id="img_uslugi" placeholder="Текст" name="img_uslugi" class="input__conteiner">
                </label>
                <button type="submit" name="add" id="add_uslugi_btn">Добавить услугу</button>
            </form>
        </div>
    </div>