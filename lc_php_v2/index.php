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
    connection_check_php();
    connection_check_login()
    ?>
</div>

<header>
    <img src="img/library_Logo.png" id="logo">
    <h1>ИПС "КЛИЕНТЫ БИБЛИОТЕКИ"</h1>
</header>
<div id="main_window">
    <div id="menu">
        <input class="menu_button" type="button" value="Заказы"
        onclick="document.getElementById('table_out').innerHTML = '<?php orders_list() ?>'"><br>
        <input class="menu_button" type="button" value="Книги"
        onclick="document.getElementById('table_out').innerHTML = '<?php books_list() ?>'"><br>
        <input class="menu_button" type="button" value="Клиенты"
        onclick="document.getElementById('table_out').innerHTML = '<?php clients_list() ?>'"><br>
        <input class="menu_button" type="button" value="Издательства"
        onclick="document.getElementById('table_out').innerHTML = '<?php publishers_list() ?>'"><br>
        <input class="menu_button" type="button" value="menu option"
        onclick="document.getElementById('table_out').innerHTML = '<?php #() ?>'"><br>
        <input class="menu_button" type="button" value="menu option"
        onclick="document.getElementById('table_out').innerHTML = '<?php #() ?>'"><br>
        <a href="http://lc2/login.php"><input class="menu_button" type="button" value="Выход"></a><br>

    </div>
    <div id="content">
        <table id="table_out">
        </table>
    </div>
</div>
</body>
<script src="script.js"></script>
</html>


