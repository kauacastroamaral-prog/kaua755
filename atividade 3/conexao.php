
<?php

$host = 'localhost';
$db = 'kaua755';
$user = 'kaua755';
$pass = '755!@#';
$charset = 'utf8mb4';

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=$charset",
        $user,
        $pass
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Erro ao conectar ao banco de dados.");

}

?>
