<?php
include 'db.php';


if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = :task_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':task_id', $task_id);
    $stmt->execute();
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];

    if (!empty($task_id) && !empty($task_name)) {

        $sql = "UPDATE tasks SET task_name = :task_name WHERE id = :task_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':task_name', $task_name);
        $stmt->bindParam(':task_id', $task_id);
        $stmt->execute();

        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-title">To Do List</div>
        <input type="text" class="search-bar" placeholder="Search...">

        <div class="mini-task-text">
            <p>Edit your task below.</p>
        </div>

        <ul>
            <li class="menu-item"><a href="index.php">Task</a></li>
            <li class="menu-item"><a href="completed.php">Completed</a></li>
            <li class="menu-item"><a href="profile.php">Profile</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
            <h1>Edit Task</h1>
            <form action="edit_task.php" method="POST">
                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                <input type="text" name="task_name" value="<?php echo htmlspecialchars($task['task_name']); ?>" placeholder="Edit task" required>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>