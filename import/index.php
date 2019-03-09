<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
	<div class="container">
		<div class="row">


		</div>
		
	</div>
	<form action="index.php" method="POST" enctype="multipart/form-data">
 	<table border="1" 
 	align="center" 
 	width="60%"  
 	style= "text-align: center ; font-size: 25px";
 	bgcolor="#cceeff" >
 		<tr>
 			<td>firstname</td>
 			<td align="left"><input type="text" name="firstname" placeholder="enter the roll number"></td>
 		</tr>
 		 
 		<tr>
 			<td>lastname</td>
 			<td align="left"><input type="text" name="lastname" placeholder="enter the roll name"></td>
 		</tr>

 		<tr>
 			<td>city</td>
 			<td align="left"><input type="text" name="city" placeholder="enter the city "></td>
 		</tr>
 		<tr>
 			<td align="left"><input type="submit" name="submit" value="submit"></td>
 		</tr>
 		
 		
 	</table>
 	
 </form>
 

<a href="data.php"> <button class="btn btn-outline-primary" >to check data</button></a>
</body>

<form> 


 

 <?php
if (isset($_POST['submit'])) {

$con = mysqli_connect('localhost','root','','importtoexcel');
if($con == false){
	echo "connection is failed";
}
 
 $firstname= $_POST["firstname"];
 $lastname= $_POST["lastname"];
 $city = $_POST["city"];
 


$querry ="INSERT INTO `info`(`id`, `firstname`, `lastname`, `city`) VALUES (Null,'$firstname','$lastname','$city')";

$run= mysqli_query($con,$querry);

}
 ?>



