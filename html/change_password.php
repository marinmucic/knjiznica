<?php
require('./includes/config.inc.php');
redirect_invalid_user();
require(MYSQL);
$page_title="Change your password";
include('./includes/navigation.php');
$pass_errors=array();

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(!empty($_POST['current'])){
        $current=$_POST['current'];
    }else{
        $pass_errors['current']='Please enter your current password!';
    }
    
    if (preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,}$/', $_POST['pass1']) ) {
            if ($_POST['pass1'] == $_POST['pass2']) {
                $p = $_POST['pass1'];
             } else {
               $pass_errors['pass2'] = 'Your password did not match the confirmed password!';
             }
        
   } else {
            $pass_errors['pass1'] = 'Please enter a valid password!';
   }
    
   if(empty($pass_errors)){
       $q="SELECT pass FROM users WHERE id={$_SESSION['user_id']}";
       $r=mysqli_query($dbc,$q);
       list($hash)=mysqli_fetch_array($r,MYSQLI_NUM);
       if(password_verify($current,$hash)){
           $q="UPDATE users SET pass='".password_hash($p,PASSWORD_BCRYPT)."' WHERE id={$_SESSION['user_id']} LIMIT 1";
           if($r=mysqli_query($dbc,$q)){
               echo '<h1 style="padding:3em;color:white;">Your password has been changed.</h1>';
               include('./includes/footer.php');
               exit();
           }else{
               trigger_error('Your password could not be changed due to a system error.');
           }
           
       }else{
           $pass_errors['current']='Your current password is incorrect';
       }
       
       
   }   
    
}

require_once('./includes/form_functions.inc.php');
?>

<p style="padding:1em 1em 1em 0em;color:white;">Use the form below to change your password.</p>
<form action="change_password.php" method="post" accept-charset="utf-8">
<?php
create_form_input('current', 'password', 'Current Password', $pass_errors);
create_form_input('pass1', 'password', 'Password', $pass_errors);
echo '<span class="alert">Must be at least 6 characters long,<br> with at least one lowercase letter ,<br>
one uppercase letter, and one number.</span>';
create_form_input('pass2', 'password', 'Confirm Password', $pass_errors);
?>
<input type="submit" name="submit_button" value="Change &rarr;" id="submit_button" class=""/>
</form>


<?php include('./includes/footer.php'); ?>
