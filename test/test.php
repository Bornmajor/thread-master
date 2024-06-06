<?php
include('../async/functions.php');
echo generateUsername();


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
<!-- enter new comment-card-container loop-->



<!-- enter new comment-card-container loop-->


<?php

}

