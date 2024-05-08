<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=gestion", 'root', '');
    $state = $conn->query('SELECT COUNT(*) AS Totale FROM students');
    $result = $state->fetch();
    $course = $conn->query('SELECT COUNT(*) AS Totale FROM courses');
    $resultc = $course->fetch();
    $course = $conn->query('SELECT COUNT(*) AS Totale FROM teachers');
    $teach = $course->fetch();
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashstyle.css">
    <link rel="icon" href="../icon.png" type="image/png">
    <title>dashboard</title>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <h1>CRUD OPERATIONS</h1>
            <div>
                <img src="../assessts/person.svg" >
                <h2><?php echo $_SESSION['full_name'];?></h2>
                <p>admin</p>
            </div>
            <div>
                <a href="#"><ion-icon name="home-outline"></ion-icon>Home</a>
                <a href="#"><ion-icon name="bookmark-outline"></ion-icon>Course</a>
                <a href="student.php"><ion-icon name="people-outline"></ion-icon>Students</a>
                <a href="Payement.php"><ion-icon name="cash-outline"></ion-icon>Payement</a>
                <a href="#"><ion-icon name="document-outline"></ion-icon>Report</a>
                <a href="#"><ion-icon name="settings-outline"></ion-icon>Settings</a>
            </div>

            <a href="../login/login.php">Logout <ion-icon name="arrow-redo-outline"></ion-icon></a>

        </div>
        <div class="right-side">
            <div class="top">
            <ion-icon name="chevron-back-circle-outline"></ion-icon>
            <div>
                <span>
                    <input type="search" placeholder="Search...">
                    <ion-icon name="search-outline"></ion-icon>
                </span>
                <ion-icon name="notifications-outline"></ion-icon>
            </div>
            </div>
            <div class="middle">
                <a href="student.php">
                    <img src="../assessts/Vector.svg">
                    <p>Students</p>
                    <h2><?php echo $result['Totale'];?></h2>
                </a>
                <a href="course.php">
                    <img src="../assessts/bookmark 1.svg" alt="">
                    <p>Course</p>
                    <h2><?php echo $resultc['Totale'];?></h2>
                </a>
                <a href="course.php">
                    <img src="../assessts/usd-square 1.svg" alt="">
                    <p>Payements</p>
                    <h2>900$</h2>
                </a>
                <a href="course.php">
                    <img src="../assessts/user.svg" alt="">
                    <p>Teachers</p>
                    <h2><?php echo $teach['Totale'];?></h2>
                </a>
            </div>
        </div>
    </div>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>