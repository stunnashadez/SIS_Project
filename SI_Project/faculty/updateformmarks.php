<?php
session_start();
if (isset($_SESSION['facultyid'])) 
{
	echo "";
}
else
{
	header('location:../facultylogin.php');
}
echo " welcome ".$_SESSION['facultyid']
?> 

<?php
	include('facultyheader.php');
	include('facultytitleheader.php');
?> 
 
<?php

	include ('../dbconnect.php');
	$id=$_GET['studentid'];
	$sql="SELECT * FROM  student.student_info WHERE StudentID = $id";
	$run = mysqli_query($db,$sql); 
	$result=mysqli_fetch_assoc($run);
        
	$name=$result['StudentName'];
	$major=$result['Major'];
	$gpa=$result['GPA'];
	
?>

 
<?php

	include ('../dbconnect.php');
	$id=$_GET['studentid'];
	$sql="SELECT * FROM  student.enrolled WHERE StudentID = $id";
	$run = mysqli_query($db,$sql); 
	$result=mysqli_fetch_assoc($run);
        
	$StudentID=$result['StudentID'];
	$CourseID=$result['CourseID'];
	$Mark=$result['Mark'];
	
?>



<center><h1>Student Information<h1></center>
	<form method="POST" action="updatedatamarks.php" enctype="multipart/form-data">
	<table border="1" align="center" style="width:50%;font-size: 30px;">
		 <tr>
				<th>StudentID</th>
		
					<td><input type="text" name="StudentID" readonly value="<?php echo $StudentID; ?>"required></td>

			
		 </tr>
		 <tr>
				<th>Name</th>
		
					<td><input type="text" name="name" readonly value="<?php echo $name; ?>"required></td>

			
		 </tr>
		 <tr>
				<th>Major</th>  
				<td><input type="text" name="major" readonly value="<?php if ( isset( $major ) ) {  echo $major; }?>" required></td>
		 </tr>
		 <tr>
				<th>GPA (Auto-Calculated)</th>
				<td><input type="number" name="gpa" readonly value="<?php if ( isset( $gpa ) ) {  echo $gpa; }?>"required></td>
		 </tr>
		 </table>
		 
<center><h1>Enter Student Course Grades<h1></center>		 
	<table border="1" align="center" style="width:50%;font-size: 30px;">		 
		 
		 <tr>
				<th>CourseID</th>
		
					<td><input type="text" name="CourseID" value="<?php echo $CourseID; ?>"required></td>

			
		  </tr>
		 <tr>
				<th>Mark</th>
		
					<td><input type="text" name="Mark" value="<?php echo $Mark; ?>"required></td>

			
		 </tr>
		 <tr>  
		 	<td colspan="2" align="center">
		 		<input type="text" name="id" readonly value="<?php echo $id;?>"/>
		 		<input height="30%" type="submit" name="Submit" value="Submit">
		 	</td>
		 </tr>
	</table>
	</form>
