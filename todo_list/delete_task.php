<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if (isset($_GET['redirect'])) {
        $redirect = $_GET['redirect'];
        header("Location: $redirect");
    } else {

        header("Location: index.php");
    }
    exit();
}
?>