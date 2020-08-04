<?php 
    session_start();
     $var_value = $_SESSION['login_user'];
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}
body {
    text-align: center;
    padding-top: 50px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

a, u {
    text-decoration: none;
}

form {
  width: 90%;
  height: relative;
  background: #ffffff;
  display: inline-block;
  border : 2px solid #ffffff;
  padding : 5px;
}

header{
 padding: 0.5em;
 color: white;
 background-color: #3b5998;
 clear: left;
 text-align: left;
}

footer{
 padding: 0.3em;
 color: white;
 background-color: #3b5998;
 clear: left;
 text-align: left;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
/* Create two equal columns that floats next to each other */
.column1 {
    float: left;
    width: 50%;
    padding: 40px;
    background-color: #c2dbf0;
    padding-top: 25px;
    padding-right: 10px;
    padding-left: 160px;
    height: 100px; /* Should be removed. Only for demonstration */
}

.column2 {
    float: left;
    width: 50%;
    padding: 20px;
    padding-left: 200px;
    padding-top: 10px;
    padding-right: 10px;
    height: 400px; 
    /* Should be removed. Only for demonstration */
}

.column3 {
    float: left;
    width: 50%;
    padding: 40px;
    padding-top: 40px;
    padding-left: 20px;
    padding-right: 5px;
    height: 200px; 
    background-color: #c2dbf0;
    /* Should be removed. Only for demonstration */
}

.column4 {
    float: left;
    width: 50%;
    padding-top: 25px;
    padding-left: 0px;
    padding-right: 200px;
    height: 100px; 
    background-color: #c2dbf0;
    /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
 
.button1 {
    background-color: #4CAF50; /* Green */
    border: 2px;
    color: white;
    padding: 15px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
}
.button2 {
    background-color: #f6665c; /* Red */
    border: 2px;
    color: white;
    padding: 15px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
}

.button3 {
    background-color: #55ACEE; /* violet */
    border: 2px;
    color: white;
    padding: 12px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
}
 
.h5{
    color: #ffffff;
    font-size: 20px;
}

.logout {
border-radius: 2px;
padding: 13px;
padding-top: 18px;
padding-left: 15px;
padding-right: 15px;
padding-bottom: 15px;
width: 100px;
font-size: 15px;
display:block;
background-color: #8b9dc3;
color: #ffffff;
text-align:center;
position: absolute;
top: 95px;
right: 30px;
}

#procurement {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    float: center;
    padding-left: 30px;
    overflow: auto;
    position: relative;
    height: 30px;   
    margin-top: 30px;
}

#procurement td, #procurement th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

#procurement tr:nth-child(even){background-color: #f2f2f2;}

#procurement tr:hover {background-color: #ddd;}

#procurement th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #20B2AA;
    color: white;
    text-align: center;
}

 
#analytics {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 80%;
    float: center;
    padding-left: 30px;
}

#analytics td, #analytics th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
    font-size: 15px;
}
#analytics tr:nth-child(even){background-color: #f2f2f2;}

#analytics tr:hover {background-color: #ddd;}

#analytics th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #f2f2f2;
    color: black;
    text-align: center;
}

#borderLessTable {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 80%;
    float: center;
    padding-left: 30px;
}

#borderLessTable td, #borderLessTable th {
    border: none;
    padding: 8px;
    text-align: center;
}

#borderLessTable th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #f2f2f2;
    color: black;
    text-align: center;
}


</style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
function approveUser(id){

     // trid=id.split('-')[1];
     //alert(trid);

    $.ajax({
        url: "approve.php",
        type:"post",
        data:{ val : id },


        success: function(result){
            //alert(result);
            //$('table#sHold tr#'+trid).remove();
            alert('Ticket Status is updated to Approved');

    }
    });
}

function rejectUser(id){

     // trid=id.split('-')[1];
     //alert(trid);

    $.ajax({
        url: "reject.php",
        type:"post",
        data:{ val : id },


        success: function(result){
            alert('Ticket Status is updated to Rejected');

    }
    });
}

</script>
<body bgcolor="#f2f2f2"> 
<div class="row" style="padding-top:20px;">
   <header>
        <div style="float:left; padding: 3px;">
            <img src="odu_logo1.jpg" height="60" width="150">
        </div>
        <div style="margin-left: 500px;">   
            <h2 style="text-decoration: underline;">Procurement Portal</h2>
        </div>
        <div style="float:right;">    
            <button class="logout"><a style='color: #ffffff;' href='logout.php'>LOGOUT</a></button>
        </div>
        <div style="clear: left;"/>    
    </header>  
 <table id="procurement">
  <tr>
    <th>Ticket ID</th>
    <th>Creator</th>
    <th>Request Type</th>
    <th>Created Date</th>
    <th>Approver</th>
    
  </tr> 
<?php

  $id = $_GET["id"];
  $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }  

$sql = "SELECT Ticket_ID,Creator,RequestType,Created_Date,Approver FROM Tickets_Status WHERE Ticket_ID=".$id;
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
        echo"<tr>";
        echo"<td>";echo $row['Ticket_ID']; echo"</td>";
        echo"<td>";echo $row['Creator']; echo"</td>";
        echo"<td>";echo $row['RequestType']; echo"</td>";
        echo"<td>";echo $row['Created_Date']; echo"</td>";
        echo"<td>";echo $row['Approver']; echo"</td>";  
        echo"</tr>";    
}

mysql_close($conn);
?>

</table>
<div class="row" style="padding-top:20px;">
<div class="column1" style="background-color:#fff;">
<button class="button1" onclick='approveUser(<?php echo $id; ?>);'>Approve</button>
 </div>
 <div class="column4" style="background-color:#fff;">
<button class="button2" onclick='rejectUser(<?php echo $id; ?>);'>Reject</button>
 </div>
 </div>  
</form>
</body>
</html>