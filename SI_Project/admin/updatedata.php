<?php
if(isset($_POST['Submit']))
{
	include ('../dbconnect.php');
        
        $name=$_POST['name'];
	$major=$_POST['major'];
	$gpa=$_POST['gpa'];
	$Address=$_POST['Address'];
	$Phone=$_POST['Phone'];
	$id=$_POST['id'];
    
        
$sql=("UPDATE `student`.`student_info` SET  `StudentName` = '$name',"
      . "`Major` = '$major', `GPA` = '$gpa', `Address` = '$Address' , `Phone` = '$Phone' "
      . "WHERE StudentID = $id");
$result= mysqli_query($db,$sql);   /*include two variable database($db) and query($sql) and finally store $data variable */
if($result==1)
  {
  	echo "Data updated Successfully";
  
  }
  else
  {
  	echo "error";
  }
}
?>