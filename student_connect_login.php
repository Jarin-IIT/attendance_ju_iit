<?php

 session_start();

 $email = $_POST['email'];
 $password = $_POST['password'];

 $_SESSION['email'] = $email;

 $conn = new mysqli('localhost','root','','attendance');
 if($conn->connect_error){
     echo "$conn->connect_error";
     die("Connection Failed : ". $conn->connect_error);
 } else {
     $stmt = $conn->prepare("select * from stdreg where email = ?");
     $stmt->bind_param("s",$email);
     $stmt->execute();
     $stmt_result = $stmt->get_result();
     if($stmt_result->num_rows > 0){
         $data = $stmt_result->fetch_assoc();
         if($data['password']==$password){
            header("Location: std_shakil.php");
         }else{
             echo "<h2>Invalid Email Or Password!";

         }

     }else{
         echo "<h2>Invalid Email Or Password!</h2>";
     }
     
 }

?>
