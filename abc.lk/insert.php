
<?php

    include 'config.php';

    $title = $_POST['title'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pnumber = $_POST['pnumber'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $inquiry = $_POST['inquiry'];

    $sql = "insert into register(title, fname, lname, pnumber, email, country, address, inquiry) values(?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $connection->prepare($sql);

    $statement->bind_param("ssssssss", $title, $fname, $lname, $pnumber, $email, $country, $address, $inquiry);

    if ($statement->execute()){
        echo "Data inserted successfully";
    }else{
        echo "Data insertion failed";
    }

?>