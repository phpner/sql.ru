<?php
namespace App;
require_once 'vendor/autoload.php';

$query = $_SERVER['REQUEST_URI'];

$tables = Core::init();

Route::add('/', 'MainController@index');
Route::add('/data', 'DataController@index');
Route::add('/user', 'UserController@index');

Route::dispatch($query);

 ?>
<!doctype html>
<html lang="ru">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script  src="js/lib.js"></script >
    <title>Document</title>
</header>
<body>
<head>
    <div class="logo"></div>
    <div id="inner" class="center warning"></div>
    <br>
    <h1 class="center">Какую таблицу Вы хотите извлечь ?</h1>
    <br>
</head>
<div class="container">

    <form class="formtables clearfix" action="user" method="post">
        <table>
           <tr>
            <?php
                foreach ($tables as $kye)
                {
                    echo "<td>";
                    echo $kye."<input type=\"radio\" name='tables' value='{$kye}'>";
                    echo "</td>";
                }
            ?>
        </tr>

           <tr><td><input type="submit"></td></tr>
       </table>
    </form>
    <div class="clearfix"></div>

</div>
</body>
</html>
