<?php
	/**
		* @file Seat_class.php
		* @brief this is the class used for the seat alloted to a student in an institute.
		*
		* @author Fahad
		*
		* @date 4/01/2017
	*/
	
	/**
	* This class will be used to allot seat to a student.
	* @author Fahad
	* @param chrData The character to print
	* @date 4/01/2017
	*/
	class seat
	{
		 /*! 
     \var $seat
     \brief for storing seat detail
     */
		private $seat;
		private $conn;
		
		/**
	* This function will be used to establish connection with the database.
	* @author Fahad
	* @param No parameter it's a constructor
	* @date 4/01/2017
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
			$this->conn = mysqli_connect($servername,$username,$password,$database);
			if(!$this->conn)
				die("unable to connect".mysqli_connect_error($this->conn));
		}
		/**
	* This getseatstatus function will be used to get the seat status on a rollno.
	* @author Fahad
	* @param rollno of student will be passed
	* @date 4/01/2017
	*/
		public function getSeatStatus($roll)
		{
			///This will return the seat status on given roll no.
			$sql = "select * from seat where student_rollno='$roll'";
			$result = mysqli_query($this->conn,$sql);
			return $result;
		}
		/* This updateSeatStatus function will be used to update the seat status on a rollno.
	* @author Fahad
	* @param rollno of student will be passed
	* @date 4/01/2017
	*/
		public function updateSeatStatus($roll)
		{
			$sql = "select institute_name,seat_status,student_rollno from seat where student_rollno='$roll'";
			$result = mysqli_query($this->conn,$sql);
			if($result)
			{
				if(mysqli_num_rows($result)==1)
				{
					 $sql = "update seat set seat_status=1 where student_rollno='$roll' and seat_status=0";
					$result=mysqli_query($this->conn,$sql);
					if($result)
					{
						//echo "updated seat status";
					}
					else
					{
						//echo "can't update seat status";
					} 

				}
				else
				{
					//echo "No such student with the given roll";
				}
			}
			else
			{
				//echo "Sql query not running";
			}
		}
		/* This allot_seat function will be used to allot seat to a student on a given institute and rollno.
	* @author Fahad
	* @param rollno of student will be passed
	* @date 4/01/2017
	*/

		public function allot_seat($institute,$roll)
		{	
			///Allot seat to a student on a given rollno
			$sql = "insert into seat values('$institute','$roll')";
			$res = mysqli_query($this->conn,$sql);
		}
		/* This delete_seat function will be used delete a seat assigned to a student on a given rollno.
	* @author Fahad
	* @param rollno of student will be passed
	* @date 4/01/2017
	*/
		public function delete_seat($roll)
		{
			$sql = "select institute_name from seat where student_rollno='$roll'";
			$res = mysqli_query($this->conn,$sql);
			$row = mysqli_fetch_assoc($res);
			$inst = $row["institute_name"];
			$sql = "delete from seat where student_rollno ='$roll'";
			$res = mysqli_query($this->conn,$sql);
			return $inst;

		}

	}

?>