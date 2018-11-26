<?php
    require_once 'init.php';
    // Для простоты вместо логина используется ID сессии
    $taskQuery = $db->prepare("
      SELECT TaskDescription, ID FROM $table WHERE SessionID = :SessionID ORDER BY ID
    ");
    $taskQuery->execute(['SessionID' => session_id()]);
    $tasks = $taskQuery->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список дел</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
    <div class="to-do-list">
        <ul>
            <?php foreach($tasks as $task): ?>
            <li>
                <span class="task-description">
                    <?php echo $task['TaskDescription']; ?>
                </span>
                <a href="RemoveTask.php?TaskID=<?php echo $task['ID']; ?>"><i class="fas fa-check"></i></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <form action="AddTask.php" method="post" class="add-task-form">
            <textarea name="task" placeholder="Напишите здесь задание..." autocomplete="off" required></textarea>
            <input type="submit" value="Добавить" class="add-task-button">
        </form>
    </div>
</body>
</html>