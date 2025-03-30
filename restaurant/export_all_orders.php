<?php 
session_start();
require "../connection/connect.php";
function filterData(&$str)
{
    $str = preg_replace('/\t/', '\\t', $str);
    $str = preg_replace('/\r?\n/', '\\n', $str);
    if(strstr($str,'""')) $str = '"'.str_replace('"','""',$str).'"';
}

$filename = "Orders-" .date('Y-m-d').".xls";

$fields = array('o_id','','title','quantity','price','date');

$excelData = implode("\t",array_values($fields))."\n";

$query = $db->query("SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id WHERE users_orders.rs_id='" . $_SESSION["res_id"] . "'");
if($query->num_rows>0)
{
    while($row = $query->fetch_assoc())
    {
        $linedata = array($row['o_id'],$row['title'],$row['quantity'],$row['price'],$row['date']);
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
