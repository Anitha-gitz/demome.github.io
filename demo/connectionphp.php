<?php
	$con = mysqli_connect('localhost','root','','mca05');
		if(!$con) {//echo "Database is not connected. Check the connection!";  
 		}
		else { //echo "Connected Successfully"; 
		}

	//UPLOADING certificates into database 
		if (isset($_POST['submit'])) {
			$regno = $_POST['regno'];
			$stuname = $_POST['stuname'];
			$department = $_POST['department'];
			$year = $_POST['year'];
			$parti_college = $_POST['parti_college'];
			$parti_event = $_POST['parti_event'];
			$parti_date = $_POST['parti_date'];
			$parti_prize = $_POST['parti_prize'];
			if (isset($_FILES['parti_certificate']['name']))
			{
				$file_name = $_FILES['parti_certificate']['name'];
				$file_tmp = $_FILES['parti_certificate']['tmp_name'];
						move_uploaded_file($file_tmp,"uploads/".$file_name);
			
						$query = "INSERT INTO certificate (regno,stuname,department,year,parti_college,parti_event,parti_date,parti_prize,parti_certificate) VALUES('$regno','$stuname','$department','$year','$parti_college','$parti_event','$parti_date','$parti_prize','$file_name' )";
						$insert = mysqli_query($con,$query);
						
						if($insert)
						{ echo "<script>alert('Data INSERTED Successfully')</script>"; }
						else { echo "<script>alert('SOMETHING WRONG in query')</script>";}
				}
				else { echo "<script>alert('SOMETHING WRONG')</script>"; }
			}
?>