<?php

if(!$_POST['something']) {
if(isset($_SESSION['id'])) {
    header("location: homepage.php");
}
}

?>