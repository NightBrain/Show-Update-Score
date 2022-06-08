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
    <title>user page</title>

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
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/686/686051.png">
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
                <div class="dropdown"> <!-- เมนูตั้งค่า -->
                    <span><?php echo $row['firstname'] . ' ' . $row['lastname'] ?> <i class="fa-solid fa-caret-down"></i> </span>
                    <div class="dropdown-content">
                        <p><center><a href="infouser.php" class="lo">ข้อมูลส่วนตัว</a><center></p>
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
                <img src="https://scontent.fcnx4-1.fna.fbcdn.net/v/t31.18172-8/22218586_1228593627287443_6708480352530601721_o.jpg?_nc_cat=103&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeGo1K-S-fKIFRJ6hBTlSjcaTMTq_S24-9hMxOr9Lbj72E4yTpRL1OrfC_Dph8yUeqm8BF4R_sN_cKFe8OabPAO7&_nc_ohc=5Q-lRBEExeMAX96fCi5&_nc_ht=scontent.fcnx4-1.fna&oh=00_AT-eoSzVWKqAfXEvkX-JVvgHA-Hns3rTS0vgofX19DwPdg&oe=62B2AC42" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Welcome User</h1>
                </div>
                </div>
            </div>
            </div>
            <div class="container mt-5">
            <form action="re.php" method="post">
            <input name="ww" type="text" class="search-query" readonly value="-" style="width:35px; text-align: center; display: none;"><br>
        <div class="row">
            <div class="col-md-6">
            <h1>ตารางสะสมคะแนน วิชา... <br> ของ <span><?php echo $row['firstname'] . ' ' . $row['lastname'] ?> </span></h1><button style="font-size: 25px;" type="submit" name="re" class="btn btn-success">update score</button>
            </div>
        </div>
        <p>Latest Update : <?php echo $row['created_at'] ?></p>
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
                <th scope="col">WORK</th>
                <th scope="col">Score</th>
                <th scope="col">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" style="text-align: center;">Work 01</th>
                    <th style="text-align: center;"><input name="w1" type="text" class="search-query" readonly value="<?php echo $row['w1'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:200px;"><span>
                    <?php if (isset($_SESSION['successs'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs'];
                                unset($_SESSION['successs']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr'];
                                unset($_SESSION['errorr']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">Work 02</th>
                    <th style="text-align: center;"><input name="w2" type="text" class="search-query" readonly value="<?php echo $row['w2'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['successs2'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs2'];
                                unset($_SESSION['successs2']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr2'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr2'];
                                unset($_SESSION['errorr2']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">Work 03</th>
                    <th style="text-align: center;"><input name="w3" type="text" class="search-query" readonly value="<?php echo $row['w3'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['successs3'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs3'];
                                unset($_SESSION['successs3']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr3'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr3'];
                                unset($_SESSION['errorr3']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">Work 04</th>
                    <th style="text-align: center;"><input name="w4" type="text" class="search-query" readonly value="<?php echo $row['w4'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['successs4'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs4'];
                                unset($_SESSION['successs4']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr4'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr4'];
                                unset($_SESSION['errorr4']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">Work 05</th>
                    <th style="text-align: center;"><input name="w5" type="text" class="search-query" readonly value="<?php echo $row['w5'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['successs5'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs5'];
                                unset($_SESSION['successs5']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr5'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr5'];
                                unset($_SESSION['errorr5']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">Work 06</th>
                    <th style="text-align: center;"><input name="w6" type="text" class="search-query" readonly value="<?php echo $row['w6'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['successs6'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs6'];
                                unset($_SESSION['successs6']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr6'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr6'];
                                unset($_SESSION['errorr6']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">Work 07</th>
                    <th style="text-align: center;"><input name="w7" type="text" class="search-query" readonly value="<?php echo $row['w7'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['successs7'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs7'];
                                unset($_SESSION['successs7']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr7'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr7'];
                                unset($_SESSION['errorr7']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">Work 08</th>
                    <th style="text-align: center;"><input name="w8" type="text" class="search-query" readonly value="<?php echo $row['w8'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['successs8'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs8'];
                                unset($_SESSION['successs8']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr8'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr8'];
                                unset($_SESSION['errorr8']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">Work 09</th>
                    <th style="text-align: center;"><input name="w9" type="text" class="search-query" readonly value="<?php echo $row['w9'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['successs9'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs9'];
                                unset($_SESSION['successs9']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr9'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr9'];
                                unset($_SESSION['errorr9']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">Work 10</th>
                    <th style="text-align: center;"><input name="w10" type="text" class="search-query" readonly value="<?php echo $row['w10'] ?>" style="width:35px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['successs10'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['successs10'];
                                unset($_SESSION['successs10']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr10'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr10'];
                                unset($_SESSION['errorr10']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">สอบกลางภาค</th>
                    <th style="text-align: center;"><input name="midterm" type="text" class="search-query" readonly value="<?php echo $row['midterm'] ?>" style="width:50px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['success11'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['success11'];
                                unset($_SESSION['success11']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr11'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr11'];
                                unset($_SESSION['errorr11']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;">สอบปลายภาค</th>
                    <th style="text-align: center;"><input name="final" type="text" class="search-query" readonly value="<?php echo $row['final'] ?>" style="width:50px; text-align: center;"></th>
                    <th style="text-align: center; width:250px;"><span>
                    <?php if (isset($_SESSION['success12'])) { ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['success12'];
                                unset($_SESSION['success12']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['errorr12'])) { ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errorr12'];
                                unset($_SESSION['errorr12']);
                            ?>
                        </div>
                    <?php } ?>
                    </th>
                </tr>
                
            </tbody>
            </table>
                </form>
    </div>
    
</body>
</html>