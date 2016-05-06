
<?php
echo "<tr>";
		// finding server date
		$first_day_month = mktime(0,0,0,$month, 1, $year) ;
		//finding the day of the server datwe
		$name_of_day_month = date('w', $first_day_month) ; 



		//conting the overflow of the date from the previous month
		switch($name_of_day_month){   
			case "0": $empty_day = 0; 
			break;   
			case "1": $empty_day = 1; 
			break;   
			case "2": $empty_day = 2; 
			break;   
			case "3": $empty_day = 3; 
			break;   
			case "4": $empty_day = 4; 
			break;   
			case "5": $empty_day = 5; 
			break;   
			case "6": $empty_day = 6; 
			break;   
		}
		// counting total day in the month
		$total_days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));  
		$week_counter = 1; 

		//making row for the empty day in the current month
		while ( $empty_day > 0 )   {   
			echo "<td class= 'a'></td>";   
			$empty_day = $empty_day-1;   
			$week_counter++;  
		}

		//printing the date for the month in the calendar
		$week_counter_month = 1;
		while ( $week_counter_month <= $total_days_in_month )   
		{  
			$systemDate = date("n/j/Y");
			$dateCompare = $month. '/' . $week_counter_month. '/' . $year;
			echo "<td align='center' ";
			
			//this is where i am comparing two dates but it is giving error
			//every day of the current month is turnin green
			if ($systemDate == $dateCompare)
				//current month date and aday and change the colur to yellow
			{
				echo "class ='a today'";

			}  
			else
			{
				//findinf the schedule event and turning it red
				$userid = $_SESSION['userid'];
				$sql = "SELECT * FROM event WHERE user_id='$userid' AND eventDate='".$dateCompare."'";
				$stmt =mysqli_prepare($conn, $sql);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);

				$noOfEvent =  mysqli_stmt_num_rows($stmt);
				printf("Result set has %d rows.\n", $noOfEvent );
				if($noOfEvent >= 1)
				{
					echo "class='a event'";
				}
				mysqli_stmt_close($stmt);
				
			}
			//creating huperlinking to add the schedule 


			echo "> <a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$week_counter_month."&year=".$year."&d=true'>".$week_counter_month."</a>";
			$userid = $_SESSION['userid'];
			$sql = "SELECT * FROM event WHERE user_id='$userid' AND eventDate='".$dateCompare."'";
			$stmt =mysqli_prepare($conn, $sql);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$nEvent =  mysqli_stmt_num_rows($stmt);
			//adding detail schedule button

			if($nEvent >0)
			{
				echo "</br><form method='post'><input type='submit' name='event' value='Detail' width ='10px' formmethod='post' formaction='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$week_counter_month."&year=".$year."&c=true'> </form>";
			}
			else {echo "</br>";}
			echo " </td>";
			$week_counter_month++;   
			$week_counter++;    
			// counting seven day for the week 
			if ($week_counter > 7)  
			{  
				echo "</tr><tr>";  
				$week_counter = 1;  
			}  
			
		}


		while ( $week_counter >1 && $week_counter <=7 )   
		{   
			echo "<td> </td>";   
			$week_counter++;   
		}  


		echo "</tr>";



		?>
