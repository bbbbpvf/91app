<?php
//包含数据库连接文件
include('conn.php');
$startid = $_GET['startid'];
$now = time();
$mmc=memcache_init();
$str = memcache_get($mmc,"json".$startid);
if(!isset($str)||empty($str)||strlen($str)==0){
$sql = "SELECT * FROM cover where time > '" . now ."' LIMIT 0, 30 ";
$cover_query = mysql_query($sql);
$coverArray = array();
$coverIndex=0;
while($row = mysql_fetch_array($cover_query,MYSQL_ASSOC)){
 $coverArray[$coverIndex] = $row;
 $sql = "SELECT * FROM app where cid = " . $row[id];
 $app_query = mysql_query($sql);
 $appIndex = 0;
 $appArray = array();
 while ($appRow = mysql_fetch_array($app_query,MYSQL_ASSOC)){
	$appArray[$appIndex] = $appRow;
	$appIndex++;
 }
 $coverArray[$coverIndex]['apps'] = $appArray;
 $coverIndex++;
}
$str = json_encode($coverArray);
    if($mmc==false)
        echo "mc init failed\n";
    else
    {
        memcache_set($mmc,"json".$startid,$str);
    }
}
$str = memcache_get($mmc,"json".$startid);
echo $str;
//echo json_encode(sql2json($sql));




function sql2json($query) {
    $data_sql = mysql_query($query) or die("'';//" . mysql_error());// If an error has occurred, 
            //    make the error a js comment so that a javascript error will NOT be invoked
    $json_str = ""; //Init the JSON string.

    if($total = mysql_num_rows($data_sql)) { //See if there is anything in the query
        $json_str .= "[\n";

        $row_count = 0;    
        while($data = mysql_fetch_assoc($data_sql)) {
            if(count($data) > 1) $json_str .= "{\n";

            $count = 0;
            foreach($data as $key => $value) {
                //If it is an associative array we want it in the format of "key":"value"
                if(count($data) > 1) $json_str .= "\"$key\":\"$value\"";
                else $json_str .= "\"$value\"";

                //Make sure that the last item don't have a ',' (comma)
                $count++;
                if($count < count($data)) $json_str .= ",\n";
            }
            $row_count++;
            if(count($data) > 1) $json_str .= "}\n";

            //Make sure that the last item don't have a ',' (comma)
            if($row_count < $total) $json_str .= ",\n";
        }

        $json_str .= "]\n";
    }

    //Replace the '\n's - make it faster - but at the price of bad redability.
    $json_str = str_replace("\n","",$json_str); //Comment this out when you are debugging the script

    //Finally, output the data
    return $json_str;
}
?>