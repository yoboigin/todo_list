<?php
include 'db.php';

$sql = "SELECT * FROM tasks WHERE is_completed = 0";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-title">To Do List</div>
        <input type="text" class="search-bar" placeholder="Search...">

        <div class="mini-task-text">
            <p>You have <strong><?php echo count($tasks); ?></strong> tasks to complete. Keep going!</p>
        </div>

        <ul>
            <li class="menu-item"><a href="index.php">Task</a></li>
            <li class="menu-item"><a href="completed.php">Completed</a></li>
            <li class="menu-item"><a href="profile.php">Profile</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
            <h1>Task List</h1>
            <form action="add_task.php" method="POST">
                <input type="text" name="task_name" placeholder="Add a new task" required>
                <button type="submit">Add Task</button>
            </form>

            <ul class="task-list">
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <span class="task-text"><?php echo htmlspecialchars($task['task_name']); ?></span>
                        <div>

                            <a href="edit_task.php?id=<?php echo $task['id']; ?>" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
     
                            <a href="complete_task.php?id=<?php echo $task['id']; ?>" title="Complete">
                                <i class="fas fa-check"></i>
                            </a>

                            <a href="delete_task.php?id=<?php echo $task['id']; ?>" title="Delete">
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