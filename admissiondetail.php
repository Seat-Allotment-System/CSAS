<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSAS</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

</head>

<body bgcolor="white">

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
 <!-- end of templatemo_header -->
<div id="templatemo_menu">
    <ul>
        <li><a href="admissiondetail.php" 
                    class="current first" >Admin Panel</a></li>
        <li><a href="logs.php">Logout</a></li>
        <li><a href="do_allot.php">First Allotment</a></li>
        <li><a href="allot_round.php">Second Allotment</a></li>
        <li><a href="#">Final Allotment</a></li>
    </ul>
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
    background-color:#F2EAC7;
    width:850px;
    height:600px;
    color:black;
    border:2px inset black;
    padding: 15px 5px 5px 5px;
}

#templatemo_menu
{
width:100%;
height:50px;
margin-top:100px;
}

#templatemo_header
{
float:left;
margin-top:10px;
}
    
    #choice h1{
    font-weight:bold;
    font-color:black;
}

#form{
    width:650px;
    height:400px;
    text-align:center;
    margin:0 auto;
}
</style>

<div class=Section1 style="padding-left:50px;"align="center">
  
  <div id="choice">
  <div>
  </div>
    <h1 align="center">Get Student Information Here.!</h1>
  
<br>    <br>
    <div id="form">

    
   
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" style="font-size:30px;padding:auto;"> 

            <input type="text" name="rollno"
            placeholder="Enter Student Roll no" style="margin-left:0px;font-size:20px;" required="required">&nbsp;&nbsp;&nbsp;
            <input type="submit" name="sub" value="Student Detail" style="margin-left:50px;font-size:20px"> 
           
        </form> 

     
<?php

//php code start for upgrade , confirm the admission status of student

// include classes

    include('student_class.php');
    include('seat_class.php');

// if submit button is click then this php page open for changing the student admission status

    if(isset($_POST['sub']))
    {

//accessing rollno from form

        $roll=$_POST['rollno'];

//creating classes objects
         $stud_obj=new student();
         $seatstu_obj= new seat();

// creating session

        session_start();
        $_SESSION['rollno']=$roll;
    
         $result = $stud_obj->getStudentCheck($roll);   

         if($result==false)
         {
             echo " <script> alert(' Your roll number not exist.......!!!!!');
                window.location = ('admissiondetail.php');</script>";
         }
         else
         {
             

//calling seat class function for accessing student seat details 

        $seatdataresult1= $seatstu_obj->getSeatStatus($roll);
       while($seatdataresult=mysqli_fetch_assoc($seatdataresult1))
       {
// accessing student alloted institute by calling institute class function

        $institute_name = $seatdataresult['institute_name'];
        }

        $result=$stud_obj->getAdmissionStudentDetails($roll);
        
        while($rowdata=mysqli_fetch_assoc($result))
        {          
            if($rowdata['rollno'])
            {
//if rollno exists then shows all student details 
    ?>   <br> <br>
     <fieldset style="width:400px;margin-left:40px;">
            <table style="text-align:left;margin-left:100px;" width="450px" height="200px"  >
                <tr style="font-size:20px">
                <td> Name</td><td><?php echo $rowdata['name'];?></td>
                </tr>
                <tr style="font-size:20px">
                <td>Roll no</td><td><?php echo $rowdata['rollno'];?> </td>
                </tr>
                <tr style="font-size: 20px">
                <td>Rank </td><td><?php echo $rowdata['rank'];?> </td>
                </tr>
                <tr style="font-size: 20px">
                <td>Alloted institute</td><td><?php echo $institute_name;?> </td>
                </tr>
            </table>
</fieldset>
            </br>
</br>
        <form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> style="text-align:center;">


         <button type ="submit" name="submit" value="upgrade" style="margin-left:0px;font-size:20px; width:200px;" >Upgrade</button><br><br>
       
                     <button type ="submit" name="submit" value="confirm" style="margin-left:0px;font-size:20px; width:200px;">Confirm</button>



       
</form>

<br><center>

<!-- generate addmission status pdf -->  

<a href="https://csasallotment.000webhostapp.com/update/csas/admissiondetailpdf.php" target="_blank">
      <button type="submit" name="submit" value="Admission Pdf" style="font-size:20px;width:200px;">Result Pdf</button>
        </a></center>


<?php
        }

    }
}
}

// if admin click on upgrade or confirms button then this line of code execute 

    if(isset($_POST['submit']))
    {

// session start
        session_start();

//accessing rollno of student by session
        $roll=$_SESSION['rollno'];
        $_SESSION['rollno'] = $roll;

//creating student class object
        $stu=new student();
        $method= $_POST['submit'];

//updating student admission status 
        $result1=$stu->updateAdmissionStatus($roll,$method);
    }


?>


       <!-- <a href="http://localhost/CSAS/login_with_google_using_php/logout.php"><button type="submit" value="logout"></button></a> -->
 
        
        
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