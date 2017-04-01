<?php
	/**
		* @file institute.php
		* @brief this is file for institute class where record related to intitute will be store.
		*
		* @author Fahad
		*
		* @date 4/01/2017
	*/
	/*! \class institute */
class institute
{
		/*! 
     \var $servername
     \brief for storing servername.
     */
         public $servername;	
		/*! 
     \var $uesrname
     \brief usrname of database.
     */ 
	       public $username;
		   /*! 
     \var $password
     \brief for password of database connectivity.
     */
	       public $password;
	/*! 
     \var $db
     \brief for storing servername
     */
	       public $db;
         public $connect;
		/*! 
     \var $name
     \brief for institutename.
     */ 
          public $name;
		 /*! 
     \var $totalseat
     \brief for total_seat an institute.
     */
	      public $totalseat;
		  /*! 
     \var $vacant_seat
     \brief for storing vacant_seat in an institute.
     */
	      public $vacantseat;
    	/**
	* This constructor function will be used to establish connection with the database.
	* @author Fahad
	* @param No parameter it's a constructor
	* @date 4/01/2017
	*/
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
    	/**
	* This function will be used to establish connection with the database.
	* @author Fahad
	* @param Institute_name
	* @date 4/01/2017
	*/
    public function getInstituteDetail($institutename)
    {
		///Getting the detail of a particular institutename
        $sql = "select * from institute where name = '$institutename'";
        $result = mysqli_query($this->connect,$sql);
		///Returning the detail with a given institute name.
        return $result;
    }

	/* isVacant function will be used to check wheather seat in available in an institute or not.
	* @author Fahad
	* @param Institute_name
	* @date 4/01/2017
	*/
    public function isVacant($institutename)
    {
		///Getting the detail of a particular institutename
        $sql = "select * from institute where name = '$institutename'";
        $result = mysqli_query($this->connect,$sql);
            
            $row = mysqli_fetch_assoc($result);
			///If seat are available
            if($row['vacant_seat']>0)
				///Return true if vacant_Seat is available.
              return true;
            else
					///Return flase if vacant_Seat is available.	
              return false;
    }
    
    /* getAllInstitute function will be used to get all institute.
	* @author Fahad
	* @date 4/01/2017
	*/
    public function getAllInstitute()
    {
        $sql = "select * from institute";
        $result = mysqli_query($this->connect,$sql);   
        return $result;
    }

	/* updateVacantSeat function will be reduce the number of seat in a given institute.
	* @author Fahad
	* @param institutename
	* @date 4/01/2017
	*/
    public function updateVacantSeat($institute)
    {
		///Updating the number of vacant_Seat of institute after allotment to a student.
      $sql = "update institute set vacant_seat=vacant_seat-1 where name = '$institute'";
      $r = mysqli_query($this->connect,$sql);
    }
/* addVacantSeat function will be add seat to an institute.
	* @author Fahad
	* @param institutename
	* @date 4/01/2017
	*/
public function addVacantSeat($institute)
    {
		///Updating the number of vacant_Seat to an institute after rejecting or upgrading seat to a student.
      $sql = "update institute set vacant_seat=vacant_seat+1 where name = '$institute'";
      $r = mysqli_query($this->connect,$sql);
    }
   
}

?>