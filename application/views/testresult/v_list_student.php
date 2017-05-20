
<table>
	
<thead>
	<tr>
		<th>#</th>
		<th>Student ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
<?
foreach($students in $key=>$value){
?>
	<tr>
	<td>
		<input type="chebox" /></td>

	<td><?php echo $value->student_ID?></td>
	<td><?php echo $value->first_name?></td>
	<td><?php echo $value->last_name?></td>
	<td><a href="#" class="" >Send</a>
	</tr>
<?
}
?>
</tbody>
</table>