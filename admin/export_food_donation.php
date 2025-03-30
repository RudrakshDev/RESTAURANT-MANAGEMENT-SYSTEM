<?php 
session_start();
require "../connection/connect.php";
function filterData(&$str)
{
    $str = preg_replace('/\t/', '\\t', $str);
    $str = preg_replace('/\r?\n/', '\\n', $str);
    if(strstr($str,'""')) $str = '"'.str_replace('"','""',$str).'"';
}

$filename = "All-Food-Donation-Requests-" .date('Y-m-d').".xls";

$fields = array('Food Donation ID','UserName','Email','Quantity','Address','Preparation Date','Preparation Time');

$excelData = implode("\t",array_values($fields))."\n";

$query = $db->query("SELECT * from fooddnt");
if($query->num_rows>0)
{
    while($row = $query->fetch_assoc())
    {
        $linedata = array($row['fd_id'],$row['name'],$row['email'],$row['quantity'],$row['address'],$row['pdate'],$row['ptime']);
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
