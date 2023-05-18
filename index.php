<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">		
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div id="main" method="post" action="" onsubmit="return post();" class="container" ng-app="myApp" ng-controller="myCtrl">
    <div class="col-sm-offset-3 col-sm-6">
      <div>
        <div id="commentBubble">
          <!--ANGULAR INSTANT COMMENT-->
          <p>{{comment}}</p>
        </div>
        <div class="bubble1"></div>
        <div class="bubble2"></div>
        <img id="image" class="img-responsive"> 
      </div>
      <form id="submitForm" class="text-center">
        <textarea id="userComment" rows="3" placeholder="comment" ng-model="comment"></textarea>
        <input id="userName" type="text" placeholder="name">
        <button type="submit">Submit</button>
      </form>    
      <div id="all_comments">
      
<!--CONNECT TO DATABASE, FETCH DATA, WRITE DATA-->
      
      <?php
        $host = "localhost:2023";
        $username = "root";
        $password = "";
        $databasename = "comment";
        $connect = mysqli_connect($host, $username, $password, $databasename);

        if (!$connect) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "SELECT name, comment, post_time FROM comments order by post_time desc";
        $result = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_assoc($result)) {
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
          ?>
      </div>  
    </div>
  </div>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script src="js/main.js" type="text/javascript"></script>
</body>
</html>