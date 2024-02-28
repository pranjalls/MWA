<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender= $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $position = $_POST['position'];
    $experience = $_POST['experience'];


    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'register');
    if($conn->connect_error){
        die('connection failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number,position,experience) values(?, ?, ?, ?,?,?, ?, ?)");
        $stmt->bind_param("sssssiss",$firstName, $lastName, $gender, $email, $password, $number,$position,$experience );
        $stmt->execute();
        echo "registration successful...";
        $stmt->close();
        $conn->close();
    }
?>