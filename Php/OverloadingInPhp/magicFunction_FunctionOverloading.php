<?php
    //  Arithmetic Operations Using Function Overloading.
    class arithmetic{

        //Function to add 2 numbers
        function add2($a, $b){
            return $a+$b;
        }
        //Function to substract 2 numbers
        function sub2($a, $b){
            return $a-$b;
        }
        //Function to multiply 2 numbers
        function multi2($a, $b){
            return $a*$b;
        }
        //Function to divide 2 numbers
        function div2($a, $b){
            return $a/$b;
        }
        
        //Function to add 3 numbers
        function add3($a, $b, $c){
            return $a+$b+$c;
        }
        //Function to sub 3 numbers
        function sub3($a, $b, $c){
            return $a-$b-$c;
        }
        //Function to multiply 3 numbers
        function multi3($a, $b, $c){
            return $a*$b*$c;
        }
        //Function to divide 3 numbers
        function div3($a, $b, $c){
            return $a/$b/$c;
        }
    
    // magic function
    function __call($name, $args){
        if ($name =="arithmeticOperation"){
            echo "Arithmetic operation functions \n";
            // based on no: of args
            switch(sizeof($args)){
                case 2:
                    // calling arithmetic funcions with 2 arguments 

                    echo ("\nAddition of ".$args[0]." and  ".$args[1]." is: ". self::add2($args[0],$args[1]) );
                    echo ("\nSubstraction of ".$args[0]." and  ".$args[1]." is: ". self::sub2($args[0],$args[1]) );
                    echo ("\nMultiplication of ".$args[0]." and  ".$args[1]." is: ". self::multi2($args[0],$args[1]) );
                    echo ("\nDivision of ".$args[0]." and  ".$args[1]." is: ". self::div2($args[0],$args[1]) );
                break;
                
                case 3:
                    // calling arithmetic functions with 3 arguments             

                    echo ("\nAddition of ".$args[0]." , ".$args[1]." and  ".$args[2]." is: ". self::add3($args[0],$args[1],$args[2]) );
                    echo ("\nSubstraction of ".$args[0]." , ".$args[1]." and  ".$args[2]." is: ". self::sub3($args[0],$args[1],$args[2]) );
                    echo ("\nMultiplication of ".$args[0]." , ".$args[1]." and  ".$args[2]." is: ". self::multi3($args[0],$args[1],$args[2]) );
                    echo ("\nDivision of ".$args[0]." , ".$args[1]." and  ".$args[2]." is: ". self::div3($args[0],$args[1],$args[2]) );
                break;
                
                default:
                echo'Parameters other than 2 or 3';
                break;
            }
            
        }
    
    }
    
    
    
    
    }
    $obj = new arithmetic();
    $obj->arithmeticOperation(6, 12, 18);
?>