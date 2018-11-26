<?php
require_once 'init.php';

$addQuery = $db->prepare("
  DELETE FROM $table WHERE ID=:ID AND SessionID = :SessionID
 ");

$addQuery->execute([
    'ID' => $_GET['TaskID'],
    'SessionID' => session_id()
]);

header('Location: index.php');