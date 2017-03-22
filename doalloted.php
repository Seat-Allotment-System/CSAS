
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSAS</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

</head>

<body bgcolor="skyblue">

<div id="templatemo_wrapper">
    
    <div id="templatemo_header">

    
    
    
 <!-- end of templatemo_header -->
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
    background-color:#F2E4A5;
    color:black;
    border:2px inset black;
    padding: 15px 5px 5px 5px;
}
    #templatemo_menu{

        width:100%;
        height: 50px;
        margin-top: 100px;
    }
    #templatemo_header{

float: left;
margin-top: 10px;
    }
    
    #choice h1{
    font-weight:bold;
    font-color:black;
    
    font-size:30px;
}

#form{
    padding:20px;
    width:650px;
    height:400px;
    opacity:.7; 
    text-align:center;
    margin:0 auto;
}
</style>

<div class=Section1 style="padding-left:50px;"align="center">

  <div id="choice">

    <h1 align="center" >Do Allotment Seat for Student.!</h1>
    
    <div id="form">

   
    
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" style="font-size:30px;padding:auto;"> 
            
          <p>  <input type="submit" name="fra" value="First Round Allotment" style="margin-left:50px;font-size:20px"> </p><br>
        <p>    <input type="submit" name="sra" value="Second Round Allotment" style="margin-left:50px;font-size:20px"></p>
        </form> 



       <!-- <a href="http://localhost/CSAS/login_with_google_using_php/logout.php"><button type="submit" value="logout"></button></a> -->
 
        
        
    </div>
</div>


    


<br /><br />
</div>
<br />


            
        </div> <!-- end of templatemo_content -->
    
        <div id="templatemo_sidebar">
    
    
    
    <div class="cleaner"></div>
</div> <!-- end of sidebar -->
            
        <div class="cleaner">
      
        
        </div>
        
    </div> <!-- end of templatemo_content_wrapper -->
    
   <div id="templatemo_footer" align="center">


    <img src="images/3.gif" style="width:80%;height:80%"/>
<br>
    
</div> <!-- end of templatemo_footer -->
<div align="center">Copyright by<strong> NIT CALICUT</strong>  @2017</div>

</div> <!-- end of wrapper -->

</body>
</html>



<?php

    include('student_class.php');
    include('filledchoices.php');
    include('institute.php');
    include('seat_class.php');
    include('allotment_class.php');
    include('connection.php');


    if(isset($_POST['fra']))
    {

        $now = new DateTime();
        $date = $now->format('y-m-d');
        //echo "<br>date : $date<br/>";
        $lastdate = "2017-03-18";
        

        if(strtotime($date) > strtotime($lastdate))
        {
            $sql="update student set choice_status='lock' where choice_status='submit'";
            $r = mysqli_query($conn,$sql);
            /*if($r)
                echo "<br>done";*/
            $stud_obj = new student();
            $choice_obj = new filledchoice();
            $inst_obj = new institute();
            $seat_obj = new seat();
            $allot_obj = new allotment();


            //Getting student rollno and rank(ascending order) from student table using allotment_class
            $stud_detail = array();
            $stud_detail = $allot_obj->getStudentData();
            /*echo "<pre>";
            print_r($stud_detail);
            echo "</pre>";*/


            //alloting to each student on rank ascending
            foreach($stud_detail as $data)
            {
                $student=array();
                $student = $stud_obj->getstud_detail($data["rank"]);
                /*echo "<br><br><pre>";
                print_r($row);
                echo "</pre>";*/

                if($student["choice_status"]=="lock")
                {
                    $roll=$student["rollno"];
                    $sql="select * from choicefilling where rollno='$roll'";
                    $result = mysqli_query($conn,$sql);
                    $choice = array();
                    $choice = mysqli_fetch_assoc($result);
                    $choice_result = array($choice["firstchoice"],$choice["secondchoice"],$choice["thirdchoice"],$choice["fourthchoice"],$choice["fifthchoice"]);
                    
                    //alloting institute to student
                    for($i=0;$i<count($choice_result);$i++)
                    {
                        if($inst_obj->isVacant($choice_result[$i]))
                        {
                            $seat_obj->allot_seat($choice_result[$i],$roll);
                            $inst_obj->updateVacantSeat($choice_result[$i]);
                            $stud_obj->updateAllotmentStatus($roll);
                        echo "<br>breaking point :".$i."<br>";
                            break;
                        }

                    }
                }

            }
        }
        else
            echo "<br>Allotment date is has not come.";
    }
    if(isset($_POST['sra']))
    {
        $now = new DateTime();
    $date = $now->format('y-m-d');
    //echo "<br>date : $date<br/>";
    $lastdate = "2017-03-19";

    if(strtotime($date) > strtotime($lastdate))
    {
        $stud_obj = new student();
        $choice_obj = new filledchoice();
        $inst_obj = new institute();
        $seat_obj = new seat();
        $allot_obj = new allotment();


        //Getting student rollno and rank(ascending order) from student table using allotment_class
        $stud_detail = array();
        $stud_detail = $allot_obj->getStudentData();


        //Deleting seat of those student who have not reported
        foreach($stud_detail as $tmp)
        {
            $stu = array();
            $stu = $stud_obj->getstud_detail($tmp["rank"]);
            $rl = $stu["rollno"];
            if($stu["choice_status"]=="lock" and $stu["allotment_status"]=="alloted" and $stu["admission_status"]=="")
            {
                $in = $seat_obj->delete_seat($rl);
                $inst_obj->addVacantSeat($in);
                $stud_obj->rejectStudent($rl);
            }   
        }





        //alloting to each student on rank ascending 2nd rank allotment
        foreach($stud_detail as $data)
        {
            $student=array();
            
            $student = $stud_obj->getstud_detail($data["rank"]);

            if($student["choice_status"]=="lock")
            {
                
                if($student["admission_status"]=="" || $student["admission_status"]=="upgrade")
                {

                    $roll=$student["rollno"];

                    if($student["admission_status"]=="upgrade")
                    {
                        $in = $seat_obj->delete_seat($roll);
                        $inst_obj->addVacantSeat($in);
                    }

                    $sql="select * from choicefilling where rollno='$roll'";
                    $result = mysqli_query($conn,$sql);
                    $choice = array();
                    $choice = mysqli_fetch_assoc($result);
                    $choice_result = array($choice["firstchoice"],$choice["secondchoice"],$choice["thirdchoice"],$choice["fourthchoice"],$choice["fifthchoice"]);
            
                    //alloting institute to student
                    for($i=0;$i<count($choice_result);$i++)
                    {
                        if($inst_obj->isVacant($choice_result[$i]))
                        {
                            $seat_obj->allot_seat($choice_result[$i],$roll);
                            $inst_obj->updateVacantSeat($choice_result[$i]);
                            $stud_obj->updateAllotmentStatus($roll);
                        //echo "<br>breaking point :".$i."<br>";
                            break;
                        }

                    }

                }
                else
                {

                }
            }
            else
                echo "choice not locked";
        }
    }
    }

?>