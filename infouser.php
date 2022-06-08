<?php 

    session_start();
    require_once 'config/db.php'; 
    if (!isset($_SESSION['user_login'])) { //เช็คการเข้าสู้ระบบ
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!'; //เตือน error
        header('location: index.php'); //ถ้ายังไม่ได้เข้าสู่ระบบก็กลับไปหน้าล็อกอิน
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลส่วนตัว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c8e8ce3080.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Itim">
    <style>
      body {
        font-family: 'Itim', serif;
        font-size: 20px;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;t">
    <div class="container">
            <?php 
            //ดึงข้อมูลจากฐานข้อมูลมาแสดง
            if (isset($_SESSION['user_login'])) {
                $user_id = $_SESSION['user_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            } 
            ?>
        <a class="navbar-brand" href="user.php">
            <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Bootstrap
        </a>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="user.php">Home</a>
            </li>
        </ul>
        <span class="navbar-text mb-2">
            <div class="dropdown">
                <span><?php echo $row['firstname'] . ' ' . $row['lastname'] ?> <i class="fa-solid fa-caret-down"></i> </span>
                <div class="dropdown-content">
                    <p><center><a href="infoadmin.php" class="lo">ข้อมูลส่วนตัว</a><center></p>
                    <hr>
                    <p><center><a href="logout.php" class="lo">Logout</a><center></p>
                </div>
            </div>
        </span>
        </div>
    </div>
    </nav>
        <div class="container">
            <?php 
            //ดึงข้อมูลจากฐานข้อมูลมาแสดง
            if (isset($_SESSION['user_login'])) {
                $user_id = $_SESSION['user_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            } 
            ?>
             <div class="text-center" style="font-size: 50px;">
                <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" class="rounded" alt="..." width="300px"><br>
                    <tr>
                        <td><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                    </tr>
                <hr>
            </div>
        <div>
            <h5>
                <table class="info" style="font-size: 30px;">
                     <tr>
                        <th>No. </th>
                        <td> : <?php echo $row['id'] ?></td>
                    </tr>
                    <tr>
                        <th> </th>
                    </tr>
                    <tr>
                        <th> student ID </th>
                        <td> : <?php echo $row['ids']?></td>
                    </tr>
                    <tr>
                        <th> </th>
                    </tr>
                    <tr>
                        <th>Gender </th>
                        <td> : <?php echo $row['gender'] ?></td>
                    </tr>
                    <tr>
                        <th> </th>
                    </tr>
                    <tr>
                        <th>Bithday </th>
                        <td> : <?php echo $row['bithday'] ?></td>
                    </tr>
                    <tr>
                        <th> </th>
                    </tr>
                    <tr>
                        <th>Email </th>
                        <td> : <?php echo $row['email'] ?></td>
                    </tr>
                    <tr>
                        <th> </th>
                    </tr>
                    <tr>
                        <th>Status </th>
                        <td> : <?php echo $row['urole'] ?></td>
                    </tr>
                </table>
            </h5>
        </div>
        </div>
</body>
</html>