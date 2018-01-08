<?php

include '_config.php';

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Select all the rows in the markers table

$query = "SELECT * FROM tb_lokasi";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){

  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id_lokasi",$row['id_lokasi']);
  $newnode->setAttribute("nama_event",$row['nama_event']);
  $newnode->setAttribute("alamat_lokasi", $row['alamat_lokasi']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("kategori", $row['kategori']);
}

echo $dom->saveXML();

?>