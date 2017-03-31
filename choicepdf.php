<?php
/*! \file fpdf.php 
\brief used for generating pdf 
*/
include('fpdf.php');
/*! \file student_class.php 
\brief for accessing student class fuctions
*/
include('student_class.php');
/*! \fn session_start() 
\brief for starting session 
*/
session_start();

 /*! \var firstchoice 
 \brief for stroing firstchoice entered from student accessing from session 
 */ 
$firstchoice = $_SESSION['firstchoice'];
 /*! \var secondchoice 
 \brief for stroing secondchoice entered from student accessing from session 
 */ 
$secondchoice = $_SESSION['secondchoice'];
 /*! \var thirdchoice 
 \brief for stroing thirdchoice entered from student accessing from session 
 */ 
$thirdchoice  =  $_SESSION['thirdchoice'];
 /*! \var fourthchoice 
 \brief for stroing fourthchoice entered from student accessing from session 
 */ 
$fourthchoice  =  $_SESSION['fourthchoice'];
 /*! \var fifthchoice 
 \brief for stroing fifthchoice entered from student accessing from session 
 */ 
$fifthchoice  =  $_SESSION['fifthchoice'];
$rollno = $_SESSION['rollno'];

/*! \class class student 
\brief object declaration
*/
$stu = new student();
/*! \fn getStudentDetails($rollno)
\param rollno
\brief for storingstudent roll no
*/
$result = $stu->getStudentDetails($rollno);
/*! \fn mysqli_fetch_assoc($result)
\param result
\brief for storing student result details on given roll number in parameter
*/
$studetails = mysqli_fetch_assoc($result);
/*! \var studentname 
\brief for stroing studentname accessing student name from database 
*/ 
$studentname = $studetails['name'];
/*! \var studentrank 
\brief for stroing studentrank accessing studentrank from database 
*/ 
$studentrank = $studetails['rank'];
/*! \var studentemail 
\brief for stroing studentemail accessing studentemail from database 
*/ 
$studentemail = $studetails['email'];

/*! \class class FPDF 
\brief object declaration
*/
$pdfobj = new FPDF();
/*! \fn AddPage() 
\brief for adding page in pdf
*/
$pdfobj->AddPage();
/*! \fn SetFont("Arial","B",12) 
\brief Setting fornt of line 
*/
$pdfobj->SetFont("Arial","B",12);
/*! \fn Cell(0,10,"NATIONAL INSTITIUTE OF TECHNOLOGY",0,1,'C') 
\brief Entering data and parameter 
*/
$pdfobj->Cell(0,10,"NATIONAL INSTITIUTE OF TECHNOLOGY",0,1,'C');

$pdfobj->Cell(50,10,"",0,1,'C');
/*! \fn SetFont("Arial","B",12) 
\brief Setting fornt of line 
*/
$pdfobj->SetFont("Arial","B",9);

/*! \fn Cell(0,10,"Name                              $name ",0,1,'C') 
\brief Entering data and parameter 
*/
$pdfobj->Cell(0,10,"Name                           $studentname",0,1,'C');
/*! \fn Cell(0,10,"Roll No                              $rollno ",0,1,'C')
\brief Entering data and parameter 
*/
$pdfobj->Cell(0,10,"Roll No                             $rollno",0,1,'C');
/*! \fn Cell(0,10,"Rank                              $rank ",0,1,'C')
\brief Entering data and parameter 
*/
$pdfobj->Cell(0,10,"Rank                            $studentrank",0,1,'C');
//$pdfobj->Cell(00,10,"Email                             $studentemail",0,1,'C');

//$pdfobj->Cell(50,10,"Roll No : ",0,0,'C');
//$pdfobj->Cell(50,10,"$rollno",0,1,'C');

/*! \fn strcmp($firstchoice,"") 
\param firstchoice and "" empty string 
\brief for comparing entered $firstchoice and emty string 
*/

if(strcmp($firstchoice,""))
{
$pdfobj->Cell(0,10,"First Choice                           $firstchoice ",0,1,'C');
//$pdfobj->Cell(50,10,"First Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$firstchoice",0,1,'C');
}

/*! \fn strcmp($secondchoice,"") 
\param secondchoice and "" empty string 
\brief for comparing entered $secondchoice and empty string 
*/

if(strcmp($secondchoice,""))
{
$pdfobj->Cell(0,10,"Second Choice                             $secondchoice",0,1,'C');
//$pdfobj->Cell(50,10,"Second Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$secondchoice",0,1,'C');
}

/*! \fn strcmp($thirdchoice,"") 
\param thirdchoice and "" empty string 
\brief for comparing entered $thirdchoice and empty string 
*/

if(strcmp($thirdchoice,""))
{
$pdfobj->Cell(0,10,"Third Choice                            $thirdchoice ",0,1,'C');
//$pdfobj->Cell(50,10,"Third Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$thirdchoice",0,1,'C');
}

/*! \fn strcmp($fourthchoice,"") 
\param fourthchoice and "" empty string 
\brief for comparing entered $fourthchoice and empty string 
*/

if(strcmp($fourthchoice,""))
{
$pdfobj->Cell(0,10,"Fourth Choice                           $fourthchoice ",0,1,'C');
//$pdfobj->Cell(50,10,"Fourth Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$fourthchoice",0,1,'C');
}

/*! \fn strcmp($fifthchoice,"") 
\param fifthchoice and "" empty string 
\brief for comparing entered $fifthchoice and empty string 
*/

if(strcmp($fifthchoice,""))
{
$pdfobj->Cell(0,10,"Fifth Choice                            $fifthchoice",0,1,'C');
//$pdfobj->Cell(50,10,"Fifth Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$fifthchoice",0,1,'C');
}

/*! \fn Cell(0,10,"",0,1,'C')
\param Cell(float w , float h , string txt , mixed border , string align) 
* @param W width
* @param h height
* @param txt text
* @param border border to string 
* @param align align of text
*/

$pdfobj->Cell(0,10,"",0,1,'C');
$pdfobj->Cell(0,10,"The candidates need to download the rank cards from the website. Candidates 
who  got  a rank  can  login  and  fill  the  choices ",0,1,'C');


$pdfobj->Cell(0,10,"of  participating  institutes  in  their  order  of  preference between date as par given in important dates. They can also modify their ",0,1,'C');


$pdfobj->Cell(0,10,"choices (or) reorder them any number of 
times before locking. It will not be possible to access their choices after locking. All the ",0,1,'C');

$pdfobj->Cell(0,10,"candidates  must have  to  lock  their  choices  on  or  before  according teh date provided in important dates.  The  choices  of  all  ",0,1,'C');

$pdfobj->Cell(0,10,"candidates  will  be automatically  locked by the server of  NIMCET-2017 after5 p.m. on 14-06-2017.",0,1,'C');

$pdfobj->output(); 

?>