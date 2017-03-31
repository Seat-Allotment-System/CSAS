<?php

// including classes
/*! \file choicefilling_class.php 
\brief for accessing choicefilling class function
*/
include ('./choicefilling_class.php');
/*! \file student_class.php 
\brief for accessing student class function
*/
include ('./student_class.php');
/*! \file indsitute.php 
\brief for accessing institute class functions 
*/
include ('./institute.php');

/* variable declaration */
/*! \var submit 
\brief for stroing submit string 
*/ 
$submit='submit';
/*! \var firstchoice 
\brief for stroing edit string  
*/ 
$edit='edit';
/*! \var edit 
\brief for stroing lock string 
*/ 
$lock='lock';
/*! \var lock 
\brief for stroing update string
*/ 
$update = 'update';
/*! \var method 
\brief for stroing submit button value recieved from form 
*/ 
$method = $_POST['submit'];

/* Session Start */
/*! \fn session_start() */
session_start();
/*! \var rollno 
\brief for stroing rollno accessing from session 
*/ 
$rollno =$_SESSION['rollno'];
$_SESSION['rollno'] = $rollno;
/*! \var redirect 
\brief for stroing chocie page url accessing from session 
*/ 
$redirect = $_SESSION['choiceredirect'];

//accessing student choice filling data from form 
     $firstchoice = $_POST['firstchoice'];
     $secondchoice = $_POST['secondchoice'];
     $thirdchoice = $_POST['thirdchoice'];
     $fourthchoice = $_POST['fourthchoice'];
     $fifthchoice = $_POST['fifthchoice'];
     $choiceredirect = $_SESSION['choiceredirect'];

//making array of choice filled by student
/*! \array choicearray for storing all entered chocie from student */
     $choicearray = array ($firstchoice,$secondchoice,$thirdchoice,$fourthchoice,$fifthchoice);

//object creation   
/*! class choice object*/
  $obj = new choice();
/*! \class stduent object*/
     $stu = new student();
/*! \class institute object*/
     $ins = new institute();

//check for method is its submit or upgrade or lock

/*! \fn strcmp($method,$submit))
\param $method 
\param $submit
\brief for comparing entered $method and submit value 
*/
if(!strcmp($method,$submit))
   {
    // echo"submit function";

//geting all institute details
       /*! class institute object calling
       \fn getAllInstitute()
       \brief for getting all function 
       */
       $result = $ins->getAllInstitute();
           while( $row = mysqli_fetch_assoc($result))
            {
                  $count=0; /*! \var count for storing no of iteration */ 
                  $insname = $row['name']; /*! \var insname for storing insname accessing from class*/ 
                  $j=0;
                               while($j<5)
                               {
      //                            echo "comaprision b/w : ".$insname."    ".$choicearray[$j]."<br>";

//string comparision b/w inserted institute or institutes in institute class  
/*! \fn strcmp($choicearray[$j],$insname)
\param choicearray[$j] 
\param insname
\brief for comparing choice arry institutename with institute name  
*/
if(strcmp($choicearray[$j],$insname) == 0)
                                    {
                                
                                            $count++;
                                    }
                                   
//if institute comes more then one time
                                   if($count>=2)
                                   {
        //                                echo "more then one time";
                                        break;
                                   }
                                      
                                   $j++;
                                }
                if($count >= 2)
                    break;
                
            }
       
       if($count>=2)
       {
         echo "<script>alert(\"Please fill different choices \");
					window.location=\"$redirect\";
					</script>"; 
       }
       else
       {
        /*! \class choice 
        \fn fillchoice($rollno,$firstchoice,$secondchoice,$thirdchoice,$fourthchoice,$fifthchoice)
        * @param $rollno
        * @param $firstchoice
        * @param $secondchoice
        * @param $thirdchoice
        * @param $fourthchoice
        * @param $fifthchoice
        \brief for storing all entered choice of student 
        */
        $obj->fillchoice($rollno,$firstchoice,$secondchoice,$thirdchoice,$fourthchoice,$fifthchoice);
         /*! class choice 
        \fn printChoiceFilling($rollno)
        \param rollno
        \brief for printing all student details 
        */
        $obj->printChoiceFilling($rollno);
        /*! \class choice 
        \fn updatechoicestatus($rollno,$method)
        \param rollno
        \param method
        \brief for updating all chocies enterd by student details 
      \brief */
        $stu->updatechoicestatus($rollno,$method);
        echo "<script>alert(\"Successfully Submitted\");
					window.location=\"$redirect\";
					</script>"; 
       }
       
    }
