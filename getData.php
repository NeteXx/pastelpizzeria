<?php
// MySQL database connection code
$connection = mysqli_connect("localhost","root","","google_pie") or die("Error " . mysqli_error($connection));
//Fetch pizzeria data
$sql = "SELECT * FROM pizzeria";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
    $pizzeria = $row['pizzeria'];
    $unidades_vendidas = $row['unidades_vendidas'];
    $array['cols'][] = array('type' => 'string'); 
    $array['rows'][] = array('c' => array( array('v'=> $pizzeria), array('v'=>(int)$unidades_vendidas)) );
}
$data = json_encode($array);
echo $data;
?>
