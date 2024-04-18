<?php
    if(isset($_POST["submit"])){
        // Include db connection
        include('./dbcon.php');

        // Get the variables
        $email = $_POST['email'];
        $password = $_POST['password'];

        // SQL statement to select data
        $sql = "SELECT * FROM users WHERE `email` = '$email' && `password` = '$password'";

        // Prepare the statement
        $query = mysqli_query($dbcon, $sql);

        if(mysqli_num_rows($query) > 0){
            // Fetch user data
            $row = mysqli_fetch_assoc($query);
            
                // Start session
                session_start();

                // Set session variables
                $_SESSION['id'] = $row['id'];

                // Redirect to dashboard
                header('Location: ./dashboard.php');
                exit();
            } else {
                echo "Incorrect password.";
            }
        
    }
?>
