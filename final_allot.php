<?php
    session_start();
    if(!isset($_SESSION["name"])){
        echo " <script> alert('Please Login as admin first');
                window.location = ('adminlogins.php');</script>";
    }
?>

<?php
	/**
		* @file final_allot.php
		* @brief final round of allotment.
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
	$lastdate = "2017-03-25";
	
	///Check for the date of allotment.
	if(strtotime($date) > strtotime($lastdate))
	{

		/*! \var $stud_obj for creating student class object. */
		$stud_obj = new student();
		//$choice_obj = new filledchoice();
		/*! \var $stud_obj for creating isntitute class object. */
		$inst_obj = new institute();
		/*! \var $stud_obj for creating seat class object. */
		$seat_obj = new seat();
		/*! \var $stud_obj for creating allotment class object. */
		$allot_obj = new allotment();



		$stud_detail = array();
		/*! \var $stud_detail of all the student for second round of allotment.*/
		$stud_detail = $allot_obj->getStudentData();


// Deleting seat of those student who have not reported
		///Deleting those student who have alloted a seat but did't reported in person for upgradation/confirm.
		foreach($stud_detail as $tmp)
		{
			$stu = array();
			$stu = $stud_obj->getstud_detail($tmp["rank"]);
			$rl = $stu["rollno"];

///delete those student who have been alloted institute but not reported for counselling
if($stu["choice_status"]=="lock" and $stu["allotment_status"]=="alloted" and $stu["admission_status"]=="")
			{
				/// Calling delete_seat function of seat class.
				$in = $seat_obj->delete_seat($rl);
				/// addVacantSeat fucntion incresae the number of vacant seat in the institute by one.
				$inst_obj->addVacantSeat($in);
				/// rejectStudent function of student class set the validity of student as rejected.
				$stud_obj->rejectStudent($rl);
			}	
		}





//alloting to each student seat for final round 
///Algorithm for alloting seat to a student if seat is available in the desired institute.
		foreach($stud_detail as $data)
		{
			$student=array();
			/*! \var $student for detail of the student for second round of seat allotment on a given rollno.*/
			$student = $stud_obj->getstud_detail($data["rank"]);

//wheather choice is lock or not
			/// checking if student has filled the prefered choice.
			if($student["choice_status"]=="lock")
			{

///check for eligiblity of student to be considered for upgradation or confirmation in case any seat is alloted to the student. 				
	   if($student["admission_status"]=="" || $student["admission_status"]=="upgrade")
				{

					$roll=$student["rollno"];
					/// If student has allotment_status as upgrade taking away the currently alloted seat.
					if($student["admission_status"]=="upgrade")
					{
						///Deleting the seat alloted to the student.
						$in = $seat_obj->delete_seat($roll);
						///Updating the vacant_Seat of alloted institute by adding 1 to the number of vacant_seat.
						$inst_obj->addVacantSeat($in);
					}
///fetching student choice fillings
					$sql="select * from choicefilling where rollno='$roll'";
					$result = mysqli_query($conn,$sql);
					$choice = array();
					$choice = mysqli_fetch_assoc($result);
	                                $choice_result = array($choice["firstchoice"],$choice["secondchoice"],$choice["thirdchoice"],$choice["fourthchoice"],$choice["fifthchoice"]);
			
					/* \var $choice_result to store the choices filled by the student.*/
					for($i=0;$i<count($choice_result);$i++)
					{
						///Checking if seat is vacant in a prefered institute.
						if($inst_obj->isVacant($choice_result[$i]))
						{
							///Alloting seat to a student.
							$seat_obj->allot_seat($choice_result[$i],$roll);
							///updating vacantseat of the alloted institute.
							$inst_obj->updateVacantSeat($choice_result[$i]);
							///Updating allotment_staus of student to which seat has been alloted.
							$stud_obj->update_third_round_admission_status($roll);
							break;
						}

					}

				}
				
			}
		}
		/// Updating the fisrt round allotment status as true indiacting the completion of first round of allotment.
		$sql = "update allotment set allotment_held=true where round_number=3";
			$res = mysqli_query($conn,$sql);
			/// Displaying the first round allotment result.
		echo " <script> alert('Final Allotment completed!!!!');
                window.location = ('allotment_result.php');</script>";
	}
?>