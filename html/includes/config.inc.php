<?php

if (!defined('LIVE')) DEFINE('LIVE', false);
 DEFINE('CONTACT_EMAIL', 'marin.mucic@gmail.com'); 

 define ('BASE_URI', 'C:\Users\User\Desktop\xampp\htdocs\dashboard\b\\');
 define ('BASE_URL', 'localhost:82/dashboard/b/html/');
 define ('MYSQL', BASE_URI . 'mysql.inc.php'); 
 define('PDFS_DIR',BASE_URI.'pdfs/'); 


 session_start();
/* $_SESSION['user_id']=1;
 $_SESSION['user_admin']=1;*/
 function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) { 
 
      $message = "An error occurred in script '$e_file' on line $e_line:\n$e_message\n";
	  $message .= "<pre>" .print_r(debug_backtrace(), 1) . "</pre>\n"; 
	  if (!LIVE) { 
	    echo '<div class="alert alert-danger">' . nl2br($message) . '</div>';
	  }else { 
	     error_log($message, 1, CONTACT_EMAIL, 'From:marin.mucic@gmail.com');
         if ($e_number != E_NOTICE) { 
	        echo '<div class="alert alert-danger">A system error occurred. We apologize for the inconvenience. </div>';
	     } 

      } // End of $live IF-ELSE.  
	   
	  return true;
	   
 } // End of my_error_handler() definition. 

set_error_handler('my_error_handler');//bitno !!

function redirect_invalid_user($check='user_id',$destination='index.php',$protocol='http://'){
   if(!headers_sent()){
    if(!isset($_SESSION[$check])){
        $url=$protocol.BASE_URL.$destination;
        header("Location: $url");
        exit();
    } 
    
    
   }else{  
        include_once('./includes/header.php'); 
        trigger_error('You do not have permission to access this page. Please log in and try again.');   include_once('./includes/footer.php'); 
    }
}

	  
?>