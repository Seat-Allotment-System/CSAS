<?php
	include('student_class.php');
	//include('filledchoices.php');
	include('institute.php');
	include('seat_class.php');
	include('allotment_class.php');
	include('connection.php');

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
		//$choice_obj = new filledchoice();
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

?>