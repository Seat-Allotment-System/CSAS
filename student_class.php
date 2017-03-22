<?php
class student
 {
   public $name;
   public $rollno;
   public $rank;
   public $address;
   public $choicestatus;
   public $admissionstatus;
   public $allotmentStatus;
   public $connect;

  public function __construct()
    {
          $servername = "localhost";
      $username = "id1120660_csas";
      $password = "csas@nitc";
      $database = "id1120660_csas";

      $this->connect = mysqli_connect($servername,$username,$password,$database);
      if(!$this->connect)
        die("unable to connect".mysqli_connect_error($this->connect));
    }

   public function getStudentDetails($rollno)
    {
         $sql = "select * from student where rollno ='$rollno'";
         $result = mysqli_query($this->connect,$sql);
         return $result;
    }
     
     
  public function getchoicestatus($rollno)
  {
      $sql = "select * from student where rollno = '$rollno'";
      $result = mysqli_query($this->connect,$sql);
      return $result;
  }

       
  public function updatechoicestatus($rollno,$status)
  {
      $sql = "update student set choice_status = '$status' where rollno ='$rollno'";
      $result = mysqli_query($this->connect,$sql);
      
      if($result)
          echo "choice status change ";
      else
          echo "not change ";
          
  }


  //Added By fahad

  public function getstud_detail($rank)
  {
    $sql ="select * from student where rank='$rank'";
    $result=mysqli_query($this->connect,$sql);
    $row=array();
    $row=mysqli_fetch_assoc($result);
    return $row;
  }

  public function updateAllotmentStatus($roll)
  {
    $allot="alloted";
    $sql = "update student set allotment_status='$allot' where rollno='$roll'";
    $r=mysqli_query($this->connect,$sql);
  }

public function rejectStudent($roll)
  {
    $sql="update student set choice_status=NULL where rollno='$roll'";
    $res=mysqli_query($this->connect,$sql);
  }

//Added by mushahid

public function updateAdmissionStatus($roll,$method)
{

    $alloted='alloted';
    $upgrade = 'upgrade';
    $confirm = 'confirm';
      $sql = "select * from student where rollno ='$roll' and allotment_status='$alloted'";
      $result = mysqli_query($this->connect,$sql);
   
  while($rowdata= mysqli_fetch_assoc($result))
  {
    $allot= $rowdata['allotment_status'];
    $admission= $rowdata['admission_status'];

      if(!strcmp($admission,""))
      {

          if(!strcmp($method,$upgrade))
              {
      

             $sql = "update student set admission_status = '$upgrade' where rollno = '$roll'            and allotment_status='alloted'";
              $result = mysqli_query($this->connect,$sql);
   /*
               $upgradesql = "select * from seat where rollno = '$roll'"; 
               $upgraderesult = mysqli_query($this->connect, $upgradesql);
               $updaterow = mysqli_fetch_assoc($upgraderesult);
               $insname= $updaterow['institute_name'];
         $updateinstitute = "update institute set vacant_seat = vacant_seat + 1 where name = 'insname'";
                   if(mysqli_query($this->connect, $updateinstitute))
                      echo "updated";
   
               $deletestu = "delete from seat where rollno = '$roll'"; 
               if(mysqli_query($this->connect, $deletestu))
                echo "deleted";     */


              echo " <script> alert('your addmission status Fisrt Round upgraded');
                window.location = ('admissiondetail.php');</script>"; 
          
              }
            else
            {
              $sql = "update student set admission_status = '$confirm'  where rollno = '$roll' and allotment_status='alloted'";
              $result = mysqli_query($this->connect,$sql);
               echo " <script> alert('Your Admission status Fisrt Round Confirm');
              window.location = ('admissiondetail.php');</script>";
            
          }
        }
        else
        {
            if(!strcmp($admission,$upgrade))
            {

              if(!strcmp($admission,$method))
              {

                echo " <script> alert(' In Second Round Admission Status Upgraded....!!!');
                window.location = ('admissiondetail.php');</script>";
          
              }
              else
              {


                $sql = "update student set admission_status = '$method' where rollno = '$roll'";
                $result = mysqli_query($this->connect,$sql);
     
                echo " <script> alert(' In Second Round Admission Status Upgraded.....!!');
                window.location = ('admissiondetail.php');</script>";
              }

           }
           else 
           {
 
              echo " <script> alert(' Your Admission status have been Confirm');
                window.location = ('admissiondetail.php');</script>";


           }
       }

    }
  

}

public function getAdmissionStudentDetails($rollno)
    {

      
       $sql = "select * from student where rollno ='$rollno'";
      $result = mysqli_query($this->connect,$sql);
   
       while($rowdata= mysqli_fetch_assoc($result))
        {
          $alloted= $rowdata['allotment_status'];
        }
      if(!strcmp($alloted,""))
      {
         echo " <script> alert(' You have not   Seat Alloted.......!!!!!');
                window.location = ('admissiondetail.php');</script>";
      }
      else
      {
         $sql = "select * from student where rollno ='$rollno' and allotment_status='alloted'";
         $result = mysqli_query($this->connect,$sql);
         return $result;
    }
  }

}


/*
$obj=new student();
$obj->updateAllotmentStatus(105);

$a= array();

$a=$obj->getstud_detail(1);
print_r($a);  


echo "<br>".$a['rollno']."<br>".$a['rank'];*/

?>