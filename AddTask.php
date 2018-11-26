<?php
require_once 'init.php';

if(isset($_POST['task'])) {
    $task = trim($_POST['task']);

    if(!empty($task)) {
        $addQuery = $db->prepare("
            INSERT INTO $table (SessionID, TaskDescription)
            VALUES  (:SessionID, :TaskDescription)
        ");
        $addQuery->execute([
            'SessionID' => session_id(),
            'TaskDescription' => $task
        ]);
    }
}

header('Location: index.php');