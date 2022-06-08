<?php 
    session_start();
    require_once 'config/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration System PDO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="min.css" rel="stylesheet">
    <link rel="stylesheet" href="signup/style.css">
</head>
<body>

    <!-- ฟอร์มสมัครสมาชิก -->
    <form class="signup-form" action="signup_db.php" method="post">
      
      <!-- form header -->
      <div class="form-header">
        <h1>CREATE ACCOUNT</h1>
      </div>

      <!-- form body -->
      <div class="form-body">

        <!-- Firstname and Lastname -->
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="id" class="label-title">ID *</label>
            <input type="text" name="id" class="form-input" placeholder="enter your no student" required="required" />
          </div>
          <div class="form-group right">
            <label for="ids" class="label-title">Student ID *</label>
            <input type="text" name="ids" class="form-input" placeholder="enter your Student ID" />
          </div>
        </div>

        <div class="horizontal-group">
          <div class="form-group left">
            <label for="firstname" class="label-title">First name *</label>
            <input type="text" name="firstname" class="form-input" placeholder="enter your first name" required="required" />
          </div>
          <div class="form-group right">
            <label for="lastname" class="label-title">Last name *</label>
            <input type="text" name="lastname" class="form-input" placeholder="enter your last name" />
          </div>
        </div>

        <!-- Passwrod and confirm password -->
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="gender" class="label-title">Gender *</label>
            <input type="text" name="gender" class="form-input" placeholder="enter your Gender" required="required">
          </div>
          <div class="form-group right">
            <label for="bithday" class="label-title">Bithday *</label>
            <input type="text" class="form-input" name="bithday" placeholder="enter your Bithday Ex.01/01/2000" required="required">
          </div>
        </div>

        <!-- Email -->
        <div class="form-group">
          <label for="email" class="label-title">Email*</label>
          <input type="email" name="email" class="form-input" placeholder="enter your email" required="required">
        </div>

        <!-- Passwrod and confirm password -->
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="password" class="label-title">Password *</label>
            <input type="password"  name="password" class="form-input" placeholder="enter your password" required="required">
          </div>
          <div class="form-group right">
            <label for="confirm password" class="label-title">Confirm Password *</label>
            <input type="password" class="form-input" name="c_password" placeholder="enter your password again" required="required">
          </div>
        </div><br><br><br><br>
        

        

      <!-- form-footer -->
      <div class="form-footer">
        <span><p>เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี่เพื่อ  <a href="index.php">เข้าสู่ระบบ</a></p></span>
        <button type="submit" name="signup" class="btn">Create</button>
      </div>

    </form>

    <!-- Script for range input label -->
    <script>
      var rangeLabel = document.getElementById("range-label");
      var experience = document.getElementById("experience");

      function change() {
      rangeLabel.innerText = experience.value + "K";
      }
    </script>
    <script>
      let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }

    </script>

</body>
</html>