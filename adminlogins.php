<html>
<head>
<!-- page css -->
<style>
body{
border-radius:5px;
}
#header{

width:400px;

}
#header1{
float:right;
width:400px;

}
div.topheader{
float:left;
background-image: url("./images/templatemo_header2.png");
width:50%;
height:100px; 

}
div.topheader2{

float:left;
width:50%;
height:100px; 

}
div.Secondtopheader{
background-image:url('./images/templatemo_menu1.png');
text-align:center;
   width:30px;
   border-radius:5px;
    
}
#adminlogins{
background-image: url("./images/life.jpg");
 
 height: 535px;
 width: 100%;

}
#header{
	
	
		font-size:20px;
   border-radius:5px;

	text-align:center;
background-color:green;
opacity:.9; 
width:100%;
height:24%;
	
	
}
#form{
	background-color:green;


padding:55px 200px 70px;
border-radius:8px;
opacity:.7; 
height:240px; 
}
#head{
	
	height:70px;
	width:100%;
	border-radius:5px;
	font-size:50px;
	background-color:green;
	opacity:.9; 
	text-decoration-color: red;
}
</style>
</head>
<!-- page body start -->

<body>
	<div class="topheader">
	
	<h1 style="margin-left:22px;margin-top:10px;font-size:35px ">CSAS</h1>
	<b style="margin-left:22px;margin-bottom:60px;font-size:20px ">Central Seat Allotment System</b>
	
	
	</div>
	<div class="topheader2">
	
	<h1 style="float:right;margin-top:65px;font-size:30px; margin-right:85px; ">Admin Panel</h1>
	
	</div>
		<div class="Secondtopheader">		
		<img src="./images/templatemo_menu1.png" alt="alt" width="1450px" height="70px">
		</div>
			<div id ="adminlogins">

				<div id ="head">
				<p style="color:red;"><marquee behavior="alternate" scrollamount=20> Welcome Admin Page</marquee></p>
				</div>
					<div id ="header">
					<h1>AUTHENTICATION   ADMIN  LOGIN   HERE </h1>
				
						<div id ="form">
<br>
						<form action="adminlogins.php" method="POST" >

						<table height="200" width="400" border="0" align="center" bordercolor="black" bgcolor="#64E712" opacity=".5px" style="border-radius:8px;">
						<tr style="font-size:30px ">
						<td align="center">Name :</td>
						<td align="center" colspan="10"><input type="text" name="name"  style="font-size:20px;" placeholder="Enter adminname name"></td>
						</tr>
						<tr style="font-size:30px " >
						<td align="center">Password :</td>
						<td align="center" colspan="10"><input type="password" name="password" style="font-size:20px;" placeholder="Enter password admin"></td>
						</tr>
						<tr style="font-size:30px;">


						</tr>

						<tr style="font-size:20px;">

						</tr>
						<tr style="font-size:20px;">
						<td align="center" colspan="10"><input type="submit" name="submit"  style="font-size:22px;" value="Login"></td>

						</tr>
						</table>
						</form>
						</div>
		</div>
	</div>


	
<?php

//connection establishment 

          $servername='localhost';  
          $username='id1120660_csas';
          $password='csas@nitc';
          $db='id1120660_csas';

// check for connection         

        $connect = new mysqli($servername,$username,$password,$db);
        if($connect)
         {
                // echo "connection successfull";
         }
        else
            die("not connected".mysqli_connect_error($connect));

// start this code if user admin click on start button 

if(isset($_POST['submit']))
{

	$name=$_POST['name'];
	$pass=$_POST['password'];

// access admin details on given id and password

	$sql= "select * from admin where name ='$name' and password ='$pass'";
	$res= mysqli_query($connect,$sql);

	if(mysqli_num_rows($res)>0)
	{
// if admin exists send on admissiondetails.php 

		 echo " <script> alert(' You are Login Here......!!!!!');
                window.location = ('admissiondetail.php');</script>";

	}
	else
	{

// if admin not exists send on adminlogins.php page
		 echo " <script> alert(' Your Id and Password Wrong ......!!!!!');
                window.location = ('adminlogins.php');</script>";

	}
}

?>
//end of php code 

</body>

//end of html code

</html>