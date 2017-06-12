<?php
  
   $username= $_POST['username'];
   $password= $_POST['password'];
   $login = $_GET['login'];
  
  session_start() ;
   
   if($login=="yes")
	   {
		   $connection= mysql_connect("localhost","root","");
		   mysql_select_db("testdb");
		   $get = mysql_query("SELECT * FROM login WHERE username='$username' and password='$password'");
		   
		   if(mysql_num_rows($get)>0){
		   while($row = mysql_fetch_row($get)){
		   	$_SESSION['id'] = $row[0];
			  echo '<script type="text/javascript"> 
				  <!-- 
				  window.location = "account.html" 
				  //--> 
				  </script>'; 
		   }
		   }else{
		   echo "Invalid credentials";
		   
		   }
		   }
   
   ?>