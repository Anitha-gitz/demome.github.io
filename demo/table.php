<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style>
		
		body{
			background: rgb(114,202,255);
			background: linear-gradient(90deg, rgba(114,202,255,1) 0%, rgba(255,255,255,1) 49%, rgba(122,205,248,1) 100%);
		}
		#table{
			border-radius:10px;
		}
		table,th,td{
			border-collapse: collapse;
			text-align: center;
			padding-bottom: 10px;
			padding-left: 10px;
			padding-right: 10px;
		    padding-top: 10px;
			box-shadow: 5px 5px 5px rgba(5, 5, 0, 0.3);
			color: #333;
			font-family: Arial, sans-serif;
			margin: 20px;
			background-color: #f2f2f2;
					
		}
		th{
			color:#3EBBF0;
		}
		td{
			color:black;
		}
		a{
			text-decoration:none;
			font-size:15px;
		}
		#head{
			margin-top:5px;
			margin-bottom:10px;
			margin-right:60px;
			padding-bottom:15px;
			background-color:white;
			box-shadow: 0 0.5rem 1rem  black;
			height:110px;
			width:97%;
			z-index:1;
			top: 0;
			overflow: hidden;
			padding:20px;
		}
		#head #split_left{
			float:left;
			width:15%;
		}
		#head #split_right{
			float:right;
			width:85%;
		}
		#head p{
			font-size:20px;
			color:black;
			margin-top:2px;
			margin-bottom:7px;
			text-align:center;
		}
		#head #logo_img{
			width:100px;
			height:100px;
			margin-left:50px;	
			margin-right:10px;
			margin-top:10px;
			margin-bottom:10px;
		}
		#filter-form{
			text-align:center;
		}
		#filter-form select{
			border:none;
			width:150px;
			height:30px;
			margin-left:50px;
			margin-top:10px;
			margin-bottom:30px;
			border-radius:5px;
			background:white;
			font-size:18px;
			font-weight:bold;
			color:gray;
			box-shadow: 0 0.2rem 0.5rem gray;
		}
		
		#filter-form select:hover{
			box-shadow: ;
		}
		#filter-label{
			font-size:20px; 
			font-weight:bold;
			
		}
		#filter-form #search-btn,#delete-btn{
			border:none;
			background:white;
			color:rgb(114,202,255);
			border-radius:5px;
			font-size:20px;
			font-weight:bold;
			width:120px;
			height:30px;
			margin-left:70px;
			margin-top:10px;
			margin-bottom:30px;
			box-shadow: 0 0.2rem 0.5rem gray;
		}
		#filter-form #search-btn:hover, #delete-btn:hover {
			cursor:pointer;
			font-size:20.5px;
			color:deepskyblue;
			
		}
		#filter-form #search-regno,#delete-regno{
			border:none;
			color:black;
			border-radius:5px;
			font-size:20px;
			font-weight:bold;
			width:200px;
			height:30px;
			margin-left:70px;
			margin-top:10px;
			margin-bottom:30px;
			box-shadow: 0 0.2rem 0.5rem gray;
		}
		#filter-form #search-regno:hover{
			border:none;
			  
		}

	</style>
</head>

<body bgcolor="#1CACE9">
	
	<div id="head">
			<div id="split_left">	
				<img src="fclogo.png" alt="logo" id="logo_img">
			</div>
			<div id="split_right">
				<h1 align="center"><b> FATIMA <span>COLLEGE (autonomous)</span></b></h1>
				<p>Mary Land, Madurai-625 018,Tamil Nadu, India</p> 
			</div>
		</div>
		<div>
			<h1><marquee>ENROLLED DATA</marquee></h1>
		</div>
	<!--<div id="filers">
		<form id="filter-form" method="POST" action="#">
			<p id="filter-label">FILTER DATA</p>
			<input type="text" name="search_regno" id="search-regno" placeholder="Regno">
			<select name="year" id="year-filter" >
				<option value="hide">YEAR</option>
				<option value="1mca">1MCA</option>
				<option value="2mca">2MCA</option> 
			</select>
			<select name="prize" id="prize-filter" >
				<option value="hide">PRIZE</option>
				<option value="1stprize">1-prize</option>
				<option value="2ndprize">2-prize</option>
				<option value="3rdprize">3-prize</option>
			</select>
			<button value="search" id="search-btn">SEARCH</button>
		</form>
	</div>-->
	
	
  <center>
	  
<table id="table" border="2" bordercolor="#000000" bgcolor="#F3F3F3">

<th><b>REGISTER NUMBER</b></th>
<th><b>STUDENT NAME</b></th>
<th><b>DEPARTMENT</b></th>
<th><b>YEAR</b></th>
<th><b>PART_COLLEGE</b></th>
<th><b>PART_EVENT</b></th>
<th><b>PART_DATE</b></th>	
<th><b>PART_PRIZE</b></th>
<th><b>PART_CERTIFICATE</b></th>
<!--<th><b>DOWNLOADS</b></th>
	<th><b>REMOVE</b></th>
	<tr><td><button>DELETE</button></td></tr>-->

	  </center>
	  

	<?php
		include 'connectionphp.php';
		$con = mysqli_connect('localhost','root','','mca05');
		if(!$con)
		{
			//echo "Database is not connected. Check the connection!";  
 		}
		else
		{
			//echo "Connected Successfully";
		}

	  //DELETE query
		if(isset($_POST['delete']))
		{
			$regno = $_POST['regno'];
			
			$query = "DELETE FROM certificate WHERE regno = '$regno' ";
			
			$delete = mysqli_query($con,$query);
			
			if($delete)
			{
				//echo "<script>alert('Data DELETED Successfully')</script>";
			}
			else
			{
				//echo "<script>alert('SOMETHING WRONG')</script>";
			}
		}

	  //SELECT queries
		$query="select * from certificate";
   		$result=$con->query($query);
 		while($row=mysqli_fetch_assoc($result))
 		{
 			echo "<tr>
			<td> ". $row['regno']."</td>
			<td>". $row['stuname']."</td>
			<td>". $row['department']."</td>
			<td>". $row['year']."</td>
			<td>". $row['parti_college']."</td>
			<td>". $row['parti_event']."</td>
			<td>". $row['parti_date']."</td>
			<td>". $row['parti_prize']."</td>
			<td>". $row['parti_certificate']."</td>
			
			</tr>";
 		}
 		echo("</table>");
 		

			// Downloads files
			/*if (isset($_GET['file_id'])) {
				$regno= $_GET['file_id'];
				// fetch file to download from database
				$sql = "SELECT * FROM certificate WHERE regno=$regno";
    			$result = mysqli_query($con, $sql);
				$file = mysqli_fetch_assoc($result);
				$filepath = '../uploads/' . $file['name'];

				if (file_exists($filepath)) {
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename=' . basename($filepath));
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					header('Content-Length: ' . filesize('../uploads/' . $file['name']));
					readfile('../uploads/' . $file['name']);
					exit;
				}
				else{
					echo '<script>alert("file not found")</script>';
				}
				mysqli_close($con);
}*/
?>

<div id="delete-container">
	<form method="post">
		
		<input type="text" name="regno" id="delete-regno" placeholder="Regno">
		<button name="delete" id="delete-btn">DELETE</button>
	  </form>
</div>
	  </body>
</html>


