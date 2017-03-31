<?php
/*! \class  allotment
*/
	class allotment
	{
		/*! \var $roundno 
        \brief for stroing round number 
        */
		private $roundno;
       /*! \var $startdate 
       \brief for stroing start date of allotment 
       */
		private $startdate;
       /*! \var $stud 
       \brief of array type 
       */
		private $stud = array();
       /*! \var $conn 
       \brief for stroing conn 
       */
		private $conn;

		public function __construct()
		{
            /*! \var servername for stroing servername for establishment connection */
			$servername = "localhost"; 
            /*! \var username for stroing username for establishment connection */ 
            $username = "id1120660_csas"; 
             /*! \var password for stroing password for establishment connection */ 
            $password = "csas@nitc";
            /*! \var database for stroing database for establishment connection */ 
            $database = "id1120660_csas"; 
            /* Connection Check */
            /*! \fn mysqli_connect()
             \param servername
             \param username
             \param password
             \param databse 
             \brief for create connection to database 
             */
			$this->conn = mysqli_connect($servername,$username,$password,$database);
			if(!$this->conn)
				die("unable to connect".mysqli_connect_error($this->conn));
		}
// function for getting student details  on basis of ascending rank
        /*!\fn getStudentData()
       \brief for getting all student data according to rank 
        */
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
//Added by fahad for allotment round date
        /*!\fn getdate($date)
        \brief for getting  allotment round date
        */
		public function getdate($date)
		{
			$sql="select * from allotment_date where start_date='$date' and allotment_held=false";
			$res=mysqli_query($this->conn,$sql);
			$r=0;
			if(mysqli_num_rows($res)==1)
			{
				$row=mysqli_fetch_assoc($res);
				$r=$row["round_number"];
			}
			return $r;
		}

	}


?>