<?php
include('functions.php');

$formattedDate = date('d/m/y'); 

$profile = $_SESSION['profile'];
$username = $_SESSION['username'];

$message = escapeString($_POST['message']);
$comment_id = escapeString($_POST['comment_id']);

$author_username = getUsernameByCommentId($comment_id);

if($username == $author_username){
warnMsg("Cannot reply at your own message");
return false;
}

$query= "INSERT INTO comments(message,reply_id,date_created,profile,username )VALUES('$message',$comment_id,'$formattedDate','$profile','$username')";
$create_comment = mysqli_query($connection,$query);
checkQuery($create_comment);
