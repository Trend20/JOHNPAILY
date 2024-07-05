<?php  


	$dom = new DOMDocument("1.0");
	$node = $dom->createElement("markers");
	$parnode = $dom->appendChild($node); 

	$connection = mysqli_connect("ces-web2.southwales.ac.uk", "username", "password", "databasename");

	if (!$connection) {  die('Not connected : ' . mysqli_error());} 

	$result=mysqli_query($connection,"SELECT * FROM Tracks");

	if (!$result) {  
	  die('Invalid query: ' . mysqli_error());
	} 

	if ($result->num_rows > 0) 
	{
		$i=0;
		while($row = $result->fetch_assoc())
		{  
		  $node = $dom->createElement("marker");  
		  $newnode = $parnode->appendChild($node);   
		  $newnode->setAttribute("PointId",$row['ID']); 
		  $newnode->setAttribute("latitude", $row['latitude']);  
		  $newnode->setAttribute("longitude", $row['longitude']);  
		}
	} 
	else 
	{
		echo "0 results";
	}

	echo $dom->saveXML();
?>
