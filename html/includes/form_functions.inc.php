<?php

function create_form_input($name,$type,$label='',$errors=array(),$options=array()){
    $value=false;
    echo '<div class="input-div">';
    if(isset($_POST[$name])) $value=$_POST[$name];
    if($value && get_magic_quotes_gpc()) $value=stripcslashes($value);
    if(!empty($label))
        echo '<label for="'.$name.'" >'.$label.'</label>';
    if( ($type==='text')||($type==='password')||($type==='email') ){
      echo '<input type="'.$type.'" name="'.$name.'" id="'.$name.'" ';
      if($value) echo ' value="'.htmlspecialchars($value).'" ';
        if (!empty($options) && is_array($options)) {
            foreach ($options as $k => $v) { 
                echo " $k=\"$v\""; 
            }    
            
        }
        echo '>';
        echo '</div>';
       /*errors        */
       if(array_key_exists($name,$errors)) 
       echo '<span class="alert">'.$errors[$name].'</span>';
        
        
        
    } elseif ($type === 'textarea') { // Create a TEXTAREA.
		
		// Show the error message above the textarea (if one exists):
		if (array_key_exists($name, $errors)) echo '<span class="help-block">' . $errors[$name] . '</span>';

		// Start creating the textarea:
		echo '<textarea name="' . $name . '" id="' . $name . '" class="form-control"';
		
		// Check for additional options:
		if (!empty($options) && is_array($options)) {
			foreach ($options as $k => $v) {
				echo " $k=\"$v\"";
			}
		}

		// Complete the opening tag:
		echo '>';		
		
		// Add the value to the textarea:
		if ($value) echo $value;

		// Complete the textarea:
		echo '</textarea>';
		echo '</div>';
	} // End of primary IF-ELSE.
    
}


?>