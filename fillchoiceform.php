<?php
/*! \file institute.php
\brief to access all institute details 
*/
include('institute.php');
/*! \file student_class.php 
\brief to access all studnet class details 
*/
include('student_class.php');
/*! \file connection.php 
\brief to access all connection details
*/
include('connection.php');

/* Session Start */

    session_start();
    $methodname = $_POST['submit'];
    //echo $methodname;
    /*! <var submit 
    \brief for storing string submit 
    */
    $submit = "submit"; 
    /*! <var roll no 
    \brief for storing roll no from session 
    */
    $rollno = $_SESSION['rollno'];
    /*! <var choiceredirect 
    \brief for storing address of choice page for redirect on that page 
    */
    $choiceredirect = $_SESSION['choice']; 
    /*! <var session 
    \brief for  transfer roll no to next page 
    */
    $_SESSION['rollno'] = $rollno; 
    /*! <var session 
    \brief for  transfer choiceredirect to next page 
    */
    $_SESSION['choiceredirect']=$choiceredirect; 
//    echo "rollno  :  ".$rollno;
  
/*! A student class object 
\brief calling function getchoicestatus for accssing student status 
*/
$choicestatuss = $stuobj->getchoicestatus($rollno);
    $choicestatus = mysqli_fetch_assoc($choicestatuss);
//    echo " <br/>choice status ".$choicestatus['choice_status']."<br/>"; 
    
 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSAS</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

</head>

<body>

<div id="templatemo_wrapper">
	
    <div id="templatemo_header">

	<div id="site_title">
		<h1><a href="#" target="_parent">
		<strong>CSAS</strong>
		<span>Central Seat Allotment</span>
		</a></h1>
	</div>
	
	<div class="twitter">
			<a href="http://www.nitc.ac.in/">Organizing Institute <br/><span>NIT CALICUT</span></a>
	</div>
	
</div> <!-- end of templatemo_header -->
<div id="templatemo_menu">
</div> 
<!-- end of templatemo_menu -->
    
    <div id="templatemo_content_wrapper">
	
		<div id="templatemo_content">
        
        	﻿<html>
<style type="text/css">
.NormalTable {
		color:white;
		font-family:"Tahoma","sans-serif";
		
}
tr:hover {
	background-color: rgba(129,208,177,.3);
}


p.MsoNoSpacing
	{margin-bottom:.0001pt;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	margin-left: 0cm;
	margin-right: 0cm;
	margin-top: 0cm;
}
a:link
	{color:blue;
	text-decoration:underline;
	text-underline:single;
}
.auto-style1 {
	border-width: 0px;
}
.auto-style2 {
	border-style: solid;
	border-width: 1px;
}
#choice{
	padding:20px;
	margin-left:auto;
	margin-right:auto;
	width:850px;
	height:600px;
	background-color:#F0F8FF;
	color:black;
	border:2px inset black;
	padding: 15px 5px 5px 5px;
}
#choice h1{
	font-weight:bold;
	font-color:black;
}

#form{
	padding:20px;
	width:650px;
	height:500px;
	border:2px solid red;
	text-align:center;
	margin:0 auto;
}
</style>
<div class=Section1 style="padding-left:50px;"align="center">
  
  <div id="choice">
	<h1>Choice Filling</h1>
    <div id="form">

<form method="post" action ="newchoicefunction.php">
<?php
    /*! \fn strcmp($methodname,"fill choice")
    \param methodname
    \param "fill choice"
    \brief to compare two string
    */
