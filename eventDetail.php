
<form id ='eventdetail'name='eventform' method='POST' action="<?php $_SERVER['PHP_SELF']; ?> ?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year; ?>&d=true&add=true">
	<table width='400px' border='0'>
		<tr>
			<td width='150px'>Date</td>
			<td width='250px'><input type='text' name='date' value ='<?php echo $month?>/<?php echo $day?> /<?php echo $year?>'</td>
		</tr>
		<tr>
			<td width='150px'>Title</td>
			<td width='250px'><input type='text' name='title'</td>
		</tr>
		<tr>
			<td width='150px'>Detail</td>
			<td width='250px'><textarea name='detail'></textarea></td>
		</tr>
		<tr>
		<td width='150px'>Select a time:</td>
  		<td width='250px'><input type="time" name="usr_time"></textarea></td>
  		</tr>
  		<tr>
			<td colspan='2' align='center'><input type='submit' name='btnadd' value='Add Event' ></td>
		</tr>
	</table>
</form>