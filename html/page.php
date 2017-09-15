<?php
require('./includes/config.inc.php');
require(MYSQL);


if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
    $page_id =$_GET['id'];
    $q='SELECT title,description,content FROM pages WHERE id='.$page_id;
    $r =mysqli_query($dbc,$q);
    if (mysqli_num_rows($r) !== 1) {
       $page_title = 'Error!';
       include('./includes/header.php');
       echo '<div class="alert alert">This page has been accessed in error.</div>';
       include('./includes/footer.php');
       exit();
    }
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $page_title =$row['title'];
    include('includes/navigation.php');
    echo '<h1>'.htmlspecialchars($page_title).'</h1>';
    if(isset($_SESSION['user_not_expired'])){
        echo "<div>{$row['content']}</div>";
    }elseif(isset($_SESSION['user_id'])){
        echo '<div class="alert"><h4>Expired Account</h4>Thank you for your interest in this content,but
        your account is no longer current.Please <a href="renew.php">renew your account</a> in order to
        view this page in its entirety</div>';
        echo '<div>'.htmlspecialchars($row['description']).'</div>';
    }else{
        echo '<div class="alert">Thank you for your interest in this content. You must be logged in as a
                 registered user to view this page in its entirety.</div>';
               echo '<div>' . htmlspecialchars($row['description']) . '</div>';
    }
    
}else{//no valid id
    $page_title ="Error!";
    include('./includes/navigation.php');
    echo '<div class="alert">This page has been accessed in error.</div>';
}

include('./includes/footer.php');


?>