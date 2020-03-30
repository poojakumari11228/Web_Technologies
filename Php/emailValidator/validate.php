<?php

if(isset($_POST['email']))
{
    $valid=true;

    $str =  $_POST['email'];
    // Checking for multiple @
    if( stripos($str,'@') != strripos($str,'@') ){
        echo "\nEmail should contain only one @ ";
        $valid=false;
    }
    // is 1st char numeric
    if(is_numeric($str[0])){
        echo "\nEmail should not start with a number ";
        $valid=false;
    }
    // is there any space
    if( stripos($str, ' ')==true){
        echo "\nEmail should not contain space.";
        $valid=false;
    }
    // check size
    if(strlen($str)>20){
        echo "\nLength of email should not be greater than 20"; 
        $valid=false;
    }
    // check ends With using regax '/ $/'
    if(!preg_match('/.com$/', $str) && !preg_match('/.edu.pk$/', $str) && !preg_match('/.co.uk$/', $str)){
        echo"\nShould only end with .com or .edu.pk or .co.uk";
        $valid=false;
    }

    // If everything is correct & valid
    if($valid){
        echo "Email format is correct!";
    }

}

?>