<?PHP
/**
 * Use the Haversine Formula to display the 100 closest matches to $origLat, $origLon
 * Only search the MySQL table $tableName for matches within a 10 mile ($dist) radius.
 */
//include("./assets/db/db.php"); // Include database connection function
//$db = new database(); // Initiate a new MySQL connection
$con=mysqli_connect("localhost","root","","newportal");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/**

$tableName = "markers";
$origLat = 42.1365;
$origLon = -71.7559;
$dist = 10; // This is the maximum distance (in miles) away from $origLat, $origLon in which to search
$query = "SELECT officename, lat, lng, 3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat - lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2))) 
          as distance FROM $tableName WHERE 
          lng between ($origLon-$dist/cos(radians($origLat))*69) 
          and ($origLon+$dist/cos(radians($origLat))*69) 
          and lat between ($origLat-($dist/69)) 
          and ($origLat+($dist/69)) 
          having distance < $dist ORDER BY distance limit 100"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_assoc($result)) {
    echo $row['officename']." > ".$row['distance']."<BR>";
}*/
mysql_close($con);
?>