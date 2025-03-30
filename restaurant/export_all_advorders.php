<?php 
session_start();
require "../connection/connect.php";
function filterData(&$str)
{
    $str = preg_replace('/\t/', '\\t', $str);
    $str = preg_replace('/\r?\n/', '\\n', $str);
    if(strstr($str,'""')) $str = '"'.str_replace('"','""',$str).'"';
}

$filename = "Adv_Orders-" .date('Y-m-d').".xls";

$fields = array('a_id','title','quantity','price','adate','atime','Total Price');

$excelData = implode("\t",array_values($fields))."\n";

$query = $db->query("SELECT users.*, adv_orders.* FROM users INNER JOIN adv_orders ON users.u_id=adv_orders.u_id WHERE adv_orders.rs_id='" . $_SESSION["res_id"] . "'");
if($query->num_rows>0)
{
    while($row = $query->fetch_assoc())
    {
        $linedata = array($row['a_id'],$row['title'],$row['quantity'],$row['price'],$row['adate'],$row['atime'],$row['price']*$row['quantity']);
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
