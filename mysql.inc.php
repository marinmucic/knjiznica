<?php


DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'ecommerce1'); 

$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if($dbc==false)
    echo '<span class="alert">You are not connected to your database !!</span>';

mysqli_set_charset($dbc,'utf8');

function escape_data($data,$dbc){  //function for making data safe to use in queryes
if(get_magic_quotes_gpc())
	$data = stripcslashes($data);

return mysqli_real_escape_string($dbc,trim($data));

}

