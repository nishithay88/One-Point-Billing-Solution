<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Register here</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<style >
u.style
{color:#E0EAF8;}
span.style2
{color:#0066CC;}
.style10 {font-family: Georgia, "Times New Roman", Times, serif, Andalus}
#webform {
	font-family: Georgia, serif;
	font-size: 12px;
	color: #000000;
}
#webform fieldset {
	width: 90%;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	border: 1px solid #004000;
	background: #F5F9F0;
	color: #000000;
	padding: 0 20px;}
</style>
</style>
</head>
<body>
<?php
  
  
   $fnameErr = $lnameErr = $mnameErr = $emailErr1 = $emailErr2 = $genErr = $passErr1 = $passErr2= $userErr=  $sErr =$sErr1 =$sErr2 = $print= "";
	$firstname = $middlename= $lastname= $date1 = $email1= $email2 = $gender = $username =$password1 =$password2 = $s1i= $s1ii = $s2t = $s3t = "";
  
   
  if ($_SERVER["REQUEST_METHOD"] == "POST")
		   {
			   	
				   // define variables and set to empty values
		 if (empty($_POST['firstname']) && empty($_POST['lastname']) && empty($_POST['gender']) && empty($_POST['email1']) && empty($_POST['email2']) && empty($_POST['phonenum']) && empty($_POST['username']) && empty($_POST['password1']) && empty($_POST['password2']) )
		 {
		  $print="Enter all details"; 
		 }
		 
		 else
		 {
		
			   if (empty($_POST['firstname']))
					 {$fnameErr = "First name is required";}
			   else
					 {
						 
						 // check if name only contains letters and whitespace
						 if (!preg_match("/^[a-zA-Z ]*$/",$_POST['firstname']))
							   {
									$fnameErr = "Only letters and white space allowed"; 
							   }
						  else {$firstname = test_input($_POST['firstname']);}
					 }
					 
						
						 // check if name only contains letters and whitespace
						 if (!preg_match("/^[a-zA-Z ]*$/",$_POST['middlename']))
							   {
									$mnameErr = "Only letters and white space allowed"; 
							   }
						 else {  $middlename =test_input($_POST['middlename']); }
					 
			   if (empty($_POST['lastname']))
					 {$lnameErr = "Last name is required";}
			   else
					 {
						 // check if name only contains letters and whitespace
						 if (!preg_match("/^[a-zA-Z ]*$/",$_POST['lastname']))
							   {
									$lnameErr = "Only letters and white space allowed"; 
							   }
							   
						else {  $lastname = test_input($_POST['lastname']); }
					 }
					 
				if (empty($_POST['gender']))
					 {$genErr = "Gender is required";}
			   else
					 {
						 $gender = $_POST['gender'];
						
					 }
					
   					 $date1 = $_POST['date1'];
					   $month1 = $_POST['month1'];
					   $year1 = $_POST['year1'];
		
					   
			   if (empty($_POST['email1']))
				 	{$emailErr1 = "Email is required";}
			   else
					 {
					 
						 // check if e-mail address syntax is valid
						 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email1']))
						   {
						   		$emailErr1 = "Invalid email format"; 
						   }
						  else { $email1 = test_input($_POST['email1']); }
					 }
		
				if (empty($_POST['email2']))
				 	{$emailErr2 = "Confirm email is required";}
			    else 
					 {
					 
						 // check if e-mail address syntax is valid
						 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email2']))
						   {
						   		$emailErr2 = "Invalid email format"; 
						   }
						 else {$email2 = test_input($_POST['email2']);}
					 }
		
				  if($email1==$email2)
						   {
								$email =test_input($_POST['email1']);
						   }
				   else
						   {
						   		$emailErr2 = "Email and Confirm email must be same";
						   }
					
				if (empty($_POST['password1']))
				 	{$passErr1 = "New Password is required";}
			   else
					 {
						   $password1 = test_input($_POST['password1']);
					  }
				if (empty($_POST['password2']))
				 	  {$passErr2 = "Confirm Password is required";}
			   else
				 {
					   $password2 = test_input($_POST['password2']);
				  }
						
				if($_POST['password1']==$_POST['password2'])
					   {
							$password =test_input($_POST['password1']);
					   }
				else
					   {
					   $passErr2 = "New password and Confirm password must be same";
					   }
					   
					   $s1i = $_POST['s1i'];
					   $s1ii = $_POST['s1ii'];
					   $s2 = $_POST['s2'];
					   $s3 = $_POST['s3'];
					   
				if (empty($_POST['s2t']) || empty($_POST['s3t']))
					{ $sErr = "Fill all the security questions"; }
			    if(!empty($_POST['s2t']))
					 {
						 
						 if (!preg_match("/^[a-z]+$/i",$_POST['s2t']))
						 	{ $sErr1 ="Enter only single word"; }
						else { $s2t = test_input($_POST['s2t']); }
					 	}
						if(!empty($_POST['s3t'])) 
						{
						 	 
						 if (!preg_match("/^[a-z]+$/i",$_POST['s3t']))
						 	{ $sErr2 ="Enter only single word"; }
						else { $s3t = test_input($_POST['s3t']); }
					 }
					  
				$connection= mysql_connect("localhost","root","") or die(mysql_error());
				 mysql_select_db("testdb");
					   
		if (empty($_POST['username']))
				 {$userErr = "Username is required";}
			 
		else
			{
				 $user_exist = mysql_result(mysql_query("SELECT COUNT(1) username FROM login WHERE username='$_POST[username]'"), 0); 
				   if ($user_exist > 0)
				   {  
					  
							 $userErr= "Username already exists.  Please choose another username"; 
							
					} 
					 
				  else
					{
						  $username = test_input($_POST['username']);
						  
						  if(!empty($firstname) && !empty($lastname) && !empty($gender) && !empty($email) && !empty($password) && !empty($s2t) && !empty($s3t))
						  {
								   $sql = "INSERT INTO login(firstname,middlename,lastname,g1,date1,month1,year1,email,username,password,s1i,s1ii,s2,s2t,s3,s3t) 						  VALUES('$firstname','$middlename','$lastname','$gender','$date1','$month1','$year1','$email','$username','$password','$s1i','$s1ii','$s2','$s2t','$s3', '$s3t')";
								   
								   
								   $result= @mysql_query($sql,$connection) or die(mysql_error());
								   
								  if($result)
								  {
								  echo '<script type="text/javascript"> 
								  <!-- 
								  alert("Succesfull Registration");
								  window.location = "login.html" 
								  
								  //--> 
								  </script>'; 
								  }
								  
						}	   
								   
					}
			 }
		}
	}
  function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>