if(!strcmp($methodname,"fill choice"))
{
     if(!$choicestatus['choice_status'] == 'submit')
    {
    $insobj = new institute();
    $result = $insobj-> getAllInstitute(); 
//  $stu = new student();
?>
 <br><br><h6 style="color:black;">First Choice</h6>
<select name="firstchoice"  align="center" style="height:30px;width:200px;" required>
<?php 
//$result = $stu->getStudentDetails($rollno);
        ?> <option selected value=""> ------ select an Institute ------</option> <?php
        /*! while loop to fetch all data from array */
while($row = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row['name']; ?> </option> <?php
   }
?>
</select><br>
   <br> <h6 style="color:black;">Second Choice</h6>
<select name="secondchoice" align="center" style="height:30px;width:200px;">

<?php 
/*! A instutute class object for fetching all institute */
$result = $insobj-> getAllInstitute(); 
        ?> <option selected value="">------ select an Institute ------ </option> <?php
        /*! while loop to fetch all data from array */
while($row = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row['name']; ?> </option> <?php
   }
?>
</select><br>
   <br> <h6 style="color:black;">Third Choice</h6>
<select name="thirdchoice" align="center" style="height:30px;width:200px;">

<?php 
/*! A instutute class object for fetching all institute */
$result = $insobj-> getAllInstitute(); 
    ?> <option selected value="">------ select an Institute ------  </option> <?php
        /*! while loop to fetch all data from array */
while($row = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row['name']; ?> </option> <?php
   }
?>
</select><br>
   <br> <h6 style="color:black;">Fourth Choice</h6>
<select name="fourthchoice" align="center" style="height:30px;width:200px;">

<?php 
        /*! A instutute class object for fetching all institute */
$result = $insobj-> getAllInstitute(); 
 ?> <option selected value="">------ select an Institute ------ </option> <?php
        /*! while loop to fetch all data from array */
while($row = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row['name']; ?> </option> <?php
   }
?>
</select><br>
  <br>   <h6 style="color:black;">Fifth Choice</h6>
<select name="fifthchoice" align="center" style="height:30px;width:200px;">

<?php 
        
        /*! A instutute class object for fetching all institute */
$result = $insobj-> getAllInstitute(); 
 ?> <option selected value="">------ select an Institute ------ </option> <?php 
        /*! while loop to fetch all data from array */
while($row = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row['name']; ?> </option> <?php
   }
    
     ?>
    </select><br>
<br><input type="submit" value="submit" name="submit">  
</form>
    <?php
        
    
}
    else
    {
         echo "<script>alert(\"Sorry you already fill your choice .You can only edit your choice\");
					window.location=\"$choiceredirect\";
					</script>";
        
    }
}
    ?>
    <br>
 <?php
         /*! \fn strcmp($methodname,"fill choice")
    \param methodname
    \param "edit choice"
    \brief to compare two string
    */
