<?php
   
session_start();
require_once "config/db.php";

if (isset($_POST['admin'])) {
    $id = $_POST['id'];
    $namee = $_POST['namee'];
    $score = $_POST['score'];
    
                    $sql = $conn->prepare("INSERT INTO com(id, namee, score) VALUES(:id, :namee, :score)");
                    $sql->bindParam(":id", $id);
                    $sql->bindParam(":namee", $namee);
                    $sql->bindParam(":score", $score);
                    $sql->execute();

                    if ($sql) {
                        $_SESSION['success'] = "Data has been inserted successfully";
                        header("location: admin.php");
                    } else {
                        $_SESSION['error'] = "Data has not been inserted succesfully";
                        header("location: admin.php");
                    }
                
            
 }     


?>