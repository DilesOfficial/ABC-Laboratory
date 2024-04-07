<?php

    include 'config.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $tid = $_POST['tid'];
    $joining_date = $_POST['joining_date'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    $sql = "insert into technician(first_name, last_name, username, email, password, confirm_password, tid, joining_date, phone, role) values('$first_name', '$last_name', '$username', '$email', '$password', '$confirm_password', '$tid', '$joining_date', '$phone', '$role)";
    $statement = $connection->prepare($sql);

    $statement->bind_param("ssssssssss", $first_name, $last_name, $username, $email, $password, $confirm_password, $tid, $joining_date, $phone, $role);

    if ($statement->execute()){
        echo "Data inserted successfully";
    }else{
        echo "Data insertion failed";
    }

?>