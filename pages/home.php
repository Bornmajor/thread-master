<?php include('includes/header.php') ?>

<?php
if(!isset($_SESSION['username'])){
    header("location: ?page=login");
}
?>

<div class="container">

<?php
if(isset($_SESSION['username'])){
 ?>
<a href="?page=logout" class="btn btn-primary my-3">Exit session</a>
 <?php
}
?>


<div class="comment-container">
    <h3 class="my-2">   <img src="assets/images/circle_graphics.png" width="50px" alt=""> Thread Master</h3>

 

    <div class="comment-content">

    <div class="select-new-comment">
        <select class="form-select my-4 mx-2 sort-by"   aria-label="Default select example">
        <!-- <option selected>Sort by</option> -->
        <option value="ASC">Ascending</option>
        <option value="DESC" selected>Descending</option>
    </select>

    <button class="btn btn-primary reply-btn"  comment-id="0" data-bs-toggle="modal" data-bs-target="#replyModal"><i class="fas fa-plus"></i> New</button>   
    </div>

 

   <div class="load_comments"></div>


    

    </div>
</div>


</div>


<!-- #modal-->


<!-- Modal -->
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content reply-content">
        <!-- <img src="assets/images/banner-modal.png" height="150px"  alt=""> -->
  

    </div>
  </div>
</div>
    


<script>
 

    function loadAllComments(){
        $.ajax({
            url:"async/load_comments.php",
            type:"POST",
            success:function(data){
                if(!data.error){
                    $(".load_comments").html(data);
                }
            }
        })

    }
    loadAllComments();
</script>


<?php include('includes/footer.php') ?>