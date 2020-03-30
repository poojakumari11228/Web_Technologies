<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
body{
    margin: auto;
    width: 500px;
}
</style>
<body>

    <h1>File handling</h1>

    <h2>Task: Write And Read File </h2>

    <form action="" enctype="multipart/form-data" method="POST">
        <input type="text" name="rno" placeholder="Enter Your Roll#" ><br>
        <input type="submit" value="Submit" name="submit">
        <input type="submit" value="Get data" name="get">
    </form>
    
    <h2>Task: write in selected file and count words</h2>

    <form action="" method="POST">
        <input type="text" name="rno" placeholder="Enter Your Roll#" ><br>
        <input type="file" name="file" ><br>
        <input type="submit" value="Submit" name="submit">
        <input type="submit" value="Count Words In File" name="count">
    </form>
    

    
</body>
</html>
<?php 
// if file submitted
if( isset($_POST["SubmitFile"])){
    // echo file name
    $file = $_FILES['fileupload']['name'];
    echo "upload ".$file;
}
// write data in file
if( isset($_POST["submit"])){
    echo"submited";
    $data = $_POST["rno"]." ";
    $file = fopen("data.txt","a") or die("Unable to open file!");;
    fwrite($file,$data);

    fclose($file);
}
// read file and get data
if( isset($_POST["get"])){
    
    $file = fopen("data.txt","r") or die("Unable to open file!");;
    $data = fread($file, filesize("data.txt"));
        echo "".$data;
        fclose($file);
    
}
// count words
if( isset($_POST["count"])){
    
    $sum="";
    $file = fopen("data.txt","r") or die("Unable to open file!");;
    while(!feof($file)){
        $sum = $sum . (fgets($file));
      }
      
      print_r( sizeof( str_word_count($sum,1,'0123456789')));
    fclose($file);
    
}
?>