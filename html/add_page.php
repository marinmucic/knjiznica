<?php

require('./includes/config.inc.php');
redirect_invalid_user('user_admin');
require(MYSQL);
$page_title='Add s Site Content Page';
include('./includes/header.php');

$add_page_errors=array();

/* if POST petlja */
if($_SERVER['REQUEST_METHOD']==='POST'){

if(!empty($_POST['title'])){
    $t =escape_data(strip_tags($_POST['title']),$dbc);
}else{
    $add_page_errors['title']='Please enter the title';
}

if(filter_var($_POST['category'],FILTER_VALIDATE_INT,array('min_range'=>1))){
    $cat=$_POST['category'];
}else{
    $add_page_errors['category']='Please select a category';
}

if(!empty($_POST['description'])){
    $d=escape_data(strip_tags($_POST['description']),$dbc);
}else{
    $add_page_errors['description']='Please enter the description';
}

if(!empty($_POST['content'])){
    $allowed='<div><p><span><br><a><img><h1><h2><h3><h4><ul><ol><li><blackquote>';
    $c=escape_data(strip_tags($_POST['content'],$allowed),$dbc);
}else{
    $add_page_errors['content']='Please enter the content';
}

if(empty($add_page_errors)){
    $q="INSERT INTO pages (categories_id,title,description,content) VALUES ($cat,'$t','$d','$c')";
    $r=mysqli_query($dbc,$q);
    if(mysqli_affected_rows($dbc)===1){
        echo '<div class="success"><h3>The page has been added!</h3></div>';
    }else{
        trigger_error('The page could not be added due to a system error.We apologize for any inconveniance');
    }
}
    
    
}/* IF post PETLJA*/
    
require('includes/form_functions.inc.php');
?>

<form action="add_page.php" method="post" accept-charset="utf-8">
<fieldset><legend>Fill out the form to add a page of content:</legend>
<?php
create_form_input('title', 'text', 'Title', $add_page_errors);
  echo'<div class="';
    if(array_key_exists('category',$add_page_errors)) echo 'error">';
    echo '<label for="category" style="color:white;">Category</label>';
    echo '<br><select name="category"><option>Select One</option>';
    $q="SELECT id,category FROM categories ORDER BY category ASC";
    $r=mysqli_query($dbc,$q);
    while($row=mysqli_fetch_array($r,MYSQLI_NUM)){
        echo"<option value=\"$row[0]\"";
        if(isset($_POST['category']) && ($_POST['category']==$row[0])) echo 'selected="selected"';
        echo ">$row[1]</option>\n";
    }
    
    echo '</select>';
    if (array_key_exists('category', $add_page_errors)) echo '<span class="error">'.
    $add_page_errors['category'] . '</span>';
    echo '</div>';
    create_form_input('description', 'textarea', 'Description<br>', $add_page_errors);
    create_form_input('content', 'textarea', 'Content<br>', $add_page_errors);
  ?>
   <input type="submit" name="submit_button" value="Add This Page" id="submit_button" class=""/>
  </fieldset>
  </form>
    
    
  <?php include('./includes/footer.php'); ?>  
