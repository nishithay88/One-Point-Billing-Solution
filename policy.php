<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Policy number</title>
<style >
.error {color: #FF0000;}
.print {color: #0033CC;}
u.style
{color:#006666;}
span.style2
{color:#99CCFF;}
body{background-color:#99CCFF}
.style10 {font-family: Georgia, "Times New Roman", Times, serif, Andalus}
</style>
</head>
<body>

<?php
  
$polnum = $company=  "";
$fnameErr= $Err = $print = $Err1="";
  session_start();
   
  if ($_SERVER["REQUEST_METHOD"] == "POST")
		   {
			   	
			 if (empty($_POST['polnum']))
				 {
				  $Err1 = "Enter all details !!";
				 }
				 
			 else
			 	{
							if (!preg_match("/^[0-9]*$/",$polnum))
								   {
										$fnameErr = "Policy number should contain only numbers"; 
								   }
							else { $polnum = test_input($_POST['polnum']); }
							
								 $company= test_input($_POST['company']); 
						 
							$connection= mysql_connect("localhost","root","") or die(mysql_error());
							 mysql_select_db("testdb");
							 
							 $get = mysql_query("SELECT count(id) FROM vendor WHERE polno='$polnum' and company='$company'");
							 $result = mysql_result($get, 0);
			   
						   	if($result!=1)
								   {
									   $Err="INVALID POLICY NUMBER";
								   }
						   else
						   		  {						 
									 $id=$_SESSION['id'];
									$get2= mysql_query("INSERT into policy values('$id','$polnum','$company')");
									//header("location: policy.php");	
									$print = " Policy number $polnum is saved ";
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
<div style="position:absolute; top=0 ; left: 27px;  width: 1300px; height: 635px; background-color:#FFFFFF; border:#000000; border:thick;">
<div top=50px;><img src="Untitled.jpg" width="1300" height="114" alt="demo" /></div>
<pre><p><h4><font size="+2">  <u class="style"><span class="style2 style10"><em>Add Policy Number</em></span></u></font></h4></p>

<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <font size="+2"><span class="print"> <?php echo $print;?></span> <span class="error"> <?php echo $Err1;?></span>			<span class="error"> <?php echo $Err;?></span><br />
 					Policy Number: <input name="polnum" type="text" maxlength="9" value="<?php echo $polnum;?>"><span class="error"> <?php echo $fnameErr;?></span><br>
					      Company: <select name="company" value="<?php echo $company?>"><option value="lic">LIC</option><option value="max">Max Life Insurance</option><option value="other">other</option></select></font><p><font size="+2"><br />						     <input type="submit" name="Submit" value="Add" /></font></p><font size="+2"><div style="position:absolute; top=600px ; left: 610px;" ><a href="account.html" >Go Back</a></font></div></form>
</pre>
</div>
</body>
</html>