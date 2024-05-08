<?php
    session_start();
    if (isset($_POST['email'],$_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conn = new PDO("mysql:host=localhost;dbname=gestion", 'root', '');
        $state = $conn->prepare('SELECT * FROM students where email = ? AND password = ?');
        $state->execute(array($email,$password));
        $user = $state->fetch(PDO::FETCH_ASSOC);
        
        
        if ($user){
            if ($user['is_admin']) {
                $_SESSION['full_name'] = $user['first_name']." ".$user['last_name'];
                header('Location: ../admin/dashboard.php');
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="../icon.png" type="image/png">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <h1>CRUD OPERATIHONS</h1>
        <div>
            <h2>Sign In</h2>
            <p>Enter your credentials to access your account</p>
        </div>
        <form method="post">
            <label for="email">Email</label>
            <input type="email" placeholder="Enter your email" name="email" id="email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <button>SIGN IN</button>
            <p>Forgot your password? <a href="#">Reset Password</a></p>
        </form>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>