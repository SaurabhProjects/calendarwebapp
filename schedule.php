
<?php
	if(isset($_GET['d']))
	 {
	 	$userid = $_SESSION['userid'];
		echo "<hr>";
		include("eventDetail.php");
		$sql = "SELECT * FROM event WHERE user_id='$userid' AND eventDate='".$month."/".$day."/".$year."'";
		$result = mysqli_query($conn, $sql);
		
		echo "<hr>";
		while ($events = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo "Title: ".$events['title']."<br>";
			echo "Schedule Date: ".$events['eventDate']."<br>";
			echo "Schedule Time: ".$events['eventTime']."<br>";
			echo "Detail: ".$events['detail']."<br>";
			echo "------------------------------------------------------------------------------------"."<br>";
		}
	}
?>