<?php
include 'db.php';

$sql = "SELECT * FROM tasks WHERE is_completed = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$completed_tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Tasks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-title">To Do List</div>
        <input type="text" class="search-bar" placeholder="Search...">

        <div class="mini-task-text">
            <p>You have completed <strong><?php echo count($completed_tasks); ?></strong> tasks. Great job!</p>
        </div>

        <ul>
            <li class="menu-item"><a href="index.php">Task</a></li>
            <li class="menu-item"><a href="completed.php">Completed</a></li>
            <li class="menu-item"><a href="profile.php">Profile</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
            <h1>Completed Tasks</h1>

            <ul class="task-list">
                <?php foreach ($completed_tasks as $task): ?>
                    <li class="completed-task">
                        <span class="task-text">
                            <?php echo htmlspecialchars($task['task_name']); ?>
                        </span>
                        <div>
                            <i class="fas fa-check-circle completed-icon"></i>
                            <a href="delete_task.php?id=<?php echo $task['id']; ?>&redirect=completed.php" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>