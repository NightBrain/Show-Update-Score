<?php 
    //แจ้งเตือน ERROR ตอนสมัคร
    session_start();
    require_once 'config/db.php';

    //รับข้อมูลจากฟอร์ม เมื่อกดปุ่ม Sign Up
    if (isset($_POST['signup'])) {
        $id = $_POST['id'];
        $ids = $_POST['ids'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $w1 = '-';
        $w2 = '-';
        $w3 = '-';
        $w4 = '-';
        $w5 = '-';
        $w6 = '-';
        $w7 = '-';
        $w8 = '-';
        $w9 = '-';
        $w10 = '-';
        $midterm = '-';
        $final = '-';
        $gender = $_POST['gender'];
        $bithday = $_POST['bithday'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user'; //จัดการ admin/user
        //เช็คการกรอกข้อมูลของฟอร์ม Sign Up ว่าเป็นค่าว่างหรือเปล่า
        if (empty($id)) {
            $_SESSION['error'] = 'กรุณากรอกเลขที่';
            header("location: signup.php");
        } else if (empty($ids)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสนักศึกษา';
            header("location: signup.php");
        } else if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: signup.php");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: signup.php");
        } else if (empty($w1)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($w2)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($w3)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($w4)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($w5)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($w6)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($w7)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($w8)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($w9)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($w10)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($midterm)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        } else if (empty($final)) {
            $_SESSION['error'] = 'กรุณากรอก " - "';
            header("location: signup.php");
        }else if (empty($gender)) {
            $_SESSION['error'] = 'กรุณากรอกเพศ';
            header("location: signup.php");
        } else if (empty($bithday)) {
            $_SESSION['error'] = 'กรุณากรอก วัน/เดือน/ปี เกิด';
            header("location: signup.php");
        } else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: signup.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //เช็ครูปแบบอีเมลว่าถูกต้องหรือไม่
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: signup.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signup.php");
        } else if (strlen($_POST['password']) > 20 ||  strlen($_POST['password']) < 5) { //เช็คความ สั้น-ยาว ของรหัสผ่าน
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signup.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: signup.php");
        } else if ($password != $c_password) { //เช็คว่ารหัสผ่านตรงกันไหม
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: signup.php");
        } else { 
            try { 
                //เช็คว่ามีอีเมลซ้ำกันในระบบหรือไม่
                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindparam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "อีเมลนี้ถูกใช้ไปแล้ว <a href='signup.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: signup.php");
                } else if  (!isset($_SESSION['error'])) { //เพิ่มข้อมูลไปยังฐานข้อมูล
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT); // เข้ารหัส ก่อนที่จะเก็บไปในฐานข้อมูล
                    $stmt = $conn->prepare("INSERT INTO users(id, ids, firstname, lastname, w1, w2, w3, w4, w5, w6, w7, w8, w9, w10, midterm, final, gender, bithday, email, password, urole) 
                                            VALUES(:id, :ids, :firstname, :lastname, :w1, :w2, :w3, :w4, :w5, :w6, :w7, :w8, :w9, :w10, :midterm, :final, :gender, :bithday, :email, :password, :urole)");
                    $stmt->bindParam(":id", $id);
                    $stmt->bindParam(":ids", $ids);
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
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
                    $stmt->bindParam(":gender", $gender);
                    $stmt->bindParam(":bithday", $bithday);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    //แจ้งเตือนสมัครเสร็จ
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว!";
                    header("location: index.php");
                } else {
                    //แจ้งเตือนมีข้อผิดพลาดบางอย่าง
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: signup.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }
    }


?>