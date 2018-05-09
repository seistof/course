<?php

function connection_check_php($servername, $username, $password, $dbname)
{
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<p class='connected'  id='connection_status_bar_php'>Data connected</p>";
}

function connection_check_login($servername, $username, $password, $dbname)
{
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<p class='connected' id='connection_status_bar_login'>Login connected</p>";
}

function login($servername, $username, $password, $dbname, $sql)
{
    if (isset($_POST['login'])) {
        $user_login = $_POST['user_login'];
        $user_pass = $_POST['user_pass'];
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if ($row['user_name'] === $user_login and $row['user_password'] === $user_pass) {
                echo "<script>" . "document.getElementById(\"login_area\").innerHTML = \" \";" . "</script>";
                echo("<h1>Добро пожаловать.</h1>");
                echo "<script>" . "someTimeout = 1500;" .
                    "window.setTimeout(\"document.location = \'index.php\';\", someTimeout);" .
                    "</script>";
            } else {
                echo "<br><h1>Ошибка, вы ввели неверные данные.</h1>";
            }
        }
    }
}

function books_list($servername, $username, $password, $dbname)
{
    $sql = "SELECT * FROM books";
    // Вывод шапки таблицы
    echo
        "<tr>" . "<td>" . "ID" . "</td>" .
        "<td>" . "Название" . "</td>" .
        "<td>" . "Жанр" . "</td>" .
        "<td>" . "Издатель" . "</td>" .
        "<td>" . "Год" . "</td>" . "</tr>";
    // Создание соединения
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Проверка соединения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    // вывод данных каждой строки ответа на запрос
    while ($row = $result->fetch_assoc()) {
        echo "<tr>" . "<td>" . $row["book_id"] . "</td>" .
            "<td>" . $row["book_name"] . "</td>" .
            "<td>" . $row["book_genre"] . "</td>" .
            "<td>" . $row["book_publisher"] . "</td>" .
            "<td>" . $row["book_year"] . "</td>" . "</tr>";
    }
    $conn->close();
}

function clients_list($servername, $username, $password, $dbname)
{
    $sql = "SELECT * FROM clients";
    // Вывод шапки таблицы
    echo "<tr>" . "<td>" . "ID" . "</td>" .
        "<td>" . "Ф.И.О." . "</td>" .
        "<td>" . "Пол" . "</td>" .
        "<td>" . "Дата рождения" . "</td>" .
        "<td>" . "Телефон" . "</td>" . "</tr>";
    // Создание соединения
    $conn = new mysqli($servername, $username, $password, $dbname);
    //SQL запрос к базе данных
    $result = $conn->query($sql);
    // вывод данных каждой строки ответа на запрос
    while ($row = $result->fetch_assoc()) {
        echo "<tr>" . "<td>" . $row["client_id"] . "</td>" .
            "<td>" . $row["client_name"] . "</td>" .
            "<td>" . $row["client_gender"] . "</td>" .
            "<td>" . $row["client_birthday"] . "</td>" .
            "<td>" . $row["client_phone"] . "</td>" . "</tr>";
    }
    $conn->close();
}

function publishers_list($servername, $username, $password, $dbname)
{
    $sql = "SELECT * FROM publishers";
    // Вывод шапки таблицы
    echo "<tr>" . "<td>" . "Название" . "</td>" .
        "<td>" . "Сайт" . "</td>" .
        "<td>" . "Телефон" . "</td>" .
        "<td>" . "Адрес" . "</td>" . "</tr>";
    // Создание соединения
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>" . "<td>" . $row["publisher_name"] . "</td>" .
            "<td>" . $row["publisher_site"] . "</td>" .
            "<td>" . $row["publisher_phone"] . "</td>" .
            "<td>" . $row["publisher_adress"] . "</td>" . "</tr>";
    }
    $conn->close();
}

