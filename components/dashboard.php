<?php
  // Start session
  session_start();
  // Set session variables
  $userid = $_SESSION['id'];
  
  // include database
  include('./dbcon.php');

  // get all users
  $sql = "SELECT * FROM users";
  $query = mysqli_query($dbcon, $sql);
  $result = mysqli_num_rows($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Assets/bootstrap-5.3/css/bootstrap.css">
    <link rel="stylesheet" href="../Assets/fontawesome-5/css/all.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body class="bg-light">
    <div class="container border">
        <div class="row">
            <div class="col-md-4">
                <h3 class="bg-white p-2">MESSAGES</h3>
                <h3 id="people" class="bg-white p-2">People</h3>
                <div id="contacts">
                    <?php
      // Check if there are rows returned
  if(mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_assoc($query)) {
        echo '
        <a href="dashboard.php?page=chat&receiver='. $row['id'].'">
            <div id="contact_info_'.$row['id'].'" class="d-flex pt-3 pl-3">
                <div class="" id="contact_pic"><img class="rounded-circle" width="60px" height="60px" src="../images/bg2.jpg" alt=""></div>
                <div id="contactname" class="mr-5">
                    <h4>' . $row['fullName'] . '</h4>
                    <p>Good shot from me</p>
                </div>
                <div id="lastseen" class="text-secondary"> 2 Minutes ago</div>
            </div>
        </a>
        <script>
            if('.$row["id"].' === '.$userid.'){
                document.getElementById("contact_info_'.$row['id'].'").classList.add("hidden");
            } 
        </script>
        ';
    }
    
  
} else {
    // No users found
    echo "No users found";
}
       ?>


                </div>
            </div>
            <div class="col-md-8">
                <?php
  @$page = $_GET["page"]; 
  if ($page == "chat") {
    include('./chat.php');
  } else {
    // Include another file or perform other actions if 'page' is not 'chat'
    include('./empty.php');
  }
?>


            </div>
        </div>
    </div>


    <script src="../Assets/fontawesome-5/js/all.js"></script>
    <script src="../Assets/bootstrap-5.3/js/bootstrap.js"></script>
    <script src="../js/dashboard.js"></script>
</body>

</html>