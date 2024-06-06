<?php include('includes/header.php') ?>



<div class="container">

<div class="comment-container" style="max-width:400px;">
<h3 class="my-2">   <img src="assets/images/circle_graphics.png" width="50px"alt=""> Thread Master</h3>

<p class="mt-5">Welcome! This demo project showcases a nested comment system built with Hypertext Preprocessor </p>

<div class="feedback"></div>

<a  class="btn btn-primary get-started mt-4">Get started</a>

</div>


</div>
<script>
    $(".get-started").click(function(){

        let login = 'login';

        $.post("async/create_session.php",{login:login},function(data){
         $(".feedback").html(data);
        })

    })
</script>

<?php include('includes/footer.php') ?>