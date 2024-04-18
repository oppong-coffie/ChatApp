
<?php
$receiver = $_GET['receiver'];
echo $userid;
echo $receiver;
// include database
  include('./dbcon.php');

  // get all users
  $sql = "SELECT * FROM messages WHERE _between = $userid$receiver OR _between = $receiver$userid ORDER BY date_added";
  $query = mysqli_query($dbcon, $sql);
  $result = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Assets/bootstrap-5.3/css/bootstrap.css">
    <link rel="stylesheet" href="../Assets/fontawesome-5/css/all.css">
    <link rel="stylesheet" href="../css/chat.css">
</head>
<body>

<h3 class="bg-white shadow p-2"><img class="rounded-circle" width="36px" height="36px" src="../images/bg2.jpg" alt="">Ata Ahenkorah</h3>
        <div id="chatarea">
          <!-- Chat area content goes here -->
          <?php
      // Check if there are rows returned
  if(mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_assoc($query)) {
      echo '
      <div class="receiver p-2 mt-2" id="message'.$row['id'].'">
          <div class=""> <img class="rounded-circle" width="25px" height="25px" src="../images/bg2.jpg"> '.$row["message"].'</div>
          <div id="sent" class="mt-2 text-secondary">'.$row["date_added"].'</div>
      </div>
  
      <script>
      if('.$row["sender_id"].' === '.$userid.'){
          document.getElementById("message'.$row['id'].'").classList.add("sender");
      } 
      if('.$row["recipient_id"].' === '.$receiver.'){
          document.getElementById("message'.$row['id'].'").classList.add("receiver");
      } 
      
  </script>';
  
  }
  
  } else {
      // No users found
      echo "No users found";
  }
         ?>

          
        </div>
        <div class="type">
          <input placeholder="Type your message" class="shadow p-1" type="text">
        </div>
    

    <script src="../Assets/fontawesome-5/js/all.js"></script>
    <script src="../Assets/bootstrap-5.3/js/bootstrap.js"></script> 
</body>
</html>