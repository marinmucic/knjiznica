<?php
 /*echo $_GET['id'];*/
require('./includes/config.inc.php');
require(MYSQL);
if(filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
    $cat_id=$_GET['id'];
    $q='SELECT category FROM categories WHERE id='.$cat_id;
    $r=mysqli_query($dbc,$q);
    if(mysqli_num_rows($r)!==1){
        $page_title ="ERROR! ";
        include('./includes/header.php');
        echo '<div class="alert">This page has been accessed in error.</div>';
        include('./includes/footer.php');
        exit();
    }
    
    list($page_title)=mysqli_fetch_array($r,MYSQLI_NUM);
    include('./includes/navigation.php');
    echo '<h1 style="color:green;padding:0.5em 0 0 0.5em;">'.htmlspecialchars($page_title).'</h1>';
    if (isset($_SESSION['admin_id']) && !isset($_SESSION['user_not_expired'])) {
       echo '<div class="alert"><h4>Expired Account</h4>Thank you for your interest in this content.
             Unfortunately your account has expired. Please <a href="renew.php">renew your account</a> in order to
             access site content.</div>';
    }elseif (!isset($_SESSION['admin_id'])) {
      echo '<div class="alert">Thank you for your interest in this content. You must be logged in as a
      registered user to view site content.</div>';
    }
    
    $q='SELECT id,title,description FROM pages WHERE categories_id="'.$cat_id.'" ORDER BY date_created DESC';
    $r=mysqli_query($dbc,$q);
    if(mysqli_num_rows($r) >0){
        while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            echo '<div style="border:1px solid green;color:white;padding:1em;"><h4><a href="page.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></h4><p style="padding:1em;">'.
                htmlspecialchars($row['description']).'</p></div>';
        }
    }else{
        echo '<p style="color:white;padding:1.5em;">There are curently no pages asociated with this category</p>';
    }
    
    
}else {
  $page_title = 'Error!';
  include('./includes/header.php');
  echo '<div class="alert alert">This page has been accessed in error.</div>';
}

include('./includes/footer.php');
?>