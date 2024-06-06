<?php
include('functions.php');

if(isset($_POST['login'])){

createSession();


}
?>
<script type='text/javascript'>
window.setTimeout(function() {
    window.location = '?page=home';
}, 300);

</script>