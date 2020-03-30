<?php 

    // Factorial
    function factorial($arg){
    	// factorial of 0/1 is always 1
        if($arg==0 || $arg==1){
            return 1;
        }
        return $arg*factorial($arg-1);
    }
    echo("Factorial is : ".factorial(4));

?>