function orders_list($servername, $username, $password, $dbname)
{
    $sql = "SELECT `orders`.`order_id`, `orders`.`order_date`, `books`.`book_name`, `clients`.`client_name` 
            FROM `books` 
            LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
            LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
            ORDER BY `orders`.`order_id` ASC";
    // Вывод шапки таблицы
    echo "<tr>" . "<td>" . "ID" . "</td>" .
        "<td>" . "Дата" . "</td>" .
        "<td>" . "Название книга" . "</td>" .
        "<td>" . "Клиент" . "</td>" . "</tr>";
    // Создание соединения
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Проверка соединения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>" . "<td>" . $row["order_id"] . "</td>" .
            "<td>" . $row["order_date"] . "</td>" .
            "<td>" . $row["book_name"] . "</td>" .
            "<td>" . $row["client_name"] . "</td>" . "</tr>";
    }
    $conn->close();
}

function search_book($servername, $username, $password, $dbname)
{
    echo "</div>" .
        "<div id='content'>" .
        "<form method='post'>" .
        "<input type='text' name='book_name' placeholder='Название книги'
                   style='margin-top: 20px; margin-left: 30px; height: 30px; width: 450px;font-size: 20px'>" .
        "<input type='submit' name='search' value='Найти' style='height: 30px; width: 100px;font-size: 20px'>" .
        "</form>" .
        "<br><br>" .

        "<div class='table_out'>" .
        "<div class='inner_list_book_info'>" .
        "<p class='inner_prgh_book_info' style='margin-left: 0px'>Книга</p>" .
        "</div>" .
        "<div class='inner_list_client_id'>" .
        "<p class='inner_prgh_client_id' style='margin-left: 0px'>ID</p>" .
        "</div>" .
        "<div class='inner_list_client_name'>" .
        "<p class='inner_prgh_client_name' style='margin-left: 0px'>Ф.И.О.</p>" .
        "</div>" .
        "<div class='inner_list_order_id'>" .
        "<p class='inner_prgh_order_id' style='margin-left: 0px'>ID заказа</p>" .
        "</div>" .
        "<div class='inner_list_order_date'>" .
        "<p class='inner_prgh_order_date' style='margin-left: 0px'>Дата заказа</p>" .
        "</div>" .
        "<div class='inner_list_client_phone'>" .
        "<p class='inner_prgh_client_phone' style='margin-left: 0px'>Телефон</p>" .
        "</div>" .
        "<hr>" .
        "<br>" .
        "</div>";

    if (isset($_POST['search'])) {

        $book_name = $_POST['book_name'];
        $k = 0;
        $sql = "SELECT `books`.`book_id`, `books`.`book_name`, `books`.`book_genre`, 
            `books`.`book_publisher`, `books`.`book_year`, `clients`.`client_id`, 
            `clients`.`client_name`, `clients`.`client_phone`, `orders`.`order_id`, 
            `orders`.`order_date`
            FROM `books`
            LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id`
            LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id`";

        // Создание соединения
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Проверка соединения
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //SQL запрос к базе данных

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Вывод данных каждой строки полученной от базы данных
            while ($row = $result->fetch_assoc()) {
                if ($row['book_name'] === $book_name) {
                    $k = $k + 1;
                }
            }
        } else {
            echo "0 results";
        }
        if ($k == 0) {
            echo "<h1 style='margin-left: 250px'>" .
                "В базе библиотеки нет такой книги." . "</h1>";
        } else {
            // Create connection
            echo "<div class=\"inner_list_book_info\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['book_name'] === $book_name) {
                    echo "<p class=\"inner_prgh_book_info\">" . $row['book_name'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\" style='margin-top: 3px'>" . "ID: " . $row['book_id'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . $row['book_genre'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . $row['book_publisher'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . $row['book_year'] . "</p>";
                    break;
                }
            }
            echo "</div>";


            // Create connection
            echo "<div class=\"inner_list_client_id\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['book_name'] === $book_name) {
                    echo "<p class=\"inner_prgh_client_id\">" . $row['client_id'] . "</p>";
                }
            }
            echo "</div>";


            // Create connection
            echo "<div class=\"inner_list_client_name\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['book_name'] === $book_name) {
                    echo "<p class=\"inner_prgh_client_name\">" . $row['client_name'] . "</p>";
                }
            }
            echo "</div>";


            // Create connection
            echo "<div class=\"inner_list_order_id\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['book_name'] === $book_name) {
                    echo "<p class=\"inner_prgh_order_id\">" . $row['order_id'] . "</p>";
                }
            }
            echo "</div>";


            // Create connection
            echo "<div class=\"inner_list_order_date\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['book_name'] === $book_name) {
                    echo "<p class=\"inner_prgh_order_date\">" . $row['order_date'] . "</p>";
                }
            }
            echo "</div>";


            echo "<div class=\"inner_list_client_phone\">";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                if ($row['book_name'] === $book_name) {
                    echo "<p class=\"inner_prgh_client_phone\">" . $row['client_phone'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();
        }
    }
    echo "</div>";
}