/*! \fn strcmp($method,$update)
\param method and update
\brief for comparing method with update sting  
*/
 else if(!strcmp($method,$update))
  {
      $method='submit';
      //echo"edit function";
      
      /*! \class institute object calling 
      \fn getAllInstitute()
      \brief for acessing all institute 
      */
       $result = $ins->getAllInstitute();
           while( $row = mysqli_fetch_assoc($result))
            {
                /*! \var count 
                  \brief for storing no of iteration 
                  */ 
                  $count=0;
                /*! \var insname 
                \brief for storing insname accessing from class
                */
                  $insname = $row['name']; 
                /*! \var j 
                \brief for storing no of iteration 
                */
                  $j=0; 
                               while($j<5)
                               {
        //                          echo "comaprision b/w : ".$insname."    ".$choicearray[$j]."<br>";
                                    if(strcmp($choicearray[$j],$insname) == 0)
                                    {
                                
                                            $count++;
                                    }
                                   
                                   if($count>=2)
                                   {
          //                              echo "more then one time";
                                        break;
                                   }
                                      
                                   $j++;
                                }
                if($count >= 2)
                    break;
                
            }
       
       if($count>=2)
       {
         echo "<script>alert(\"Please fill different choices \");
					window.location=\"$redirect\";
					</script>"; 
       }
       else
       {
       /*! \class choice 
        \fn updating($rollno,$firstchoice,$secondchoice,$thirdchoice,$fourthchoice,$fifthchoice)
        * @param $rollno
        * @param $firstchoice
        * @param $secondchoice
        * @param $thirdchoice
        * @param $fourthchoice
        * @param $fifthchoice
        \brief for updating all entered choices of student 
        */
    $obj->update($rollno,$firstchoice,$secondchoice,$thirdchoice,$fourthchoice,$fifthchoice);
   // $obj->printChoiceFilling($rollno);
           /*! \class choice 
        \fn updatechoicestatus($rollno,$method)        
        * @param $rollno
        * @param $method
        \brief for updating choice status of student at roll no $rollno 
        */
    $stu->updatechoicestatus($rollno,$method);
      
      echo "<script>alert(\"Successfully Updated\");
					window.location=\"$redirect\";
					</script>";
  }
  }
/*! \fnstrcmp($method,$lock)
\param method
\param  lcok
\brieffor comparing method with lock sting  
*/
else if(!strcmp($method,$lock))
  {
        
       $result = $ins->getAllInstitute();
           while( $row = mysqli_fetch_assoc($result))
            {
                  $count=0;
                  $insname = $row['name'];
                  $j=0;
                               while($j<5)
                               {
            //                      echo "comaprision b/w : ".$insname."    ".$choicearray[$j]."<br>";
                                    if(strcmp($choicearray[$j],$insname) == 0)
                                    {
                                
                                            $count++;
                                    }
                                   
                                   if($count>=2)
                                   {
              //                          echo "more then one time";
                                        break;
                                   }
                                      
                                   $j++;
                                }
                if($count >= 2)
                    break;
                
            }
       
       if($count>=2)
       {
         echo "<script>alert(\"Please fill different choices \");
					window.location=\"$redirect\";
					</script>"; 
       }
       else
       {
      
    //echo"edit function";
        /*! class choice 
        \fn updating($rollno,$firstchoice,$secondchoice,$thirdchoice,$fourthchoice,$fifthchoice)
        * @param $rollno
        * @param $firstchoice
        * @param $secondchoice
        * @param $thirdchoice
        * @param $fourthchoice
        * @param $fifthchoice
        \brief for updating all entered choices of student 
        */
    $obj->update($rollno,$firstchoice,$secondchoice,$thirdchoice,$fourthchoice,$fifthchoice);
   // $obj->printChoiceFilling($rollno);
    /*! class choice 
        \fn updatechoicestatus($rollno,$method)        
        * @param $rollno
        * @param $method
        \brief for updating choice status of student at roll no $rollno 
        */
           $stu->updatechoicestatus($rollno,$method);
      
      echo "<script>alert(\"Successfully Locked\");
					window.location=\"$redirect\";
					</script>";
  }
  }
?>