<? include "lib.php" ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Клиенты библиотеки</title>
    <style> <? include "styles.css" ?></style>
</head>
<body>
<div id="connection_status">
    <?
    connection_check_php('localhost', 'root', '', 'library_clients');
    connection_check_login('localhost', 'root', '', 'lib_client_auth');
    ?>
</div>
<header>
    <img src="img/library_Logo.png" id="logo">
    <h1>ИПС "КЛИЕНТЫ БИБЛИОТЕКИ"</h1>
</header>

<div id="content_login">
    <div id="login_area">
        <form method="post">
            <input class="login_field" type="text" name="user_login" placeholder="логин" required><br>
            <input class="login_field" type="password" name="user_pass" placeholder="пароль" required><br>
            <input class="login_button" type="submit" name="login" value="Войти">
        </form>
        <?php
        login('localhost', 'root', '', 'lib_client_auth', 'SELECT * FROM auth');
        ?>
    </div>
</div>
</div>
</body>
<script src="script.js"></script>
</html>


