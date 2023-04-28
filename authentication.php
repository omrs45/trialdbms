<?php      
    include('connection.php');  
    $registration_number = $_POST['reg'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $registration_number = stripcslashes($registration_number);  
        $password = stripcslashes($password);  
        $registration_number = mysqli_real_escape_string($con, $registration_number);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where registration_number = '$registration_number' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>