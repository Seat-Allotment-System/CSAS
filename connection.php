<?php
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

/*! \fn mysqli_connect()
\param servername
\param username
\param password
\param databse
\brief for creating connection with database
*/
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    /*! \fn die("Connection Failed : ".mysqli_connect_error());
    \param "Connection Failed : "
    \param \fn mysqli_connect_error() 
    */
die("Connection Failed : ".mysqli_connect_error());
}
else
{
//echo "Connection SuccessFull";
}

?>