<div style="position:absolute; top:0px; left:0px; width:1315px; height:1000px; padding:18px; background-image:url(demo2.jpg); background-repeat:no-repeat; background-attachment:scroll; ">
<p><h4><font size="+2" ><u class="style"><span class="style2 style10"><em><br>
</em></span></u></font></h4>
<h4><font size="+2" ><u class="style"><span class="style2 style10"><em>REGISTER HERE</em></span></u></font></h4>
</p>
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<pre><div style="position:absolute;left:880px;top:655px;">
<font color=green>&#42Used when you 
forget your password&#42</font> </div></pre>
<div style="position:absolute;left:500px;top:150px;">
<pre><font size="+2">     <span class="error"><?php echo $print;?></span></font></br>
First Name<font color=red>&#42</font>:          <input type="text" name="firstname" maxlength=30 size=20 value="<?php echo $firstname;?>"><span class="error"> <?php echo $fnameErr;?></span><br>
Middle Name:          <input type="text" name="middlename" maxlength=30 size=20 value="<?php echo $middlename;?>"><br>
Last Name<font color=red>&#42</font>:           <input type="text" name="lastname" maxlength=30 size=20 value="<?php echo $lastname;?>"><span class="error"> <?php echo $lnameErr;?></span><br>
Gender<font color=red>&#42</font>:   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="m") echo "checked";?> value="m">Male </input>    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="f") echo "checked";?> value="f">Female </input> <span class="error"><?php echo $genErr;?></span> <br>
Date of Birth<font color=red>&#42</font>:   <Select name="date1" > <option value= "1">1</option>
<option value= "2">2</option>
<option value= "3">3</option>
<option value= "4">4</option><option value= "5">5</option><option value= "6">6</option><option value= "7">7</option>
<option value= "8">8</option><option value= "9">9</option><option value= "10">10</option><option value= "11">11</option>
<option value= "12">12</option><option value= "13">13</option><option value= "14">14</option><option value= "15">15</option>
<option value= "16">16</option><option value= "17">17</option><option value= "18">18</option><option value= "19">19</option>
<option value= "20">20</option><option value= "21">21</option><option value= "22">22</option><option value= "23">23</option>
<option value= "24">24</option><option value= "25">25</option>\<option value= "26">26</option><option value= "27">27</option>
<option value= "28">28</option><option value= "29">29</option><option value= "30">30</option><option value= "31">31</option>
</select >  <select name="month1"> <option value="Jan">January</option><option value="Feb">February</option><option value="Mar">March</option>
<option value="Apr">April</option><option value="May">May</option><option value="Jun">June</option><option value="Jul">July</option>
<option value="Aug">August</option><option value="Sep">September</option><option value="Oct">October</option>
<option value="Nov">November</option><option value="Dec">December</option></select>  <select name="year1"><option value="60">1960</option>
<option value="61">1961</option><option value="62">1962</option><option value="63">1963</option><option value="64">1964</option>
<option value="65">1965</option><option value="66">1966</option><option value="67">1967</option><option value="68">1968</option>
<option value="69">1969</option><option value="70">1970</option><option value="71">1971</option><option value="72">1972</option>
<option value="73">1973</option><option value="74">1974</option><option value="75">1975</option><option value="76">1976</option>
<option value="77">1977</option><option value="78">1978</option><option value="79">1979</option><option value="80">1980</option>
<option value="81">1981</option><option value="82">1982</option><option value="83">1983</option><option value="84">1984</option>
<option value="85">1985</option><option value="86">1986</option><option value="87">1987</option><option value="88">1988</option>
<option value="89">1989</option><option value="90">1990</option><option value="91">1991</option><option value="92">1992</option>
<option value="93">1993</option><option value="94">1994</option><option value="95">1995</option><option value="96">1996</option>
<option value="97">1997</option><option value="98">1998</option><option value="99">1999</option><option value="00">2000</option>
<option value="01">2001</option><option value="02">2002</option><option value="03">2003</option><option value="04">2004</option>
<option value="05">2005</option><option value="06">2006</option><option value="07">2007</option><option value="08">2008</option>
<option value="09">2009</option><option value="10">2010</option><option value="11">2011</option><option value="12">2012</option>
<option value="13">2013</option><option value="14">2014</option></select></br>
Email<font color=red>&#42</font>:               <input type="text" name="email1" maxlength=40 size=25 value="<?php echo $email1;?>"><span class="error"> <?php echo $emailErr1;?></span><br>
Confirm-Email<font color=red>&#42</font>:       <input type="text" name="email2" maxlength=40 size=25 value="<?php echo $email2;?>"><span class="error"> <?php echo $emailErr2;?></span><br>
Username<font color=red>&#42</font>:            <input type="text" name="username" maxlength=40 size=25 value="<?php echo $username;?>"><span class="error"> <?php echo $userErr;?></span><br>
New Password<font color=red>&#42</font>:        <input type="password" name="password1" maxlength=30 size=20 value="<?php echo $password1;?>"><span class="error"> <?php echo $passErr1;?></span><br>
Confirm-Password<font color=red>&#42</font>:    <input type="password" name="password2" maxlength=30 size=20 value="<?php echo $password2;?>"><span class="error"> <?php echo $passErr2;?></span><br>
Security Questions<font color=red>&#42</font>: <span class="error"> <?php echo $sErr;?></span> <br> 

