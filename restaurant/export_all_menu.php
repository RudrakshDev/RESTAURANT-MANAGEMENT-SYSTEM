<?php 
session_start();
require "../connection/connect.php";
function filterData(&$str)
{
    $str = preg_replace('/\t/', '\\t', $str);
    $str = preg_replace('/\r?\n/', '\\n', $str);
    if(strstr($str,'""')) $str = '"'.str_replace('"','""',$str).'"';
}

$filename = "Menu-" .date('Y-m-d').".xls";

$fields = array('d_id','title','slogan','price');

$excelData = implode("\t",array_values($fields))."\n";

$query = $db->query("SELECT * FROM dishes  where rs_id = ".$_SESSION["res_id"]."");
if($query->num_rows>0)
{
    while($row = $query->fetch_assoc())
    {
        $linedata = array($row['d_id'],$row['title'],$row['slogan'],$row['price']);
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
