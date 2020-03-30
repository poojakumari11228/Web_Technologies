<?php

if(isset($_FILES['myfile']))
{
    // get uploaded file name
    $name = $_FILES['myfile']['name'];
    // break string of name using ' . ' 
    $split = explode('.',$name);
    //last splited piece of ' . ' is extension
    $file_ext = strtolower(end($split));
   
    // to track the validation
    $valid=true;

    // get size of file
    $file_size =$_FILES['myfile']['size'];
    //allowed extensions are:
    $extensions= array("pdf","jpg","png");
    // checck extension of file
    if(in_array($file_ext,$extensions)=== false){
        $valid=false;
      echo "\nextension not allowed, please choose a PDF, JPG or PNG file.";
    }
    // check file size
    if($file_size > 2097152){
        $valid=false;
        echo"\nFile size must be less than or equal to 2 MB";
     }
     
     if($valid){
         echo"\nValid File! \n File uploaded successfully.";
     }

}

?>