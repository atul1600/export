<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form enctype="multipart/form-data" method="POST"> 
<button type="submit" name="show" class="btn btn-outline-primary">show data in database</button>
<button type="submit" name="submit" class="btn btn-outline-info  btn float-right" > Download excel file</button>

<table align="center" border="2" width="80%">
	<div class="container">
		<tr>
		<th>no</th>
		<th>firstname</th>
		<th>lastname</th>
		<th>city</th>
	</tr>
	</div>
	

<?php

if (isset($_POST["show"])) {

$con = mysqli_connect('localhost','root','','importtoexcel');
if($con == false){
	echo "connection is failed";
}

	$sql ="SELECT `id`, `firstname`, `lastname`, `city` FROM `info`";
	$run = mysqli_query($con,$sql);

		if (mysqli_num_rows($run)<1) {
			echo "<tr><td colspan='5'>No records found</td></tr>";
		}
		else
		{
		$count =0;
	  	 while($data=mysqli_fetch_assoc($run))
	  	 {
		$count++;
				?>
 			<tr>
 		<td><?php echo $count; ?></td>
 		<td><?php echo $data["firstname"]; ?></td>
  		<td><?php echo $data["lastname"]; ?></td>
 		<td><?php echo $data['city']; ?> </td> 			</tr>
 			<?php  
 		}
	
 }
}

?>
</table>


<?php
if(isset($_POST["submit"])) {	
	$filename = "coderszine_export_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$is_coloumn = false;
	if(!empty($data_records)) {
	  foreach($data_records as $value) {
		if(!$is_coloumn) {		 
		  echo implode("\t", array_keys($value)) . "\n";
		  $is_coloumn = true;
		}
		echo implode("\t", array_values($value)) . "\n";
	  }
	}
	exit;  
}
?>