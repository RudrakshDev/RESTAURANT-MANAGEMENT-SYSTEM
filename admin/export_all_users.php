<?php 
session_start();
require "../connection/connect.php";
function filterData(&$str)
{
    $str = preg_replace('/\t/', '\\t', $str);
    $str = preg_replace('/\r?\n/', '\\n', $str);
    if(strstr($str,'""')) $str = '"'.str_replace('"','""',$str).'"';
}

$filename = "All-Users-" .date('Y-m-d').".xls";

$fields = array('u_id','username','f_name','l_name','email','phone','address');

$excelData = implode("\t",array_values($fields))."\n";

$query = $db->query("SELECT * FROM users");
if($query->num_rows>0)
{
    while($row = $query->fetch_assoc())
    {
        $linedata = array($row['u_id'],$row['username'],$row['f_name'],$row['l_name'],$row['email'],$row['phone'],$row['address']);
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