<font color=blue><b>Q1:</b></font> Date of 
    account creation: <select name="s1i"> <option value="Jan">January</option><option value="Feb">February</option><option value="Mar">March</option><option value="Apr">April</option><option value="May">May</option><option value="Jun">June</option><option value="Jul">July</option>
<option value="Aug">August</option><option value="Sep">September</option><option value="Oct">October</option>
<option value="Nov">November</option><option value="Dec">December</option></select>  <select name="s1ii"><option value="14">2014</option><option value="15">2015</option><option value="16">2016</option><option value="17">2017</option><option value="18">2018</option><option value="19">2019</option><option value="20">2020</option><option value="21">2021</option><option value="22">2022</option><option value="23">2023</option><option value="24">2024</option></select>
</br>
<font color=blue><b>Q2:</b></font> <Select name="s2"> <option value= "1">What is your Mother's Birthplace ?</option>
<option value= "2">What is your Pet's name?</option>
<option value= "3">What is your nick name?</option>
<option value= "4">What is your first school name?</option>
<option value= "5">Who is your favourite teacher?</option></Select>   <input type="text" name="s2t" maxlength=40 size=25 value="<?php echo $s2t;?>"> <span class="error"> <?php echo $sErr1;?></span><br>
<font color=blue><b>Q2:</b></font> <Select name="s3"> <option value= "1">What is your Mother's Birthplace ?</option>
<option value= "2">What is your Pet's name?</option>
<option value= "3">What is your nick name?</option>
<option value= "4">What is your first school name?</option>
<option value= "5">Who is your favourite teacher?</option></Select>   <input type="text" name="s3t" maxlength=40 size=25 value="<?php echo $s3t;?>"> <span class="error"> <?php echo $sErr2;?></span><br>
<br></br>                          <input type="submit" value="Submit" />

</pre></div>
</form>
</div>
</body>
</html>