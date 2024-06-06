<?php
include('functions.php');

?>
<?php

$query = "SELECT * FROM comments WHERE reply_id = 0 ORDER BY comment_id DESC";
$select_comments = mysqli_query($connection,$query);
checkQuery($select_comments);
if(mysqli_num_rows($select_comments) !==0 ){



while($row = mysqli_fetch_assoc($select_comments)){
$comment_id = $row['comment_id'];
$message = $row['message'];
$date_created = $row['date_created'];
$profile = $row['profile'];
$username = $row['username'];

?>
<div class="comment-card-container"  comment-id="<?php echo $comment_id; ?>">

<div class="comment-card">
  <img src="assets/images/<?php echo $profile ?>" alt="profile-icon" class="profile_icon">

  <div class="middle-card-content mx-3">
    <div class="username text-muted">
      <span><?php echo $username?></span>
      <span class="date mx-2"><?php echo $date_created ?></span>
  </div>
    <div class="comment-msg">
     <?php echo $message ?>
    </div>

  <div class="action-btns my-3">

  <span class="thumbs" comment-id="<?php echo $comment_id; ?>">
    <?php
$username = escapeString($_SESSION['username']);

  $query = "SELECT * FROM likes WHERE comment_id = $comment_id AND username = '$username'";
  $select_likes = mysqli_query($connection,$query);
  checkQuery($select_likes);

  if(mysqli_num_rows($select_likes) !== 0){
    ?>
   <i id="thumb-icon" class="fas fa-thumbs-up fa-lg"></i> 
    <?php
    
  }else{
    ?>
   <span><i class="far fa-thumbs-up" ></i> </span>     
    <?php
  } 
    ?>

  </span>
 
 

  <a class="reply-btn" comment-id="<?php echo $comment_id; ?>"  data-bs-toggle="modal" data-bs-target="#replyModal">
      Reply
   </a>

   <?php
   if(getNumberReplies($comment_id) !== 0 ){
    ?>
 <a class="show-replies" comment-id="<?php echo $comment_id; ?>">
      Show replies (<?php echo getNumberReplies($comment_id); ?>)
   </a>
    <?php
   }
   ?>
  

  </div>

  </div>

  <div class="menu-dropdown">
  <div class="dropdown">

  <span class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-ellipsis-v"></i>
  </span>
  <ul class="dropdown-menu">
      <li><a class="dropdown-item delete-comment" comment-id="<?php echo getNumberReplies($comment_id); ?>">Delete</a></li>
    
  </ul>
  </div>

  </div>


</div>  

<!-- #reply cards-->
<div class="comment-reply-container mx-4" reply-id="<?php echo $comment_id; ?>">

<?php
$parent_comment_id = $comment_id ;
$query = "SELECT * FROM comments WHERE reply_id = $comment_id";
$select_first_loop = mysqli_query($connection,$query);
checkQuery($select_first_loop);
while($row = mysqli_fetch_assoc($select_first_loop)){
$comment_id = $row['comment_id'];
$message = $row['message'];
$date_created = $row['date_created'];
$profile = $row['profile'];
$username = $row['username'];

?>
<!-- enter new comment-card-container loop 1-->

<div class="comment-card-container"  comment-id="<?php echo $comment_id; ?>">

<div class="comment-card">
  <img src="assets/images/<?php echo $profile ?>" alt="profile-icon" class="profile_icon">

  <div class="middle-card-content mx-3">
    <div class="username text-muted">
      <span><?php echo $username?></span>
      <span class="date mx-2"><?php echo $date_created ?></span>
  </div>
    <div class="comment-msg">
     <?php echo $message ?>
    </div>

  <div class="action-btns my-3">

  <span class="thumbs">
    <!-- <i class="fas fa-thumbs-up fa-lg"></i> -->
  <i class="far fa-thumbs-up " ></i>   
  </span>
 

  <a class="reply-btn" comment-id="<?php echo $comment_id; ?>"  data-bs-toggle="modal" data-bs-target="#replyModal">
      Reply
   </a>

   <?php
   if(getNumberReplies($comment_id) !== 0 ){
    ?>
 <a class="show-replies" comment-id="<?php echo $comment_id; ?>">
      Show replies (<?php echo getNumberReplies($comment_id); ?>)
   </a>
    <?php
   }
   ?>
  </div>

  </div>

  <div class="menu-dropdown">
  <div class="dropdown">

  <span class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-ellipsis-v"></i>
  </span>
  <ul class="dropdown-menu">
      <li><a class="dropdown-item delete-comment" comment-id="<?php echo getNumberReplies($comment_id); ?>">Delete</a></li>
    
  </ul>
  </div>

  </div>


</div>  

<!-- #reply cards-->
<div class="comment-reply-container mx-4" reply-id="<?php echo $comment_id; ?>">

<?php
$parent_comment_id = $comment_id ;
$query = "SELECT * FROM comments WHERE reply_id = $comment_id";
$select_2_loop = mysqli_query($connection,$query);
checkQuery($select_2_loop);
while($row = mysqli_fetch_assoc($select_2_loop)){
$comment_id = $row['comment_id'];
$message = $row['message'];
$date_created = $row['date_created'];
$profile = $row['profile'];
$username = $row['username'];

?>
<!-- enter new comment-card-container loop 2-->

<div class="comment-card-container"  comment-id="<?php echo $comment_id; ?>">

<div class="comment-card">
  <img src="assets/images/<?php echo $profile ?>" alt="profile-icon" class="profile_icon">

  <div class="middle-card-content mx-3">
    <div class="username text-muted">
      <span><?php echo $username?></span>
      <span class="date mx-2"><?php echo $date_created ?></span>
  </div>
    <div class="comment-msg">
     <?php echo $message ?>
    </div>

  <div class="action-btns my-3">

  <span class="thumbs">
    <i class="fas fa-thumbs-up fa-lg"></i>
  <i class="far fa-thumbs-up " ></i>   
  </span>
 

  <a class="reply-btn" comment-id="<?php echo $comment_id; ?>"  data-bs-toggle="modal" data-bs-target="#replyModal">
      Reply
   </a>

   <?php
   if(getNumberReplies($comment_id) !== 0 ){
    ?>
 <a class="show-replies" comment-id="<?php echo $comment_id; ?>">
      Show replies (<?php echo getNumberReplies($comment_id); ?>)
   </a>
    <?php
   }
   ?>

  </div>

  </div>

  <div class="menu-dropdown">
  <div class="dropdown">

  <span class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-ellipsis-v"></i>
  </span>
  <ul class="dropdown-menu">
      <li><a class="dropdown-item delete-comment" comment-id="<?php echo getNumberReplies($comment_id); ?>">Delete</a></li>
    
  </ul>
  </div>

  </div>


</div>  

<!-- #reply cards-->
<div class="comment-reply-container mx-4" reply-id="<?php echo $comment_id; ?>">

<?php
$parent_comment_id = $comment_id ;
$query = "SELECT * FROM comments WHERE reply_id = $comment_id";
$select_3_loop = mysqli_query($connection,$query);
checkQuery($select_3_loop);
while($row = mysqli_fetch_assoc($select_3_loop)){
$comment_id = $row['comment_id'];
$message = $row['message'];
$date_created = $row['date_created'];
$profile = $row['profile'];
$username = $row['username'];

?>
<!-- enter new comment-card-container loop 3-->

<div class="comment-card-container"  comment-id="<?php echo $comment_id; ?>">

<div class="comment-card">
  <img src="assets/images/<?php echo $profile ?>" alt="profile-icon" class="profile_icon">

  <div class="middle-card-content mx-3">
    <div class="username text-muted">
      <span><?php echo $username?></span>
      <span class="date mx-2"><?php echo $date_created ?></span>
  </div>
    <div class="comment-msg">
     <?php echo $message ?>
    </div>

  <div class="action-btns my-3">

  <span class="thumbs">
    <!-- <i class="fas fa-thumbs-up fa-lg"></i> -->
  <i class="far fa-thumbs-up " ></i>   
  </span>
 

  <a class="reply-btn" comment-id="<?php echo $comment_id; ?>"  data-bs-toggle="modal" data-bs-target="#replyModal">
      Reply
   </a>

   <?php
   if(getNumberReplies($comment_id) !== 0 ){
    ?>
 <a class="show-replies" comment-id="<?php echo $comment_id; ?>">
      Show replies (<?php echo getNumberReplies($comment_id); ?>)
   </a>
    <?php
   }
   ?>

  </div>

  </div>

  <div class="menu-dropdown">
  <div class="dropdown">

  <span class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-ellipsis-v"></i>
  </span>
  <ul class="dropdown-menu">
      <li><a class="dropdown-item delete-comment" comment-id="<?php echo getNumberReplies($comment_id); ?>">Delete</a></li>
    
  </ul>
  </div>

  </div>


</div>  

<!-- #reply cards-->
<div class="comment-reply-container mx-4" reply-id="<?php echo $comment_id; ?>">

<?php
$parent_comment_id = $comment_id ;
$query = "SELECT * FROM comments WHERE reply_id = $comment_id";
$select_4_loop = mysqli_query($connection,$query);
checkQuery($select_4_loop);
while($row = mysqli_fetch_assoc($select_4_loop)){
$comment_id = $row['comment_id'];
$message = $row['message'];
$date_created = $row['date_created'];
$profile = $row['profile'];
$username = $row['username'];

?>
<!-- enter new comment-card-container loop 4-->

<div class="comment-card-container"  comment-id="<?php echo $comment_id; ?>">

<div class="comment-card">
  <img src="assets/images/<?php echo $profile ?>" alt="profile-icon" class="profile_icon">

  <div class="middle-card-content mx-3">
    <div class="username text-muted">
      <span><?php echo $username?></span>
      <span class="date mx-2"><?php echo $date_created ?></span>
  </div>
    <div class="comment-msg">
     <?php echo $message ?>
    </div>

  <div class="action-btns my-3">

  <span class="thumbs">
    <i class="fas fa-thumbs-up fa-lg"></i>
  <i class="far fa-thumbs-up " ></i>   
  </span>
 

  <a class="reply-btn"  style="color:grey;cursor:not-allowed;">
    No Reply
   </a>

   <?php
   if(getNumberReplies($comment_id) !== 0 ){
    ?>
 <a class="show-replies" comment-id="<?php echo $comment_id; ?>">
      Show replies (<?php echo getNumberReplies($comment_id); ?>)
   </a>
    <?php
   }
   ?>

  </div>

  </div>

  <div class="menu-dropdown">
  <div class="dropdown">

  <span class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-ellipsis-v"></i>
  </span>
  <ul class="dropdown-menu">
      <li><a class="dropdown-item delete-comment" comment-id="<?php echo getNumberReplies($comment_id); ?>">Delete</a></li>
    
  </ul>
  </div>

  </div>


</div>  


<!-- #no more nested loops-->
<!-- #to add loop 5 comment-reply-container mx-4 here-->
<!-- #no more nested loops-->

</div>

<!-- enter new comment-card-container loop 4-->

<?php

}
?>

</div>
<!-- #reply cards-->


</div>

<!-- enter new comment-card-container loop 3-->

<?php

}
?>

</div>
<!-- #reply cards-->



</div>

<!-- enter new comment-card-container loop 2-->

<?php

}
?>

</div>
<!-- #reply cards-->


</div>

<!-- enter new comment-card-container loop 1-->

<?php

}
?>

</div>
<!-- #reply cards-->

</div>

<?php
}
}else{
  ?>
  <div class="no_messages">
    <img src="assets/images/message_bro.png" alt="">
    <h4>No comments</h4>

  </div>

  <?php
}
?>






<script>
       $(".show-replies").click(function(){
       let comment_id = $(this).attr('comment-id');

        $(`.comment-reply-container[reply-id='${comment_id}']`).slideToggle(1000);
       

    });

    $(".reply-btn").click(function(){

      let comment_id =  $(this).attr("comment-id");

      $.post("async/comment_modal_content.php",{comment_id:comment_id},function(data){
        if(!data.error){
            $(".reply-content").html(data);
        }
      });

    });

    // $('.thumbs').click(function() {

    //   let comment_id =  $(this).attr("comment-id");

    //   $.post("async/process_likes.php",{comment_id:comment_id},function(data){
    //     if(!data.error){
        
    //       $.post("async/load_post_like_status.php",{comment_id:comment_id},function(data){
    //     if(!data.error){
    //        $(".th")
    //     }
    //   });

    //     }
    //   });
             
    // });
    
    $('.thumbs i').on('click', function() {
        $(this).hide();
        $(this).siblings('i').show();
      });
    
</script>