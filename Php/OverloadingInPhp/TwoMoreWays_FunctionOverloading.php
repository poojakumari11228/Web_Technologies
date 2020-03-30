<!-- 

Yes we can implement function overloading in PHP in two more ways, other than default arguments
1. __call magical function
2. func_get_args() method


 -->
<?php


class overloadingExample{

    // Function Overloading using __call magical function

    function __call($name, $args){
        if ($name =="overloadingExample1"){

            switch(sizeof($args)){

                case 0:
                    // calling funcions with 0 arguments 
                   echo "\nInside function with no arguments";
                break;
                case 1:
                    // calling funcions with 1 arguments 
                   echo "\nInside function with 1 arguments i.e ".$args[0];
                break;
                case 2:
                    // calling funcions with 2 arguments 
                   echo "\nInside function with 2 arguments i.e ".$args[0]." ".$args[1];
                break;
                
                case 3:
                // calling funcions with 3 arguments 
                echo "\nInside function with 3 arguments i.e ".$args[0]." ".$args[1]." ".$args[2];
                break;
                
                default:
                echo'\nThis is a default call';
                break;
            }
            
        }
    
    }

    // Function Overloading Example 2
    function overloadingExample2(){

        // Getting the arguments passed
        $myArgs = func_get_args(); 

        // check no: of argument and do task respectively
        switch(func_num_args()){
            case 0:
                echo "\nDo task with zero argument";
            break;

            case 1:
                echo ("\n".$myArgs[0]." is the only argument");
            break;

            case 2:
                echo ("\nTwo args are: ".$myArgs[0]." & ".$myArgs[1]);
            break;

            default:
            echo("\Default.");
        }
    }
}

echo "OverloadingExample1 Called \n";
$obj = new overloadingExample();
$obj->overloadingExample1();
$obj->overloadingExample1('Tom');
$obj->overloadingExample1('Tom','Jim');
$obj->overloadingExample1('Tom','Jim','Henna');

echo "\n\nOverloadingExample2 Called \n";
$obj = new overloadingExample();
$obj->overloadingExample2();
$obj->overloadingExample2('Tom');
$obj->overloadingExample2('Tom','Jim');
?>