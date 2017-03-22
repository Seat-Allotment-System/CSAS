<?php
	class allotment
	{
		
		private $roundno;
		private $startdate;
		private $stud = array();
		private $conn;

		public function __construct()
		{
			$servername = "localhost";
			$username = "id1120660_csas";
			$password = "csas@nitc";
			$database = "id1120660_csas";
/* Connection Check */
			$this->conn = mysqli_connect($servername,$username,$password,$database);
			if(!$this->conn)
				die("unable to connect".mysqli_connect_error($this->conn));
		}
// function for getting student details  on basis of ascending rank  
		public function getStudentData()
		{
			$sql="select * from student order by rank asc";
			$result= mysqli_query($this->conn,$sql);
			if($result)
                          {
			       while($row = mysqli_fetch_assoc($result))
				$stud[]=$row;
		          }
			return $stud;

		}

	}


?>