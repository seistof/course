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

<?php
stats_menu()
?>

</body>
<script src="script.js"></script>
</html>