function search_order($servername, $username, $password, $dbname)
{
    echo "</div>" .
        "<div id='content'>" .
        "<form method='post'>" .
        "<input type='text' name='order_id' placeholder='Номер заказа'
                   style='margin-top: 20px; margin-left: 30px; height: 30px; width: 450px;font-size: 20px'>" .
        "<input type='submit' name='search' value='Найти' style='height: 30px; width: 100px;font-size: 20px'>" .
        "</form>" .
        "<br><br>" .

        "<div class='table_out'>" .
        "<div class='inner_list_book_info'>" .
        "<p class='inner_prgh_book_info' style='margin-left: 0px'>Заказ</p>" .
        "</div>" .
        "<div class='inner_list_client_id'>" .
        "<p class='inner_prgh_client_id' style='margin-left: 0px'>ID</p>" .
        "</div>" .
        "<div class='inner_list_client_name'>" .
        "<p class='inner_prgh_client_name' style='margin-left: 0px'>Ф.И.О.</p>" .
        "</div>" .
        "<div class='inner_list_order_id'>" .
        "<p class='inner_prgh_order_id' style='margin-left: 0px'>ID</p>" .
        "</div>" .
        "<div class='inner_list_order_date'>" .
        "<p class='inner_prgh_order_date' style='margin-left: 0px'>Книга</p>" .
        "</div>" .
        "<div class='inner_list_client_phone'>" .
        "<p class='inner_prgh_client_phone' style='margin-left: 0px'>Телефон</p>" .
        "</div>" .
        "<hr>" .
        "<br>" .
        "</div>";

    if (isset($_POST['search'])) {

        $order_id = $_POST['order_id'];
        $k = 0;
        $sql = "SELECT `orders`.`order_id`, `orders`.`order_date`, `books`.`book_id`, `books`.`book_name`, `clients`.`client_id`, `clients`.`client_name`, `clients`.`client_phone`
FROM `books`
    LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id`
    LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id`";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['order_id'] === $order_id) {
                    $k = $k + 1;
                }
            }
        } else {
            echo "0 results";
        }
        if ($k == 0) {
            echo "<h1 style='margin-left: 200px'>" . "В базе библиотеки нет такого заказа." . "</h1>";
            $conn->close();
        } else {

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_book_info\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['order_id'] === $order_id) {
                    echo "<p class=\"inner_prgh_book_info\">" . "ID: " . $row['order_id'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . "Дата: " . $row['order_date'] . "</p>";
                    break;
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_client_id\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['order_id'] === $order_id) {
                    echo "<p class=\"inner_prgh_client_id\">" . $row['client_id'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_client_name\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['order_id'] === $order_id) {
                    echo "<p class=\"inner_prgh_client_name\">" . $row['client_name'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_order_id\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['order_id'] === $order_id) {
                    echo "<p class=\"inner_prgh_order_id\">" . $row['book_id'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_order_date\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['order_id'] === $order_id) {
                    echo "<p class=\"inner_prgh_order_date\">" . $row['book_name'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_client_phone\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['order_id'] === $order_id) {
                    echo "<p class=\"inner_prgh_client_phone\">" . $row['client_phone'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();
        }
    }
}

function search_publisher($servername, $username, $password, $dbname)
{
    echo "</div>" .
        "<div id='content'>" .
        "<form method='post'>" .
        "<input type='text' name='publisher' placeholder='Название издательства'
                   style='margin-top: 20px; margin-left: 30px; height: 30px; width: 450px;font-size: 20px'>" .
        "<input type='submit' name='search' value='Найти' style='height: 30px; width: 100px;font-size: 20px'>" .
        "</form>" .
        "<br><br>" .

        "<div class='table_out'>" .
        "<div class='inner_list_book_info'>" .
        "<p class='inner_prgh_book_info' style='margin-left: 0px'>Издательство</p>" .
        "</div>" .
        "<div class='inner_list_client_id'>" .
        "<p class='inner_prgh_client_id' style='margin-left: 0px'></p>" .
        "</div>" .
        "<div class='inner_list_client_name'>" .
        "<p class='inner_prgh_client_name' style='margin-left: 0px'>Название</p>" .
        "</div>" .
        "<div class='inner_list_order_id'>" .
        "<p class='inner_prgh_order_id' style='margin-left: 0px'>ID</p>" .
        "</div>" .
        "<div class='inner_list_order_date'>" .
        "<p class='inner_prgh_order_date' style='margin-left: 0px'>Жанр</p>" .
        "</div>" .
        "<div class='inner_list_client_phone'>" .
        "<p class='inner_prgh_client_phone' style='margin-left: 0px'>Год</p>" .
        "</div>" .
        "<hr>" .
        "<br>" .
        "</div>";
    if (isset($_POST['search'])) {

        $publisher = $_POST['publisher'];
        $k = 0;
        $sql = "SELECT `publishers`.`publisher_name`, `publishers`.`publisher_site`, `publishers`.`publisher_phone`, `publishers`.`publisher_adress`, `books`.`book_id`, `books`.`book_name`, `books`.`book_genre`, `books`.`book_year`
FROM `publishers`
    LEFT JOIN `books` ON `books`.`book_publisher` = `publishers`.`publisher_name`";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['publisher_name'] === $publisher) {
                    $k = $k + 1;
                }
            }
        } else {
            echo "0 results";
        }
        if ($k == 0) {
            echo "<h1 style='margin-left: 200px'>" . "В базе библиотеки нет такого издательства." . "</h1>";
            $conn->close();
        } else {

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_book_info\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['publisher_name'] === $publisher) {
                    echo "<p class=\"inner_prgh_book_info\">" . $row['publisher_name'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . $row['publisher_phone'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . $row['publisher_site'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . $row['publisher_adress'] . "</p>";
                    break;
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_client_id\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['publisher_name'] === $publisher) {
                    echo "<p class=\"inner_prgh_client_id\">" . " " . "</p>";
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_client_name\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['publisher_name'] === $publisher) {
                    echo "<p class=\"inner_prgh_client_name\">" . $row['book_name'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_order_id\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['publisher_name'] === $publisher) {
                    echo "<p class=\"inner_prgh_order_id\">" . $row['book_id'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_order_date\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['publisher_name'] === $publisher) {
                    echo "<p class=\"inner_prgh_order_date\">" . $row['book_genre'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_client_phone\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['publisher_name'] === $publisher) {
                    echo "<p class=\"inner_prgh_client_phone\">" . $row['book_year'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();
        }
    }
}

function search_client($servername, $username, $password, $dbname)
{
    echo "</div>" .
        "<div id='content'>" .
        "<form method='post'>" .
        "<input type='text' name='client_name' placeholder='Ф.И.О. клиента'
                   style='margin-top: 20px; margin-left: 30px; height: 30px; width: 450px;font-size: 20px'>" .
        "<input type='submit' name='search' value='Найти' style='height: 30px; width: 100px;font-size: 20px'>" .
        "</form>" .
        "<br><br>" .

        "<div class='table_out'>" .
        "<div class='inner_list_book_info'>" .
        "<p class='inner_prgh_book_info' style='margin-left: 0px'>Клиент</p>" .
        "</div>" .
        "<div class='inner_list_client_id'>" .
        "<p class='inner_prgh_client_id' style='margin-left: 0px'>ID</p>" .
        "</div>" .
        "<div class='inner_list_client_name'>" .
        "<p class='inner_prgh_client_name' style='margin-left: 0px'>Название</p>" .
        "</div>" .
        "<div class='inner_list_order_id'>" .
        "<p class='inner_prgh_order_id' style='margin-left: 0px'>Заказ</p>" .
        "</div>" .
        "<div class='inner_list_order_date'>" .
        "<p class='inner_prgh_order_date' style='margin-left: 0px'>Дата заказа</p>" .
        "</div>" .
        "<div class='inner_list_client_phone'>" .
        "<p class='inner_prgh_client_phone' style='margin-left: 0px'>Издательство</p>" .
        "</div>" .
        "<hr>" .
        "<br>" .
        "</div>";

    if (isset($_POST['search'])) {

        $client_name = $_POST['client_name'];
        $k = 0;
        $sql = "SELECT `clients`.`client_id`, `clients`.`client_name`, `clients`.`client_gender`, `clients`.`client_birthday`, `clients`.`client_phone`, `books`.`book_id`, `books`.`book_name`, `orders`.`order_id`, `orders`.`order_date`, `books`.`book_publisher`
FROM `books`
    LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id`
    LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id`";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['client_name'] === $client_name) {
                    $k = $k + 1;
                }
            }
        } else {
            echo "0 results";
        }
        if ($k == 0) {
            echo "<h1 style='margin-left: 200px'>" . "В базе библиотеки нет такого читателя." . "</h1>";
            $conn->close();
        } else {

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_book_info\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['client_name'] === $client_name) {
                    echo "<p class=\"inner_prgh_book_info\">" . $row['client_name'] . "</p>";
                    echo "<p style='margin-top: 5px' class=\"inner_prgh_book_info\">" . "ID: " . $row['client_id'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . $row['client_gender'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . $row['client_birthday'] . "</p>";
                    echo "<p class=\"inner_prgh_book_info\">" . $row['client_phone'] . "</p>";
                    break;
                }
            }
            echo "</div>";
            $conn->close();

// Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_client_id\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['client_name'] === $client_name) {
                    echo "<p class=\"inner_prgh_client_id\">" . $row['book_id'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();


            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_client_name\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['client_name'] === $client_name) {
                    echo "<p class=\"inner_prgh_client_name\">" . $row['book_name'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();


            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_order_id\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['client_name'] === $client_name) {
                    echo "<p class=\"inner_prgh_order_id\">" . $row['order_id'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();


            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_order_date\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['client_name'] === $client_name) {
                    echo "<p class=\"inner_prgh_order_date\">" . $row['order_date'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();


            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<div class=\"inner_list_client_phone\">";
            $result = $conn->query($sql);
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['client_name'] === $client_name) {
                    echo "<p class=\"inner_prgh_client_phone\">" . $row['book_publisher'] . "</p>";
                }
            }
            echo "</div>";
            $conn->close();
        }
    }
}

function search_menu()
{
    echo "<div id='main_window'>" . "<div id='menu'>" .
        "<p class='menu_title'>Поиск</p>" . "<hr>" .
        "<a href='search_order.php'>" .
        "<input class='menu_button' type='button' value='Заказы'>" . "</a>" . "<br>" .
        "<a href='search_books.php'>" .
        "<input class='menu_button' type='button' value='Книги'>" . "</a>" . "<br>" .
        "<a href='search_clients.php'>" .
        "<input class='menu_button' type='button' value='Клиенты'>" . "</a>" . "<br>" .
        "<a href='search_publisher.php'>" .
        "<input class='menu_button' type='button' value='Издательство'>" . "</a>" . "<br>" .
        "<a href='stats.php'>" .
        "<input class='menu_button' type='button' value='Статистика'>" . "</a>" . "<br>" .
        "<a href='index.php'>" .
        "<input class='menu_button' type='button' value='Главное меню'>" . "</a>" . "<br>" .
        "<a href='login.php'>" .
        "<input class='menu_button' type='button' value='Выход'>" . "</a>" . "<br>" .
        "</div>" .
        "</div>";
}

function stats_menu()
{
    echo "<div id='main_window'>" . "<div id='menu'>" .
        "<p class='menu_title'>Статистика</p>" . "<hr>" .
        "<a href='stats_genres.php'>" .
        "<input class='menu_button' type='button' value='Жанры'>" . "</a>" . "<br>" .
        "<a href='stats_books.php'>" .
        "<input class='menu_button' type='button' value='Книги'>" . "</a>" . "<br>" .
        "<a href='stats_age.php'>" .
        "<input class='menu_button' type='button' value='Возраст'>" . "</a>" . "<br>" .
        "<a href='search.php'>" .
        "<input class='menu_button' type='button' value='Поиск'>" . "</a>" . "<br>" .
        "<a href='index.php'>" .
        "<input class='menu_button' type='button' value='Главное меню'>" . "</a>" . "<br>" .
        "<a href='login.php'>" .
        "<input class='menu_button' type='button' value='Выход'>" . "</a>" . "<br>" .
        "</div>" .
        "</div>";
}

function stats_genres($servername, $username, $password, $dbname)
{
    echo "</div>" .
        "<div id='content'>" .
        "<br><br>" .
        "<div class='table_out'>" .
        "<div class='inner_list_book_info'>" .
        "<p class='inner_prgh_book_info' style='margin-left: 0px'>Жанр</p>" .
        "</div>" .
        "<div class='inner_list_client_id'>" .
        "<p class='inner_prgh_client_id' style='margin-left: 0px'></p>" .
        "</div>" .
        "<div class='inner_list_client_name'>" .
        "<p class='inner_prgh_client_name' style='margin-left: 0px'>Колиество читателей</p>" .
        "</div>" .
        "<div class='inner_list_order_id'>" .
        "<p class='inner_prgh_order_id' style='margin-left: 0px'></p>" .
        "</div>" .
        "<div class='inner_list_order_date'>" .
        "<p class='inner_prgh_order_date' style='margin-left: 0px'></p>" .
        "</div>" .
        "<div class='inner_list_client_phone'>" .
        "<p class='inner_prgh_client_phone' style='margin-left: 0px'></p>" .
        "</div>" .
        "<hr>" .
        "<br>" .
        "</div>";

    $genres_arr = [];
    $gender = ['М', 'Ж'];
    $i = 0;
    $sql_genres = "SELECT genre from genre";

    //Список жанров
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query($sql_genres);
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $genres_arr [$i] = $row['genre'];
        $i += 1;
    }
    $conn->close();


    echo "<div class=\"inner_list_book_info\">";
    for ($i = 0; $i < count($genres_arr); $i++) {

        $j = 0;
        $sql = "SELECT `books`.`book_genre`, COUNT(`clients`.`client_gender`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_genre` = '$genres_arr[$i]') 
                AND (`clients`.`client_gender` = '$gender[$j]'))";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<p class=\"inner_prgh_book_info\">" . " " . "</p>";
        }
        $conn->close();
    }
    echo "</div>";


    echo "<div class=\"inner_list_client_id\">";
    for ($i = 0; $i < count($genres_arr); $i++) {

        $j = 0;
        $sql = "SELECT `books`.`book_genre`, COUNT(`clients`.`client_gender`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_genre` = '$genres_arr[$i]') 
                AND (`clients`.`client_gender` = '$gender[$j]'))";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<p class=\"inner_prgh_client_id\" style='margin-left: -135px; text-align: center'>" . $row['book_genre'] . "</p>";
        }
        $conn->close();
    }
    echo "</div>";


    echo "<div class=\"inner_list_client_name\">";
    for ($i = 0; $i < count($genres_arr); $i++) {
        $j = 0;
        $sql = "SELECT `books`.`book_genre`, COUNT(`clients`.`client_gender`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_genre` = '$genres_arr[$i]') 
                AND (`clients`.`client_gender` = '$gender[$j]'))";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<p class=\"inner_prgh_client_name\">" . "Мужчин: " . $row['COUNT(`clients`.`client_gender`)'] . " | ";
        }
        $conn->close();

        $j = 1;
        $sql = "SELECT `books`.`book_genre`, COUNT(`clients`.`client_gender`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_genre` = '$genres_arr[$i]') 
                AND (`clients`.`client_gender` = '$gender[$j]'))";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo " Женщин: " . $row['COUNT(`clients`.`client_gender`)'] . "</p>";
        }
        $conn->close();
    }
    echo "</div>";
}

