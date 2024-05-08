<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="add.css">
    <link rel="icon" href="../icon.png" type="image/png">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <h1>ADD STUDENT</h1>
       
        <form method="post">
            <label for="name">first name</label>
            <input type="text" placeholder="Enter first name" name="firstname" id="name" required>
            <label for="Last name">Last name</label>
            <input type="text" placeholder="Enter Last name" name="lastname" id="Last name" required>
            <label for="password">password</label>
            <input type="password" placeholder="Enter  password" name="password" id="password" required>
            <label for="email">Email</label>
            <input type="email" placeholder="Enter  email" name="email" id="email" required>
            <label for="phone">phone</label>
            <input type="tel" pattern="^\+212\d{9}$" name="phone" id="phone" placeholder="Enter phone" required>
            <div class="button">
            <button style="width: 150px;">ADD</button>
            <a href="student.php" class="cancel">CANCEL</a>
            </div>
           
        </form>
    </div>
    <?php
        if(isset($_POST['firstname'],$_POST['lastname'],$_POST['password'],$_POST['email'],$_POST['phone'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $conn = new PDO("mysql:host=localhost;dbname=gestion", 'root', '');
            $insert = $conn->prepare("INSERT INTO students (first_name,last_name,PASSWORD,email,phone_number) VALUES (?,?,?,?,?)");
            $insert->execute([$firstname,$lastname,$password,$email,$phone]);
            if($insert){
                header('location: student.php');
            }
        }
        
        
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>