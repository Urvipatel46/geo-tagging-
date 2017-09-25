<?php

require("phpsqlajax_dbinfo.php");

// Start XML file, create parent node

$dom = new DOMDocument("1.0","UTF-8");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$connection=mysqli_connect ('localhost', $username, $password, $database);
if (mysqli_connect_errno()) {  die('Not connected : ' . mysqli_connect_error());}


// Select all the rows in the markers table

$query = "SELECT * FROM markers WHERE 1";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error($connection));
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("officename",$row['officename']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("pincode", $row['pincode']);
  $newnode->setAttribute("type", $row['type']);
  $newnode->setAttribute("Deliverystatus", $row['Deliverystatus']);
  $newnode->setAttribute("divisionname", $row['divisionname']);
  $newnode->setAttribute("regionname", $row['regionname']);
  $newnode->setAttribute("circlename", $row['circlename']);
  $newnode->setAttribute("Taluk", $row['Taluk']);
  $newnode->setAttribute("Districtname", $row['Districtname']);
  $newnode->setAttribute("statename", $row['statename']);
  $newnode->setAttribute("Telephone", $row['Telephone']);
  $newnode->setAttribute("Related_Suboffice", $row['Related_Suboffice']);
  $newnode->setAttribute("Related_Headoffice", $row['Related_Headoffice']); 
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  
}

echo $dom->saveXML();

?>