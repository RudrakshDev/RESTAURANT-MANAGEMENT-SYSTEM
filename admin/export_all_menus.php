<?php 
session_start();
require "../connection/connect.php";
function filterData(&$str)
{
    $str = preg_replace('/\t/', '\\t', $str);
    $str = preg_replace('/\r?\n/', '\\n', $str);
    if(strstr($str,'""')) $str = '"'.str_replace('"','""',$str).'"';
}

$filename = "All-Menu-" .date('Y-m-d').".xls";

$fields = array('o_id','username','restaurant name','dish name','quantity','price(per quantity)','address');

$excelData = implode("\t",array_values($fields))."\n";

$query = $db->query("SELECT users.*, users_orders.*, restaurant.title AS restaurant_name 
FROM users 
INNER JOIN users_orders ON users.u_id = users_orders.u_id
INNER JOIN restaurant ON users_orders.rs_id = restaurant.rs_id order by o_id desc");
if($query->num_rows>0)
{
    while($row = $query->fetch_assoc())
    {
        $linedata = array($row['o_id'],$row['username'],$row['restaurant_name'],$row['title'],$row['quantity'],$row['address']);
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
