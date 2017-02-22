<?php

$conn = oci_connect("www","dwere4u","//172.16.10.26/dwtdb");

$query = 'SELECT BLOBDATA FROM BTAB WHERE BLOBID = :MYBLOBID';
$stmt = oci_parse ($conn, $query);
$myblobid = 1;
oci_bind_by_name($stmt, ':MYBLOBID', $myblobid);
oci_execute($stmt);
$arr = oci_fetch_array($stmt, OCI_ASSOC);
$result = $arr['BLOBDATA']->load();

header("Content-type: image/JPEG");
echo $result;

oci_close($conn);

?>

