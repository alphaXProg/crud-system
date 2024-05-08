<?php
    $conn = new PDO("mysql:host=localhost;dbname=gestion", 'root', '');
    $state = $conn->prepare('DELETE FROM students WHERE id = ?');
    $state->execute([$_GET['id']]);
    if ($state) {
        echo "<script>alert('Student successfully deleted.')</script>";
        header('Location: student.php');
    }
?>
