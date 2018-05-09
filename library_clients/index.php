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
<div id="main_window">
    <div id="menu">
        <p class="menu_title">Меню</p>
        <hr>
        <input class="menu_button" type="button" value="Заказы"
               onclick="document.getElementById('table_out').innerHTML = '<?php orders_list('localhost', 'root', '', 'library_clients') ?>'"><br>
        <input class="menu_button" type="button" value="Книги"
               onclick="document.getElementById('table_out').innerHTML ='<?php books_list('localhost', 'root', '', 'library_clients') ?>'"><br>
        <input class="menu_button" type="button" value="Клиенты"
               onclick="document.getElementById('table_out').innerHTML = '<?php clients_list('localhost', 'root', '', 'library_clients') ?>'"><br>
        <input class="menu_button" type="button" value="Издательства"
               onclick="document.getElementById('table_out').innerHTML = '<?php publishers_list('localhost', 'root', '', 'library_clients') ?>'"><br>
        <a href="search.php"><input class="menu_button" type="button" value="Поиск"></a><br>
        <a href="stats.php"><input class="menu_button" type="button" value="Статистика"></a><br>
        <a href="login.php"><input class="menu_button" type="button" value="Выход"></a><br>
    </div>
    <div id="content">
        <table id="table_out" class="table_out">
        </table>
    </div>
</div>
</body>
<script src="script.js"></script>
</html>


