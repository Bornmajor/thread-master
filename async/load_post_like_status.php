<?php
include('functions.php');

if(isset($_POST['comment_id'])){

$comment_id = escapeString($_POST['comment_id']);
$username = escapeString($_SESSION['username']);

  $query = "SELECT * FROM likes WHERE comment_id = $comment_id AND username = '$username'";
  $select_likes = mysqli_query($connection,$query);
  checkQuery($select_likes);

  if(mysqli_num_rows($select_likes) !== 0){
    ?>
 <i class="fas fa-thumbs-up fa-lg"></i>
    <?php
    
  }else{
    ?>
      <i class="far fa-thumbs-up" ></i>   
    <?php
  }    
}


  ?>
   
     