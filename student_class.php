<?php
/*! \class student */
class student
 {
     /*! 
     \var $name
     \brief for storing student name
     */
   public $name;
     /*! 
     \var  $rollno
     \brief for storing student  rollno
     */
   public $rollno;
     /*! 
     \var $rank
     \brief for storing student rank
     */
   public $rank;
     /*! 
     \var $address
     \brief for storing student address
     */
   public $address;
     /*! 
     \var $choicestatus
     \brief for storing student choicestatus
     */
   public $choicestatus;
     /*! 
     \var admissionstatus
     \brief for storing student admissionstatus
     */
   public $admissionstatus;
     /*! 
     \var allotmentStatus
     \brief for storing student allotmentStatus
     */
   public $allotmentStatus;
     /*! 
     \var connect
     \brief for storing student connect
     */
   public $connect;

     /**
       * A constructor.
       \brief for create connection b/w php and database
       */
  public function __construct()
    {
/*! \var servername 
\brief for stroing servername for establishment connection */ 
$servername = "localhost"; 
/*! \var username 
\brief for stroing username for establishment connection 
*/ 
$username = "id1120660_csas"; 
/*! \var password 
\brief for stroing password for establishment connection 
*/ 
$password = "csas@nitc"; 
/*! \var database 
\brief for stroing database for establishment connection 
*/ 
$database = "id1120660_csas"; 
        /*! 
             \fn mysqli_connect()
             \param servername
             \param username
             \param password
             \param databse 
         */
      $this->connect = mysqli_connect($servername,$username,$password,$database);
      if(!$this->connect)
        die("unable to connect".mysqli_connect_error($this->connect));
    }
             /*! 
             \fn getStudentDetails($rollno)
             \param $rollno
             \brief for getting student detail of given roll no in parameter 
              */
   public function getStudentDetails($rollno)
    {
         $sql = "select * from student where rollno ='$rollno'";
        /*! \fn mysqli_query($this->connect,$sql)
         \param $this->connect
          \param $sql
         \brief for running sql query
         */
         $result = mysqli_query($this->connect,$sql);
         return $result;
    }
     
             /*! 
             \fn getchoicestatus($rollno)
             \param $rollno
             \brief for getting chocie status of student of given roll no in parameter 
              */
  public function getchoicestatus($rollno)
  {
      $sql = "select * from student where rollno = '$rollno'";
      $result = mysqli_query($this->connect,$sql);
      return $result;
  }

             /*! 
             \fn updatechoicestatus($rollno,$status)
             \param $rollno
             \param $status
             \brief for updating chocie status of student of given roll no in parameter and chocie status be $status in parameter 
              */ 
  public function updatechoicestatus($rollno,$status)
  {
      $sql = "update student set choice_status = '$status' where rollno ='$rollno'";
      /*! \fn mysqli_query($this->connect,$sql)
         \param $this->connect
          \param $sql
         \brief for running sql query
         */
      $result = mysqli_query($this->connect,$sql);
      
      if($result)
               {
                  //  echo "choice status change ";
               }  
     else
          echo "not change ";
          
  }


  //Added By fahad
   /*! 
             \fn  getstud_detail($rank)
             \param $rank
             \brief for getting student details of given rank in parameter 
              */ 
  public function getstud_detail($rank)
  {
    $sql ="select * from student where rank='$rank'";
    /*! \fn mysqli_query($this->connect,$sql)
         \param $this->connect
          \param $sql
         \brief for running sql query
         */
      $result=mysqli_query($this->connect,$sql);
    /*! 
    \var $row
    \brief of type array 
    */
    $row=array();
      /*! \fn mysqli_fetch_assoc($result)
    \param $result
    \brief fetching all details for parameter $result
    */
    $row=mysqli_fetch_assoc($result);
    return $row;
  }

     /*! 
             \fn updateAllotmentStatus($roll)
             \param $roll
             \brief for updating student allotment status details of given rollno in parameter 
              */ 
  public function updateAllotmentStatus($roll)
  {
    $allot="alloted";
    $sql = "update student set allotment_status='$allot' where rollno='$roll'";
      /*! \fn mysqli_query($this->connect,$sql)
         \param $this->connect
          \param $sql
         \brief for running sql query
         */
    $r=mysqli_query($this->connect,$sql);
  }
public function setNULL_second_round($roll)
{
     $allot="alloted";
    $sql = "update student set admission_status=NULL where rollno='$roll'";
    /*! \fn mysqli_query($this->connect,$sql)
         \param $this->connect
          \param $sql
         \brief for running sql query
         */
    $r=mysqli_query($this->connect,$sql);
}

  public function update_third_round_admission_status($roll)
  {
    $sql="update student set admission_status='confirm' where rollno='$roll'";
      /*! \fn mysqli_query($this->connect,$sql)
         \param $this->connect
          \param $sql
         \brief for running sql query
         */
    $res=mysqli_query($this->connect,$sql);
  }
public function rejectStudent($roll)
  {
    $sql="update student set choice_status=NULL,allotment_status='rejected' where rollno='$roll'";
      /*! \fn mysqli_query($this->connect,$sql)
         \param $this->connect
          \param $sql
         \brief for running sql query
         */
    $res=mysqli_query($this->connect,$sql);
  }

//Added by mushahid

      /*! 
             \fn updateAdmissionStatus($roll,$method)
             \param $method
             \param $roll
             \brief for updating student admission status details of given rollno in parameter 
              */ 

public function updateAdmissionStatus($roll,$method)
{

    /*! \var alloted
    \brief for storing string 'alloted'
    */
    $alloted='alloted';
    /*! \var upgrade
    \brief for storing string 'upgrade'
    */
    $upgrade = 'upgrade';
    /*! \var $confirm
    \brief for storing string 'confirm'
    */
    $confirm = 'confirm';
      $sql = "select * from student where rollno ='$roll' and allotment_status='$alloted'";
    /*! \fn mysqli_query($this->connect,$sql)
         \param $this->connect
          \param $sql
         \brief for running sql query
         */
      $result = mysqli_query($this->connect,$sql);
   /*! \fn mysqli_fetch_assoc($result)
    \param $result
    \brief fetching all details for parameter $result
    */
  while($rowdata= mysqli_fetch_assoc($result))
  {
      /*! 
      \var $allot
      \brief for storing allotment status of student
      */
    $allot= $rowdata['allotment_status']; 
      /*! 
      \var $admission
      \brief for storing admission status of student
      */
    $admission= $rowdata['admission_status'];

      /*! \fn strcmp($admission,"")
       \param$admission and "" empty string
       \brief for comparing admissin and with empty  value 
       */
      if(!strcmp($admission,""))
      {
          /*! \fn strcmp($method,$update)
          \param method and update
         \brief for comparing method with update sting  
          */

          if(!strcmp($method,$upgrade))
              {
                   /*! \var round_number 
                   \brief for storing round number 
                   */
              $round_number=1; 
              $sql1 = "insert into allotment values(now(),now(),'$round_number','$roll')";
              $result1 = mysqli_query($this->connect,$sql1);
              $sql = "update student set admission_status = '$upgrade' where rollno = '$roll' and allotment_status='alloted'";
              $result = mysqli_query($this->connect,$sql);
     
               echo " <script> alert('Your addmission status has upgraded....!!!');
                window.location = ('admissiondetail.php');</script>";
          
              }
            else
            {
              $sql = "update student set admission_status = '$confirm'  where rollno = '$roll' and allotment_status='alloted'";
              $result = mysqli_query($this->connect,$sql);
               echo " <script> alert('Your admission status has confirm...!!!');
              window.location = ('admissiondetail.php');</script>";
            
          }
       }
    }    
}

     
     /*! 
             \fn getAdmissionStudentDetails($rollno)
             \param $roll
             \brief for getting student allotment status details of given rollno in parameter 
              */ 
     
public function getAdmissionStudentDetails($rollno)
    {

     $reject="rejected";
       $sql = "select * from student where rollno ='$rollno'";
      $result = mysqli_query($this->connect,$sql);
   
       while($rowdata= mysqli_fetch_assoc($result))
        {
           $alloted= $rowdata['allotment_status'];
        }
      if(!strcmp($alloted,""))
      {
         echo " <script> alert(' You have no seat Alloted.......!!!!!');
                window.location = ('admissiondetail.php');</script>";
      }
      if(!strcmp($alloted,$reject))
      {
        echo " <script> alert('Your Seat have been Rejected.......!!!!!');
                window.location = ('admissiondetail.php');</script>";
     }
      else
      {
         $sql = "select * from student where rollno ='$rollno' and allotment_status='alloted'";
         $result = mysqli_query($this->connect,$sql);
         return $result;
    }
  }

 /*! 
             \fn getStudentCheck($roll)
             \param $roll
             \brief for checking student student details of given rollno in parameter 
              */ 

    public function getStudentCheck($roll)
      {

        // echo $roll;
           $sql="select * from student where rollno='$roll'";
           $result= mysqli_query($this->connect,$sql);
         
           if(mysqli_num_rows($result)==1)
           {
             return true;
           }
           else
           {
             return false;
           }

      }
}
?>