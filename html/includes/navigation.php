 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php 
	if (isset($page_title)) { 
			echo $page_title; 
	} else { 
			echo 'Knowledge is Power: And It Pays to Know'; 
	} 
	?></title>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel|Dancing+Script|Pacifico" rel="stylesheet"> 
  </head>

   <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="container">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"></a>
<!--- --> <div class="nav-collapse collapse"><!------------------------------------------->
             <?php 
      
                 if (!isset($_SESSION['user_id'])) { 
                   /* require('includes/login_form.inc.php');*/
                     
                     
                 }  
      
             ?> 
            <ul class="nav navbar-nav">   
				<li class="active"><a href="index.php">Home</a></li><li>
				<a href="about.php">About</a></li><li>
				<a href="contact.php">Contact</a></li><li>
				<a href="register.php">Register</a>
            <?php
                
                if(isset($_SESSION['user_id'])){
                    
               echo '</li><li class="dropdown">'.
                '<a class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>'.
                '<ul class="dropdown-menu">'.
                  '<li><a href="logout.php">Logout</a></li>'.
                  '<li><a href="renew.php">Renew</a></li>'.
                  '<li><a href="change_password.php">Change Password</a></li>'.
                  '<li><a href="favorites.php">Favorites</a></li>'.
                  '<li><a href="recommendations.php">Recommendations</a></li>'.
                '</ul>';
                }
             
                if(isset($_SESSION['user_admin'])){   
              echo '</li><li class="dropdown">'.
                '<a  class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>'.
                '<ul class="dropdown-menu">'.
                  '<li><a href="add_page.php">Add Page</a></li>'.
                  '<li><a href="add_pdf.php">Add PDF</a></li>'.
                  '<li><a href="#">Something else here</a></li>'.
                '</ul>'.
              '</li>';
                      
                }
             ?>
                
            </ul>
 <!-----> </div><!--/.nav-collapse -->
          </div>
         </div>