if(!strcmp($methodname,"edit choice"))
{
    ?>
    <form method="post" action ="choicefunction.php">
    <?php
    if($choicestatus['choice_status'] == 'submit')
    {
    echo "edit choice here";
    $sql = "select * from choicefilling where rollno = '$rollno' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    
   $insobj = new institute();
//  $stu = new student();
?>
<form method="post" action ="choicefunction.php">
  <h6 style="color:black;">First Choice</h6>
<select name="firstchoice" align="center" style="height:30px;width:200px;">
<?php 
//$result = $stu->getStudentDetails($rollno);
    /*! \fn strcmp("",$row['firstchoice'])
    \param ""
    \param $row['firstchoice']
    \brief to compare two string
    */
        if(strcmp("",$row['firstchoice']) == 0)
        {
    ?> <option selected value="">------ select an Institute ------</option> <?php
        }
        else
        {
       ?> <option> <?php echo $row['firstchoice']; ?></option> <?php
        }
        /*! A instutute class object for fetching all institute */
    $result = $insobj-> getAllInstitute();
        /*! while loop to fetch all data from array */
    while($row1 = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row1['name']; ?> </option> <?php
   }
?>
</select><br>
   <br>  <h6 style="color:black;">Second Choice</h6>
<select name="secondchoice" align="center" style="height:30px;width:200px;">

<?php 
        /*! \fn strcmp("",$row['secondchoice'])
    \param ""
    \param $row['secondchoice']
    \brief to compare two string
    */
    
       if(strcmp("",$row['secondchoice']) == 0)
        {
    ?> <option selected value="">------ select an Institute ------ </option> <?php
        }
        else
        {
       ?> <option> <?php echo $row['secondchoice']; ?></option> <?php
        }
        /*! \fn getAllInstitute() 
        \brief A instutute class object for fetching all institute 
        */
$result = $insobj-> getAllInstitute(); 

while($row1 = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row1['name']; ?> </option> <?php
   }
?>
</select>
 <br> <br>   <h6 style="color:black;">Third Choice</h6>
<select name="thirdchoice" align="center" style="height:30px;width:200px;">

<?php 
         /*! \fn strcmp("",$row['thirdchoice'])
    \param ""
    \param $row['thirdchoice']
    \brief to compare two string
    */
    
       if(strcmp("",$row['thirdchoice']) == 0)
        {
    ?> <option selected value="">------ select an Institute ------ </option> <?php
        }
        else
        {
       ?> <option> <?php echo $row['thirdchoice']; ?></option> <?php
        }
        /*! \fn  getAllInstitute() 
        \brief A instutute class object for fetching all institute 
        */
$result = $insobj-> getAllInstitute(); 
    /*! while loop to fetch all data from array */
while($row1 = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row1['name']; ?> </option> <?php
   }
?>
</select><br>
 <br>    <h6 style="color:black;">Fourth Choice</h6>
<select name="fourthchoice" align="center" style="height:30px;width:200px;">

<?php  
        
         /*! \fn strcmp("",$row['fourthchoice'])
    \param ""
    \param $row['fourthchoice']
    \brief to compare two string
    */
      if(strcmp("",$row['fourthchoice']) == 0)
        {
    ?> <option selected value=""> ------ select an Institute ------ </option> <?php
        }
        else
        {
       ?> <option> <?php echo $row['fourthchoice']; ?></option> <?php
        }
        /*! \fn getAllInstitute()
        \brief  A instutute class object for fetching all institute 
        */
$result = $insobj-> getAllInstitute(); 
    /*! while loop 
    \brief to fetch all data from array 
    */
while($row1 = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row1['name']; ?> </option> <?php
   }
?>
</select><br>
<br>     <h6 style="color:black;">Fifth Choice</h6>
<select name="fifthchoice" align="center" style="height:30px;width:200px;">

<?php 
         /*! \fn strcmp("",$row['fifthchoice'])
    \param ""
    \param $row['fifthchoice']
    \brief to compare two string
    */
      if(strcmp("",$row['fifthchoice']) == 0)
        {
    ?> <option selected value="">------ select an Institute ------ </option> <?php
        }
        else
        {
       ?> <option> <?php echo $row['fifthchoice']; ?></option> <?php
        }
        /*! \fn getAllInstitute()
        \brief  A instutute class object for fetching all institute 
        */
$result = $insobj-> getAllInstitute(); 
    /*! while loop 
    \brief to fetch all data from array 
    */
while($row1 = mysqli_fetch_assoc($result))
   {
       ?> <option> <?php
          echo $row1['name']; ?> </option> <?php
   }
    
        ?>
    </select><br>
<br>
<input type="submit" value="update" name="submit">
<input type="submit" value="lock" name="submit">
    
</form>
    <?php
        
}
    else
    {
         echo "<script>alert(\"first fill your choices\");
					window.location=\"$choiceredirect\";
					</script>";
    }
}
    ?>
        
        
    </div>
</div>


	


<br /><br />
</div>
<br />

</html>
            
    	</div> <!-- end of templatemo_content -->
    
		<div id="templatemo_sidebar">
	
	
	
	<div class="cleaner"></div>
</div> <!-- end of sidebar -->
            
        <div class="cleaner">
      
        
        </div>
		
    </div> <!-- end of templatemo_content_wrapper -->
    
   <div id="templatemo_footer" align="center">

<table>
						<tr>
							<td><img src = "images/au.png" height = "50px" width = "70px"></td>
							<td><img src = "images/sa.svg" height = "50px" width = "70px"></td>
							<td><img src = "images/west.png" height = "50px" width = "70px"></td>
							<td><img src = "images/lk.png" height = "50px" width = "70px"></td>
							<td><img src = "images/6.jpg" height = "50px" width = "70px"></td>
							<td><img src = "images/rusia.jpg" height = "50px" width = "70px"></td>
							<td><img src = "images/afg.png" height = "50px" width = "70px"></td>
							<td><img src = "images/bhu.png" height = "50px" width = "70px"></td>
							<td><img src = "images/ger.png" height = "50px" width = "70px"></td>
							<td><img src = "images/ban.png" height = "50px" width = "70px"></td>
							<td><img src = "images/mal.png" height = "50px" width = "70px"></td>
						</tr>
					</table>
</div> <!-- end of templatemo_footer -->
<div align="center">Copyright by<strong> NIT CALICUT</strong>  @2017</div>

</div> <!-- end of wrapper -->

</body>
</html>