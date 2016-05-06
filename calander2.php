
<?php session_start(); 
if($_SESSION['userid']=="" && $_SESSION['name']==""){
	header("location: index.php");}
?>
<?php include 'dbconnect.php' ?>
<html>

<head><font size ="23"><center>Event Calander</center></font></head>

	<body>


		<h4><font size ="6"><center>

			<?php echo "Welcome " . $_SESSION["name"] . ".<br>"; ?>
		</center></font></h4>

<script>
		function goLast(month, year){
			if(month == 1) {
				--year;
				month = 13;
			}
			document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+(month-1)+"&year="+year;
			
		}
		function goNext(month, year){
			if(month == 12) {
				++year;
				month = 0;
			}
			document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+(month+1)+"&year="+year;
			
		}
</script>

<style>
		.today{
			background-color: #FFFF00;
		}
		.event{
			background-color: #FF0000;
		}
		a {
     		text-decoration: none ;
     		color:black;
		  }
		a:hover{
    		color:red;
    		text-decoration:none;
    		cursor:pointer;
   			}
   		.t1 {width:25%;height:50%;}
		.a  { width: 20px;height:65px;}
</style>


<?php include 'tableheader.php' ?>
<?php include 'addingData.php' ?>
<?php include 'dbconnect.php' ?>

<center>

<table class= 't1' border='1' >

<tr>

	<td  class= 'a' colspan='7' align="center">
	<input  type='button' value='<'name='previousbttn' onclick ="goLast(<?php echo $month.",".$year?>)">&nbsp;&nbsp;<?php echo $monthName.", ".$year; ?>&nbsp;&nbsp;<input type='button' value='>'name='nextbutton' onclick ="goNext(<?php echo $month.",".$year?>)"></td>
</tr>

<tr>
	<td class= 'a'>Sunday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Monday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Tuesday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Wednesday&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Thursday&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Friday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Saturday&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
	<?php include 'tablerow.php' ?>

</table>


<?php include 'schedule.php' ?>
<?php include 'bttnDetail.php' ?>
 Click here to <a href = "logout.php" tite = "Logout"><u>logout</u>.
 </a>
 </center>
</body>
</html>