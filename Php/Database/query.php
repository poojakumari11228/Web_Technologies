<?php 
// connect funcion
function connection(){
    $con = new mysqli("localhost","root","pass","test");
    if($con->connect_error){
       echo ("DB Error ".$con->error);
    }else {echo "Connected \n";
        return $con;}
}
// create db is clicked
if(isset($_POST['create-db'])){   
    $con = new mysqli("localhost","root","pass");
    if($con->connect_error){
       echo ("DB Error ".$con->error);
    }else {
      echo "Connected";
        }
    //create database
    $sql = "CREATE DATABASE if NOT EXISTS TEST";
    if($con->query($sql))
    echo "DB created";
}
// create table is clicked
if(isset($_POST['create-table'])){
  // make connection
    $con = connection();
    // sql query
    $sql = "CREATE table myproduct(prod_id int AUTO_INCREMENT PRIMARY KEY, prod_name varchar(50) not null, price int not null) ";
    if($con->query($sql))
    echo "Table created";
    else
    echo ("Table Error ".$con->error);
}

// insert data btn is clicked
if(isset($_POST['insert-data'])){
    $con = connection();
   // multi insert
   $sql = "INSERT INTO myproduct (prod_name, price) VALUES ('Book', 100);";
   $sql .= "INSERT INTO myproduct (prod_name, price)VALUES ('Bag', 100);";
    if($con->multi_query($sql))
    echo "Data Inserted";
    else
    echo ("Insert Error ".$con->error);
}

// retreive data btn is clicked
if(isset($_POST['retreive-data'])){
    $con = connection();
   // multi insert
   $sql = "SELECT * FROM myproduct;";
   $data = $con->query($sql);
    while($row = $data->fetch_assoc()){
        echo("ID : ".$row['prod_id']."\n");
        echo("NAME : ".$row['prod_name']."\n");
        echo("PRICE: ".$row['price']."\n");
    }
   
}