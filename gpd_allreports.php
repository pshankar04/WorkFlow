<?php
include('config.php');
session_start();
if(!isset($_SESSION['gpd_user_type']))
{
	header("location:index.php");
}
else if(!($_SESSION['gpd_user_type']=="gpd"))
{
	header("location:index.php");
}

$login_id=$_SESSION['login_id'];

#$list = "SELECT name,s.semester,advisor_name,s.login_id,s.feedback FROM stu_resume s,student_profile p,student_advisor sa,advisor a where feedback<>'N' and p.login_id=s.login_id and s.login_id=sa.student_id and sa.advisor_id=a.advisor_id and (p.phd_status<>'Completed' or p.phd_status is null) order by lname";

$list = "SELECT * FROM student_profile p LEFT JOIN student_advisor a ON p.login_id=a.student_id LEFT JOIN (SELECT login_id,SUBSTRING_INDEX(name, ' ', -1) as lname from student_profile) l ON p.login_id=l.login_id LEFT JOIN stu_resume sr ON sr.login_id=p.login_id LEFT JOIN (SELECT advisor_name,student_id FROM advisor ad LEFT JOIN student_advisor studa ON ad.advisor_id=studa.advisor_id) adname ON adname.student_id=p.login_id where sr.feedback<>'N' and (p.phd_status<>'Completed' or p.phd_status is null) order by lname";

$lsresult=mysql_query($list) or die("Unable to connect to db");

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>PhD Progress Report</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="teststyle.css">

<script type="text/javascript">
function showdata(str)
{
	if (str=="")
	{
		document.getElementById("txtHint").innerHTML="";
		window.location.reload();
	} 
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","gpd_allreportssort.php?q="+str,true);
	xmlhttp.send();
}
</script>
</head>
<body id="profile">
<?php
	include("gpd_topheader.php");
?>
<form name="stuprofile">
<table cellpadding="1" border="0" width="750px" >
   <colgroup>
      <col style="width: 100px"/>
      <col style="width: 100px"/>
	  <col style="width: 100px"/>
    </colgroup>
   <tbody>
        <tr>
			<td colspan="4" bgcolor="#E1E1E1" class="captionText">All Completed Reports </td>
        </tr>
		<tr>
			
			<td>
			<?php 
						echo "<select name='student' onchange='showdata(this.value)'>";
						echo "<option value=''>";echo "Student Name" ;echo"</option>";
						$query = "SELECT distinct name,s.login_id FROM stu_resume s,student_profile p where p.login_id=s.login_id and (p.phd_status<>'Completed' or p.phd_status is null ) order by name,s.semester";
						$result=mysql_query($query) or die("Unable to connect to db");
						if($count=mysql_num_rows($result)) 
						{ 
							while($row = mysql_fetch_assoc($result)) 
							{ 
								echo "<option value='1.$row[login_id]'>";echo $row[name];echo"</option>";
							} 
					 
						} 
						echo "</select>";
				?>
			</td>
			
			<td>
				<?php 
						echo "<select name='semester' onchange='showdata(this.value)'>";
						echo "<option value=''>";echo Semester ;echo"</option>";
						$query = "SELECT distinct s.semester FROM stu_resume s,student_profile p where p.login_id=s.login_id and (p.phd_status<>'Completed' or p.phd_status is null) order by s.semester";
						$result=mysql_query($query) or die("Unable to connect to db");
						if($count=mysql_num_rows($result)) 
						{ 
							while($row = mysql_fetch_assoc($result)) 
							{ 
								echo "<option value='2.$row[semester]'>";echo $row[semester];echo"</option>";
							} 
					 
						} 
						echo "</select>";
				?>
			</td>
			
			<td>
			<?php 
						echo "<select name='adviser' onchange='showdata(this.value)'>";
						echo "<option value=''>";echo Advisor ;echo"</option>";
						$query = "SELECT advisor_name,advisor_id FROM advisor";
						$result=mysql_query($query) or die("Unable to connect to db");
						if($count=mysql_num_rows($result)) 
						{ 
							while($row = mysql_fetch_assoc($result)) 
							{ 
								echo "<option value='3.$row[advisor_id]'>";echo $row[advisor_name];echo"</option>";
							} 
					 
						} 
						echo "</select>";
				?>
			</td>
			</tr>
	</tbody>
</table>
</form>

<div id="txtHint">
<table cellpadding="1" border="0" width="750px" >
   <colgroup>
      <col style="width: 100px"/>
      <col style="width: 100px"/>
	  <col style="width: 100px"/>
    </colgroup>
   <tbody>
<?php
while($all=mysql_fetch_array($lsresult))
{
	echo"<tr>";
	echo"<td>"; 
        if (trim($all['path_to_pic'])){
          echo"<img src=";echo $all['path_to_pic'];echo" width=75 height=75 /><br />";
        }
                echo"<a href=\"gpd_allreportsproc.php?q=$all[login_id].$all[semester]\" target=\"popup\" onClick=\"window.open('gpd_allreportsproc.php?q=$all[login_id].$all[semester]','popup','width=700,height=500,left=400,top=200,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=yes')\">";echo ucwords($all['name']);echo"</a></td>";
		echo"<td>";echo $all['semester']; echo"</td>";
		echo"<td>";echo $all['advisor_name']; echo"</td>";
	echo"</tr>"; 
}
mysql_close($con);
?>
</div>
</tbody>
</table>
<table cellpadding="0" border="0" width="750px" >
<tr><td> <hr size="1"></td></tr>
</table>

</body>
</html>










