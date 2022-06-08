<?php

    session_start();
    require_once "config/db.php";

    if (isset($_POST['update'])) {
        $created_at = $_POST['created_at'];
        $id = $_POST['id'];
        $w1 = $_POST['w1'];
        $w2 = $_POST['w2'];
        $w3 = $_POST['w3'];
        $w4 = $_POST['w4'];
        $w5 = $_POST['w5'];
        $w6 = $_POST['w6'];
        $w7 = $_POST['w7'];
        $w8 = $_POST['w8'];
        $w9 = $_POST['w9'];
        $w10 = $_POST['w10'];
        $midterm = $_POST['midterm'];
        $final = $_POST['final'];
        

        $stmt = $conn->prepare("UPDATE users SET w1 = :w1, w2 = :w2, w3 = :w3, w4 = :w4, w5 = :w5, w6 = :w6, w7 = :w7, w8 = :w8, w9 = :w9, w10 = :w10, midterm = :midterm, final = :final, created_at = :created_at WHERE id = :id");
        $stmt->bindParam(":created_at", $created_at);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":w1", $w1);
        $stmt->bindParam(":w2", $w2);
        $stmt->bindParam(":w3", $w3);
        $stmt->bindParam(":w4", $w4);
        $stmt->bindParam(":w5", $w5);
        $stmt->bindParam(":w6", $w6);
        $stmt->bindParam(":w7", $w7);
        $stmt->bindParam(":w8", $w8);
        $stmt->bindParam(":w9", $w9);
        $stmt->bindParam(":w10", $w10);
        $stmt->bindParam(":midterm", $midterm);
        $stmt->bindParam(":final", $final);
        $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "อัพเดทคะแนนสำเร็จ!";
            header("location: admin.php");
        } else {
            $_SESSION['error'] = "อัพเดทคะแนนไม่สำเร็จโปรดลองใหม่อีกครั้ง!";
            header("location: admin.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขคะแนน</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container{
            max-width: 550px;
        }
    </style>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/686/686051.png">
</head>
<body>

    
    <div class="container mt-5">
        <h1>Edit Score</h1><br>
        <center><input style="text-align: center; width:250px;" type="text" readonly name="created_at"  id="date" value="Date <?=date('Y-m-d')?> Time <?=date('H:i:s')?>"/></center> 
        <hr>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $stmt = $conn->query("SELECT * FROM users WHERE id = $id");
                    $stmt->execute();
                    $data = $stmt->fetch();
                }
            ?>
            <center>
            <div class="mb-3">
                <label for="firstname" class="col-form-label">เลขที่</label>
                <input type="text" readonly value="<?= $data['id']; ?>" required class="form-control" name="id" style="width:80px; text-align: center;">
            </div>
            <div style="justify-content: center; display: flex;">Work 01<p style="color: rgb(255, 255, 255);">_______________________</p>Work 06</div>
            <div class="mb-3" style="list-style: none; display: flex; justify-content: center; ">
                <label for="w1" class="col-form-label"></label>
                <input type="text" value="<?= $data['w1']; ?>" required class="form-control" name="w1" style="width:80px; text-align: center;">
                <label for="w2" class="col-form-label" style="color: rgb(255, 255, 255);">____________________</label>
                <input type="text" value="<?= $data['w2']; ?>" required class="form-control" name="w2" style="width:80px; text-align: center;">
            </div>  
            <div style="justify-content: center; display: flex;">Work 02<p style="color: rgb(255, 255, 255);">_______________________</p>Work 07</div>
            <div class="mb-3" style="list-style: none; display: flex; justify-content: center;">
                <label for="w3" class="col-form-label"></label>
                <input type="text" value="<?= $data['w3']; ?>" required class="form-control" name="w3" style="width:80px; text-align: center;">
                <label for="w4" class="col-form-label" style="color: rgb(255, 255, 255);">____________________</label>
                <input type="text" value="<?= $data['w4']; ?>" required class="form-control" name="w4" style="width:80px; text-align: center;">
            </div>  
            <div style="justify-content: center; display: flex;">Work 03<p style="color: rgb(255, 255, 255);">_______________________</p>Work 08</div>
            <div class="mb-3" style="list-style: none; display: flex; justify-content: center;">
                <label for="w5" class="col-form-label"></label>
                <input type="text" value="<?= $data['w5']; ?>" required class="form-control" name="w5" style="width:80px; text-align: center;">
                <label for="w6" class="col-form-label" style="color: rgb(255, 255, 255);">____________________</label>
                <input type="text" value="<?= $data['w6']; ?>" required class="form-control" name="w6" style="width:80px; text-align: center;">
            </div>  
            <div style="justify-content: center; display: flex;">Work 04<p style="color: rgb(255, 255, 255);">_______________________</p>Work 09</div>
            <div class="mb-3" style="list-style: none; display: flex; justify-content: center;">
                <label for="w7" class="col-form-label"></label>
                <input type="text" value="<?= $data['w7']; ?>" required class="form-control" name="w7" style="width:80px; text-align: center;">
                <label for="w8" class="col-form-label" style="color: rgb(255, 255, 255);">____________________</label>
                <input type="text" value="<?= $data['w8']; ?>" required class="form-control" name="w8" style="width:80px; text-align: center;">
            </div>  
            <div style="justify-content: center; display: flex;">Work 05<p style="color: rgb(255, 255, 255);">_______________________</p>Work 10</div>
            <div class="mb-3" style="list-style: none; display: flex; justify-content: center;">
                <label for="w9" class="col-form-label"></label>
                <input type="text" value="<?= $data['w9']; ?>" required class="form-control" name="w9" style="width:80px; text-align: center;">
                <label for="w10" class="col-form-label" style="color: rgb(255, 255, 255);">____________________</label>
                <input type="text" value="<?= $data['w10']; ?>" required class="form-control" name="w10" style="width:80px; text-align: center;">
            </div>  
            <div style="justify-content: center; display: flex;">Midterm<p style="color: rgb(255, 255, 255);">_________________________</p>Final</div>
            <div class="mb-3" style="list-style: none; display: flex; justify-content: center;">
                <label for="midterm" class="col-form-label"></label>
                <input type="text" value="<?= $data['midterm']; ?>" required class="form-control" name="midterm" style="width:80px; text-align: center;">
                <label for="final" class="col-form-label" style="color: rgb(255, 255, 255);">____________________</label>
                <input type="text" value="<?= $data['final']; ?>" required class="form-control" name="final" style="width:80px; text-align: center;">
            </div>  
            <div class="modal-footer">
                <a class="btn btn-secondary" href="admin.php">Go Back</a>
                <button type="submit"  name="update" class="btn btn-success">Update</button>
            </div>
            </center>
            
            </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        }
    </script>
</body>
</html>