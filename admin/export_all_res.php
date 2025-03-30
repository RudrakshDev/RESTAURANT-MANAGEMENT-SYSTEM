<?php 
session_start();
require "../connection/connect.php";
function filterData(&$str)
{
    $str = preg_replace('/\t/', '\\t', $str);
    $str = preg_replace('/\r?\n/', '\\n', $str);
    if(strstr($str,'""')) $str = '"'.str_replace('"','""',$str).'"';
}

$filename = "All-Restaurants-" .date('Y-m-d').".xls";

$fields = array('rs_id','title','email','phone','address');

$excelData = implode("\t",array_values($fields))."\n";

$query = $db->query("SELECT * FROM restaurant order by rs_id desc");
if($query->num_rows>0)
{
    while($row = $query->fetch_assoc())
    {
        $linedata = array($row['rs_id'],$row['title'],$row['email'],$row['phone'],$row['address'],$row['o_hr'],$row['c_hr'],$row['o_days']);
        array_walk($linedata,'filterData');
        $excelData .= implode("\t",array_values($linedata))."\n";
    }
}
else{
    $excelData .= "No records found..."."\n";
}

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

echo $excelData;

exit;
?>
