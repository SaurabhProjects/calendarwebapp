<?php
	if(isset($_GET['c'])){
		if (isset($_POST['event'] ))
	 {
	 	
		$userid = $_SESSION['userid'];
		$sql = "SELECT * FROM event WHERE user_id='$userid' AND eventDate='".$month."/".$day."/".$year."'";
		$result = mysqli_query($conn, $sql);
		
		echo "<p>";
		
		while ($events = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo "------------------------------------------------------------------------------------"."<br>";
			echo "Title: ".$events['title']."<br>";
			echo "Schedule Date: ".$events['eventDate']."<br>";
			echo "Schedule Time: ".$events['eventTime']."<br>";
			echo "Detail: ".$events['detail']."<br>";
			echo "------------------------------------------------------------------------------------"."<br>";
		}
		echo "</p>";
	}
	}
?>