function stats_books($servername, $username, $password, $dbname)
{
    echo "</div>" .
        "<div id='content'>" .
        "<br><br>" .
        "<div class='table_out'>" .
        "<div class='inner_list_book_info'>" .
        "<p class='inner_prgh_book_info' style='margin-left: 0px'>Книга</p>" .
        "</div>" .
        "<div class='inner_list_client_id'>" .
        "<p class='inner_prgh_client_id' style='margin-left: 0px'></p>" .
        "</div>" .
        "<div class='inner_list_client_name'>" .
        "<p class='inner_prgh_client_name' style='margin-left: 0px'>Колиество читателей</p>" .
        "</div>" .
        "<div class='inner_list_order_id'>" .
        "<p class='inner_prgh_order_id' style='margin-left: 0px'></p>" .
        "</div>" .
        "<div class='inner_list_order_date'>" .
        "<p class='inner_prgh_order_date' style='margin-left: 0px'></p>" .
        "</div>" .
        "<div class='inner_list_client_phone'>" .
        "<p class='inner_prgh_client_phone' style='margin-left: 0px'></p>" .
        "</div>" .
        "<hr>" .
        "<br>" .
        "</div>";

    $books_arr = [];
    $gender = ['М', 'Ж'];
    $i = 0;
    $sql_books = "SELECT `books`.`book_id`, `books`.`book_name` 
                  FROM `books` ORDER BY `books`.`book_id` ASC";

    //Список жанров
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query($sql_books);
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $books_arr [$i] = $row['book_name'];
        $i += 1;
    }
    $conn->close();

    echo "<div class=\"inner_list_book_info\">";

    for ($i = 0; $i < count($books_arr); $i++) {

        $j = 0;
        $sql = "SELECT `books`.`book_name`, COUNT(`clients`.`client_gender`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_name` = '$books_arr[$i]') AND (`clients`.`client_gender` = '$gender[$j]'))";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<p class=\"inner_prgh_book_info\">" . " " . "</p>";
        }
        $conn->close();
    }
    echo "</div>";


    echo "<div class=\"inner_list_client_id\">";
    for ($i = 0; $i < count($books_arr); $i++) {

        $j = 0;
        $sql = "SELECT `books`.`book_name`, COUNT(`clients`.`client_gender`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_name` = '$books_arr[$i]') AND (`clients`.`client_gender` = '$gender[$j]'))";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<p class=\"inner_prgh_client_id\" style='margin-left: -235px; width: 300px; margin-top: 5px'>" . $books_arr[$i] . "</p>";
        }
        $conn->close();
    }
    echo "</div>";


    echo "<div class=\"inner_list_client_name\">";
    for ($i = 0; $i < count($books_arr); $i++) {

        $j = 0;
        $sql = "SELECT `books`.`book_name`, COUNT(`clients`.`client_gender`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_name` = '$books_arr[$i]') AND (`clients`.`client_gender` = '$gender[$j]'))";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<p class=\"inner_prgh_client_name\" style='margin-top: 6px'>" . "Мужчин: " . $row['COUNT(`clients`.`client_gender`)'] . " | ";
        }
        $conn->close();

        $j = 1;
        $sql = "SELECT `books`.`book_name`, COUNT(`clients`.`client_gender`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_name` = '$books_arr[$i]') AND (`clients`.`client_gender` = '$gender[$j]'))";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo " Женщин: " . $row['COUNT(`clients`.`client_gender`)'] . "</p>";
        }
        $conn->close();
    }
    echo "</div>";
}

