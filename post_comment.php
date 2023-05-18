<?php
ini_set('display_errors', 1);

$host = "localhost:2023";
$username = "root";
$password = "";
$databasename = "comment";
$connect = mysqli_connect($host, $username, $password, $databasename);

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment = $_POST['user_comm'];
  $name = $_POST['user_name'];
  
  $insert = "insert into comments values('', '$name', '$comment', CURRENT_TIMESTAMP)";
  $runInsert = mysqli_query($connect, $insert);
  $select = "SELECT name, comment, post_time FROM comments where name='$name' and comment='$comment'";
  $result = mysqli_query($connect, $select);
  
  if($row = mysqli_fetch_assoc($result)) {
	  $name = $row['name'];
	  $comment = $row['comment'];
    $time = $row['post_time'];
    ?>
    <div class="comment_div"> 
      <p class="comment"><?php echo $comment;?></p>
      <p class="name">by: <?php echo $name;?></p>    
	    <p class="time"><?php echo $time;?></p>
	  </div>
    <?php
  }
  
exit;
}
?>