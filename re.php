<?php 
    //แจ้งเตือน ERROR ตอนเข้าสู่ระบบ
    session_start();
    require_once 'config/db.php';

    //รับข้อมูลจากฟอร์ม เมื่อกดปุ่ม Sign Up
    if (isset($_POST['re'])) {
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
        $ww = $_POST['ww'];

            if ($ww == $w1) {
                $_SESSION['errorr'] = '⚠️ กรุณาส่งงาน ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['successs'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $w2) {
                $_SESSION['errorr2'] = '⚠️  กรุณาส่งงาน  ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['successs2'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $w3) {
                $_SESSION['errorr3'] = '⚠️  กรุณาส่งงาน  ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['successs3'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $w4) {
                $_SESSION['errorr4'] = '⚠️  กรุณาส่งงาน  ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['successs4'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $w5) {
                $_SESSION['errorr5'] = '⚠️  กรุณาส่งงาน  ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['successs5'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $w6) {
                $_SESSION['errorr6'] = '⚠️  กรุณาส่งงาน  ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['successs6'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $w7) {
                $_SESSION['errorr7'] = '⚠️  กรุณาส่งงาน  ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['successs7'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $w8) {
                $_SESSION['errorr8'] = '⚠️  กรุณาส่งงาน  ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['successs8'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $w9) {
                $_SESSION['errorr9'] = '⚠️  กรุณาส่งงาน  ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['successs9'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $w10) {
                $_SESSION['errorr10'] = '⚠️  กรุณาส่งงาน  ⚠️';
                header("location: user.php");
            }  else {
                $_SESSION['success10'] = "✅ ส่งงงานเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $midterm) {
                $_SESSION['errorr11'] = '‼️ ท่านยังไมได้สอบ ‼️';
                header("location: user.php");
            }  else {
                $_SESSION['success11'] = "✅ สอบเรียบร้อย ✅";
                header("location: user.php");
            }
            if ($ww == $final) {
                $_SESSION['errorr12'] = '‼️ ท่านยังไมได้สอบ ‼️';
                header("location: user.php");
            }  else {
                $_SESSION['success12'] = "✅ สอบเรียบร้อย ✅";
                header("location: user.php");
            }
    


        
    }


?>