<?php
    if(isset($_POST["submit"])){
        // Include db connection
        include('./dbcon.php');

        // Get the variables
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        //  SQL statement to insert data to table
        $sql = "INSERT INTO users(`fullName`, `email`, `phone`, `password`) VALUES('$fullname', '$email', '$mobile', '$password')";

        // Prepare the statement
        $query = mysqli_query($dbcon, $sql);

        if($query){
            echo 'Data inserted successfully.';
        } else{
            echo 'Data insertion error!';
        }
    }
?>
