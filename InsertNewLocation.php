<?php
		 
		    $var1 = $_GET['lat'];
			$var2 = $_GET['lon'];
		  
            $con = mysqli_connect("ces-web2.southwales.ac.uk", "username", "password", "databasename");
            if (!$con) 
			{
              die('Could not connect: ' . mysqli_error());
            }
		
			$sql = "INSERT INTO Tracks (`latitude`, `longitude` ) VALUES ('$var1', '$var2' )";

            if (mysqli_query($con, $sql)) 
		    {
              echo "New record created successfully";
            }  
			else 
		    {
              echo "Error: " . $sql . "<br>" . mysqli_error($con);
		    }			
			
            mysqli_close($con);
?>