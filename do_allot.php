<?php
	/**
		* @file do_allot.php
		* @brief first round of allotment.
		*
		* @author Fahad
		*
		* @date 4/01/2017
	*/



	/*! \file student_class.php
\brief to access all student_class attributes. 
*/
    include('student_class.php');
	
    //include('filledchoices.php');
	/*! \file institute.php
\brief to access all institute_class attributes. 
*/
    include('institute.php');
	/*! \file seat_class.php
\brief to access all seat_class attributes. 
*/
    include('seat_class.php');
	/*! \file allotment_class.php
\brief to access all allotment_class attributes. 
*/
    include('allotment_class.php');
	/*! \file connection.php
\brief to establish database connection. 
*/
    include('connection.php');

	/*! \var $now to create DateTime object. */
    $now = new DateTime();
	/*! \var $date to get current date. */
    $date = $now->format('y-m-d');
	/*! \var $lastdate set date for first round of allotment. */
    $lastdate = "2017-03-24";
    
	///Check for the date of allotment.
    if(strtotime($date) > strtotime($lastdate))
    {
		/*! \var $sql to get update the choice status from submit to lock before starting the first round of allotment. */
        $sql="update student set choice_status='lock' where choice_status='submit'";
        $r = mysqli_query($conn,$sql);
		/*! \var $stud_obj for creating student class object. */
        $stud_obj = new student();
        //$choice_obj = new filledchoice();
		/*! \var $inst_obj for creating institute class object. */
        $inst_obj = new institute();
		/*! \var $seat_obj for creating seat class object. */
        $seat_obj = new seat();
		/*! \var $allot_obj for creating allotment class object. */
        $allot_obj = new allotment();


        //Getting student rollno and rank(ascending order) from student table using allotment_class
		
        $stud_detail = array();
		/*! \var $stud_detail of all the student for first round of allotment.*/
        $stud_detail = $allot_obj->getStudentData();


        ///Algorithm for alloting seat to a student if seat is available in the desired institute.
        foreach($stud_detail as $data)
        {
            $student=array();
			/*! \var $student for detail of the student for first round of allotment on a given rollno.*/
            $student = $stud_obj->getstud_detail($data["rank"]);
            
			///Check if choice_status is locked of the student.
            if($student["choice_status"]=="lock")
            {
				/* \var $roll rollnumber of the student.*/
                $roll=$student["rollno"];
				/* \var $sql choicefilling detail of the student with a given rollnumber of the student.*/
                $sql="select * from choicefilling where rollno='$roll'";
                $result = mysqli_query($conn,$sql);
                $choice = array();
                $choice = mysqli_fetch_assoc($result);
				/* \var $choice_result to store the choices filled by the student.*/
                $choice_result = array($choice["firstchoice"],$choice["secondchoice"],$choice["thirdchoice"],$choice["fourthchoice"],$choice["fifthchoice"]);
                
                ///alloting institute to student based on the choice filled by the student.
                for($i=0;$i<count($choice_result);$i++)
                {	
					///Checking if seat is vacant in a prefered institute.
                    if($inst_obj->isVacant($choice_result[$i]))
                    {	///Alloting seat to a student.
                        $seat_obj->allot_seat($choice_result[$i],$roll);
						///updating vacantseat of the alloted institute.
                        $inst_obj->updateVacantSeat($choice_result[$i]);
						///Updating allotment_staus of student to which seat has been alloted.
                        $stud_obj->updateAllotmentStatus($roll);
                        break;
                    }

                }
            }

        }
		/// Updating the fisrt round allotment status as true indiacting the completion of first round of allotment.
        $sql = "update allotment_date set allotment_held=true where round_number=1";
            $res = mysqli_query($conn,$sql);
            
		/// Displaying the first round allotment result.
        echo " <script> alert(' First round allotment completed!!!!');
                window.location = ('admissiondetail.php');</script>";
    }
    else
        echo "<br>Allotment date is has not come.";

?>