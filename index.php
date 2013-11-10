<?php
$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS); 
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db(SAE_MYSQL_DB, $con);
$result = mysql_query("show tables");
$i=0;
$array = array();
    while($i<mysql_num_rows($result))
    {
	    $array[$i] = mysql_tablename($result,$i);
		$i++;
    }
echo json_encode($array);

  
$result = mysql_query("SELECT * FROM Persons");

while($row = mysql_fetch_array($result))
  {
  echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br />";
  }
  
mysql_close($con);

$arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
echo json_encode($arr);
$obj->body = 'another post';
echo '<P>';
$obj->id = 21;
$obj->approved = true;
$obj->favorite_count = 1;
$obj->status = NULL;
echo json_encode($obj);