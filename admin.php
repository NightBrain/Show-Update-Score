<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) { //เช็คการเข้าสู้ระบบ
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!'; //เตือน error
        header('location: index.php');//ถ้ายังไม่ได้เข้าสู่ระบบก็กลับไปหน้าล็อกอิน
    }
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM users WHERE id = $delete_id");

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted successfully";
            header("refresh:1; url=admin.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Teacher</title>

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
</svg>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/686/686051.png">
</head>
<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;t">
    <div class="container">
    <?php 
        //ดึงข้อมูลจากฐานข้อมูลมาแสดง
        if (isset($_SESSION['admin_login'])) {
            $admin_id = $_SESSION['admin_login'];
            $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        ?>
        <a class="navbar-brand" href="admin.php">
            <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Bootstrap
        </a>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
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
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://scontent.fcnx4-1.fna.fbcdn.net/v/t1.6435-9/156928715_2468762543270539_7593103061362197670_n.png?_nc_cat=108&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeH-19gNT_ieoDOtf_4yXgDLVgezhRvV2kBWB7OFG9XaQJCA3b750U_nwWXe4soRvv4NUsvm1e0UlOpV_7eF7C0z&_nc_ohc=2Qw0DP_nyesAX8ufC1g&_nc_ht=scontent.fcnx4-1.fna&oh=00_AT_QPVCEeSSDRIQgXFTdKKjjARo8-HX0t2JCb0FGy5Aedg&oe=62B19EB4" class="d-block w-100" while="50px" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Welcome Teacher</h1>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="firstname" class="col-form-label">First Name:</label>
                <input type="text" required class="form-control" name="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="col-form-label">last Name:</label>
                <input type="text" required class="form-control" name="lastname">
            </div>
            <div class="mb-3">
                <label for="position" class="col-form-label">position:</label>
                <input type="text" required class="form-control" name="position">
            </div>
            <div class="mb-3">
                <label for="img" class="col-form-label">img:</label>
                <input type="file" required class="form-control" id="imgInput" name="img">
                <img width="100%" id="previewImg" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-success">submit</button>
            </div>
            </form>
        </div>
        </form>
        </div>
    </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>ตารางสะสมคะแนน วิชา.....</h1>
            </div>
            
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
        <?php } ?>
        <!--Users data-->
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                <th scope="col">Number</th>
                <th scope="col">รหัสนักศึกษา</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">1</th>
                <th scope="col">2</th>
                <th scope="col">3</th>
                <th scope="col">4</th>
                <th scope="col">5</th>
                <th scope="col">6</th>
                <th scope="col">7</th>
                <th scope="col">8</th>
                <th scope="col">9</th>
                <th scope="col">10</th>
                <th scope="col" style="font-size: 15px;">สอบกลางภาค</th>
                <th scope="col" style="font-size: 15px;">สอบปลายภาค</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stmt = $conn->query("SELECT * FROM users");
                    $stmt->execute();
                    $users = $stmt->fetchall();

                    if (!$users) {
                        echo "<p><td colspan='6' class='text-center'>No users found</td></p>";
                    } else {
                    foreach ($users as $user) {
                            
                      
                ?>
                <tr>
                    <th scope="row" style="text-align: center;"><?= $user['id']; ?></th>
                    <th style="text-align: center;"><?= $user['ids']; ?></th>
                    <td><?= $user['firstname']; ?></td>
                    <td><?= $user['lastname']; ?></td>
                    <td style="text-align: center;"><input name="w1" type="text" class="search-query" readonly value="<?= $user['w1']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="w2" type="text" class="search-query" readonly value="<?= $user['w2']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="w3" type="text" class="search-query" readonly value="<?= $user['w3']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="w4" type="text" class="search-query" readonly value="<?= $user['w4']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="w5" type="text" class="search-query" readonly value="<?= $user['w5']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="w6" type="text" class="search-query" readonly value="<?= $user['w6']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="w7" type="text" class="search-query" readonly value="<?= $user['w7']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="w8" type="text" class="search-query" readonly value="<?= $user['w8']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="w9" type="text" class="search-query" readonly value="<?= $user['w9']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="w10" type="text" class="search-query" readonly value="<?= $user['w10']; ?>" style="width:35px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="midterm" type="text" class="search-query" readonly value="<?= $user['midterm']; ?>" style="width: 50px; text-align: center;"></td>
                    <td style="text-align: center;"><input name="final" type="text" class="search-query" readonly value="<?= $user['final']; ?>" style="width: 50px; text-align: center;"></td>
                    <td style="text-align: center;">
                        <a href="edit.php?id=<?= $user['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="?delete=<?= $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                    </td>
                    
                </tr>
                <?php   }
                    } ?>
                <tr>
            </tbody>
            </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>