function stats_age($servername, $username, $password, $dbname)
{
    echo "</div>" .
        "<div id='content'>" .
        "<br><br>" .
        "<div class='table_out'>" .
        "<div class='inner_list_book_info'>" .
        "<p class='inner_prgh_book_info' style='margin-left: 0px'></p>" .
        "</div>" .
        "<div class='inner_list_client_id'>" .
        "<p class='inner_prgh_client_id' style='margin-left: -100px'>Жанр</p>" .
        "</div>" .
        "<div class='inner_list_client_name'>" .
        "<p class='inner_prgh_client_name' style='margin-left: 0px'>До 30 лет</p>" .
        "</div>" .
        "<div class='inner_list_order_id'>" .
        "<p class='inner_prgh_order_id' style='margin-left: 0px'></p>" .
        "</div>" .
        "<div class='inner_list_order_date'>" .
        "<p class='inner_prgh_order_date' style='margin-left: 0px'>От 30 лет</p>" .
        "</div>" .
        "<div class='inner_list_client_phone'>" .
        "<p class='inner_prgh_client_phone' style='margin-left: 0px'></p>" .
        "</div>" .
        "<hr>" .
        "<br>" .
        "</div>";

    $genres_arr = [];
    $sign = ">";

    $i = 0;
    $sql_genres = "SELECT genre from genre";

    //Список жанров
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query($sql_genres);
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $genres_arr[$i] = $row['genre'];
        $i += 1;
    }
    $conn->close();


    echo "<div class=\"inner_list_book_info\">";
    for ($i = 0; $i < count($genres_arr); $i++) {
        echo "<p class=\"inner_prgh_book_info\" >" . "" . "</p>";
    }
    echo "</div>";


    echo "<div class=\"inner_list_client_id\">";
    for ($i = 0; $i < count($genres_arr); $i++) {
        echo "<p class=\"inner_prgh_client_id\" style='margin-left: -75px'>" . $genres_arr[$i] . "</p>";
    }
    echo "</div>";


    echo "<div class=\"inner_list_client_id\">";
    for ($i = 0; $i < count($genres_arr); $i++) {
        echo "<p class=\"inner_prgh_client_id\" >" . "" . "</p>";
    }
    echo "</div>";


    //До 30
    echo "<div class=\"inner_list_client_name\">";
    for ($i = 0; $i < count($genres_arr); $i++) {

        $sign = ">";
        $sql = "SELECT `books`.`book_genre`, COUNT(`clients`.`client_birthday`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_genre` = '$genres_arr[$i]') AND (`clients`.`client_birthday` $sign '1988-01-01'))";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<p class=\"inner_prgh_client_name\" style='margin-left: -50px'>" . $row['COUNT(`clients`.`client_birthday`)'] . "</p>";
        }
        $conn->close();
    }
    echo "</div>";


    echo "<div class=\"inner_list_order_date\">";
    for ($i = 0; $i < count($genres_arr); $i++) {
        echo "<p class=\"inner_prgh_order_date\" >" . "" . "</p>";
    }
    echo "</div>";


    //После 30
    echo "<div class=\"inner_list_client_name\">";
    for ($i = 0; $i < count($genres_arr); $i++) {

        $sign = "<";
        $sql = "SELECT `books`.`book_genre`, COUNT(`clients`.`client_birthday`) 
                FROM `books` 
                LEFT JOIN `orders` ON `orders`.`order_book_id` = `books`.`book_id` 
                LEFT JOIN `clients` ON `orders`.`order_client_id` = `clients`.`client_id` 
                WHERE ((`books`.`book_genre` = '$genres_arr[$i]') AND (`clients`.`client_birthday` $sign '1988-01-01'))";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<p class=\"inner_prgh_client_name\" style='margin-left: -135px'>" . $row['COUNT(`clients`.`client_birthday`)'] . "</p>";
        }
        $conn->close();
    }
    echo "</div>";
}

