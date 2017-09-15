<!DOCTYPE html>
<html lang="en">
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

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="container">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""></a>
<!--- --> <div class="nav-collapse collapse"><!------------------------------------------->
             <?php 
      
                 if (!isset($_SESSION['user_id'])) { 
                    require('includes/login_form.inc.php');
                     
                     
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
                  '<li><a href="pdfs.php">See PDFs</a></li>'.
                '</ul>'.
              '</li>';
                      
                }
             ?>
                
            </ul>
 <!-----> </div><!--/.nav-collapse -->
        </div><!--/container-->
      </div><!--/navbar-->

      <!-- Begin page content -->
      <div class="container2">
	
			
			<div class="col-3">
				<h3 class="text-success"></h3>
			<div class="list-group">
            <?php
    
              $q="SELECT * FROM categories ORDER BY category";  
              $r=mysqli_query($dbc,$q);
               
                while(list($id,$category)=mysqli_fetch_array($r,MYSQLI_NUM)){
                 echo '<a href="category.php?id=' . $id . '" class="list-group-item" title="' . $category . '">' . htmlspecialchars($category) . '   </a>';
                
                }   
                
            ?>    
<!--			  <a href="category.php?id=3" class="list-group-item"><span class="badge">7</span>Common Attacks
			  </a>
			  <a href="category.php?id=5" class="list-group-item"><span class="badge">11</span>Database Security
			  </a>
			  <a href="category.php?id=1" class="list-group-item"><span class="badge">9</span>General Web Security
			  </a>
			  <a href="category.php?id=4" class="list-group-item"><span class="badge">3</span>JavaScript Security
			  </a>
			  <a href="category.php?id=2" class="list-group-item"><span class="badge">2</span>PHP Security
			  </a>
			  <a href="pdfs.php" class="list-group-item"><span class="badge">5</span>PDF Guides
			  </a>-->
			</div><!--/list-group-->
	
			</div><!--/col-3-->
          
		  <div class="col-9">
         
	       <h1>Welcome</h1>
	        <p class="lead">Welcome to Knowledge is Power, a site dedicated to keeping you up-to-date on the Web security and programming information you need to know. Blah, blah, blah. Yadda, yadda, yadda.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent consectetur volutpat nunc, eget vulputate quam tristique sit amet. Donec suscipit mollis erat in egestas. Morbi id risus quam. Sed vitae erat eu tortor tempus consequat. Morbi quam massa, viverra sed ullamcorper sit amet, ultrices ullamcorper eros. Mauris ultricies rhoncus leo, ac vehicula sem condimentum vel. Morbi varius rutrum laoreet. Maecenas vitae turpis turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce leo turpis, faucibus et consequat eget, adipiscing ut turpis. Donec lacinia sodales nulla nec pellentesque. Fusce fringilla dictum purus in imperdiet. Vivamus at nulla diam, sagittis rutrum diam. Integer porta imperdiet euismod.</p>
              
                
        </div><!--/col-9-->
      </div><!--/container-->

    </div><!--/wrap-->
         
      
      