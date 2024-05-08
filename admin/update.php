<?php
    $id = $_GET['id'];
    
    $conn = new PDO("mysql:host=localhost;dbname=gestion", 'root', '');
    $state = $conn->prepare('SELECT * FROM students where id = ?');
    $state->execute([$id]);
    $student = $state->fetch(PDO::FETCH_ASSOC);


?>

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
        <h1>MODIFY STUDENT</h1>
       
        <form method="post" action="student.php">
            <input type="hidden" <?php echo "value='".$student['id']."'" ?> >
            <label for="name">first name</label>
            <input type="text" placeholder="Enter first name" name="firstname" id="name" required <?php echo "value='".$student['first_name']."'" ?>>
            <label for="Last name">Last name</label>
            <input type="text" placeholder="Enter Last name" name="lastname" id="Last name" required <?php echo "value='".$student['last_name']."'" ?>>
            <label for="email">Email</label>
            <input type="email" placeholder="Enter  email" name="email" id="email" required <?php echo "value='".$student['email']."'" ?>>
            <label for="phone">phone</label>
            <input type="tel" pattern="^\+212\d{9}$" name="phone" id="phone" placeholder="Enter phone" required <?php echo "value='".$student['phone_number']."'" ?>>
            <div class="button">
            <button style="width: 150px;">MODIFY</button>
            <a href="student.php" class="cancel">CANCEL</a>


            
           <?php
           if ($_SERVER["REQUEST_METHOD"] == "POST" &&
           (
               $_POST['firstname'] != $student['first_name'] ||
               $_POST['lastname'] != $student['last_name'] ||
               $_POST['email'] != $student['email'] ||
               $_POST['phone'] != $student['phone_number']
           )
       ) {
            
               $firstname = @$_POST['firstname'];
               $lastname = @$_POST['lastname'];
               
               $email = @$_POST['email'];
               $phone = @$_POST['phone'];
               $id = @$_POST['id'];
               $stmt = $conn->prepare("UPDATE students SET first_name = :firstname, last_name = :lastname, email = :email, phone_number = :phone WHERE id = :id");
               $stmt->execute([$firstname,$lastname,$email,$phone,$id]);
           }



            ?>

            
            </div>
           
        </form>
    </div>
    


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>