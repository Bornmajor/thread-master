<?php
include('functions.php');
if(isset($_POST['comment_id'])){
    $comment_id = escapeString($_POST['comment_id']);



?> <form action="" method="post" class="add_comment_form">
    <div class="modal-header">
        <img src="assets/images/circle_graphics.png" width="50px"alt="">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
        <?php
         if($comment_id === "0"){
            echo "New comment";
            }else{
             echo "Reply to ". getUsernameByCommentId($comment_id);
            }
         ?>
             </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
       
           <div class="form-floating">
        <textarea class="form-control" placeholder="Type something.." id="floatingTextarea" name="message" style="height:200px;" required></textarea>
        <label for="floatingTextarea">Type something..</label>
        </div>  
       
     
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary">Send</button>
      </div> 
    </form>

    <?php
  }
    ?>

    <script>
        $(".add_comment_form").submit(function(e){
            e.preventDefault();

            let postData = $(this).serialize();

            $.post("async/process_comment.php",postData,function(data){
                loadAllComments();
                $(".add_comment_form")[0].reset();
            })
        })
    </script>