<?php
// Specify your sqlite database name and path
$datapie = array();
$dbname = "sqlite:/var/www/PIRlog.db";
$db = new PDO($dbname);
$query = "SELECT strftime('%s', timestamp), motion epoctime FROM TxOccupationBox;";

$result = $db->query($query);
$result->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $result->fetch()) {
	extract($row);
	$datapie[] = array("epoctime" => $epoctime);
}
$data = json_encode($datapie);
echo $data;
?>
