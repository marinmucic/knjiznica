<?php
include('includes/config.inc.php');
include('../mysql.inc.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    include('./includes/login.inc.php');
}

/*require('/includes/login_form.inc.php');*/
include('includes/header.php');
include('includes/footer.php');

?>