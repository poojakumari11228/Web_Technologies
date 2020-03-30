<?php 

// get submitted data
$data["contact_name"] = $_POST["uname"];
$data["contact_number"] = $_POST["uno"];
// print
echo "Name: ".$data["contact_name"]." Number: ".$data["contact_number"];
?>