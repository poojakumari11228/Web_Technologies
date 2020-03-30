<?php   
//if read submit button is clicked
if(isset($_POST['read-submit']) && isset($_FILES['upload'])){
    
    // UPLOAD FILE
      $file_name = $_FILES['upload']['name'];
      $file_tmp = $_FILES['upload']['tmp_name'];
      move_uploaded_file($file_tmp,"uploads/".$file_name);
      
      $text = '';
      
      //Open file
      $fileHandle = fopen("uploads/".$file_name,'r') or die('can not open file \n');
      // read file and store result
      while(!feof($fileHandle)){
        $text .= fgets($fileHandle);
      }
      //display result
      echo ' 
      <h1>Reading Text From File</h1> <br>
      <h4> '.$text.' </h4>
      ';

}
//if write submit button is clicked

if(isset($_POST['write-submit']) && isset($_POST['write'])){

     // UPLOAD FILE
     $file_name = $_FILES['upload']['name'];
     $file_tmp = $_FILES['upload']['tmp_name'];
     move_uploaded_file($file_tmp,"uploads/".$file_name);

     //get written text
    $text =  $_POST['write'];

    //Open file
    $fileHandle = fopen("uploads/".$file_name,'w+') or die('can not open file \n');
    // write in file and store result
    $result = fwrite($fileHandle,$text);
    if($result)
    {
        echo 'Successfully written in text file!';
    }
    fclose($fileHandle);
}

if(isset($_POST['crd-submit'])){

    $file_name = $_FILES['upload']['name'];
    
    // break string of name using ' . ' and get just name
    $split = explode('.',$file_name);
    $name = strtolower($split[0]);
    copy("uploads/".$file_name,"uploads/".$name.'.bat');
    echo "\nFile Copied!";
    rename("uploads/".$name.'.bat',"uploads/".$name.'.temp');
    echo "\nFile Renamed!";
    unlink("uploads/".$name.'.temp');
    echo "\nFile Deleted!";
  
}

?>