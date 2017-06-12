<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Credit Card details</title>
<style >
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
$print= $cvv= "";
session_start();
$connection= mysql_connect("localhost","root","") or die(mysql_error());
							 mysql_select_db("testdb");
$id = $_SESSION['id']; 
  		  $query1 = "SELECT polno FROM policy where id='$id'";
		  $result1=mysql_query($query1) 
					or die("Id Problem"."<br/><br/>".mysql_error());
		    $query = "SELECT cardnum FROM credit where id='$id'";
		  $result=mysql_query($query) 
					or die("Id Problem"."<br/><br/>".mysql_error());
					
				if(!empty($_POST['cvv']))
				{
					$print="Successfull Transaction";
				}
		
					
/* if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	$connection= mysql_connect("localhost","root","") or die(mysql_error());
							 mysql_select_db("testdb");
		if(is_array($_SESSION['id']))
		{
		  $id = join(',',$_SESSION['id']); 
  		  $query = "SELECT polno FROM policy where id='$id'";
echo $query;
		  $result=mysql_query($query) 
					or die("Id Problem"."<br/><br/>".mysql_error());
		  $results= array();
		 }
	}
	*/
		?>
		


<div style="position:absolute; top=0 ; left: 27px; width: 1300px; height: 635px; background-color:#FFFFFF; border:#000000; border:thick;">
<div top=50px;><img src="Untitled.jpg" width="1300" height="114" alt="demo" /></div>
<pre><p><h4><font size="+2"> <u class="style"><span class="style2 style10"><em>Perform Transaction</em></span></u></font></h4></p>
<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<pre><font size="+2"><span class="print"> <?php echo $print;?></span><br />					Policy  Number : <select name="polno">
<?php
while ($r = mysql_fetch_array($result1)) 
{
	echo "<option id = '$r[polno]'> $r[polno] </option>";
}
?>
  </select><br />		
					Credit Card Details: <select name="cardnum">
					<?php
while ($t = mysql_fetch_array($result)) 
{
	echo "<option id = '$t[cardnum]'> $t[cardnum] </option>";
}
?>
</select>				
<p>					CVV Number: <label><input name="cvv" type="text"  value="" maxlength="3" /></label></p><p><br />             					   <input name="Submit" type="submit" id="Submit" value="Done" /></label></p><div style="position:absolute; top=600px ; left: 600px;" ><a href="account.html" >Go Back</a></font></div></form>
</pre>
</div>
</body>
</html>