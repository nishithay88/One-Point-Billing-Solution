<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Credit Card details</title>
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
  
$cardnum = $mode =$name= $month =$year=  "";
$Err= $print= $cardErr = $nameErr = "";
  session_start();
   
  if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
			   	
		 if (empty($_POST['cardnum']) || empty($_POST['name']))
		 {
		  $Err = "Enter all the details";
		 }
		 
		 else
		 {
						 
						 if (!preg_match("/^[0-9]*$/",$_POST['cardnum']))
							   {
									$cardErr = "Invalid detail"; 
							   }
						else {  $cardnum = test_input($_POST['cardnum']); }
							
							   
						  if (!preg_match("/^[a-zA-Z ]*$/",$_POST['name']))
							   {
									$nameErr = "Only letters and white space allowed"; 
							   }
						 else { $name=test_input($_POST['name']); }
					 		
					 
							 $mode=test_input($_POST['mode']);
							 $month=test_input($_POST['month']);
							 $year=test_input($_POST['year']);
					if(!empty($cardnum) && !empty($name))
					{
						$connection= mysql_connect("localhost","root","") or die(mysql_error());
						 mysql_select_db("testdb");
						 $id=$_SESSION['id'];
						$result= mysql_query("INSERT into credit values('$id','$mode','$cardnum','$name','$month','$year')");
						$print= "Credit card details are saved ";
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
<div style="position:absolute; top=0 ; left: 27px; width: 1300px; height: 635px; background-color:#FFFFFF; border:#000000; border:thick;">
<div top=50px;><img src="Untitled.jpg" width="1300" height="114" alt="demo" /></div>
<pre><p><h4><font size="+2"> <u class="style"><span class="style2 style10"><em>Enter Credit Card Details</em></span></u></font></h4></p>
<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><font size="+2">							
<span class="error"><?php echo $Err;?></span><font size="+2"><span class="print"> <?php echo $print;?></span>
					Type :       	   <select name="mode"><option value="master">Master</option><option value="visa">Visa</option></select></label>
  <br />					Card Number :      <input name="cardnum" maxlength="16" type="text" value="<?php echo $cardnum; ?>" /><span class="error"><?php echo $cardErr;?></span> <br />						<br />					Card Holder Name : <input type="text" name="name" value="<?php echo $name; ?>" /><span class="error"><?php echo $nameErr;?></span><br /><br /> 					Expiry Date :      <select name="month" size="1"><option value="Jan">January</option><option value="Feb">February</option><option value="Mar">March</option><option value="Apr">April</option><option value="May">May</option><option value="Jun">June</option><option value="Jul">July</option>
<option value="Aug">August</option><option value="Sep">September</option><option value="Oct">October</option>
<option value="Nov">November</option><option value="Dec">December</option></select>  <select name="year"><option value="14">2014</option><option value="15">2015</option><option value="16">2016</option><option value="17">2017</option><option value="18">2018</option><option value="19">2019</option><option value="20">2020</option><option value="21">2021</option><option value="22">2022</option><option value="23">2023</option><option value="24">2024</option></select></select></label>
<p><br />							<input type="submit" name="Submit" value="Add" /></p><div style="position:absolute; top=600px ; left: 650px;" ><a href="account.html" >Go Back</a></font></div></form>
</pre>
</div>
</body>
</html>