<?php

class institute
{
   
         public $servername;	
	       public $username;
	       public $password;
	       public $db;
         public $connect;
          public $name;
	      public $totalseat;
	      public $vacantseat;
    
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
    
    public function getInstituteDetail($institutename)
    {
        $sql = "select * from institute where name = '$institutename'";
        $result = mysqli_query($this->connect,$sql);
        return $result;
    }


    public function isVacant($institutename)
    {
        $sql = "select * from institute where name = '$institutename'";
        $result = mysqli_query($this->connect,$sql);
            
           /* while($row = mysqli_fetch_assoc($result) )
            {
                echo "Institute name : ".$row['name']."  total seats : ".$row['totalseat']."<br/>";
            } */
            $row = mysqli_fetch_assoc($result);
            print_r($row);
            if($row['vacant_seat']>0)
              return true;
            else
              return false;
    }
    
    
    public function getAllInstitute()
    {
        $sql = "select * from institute";
        $result = mysqli_query($this->connect,$sql);   
        return $result;
    }


    public function updateVacantSeat($institute)
    {
      $sql = "update institute set vacant_seat=vacant_seat-1 where name = '$institute'";
      $r = mysqli_query($this->connect,$sql);
      //if($r)
        //echo "updated seat";
    }

public function addVacantSeat($institute)
    {
      $sql = "update institute set vacant_seat=vacant_seat+1 where name = '$institute'";
      $r = mysqli_query($this->connect,$sql);
    }
   
}

?>