<?php
include('connection.php');

function escapeString($string){
global $connection;

return $string = mysqli_real_escape_string($connection,$string);

}

function checkQuery($result){
global $connection;
if($result){

}else{
    die("Query failed".mysqli_error($connection));

}  
}

function warnMsg($msg){
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  


function getRandomImage() {
    $images = ["avatar_1.jpg", "avatar_2.jpg", "avatar_3.jpg", "avatar_4.jpg", "avatar_5.jpg","avatar_6.png", "avatar_7.png", "avatar_8.png", "avatar_9.png", "avatar_10.png"];
    $randomIndex = array_rand($images);
    return $images[$randomIndex];
}

function generateUsername() {
    // Arrays of adjectives and nouns
    $adjectives = ["Happy", "Brave", "Clever", "Daring", "Jolly", "Mighty", "Fierce", "Gentle", "Wise", "Swift", "Bold", "Courageous"];
    $nouns = ["Lion", "Eagle", "Tiger", "Panther", "Wolf", "Hawk", "Bear", "Dragon", "Phoenix", "Leopard", "Falcon", "Ram"];
    
    
    // Select random adjective and noun
    $randomAdjective = $adjectives[array_rand($adjectives)];
    $randomNoun = $nouns[array_rand($nouns)];
    
    // Generate a random number
    $randomNumber = rand(100, 999);
    
    // Combine elements to create a username
    $username = $randomAdjective . $randomNoun . $randomNumber;
    
    return $username;
}

function getUsernameByCommentId($comment_id){
    global $connection;

   $comment_id = escapeString($comment_id);

    $query = "SELECT username FROM comments WHERE comment_id = $comment_id";
    $select_username = mysqli_query($connection,$query);
    checkQuery($select_username);
    while($row = mysqli_fetch_assoc($select_username)){
    $username =  $row['username'];
    }

    return $username;
}

function getNumberReplies($comment_id){
    global $connection;

    $query = "SELECT * FROM comments WHERE reply_id = $comment_id";
    $select_replies = mysqli_query($connection,$query);
    checkQuery($select_replies);

    return mysqli_num_rows($select_replies);

}

function createSession(){
    $_SESSION['username'] = generateUsername();
    $_SESSION['profile'] = getRandomImage();

}
        