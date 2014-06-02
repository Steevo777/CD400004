<?php 
  ob_start(); 
  
  // Table name 
  $tbl_name = "users"; 
   
  //include("../config.php"); 
 
  // Define $myusername and $mypassword 
  $myusername = $_POST['identity']; 
  $mypassword = $_POST['password']; 
   
  
  // To protect MySQL injection (more detail about MySQL injection) 
  //$myusername = stripslashes($myusername); 
  //$mypassword = stripslashes($mypassword); 
  //$myusername = mysql_real_escape_string($myusername); 
  //$mypassword = mysql_real_escape_string($mypassword); 
   
  //$mypassword = md5($mypassword); // this is an encrypting the password 
   
  // Connect to the database server 
	  $dbcnx = @mysql_connect("mysql15.powweb.com","cdsuperuser", "ainfo10c");
     if (!$dbcnx) 
	 {    echo( "<PA>Unable to connect to the database server at this time.</PA>" );
	     exit();  }
    // Select the database
    if (! @mysql_select_db("chatdawg") )
	 {    echo( "<PA>Database is syncing at this time. Try again later. </PA>" );
	     exit();  }
 	   
  $sql="SELECT * FROM people where username='".$myusername."' and password='".$mypassword."'"; 
  //$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'"; 
  $result = mysql_query($sql); 
   
  // Mysql_num_row is counting table row 
  $count = mysql_num_rows($result); 
  // If result matched $myusername and $mypassword, table row must be 1 row 
   
  if ($count == 1) { 
     echo "success"; 
  } else { 
       header("HTTP/1.0 500 Internal Server Error");  
  } 
   
  ob_end_flush(); 
?>