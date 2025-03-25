<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="back-btn">←To-Do List</a>
        <ul>
        <ul>
            <li><a href="#home" class="active"><i class="fas fa-home"></i></a></li>
            <li><a href="#work"><i class="fas fa-briefcase"></i></a></li>
            <li><a href="#contact"><i class="fas fa-envelope"></i></a></li>
        </ul>
    </nav>

    <section id="home" class="section">
        <div class="profile-content">
            <div class="text">
                <h1 class="name">Eldrian Aspa</h1>
                <h2 class="title">Web Developer</h2>
                <p>Welcome to my digital portfolio. This platform serves as a showcase for my professional works, an insight into my background, and a means to establish contact.</p>
            </div>
            <div class="image">
                <img src="picture/pic13.jpg" alt="Profile Picture">
            </div>
        </div>
    </section>

    <section id="work" class="section">
        <h2>My Workspace</h2>
        <div class="project-gallery">
            <img src="picture/pic21.png" alt="Project 1">
            <img src="picture/pic22.png" alt="Project 2">
            <img src="picture/pic19.png" alt="Project 3">
            <img src="picture/pic20.png" alt="Project 4">
            <img src="picture/pic14.jpg" alt="Project 5">
            <img src="picture/pic15.jpg" alt="Project 6">
            <img src="picture/pic16.jpg" alt="Project 7">
            <img src="picture/pic17.png" alt="Project 8">
        </div>
    </section>

    <section id="contact" class="section">
        <h2>Contact Me</h2>
        <form class="contact-form">
            <input type="text" placeholder="Name" required>
            <input type="email" placeholder="Email" required>
            <input type="text" placeholder="Subject" required>
            <textarea placeholder="Message" required></textarea>
            <button type="submit">Send</button>
        </form>
    </section>

    <script src="script.js"></script>
</body>
</html>

