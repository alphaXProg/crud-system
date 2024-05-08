<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=gestion", 'root', '');
$state = $conn->query('SELECT * FROM students');
$students = $state->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashstyle.css">
    <link rel="icon" href="../icon.png" type="image/png">
    <style>
        .left-side div:last-of-type a:nth-of-type(3) {
            background-color: #FEAF00;
        }

        .left-side div:last-of-type a:first-of-type {
            background-color: transparent;
        }

        .left-side div:last-of-type a:hover:not(.left-side div:last-of-type a:nth-of-type(3)) {
            background-color: #FEAF00;
            margin-left: 20px;
        }

        .content-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .content-table thead tr {
            background-color: #FEAF00;
            color: #ffffff;
            text-align: left;
            font-weight: 500;
            text-transform: capitalize;
        }

        .content-table th {
            padding: 18px;
            cursor: pointer;
        }



        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #FEAF00;
        }

        .content-table tbody td {
            font-size: 16px;
            position: relative;
        }

        .content-table tbody td:first-of-type {
            color: #FEAF00;
            font-size: 20px;
            display: flex;
            align-items: center;

        }
        th {
            text-align: left;
        }
        .btn {
            color: #FEAF00;
            font-size: 20px;
            margin-left: 20px;
            transition: all .5s ease;
        }
        .btn:hover {
            color: #3182CE;
        }
        .create {

            display: flex;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .create h4 {
            font-size: 22px;
        }
        .create a {
            background: rgb(254,175,0);
            padding: 15px;
            font-size: 14px;
            color: #f3f3f3;
            text-decoration: none;
            border-radius: 4px;
            transition: all .3s ease;
        }
        .create a:hover {
            background: rgba(254,175,0,.9);
            
        }
    </style>
    <title>dashboard</title>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <h1>CRUD OPERATIONS</h1>
            <div>
                <img src="../assessts/person.svg">
                <h2><?php $_SESSION['full_name']; ?></h2>
                <p>admin</p>
            </div>
            <div>
                <a href="dashboard.php"><ion-icon name="home-outline"></ion-icon>Home</a>
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
            <div class="create">
                <h4>Students List</h4>
                <a href="create.php">ADD NEW STUDENT</a>
            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>first Name</th>
                        <th>last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Operation </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($students as $student) {
                        if ($student['is_admin']) {
                            $student['is_admin'] = 'Yes';
                        } else {
                            $student['is_admin'] = "No";
                        }
                        echo "<tr>";
                        echo "<td> <img src='profile.svg' style='margin-right:10px;' >" . $student['id'] . "</td>";
                        echo  "<td>" . $student['first_name'] . "</td>";
                        echo  "<td>" . $student['last_name'] . "</td>";
                        echo  "<td>" . $student['email'] . "</td>";
                        echo "<td>" . $student['phone_number'] . "</td>";
                        echo "<td><a href='delete.php?id=" . $student['id'] . "    ' class='btn'><ion-icon name='trash-outline'></ion-icon></a>
                            <a href='update.php?id=" . $student['id'] . "    ' class='btn'><ion-icon name='pencil-outline'></ion-icon></a>
                            </td>";
                        echo "<td>" . "</td>";

                        echo "</tr>";
                    }

                        
                    ?>


                </tbody>

            </table>

        </div>



        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>