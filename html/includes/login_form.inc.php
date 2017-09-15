<?php
/*

          echo '<form>'.
			   '<fieldset>'.
			    '<div class="form-group">'.
			     '<label for="email">Email address</label>'.
			      '<input type="text" class="form-control" id="email" placeholder="Enter email">'.
			    '</div>'.
			    '<div class="form-group">'.
			      '<label for="pass">Password</label>'.
			      '<input type="password" class="form-control" id="pass" placeholder="Password">'.
			    '</div>'.
			    '<button type="submit" class="btn btn-default">Login</button>'.
			  '</fieldset>'.
			 '</form>';		


*/

if(!isset($login_errors)) $login_errors=array();
require('./includes/form_functions.inc.php');

?>
<form style="position:relative;top:-50px;" action='index.php' method="post" accept-charset="utf-8">
<fieldset>
<legend></legend>
<?php  
    
    if(array_key_exists('login',$login_errors)){
        echo '<div class="alert">'.$login_errors['login'].'</div>';
    }
    create_form_input('email','email','',$login_errors,array('placeholder'=>'Enter email'));
    create_form_input('pass','password','',$login_errors,array('placeholder'=>'Password'));
    
?>
    
<button type="submit" class="">Login</button> 
    
</fieldset>
</form>