<?php

session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$DBName = 'ToDoList';
$table = 'ToDoList';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);


try {
    $db = new PDO("mysql:host=$host;dbname=$DBName", $user, $pass, $options);
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
