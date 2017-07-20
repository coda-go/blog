<?php
/**
 * Created by PhpStorm.
 * User: coda
 * Date: 20.07.17
 * Time: 0:44
 */

define('HOST', 'localhost');
define('BD', 'myBlog');
define('USER', 'root');
define('PSW', '');


try{
    // подключаем класс PDO и заносим данные хоста, БД, пользователя и пароль, вторым параметром пропысываем Режим сообщений об ошибках
    $db = new PDO('mysql:hostname='.HOST.';dbname='.BD, USER, PSW, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) { // если не удалось поделючится выводим сообщение
    echo 'Ошибка при подключении к базе данных!' . $e->getMessage();
}
// указываем кодировку, чтобы избежать проблемм с ней
$db->exec('SET CHARACTER SET utf8');