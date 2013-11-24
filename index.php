<?php

//DB CONNECTION
$con = mysql_connect('localhost','root',''); 
if (!$con) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

//DB SELECTION
$db_selected = mysql_select_db("test",$con);
$query="SELECT * FROM artclass";
$result=mysql_query($query,$con);


$data = array();
$i=0;
//RESTOR DB IN ARRAY
 while($row = mysql_fetch_array($result))
  {
  echo $row['name'] . " " . $row['age'];
  echo "<br>";
    $data[$i]['name']= $row['name'];  
    $data[$i]['age'] = $row['age'];
  $i++;
  }
echo 'Connection OK'; 
mysql_close($con); 
//JSON
//convert php array to json
$json_data = json_encode($data);
 
// output json data to file
file_put_contents('list.json', $json_data);




?>
