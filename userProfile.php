<!DOCTYPE html>

<?php
   $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }  
$name="Ajay";

$sql = "SELECT Ticket_ID,Ticket_Title,Created_Date,Approver,Supervisor_Approval,Procurement_Approval FROM Tickets_Status WHERE Creator='Ajay'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["Ticket_ID"]. " - Creator: ". $row["Ticket_Title"]. " " . $row["Approver"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
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

form {
  width: 90%;
  height: relative;
  background: #ffffff;
  display: inline-block;
  border : 2px solid #ffffff;
  padding : 5px;
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
 

#procurement {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    float: center;
    padding-left: 30px;
    overflow: auto;
    position: relative;
    height: 300px;   
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
    background-color: #4CAF50;
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
<body background="odu_lion.jpg">

<form background="#ffffff">
<div class="row">
  <div class="column3"><br/><br/>
    <img src="empty_male.png" width="160" height="160"><br/>
    <h2>Ajay Gupta</h2>
    <p><i>Professor</i><p>
    <p><i>Department of Computer Science</i><p>
  </div>
  <div class="column2" style="background-color:#fff;">
    <table id="analytics">
        <tr>
             <th><strong>PCard Limit</strong></th>
         </tr>
         <tr>
            <td bgcolor="#ffffff" style='color: #c94c4c;'><strong>$5000</strong></td> 
         </tr>
    </table>  
<br/><br/>
    <table id="analytics">
        
  <tr>
    <th>Approved Count</th>
    <th>Rejected Count</th>    
  </tr>
  <tr>
    <td bgcolor="#ffffff"><strong>100</strong></td>
    <td bgcolor="#ffffff"><strong>50</strong></td>
  </tr>
   <tr>
    <td ><button class="button1">View Approved Tickets</button></td>
    <td ><button class="button2">View Rejected Tickets</button></td>
  </tr>
</table>
<br/><br/>
 <table id="borderLessTable">
    <tr>
        <td><button class="button3"><a href="http://qav2.cs.odu.edu/puneeth/WorkFlow/raiseTicket.php">Raise Fresh Ticket</a></button></td>
        <td><button class="button3">Request Limit Increase</button></td>
    </tr>    
</table>
  </div>
</div>


<div class="row" style="padding-top:20px;">
 <table id="procurement">
  <tr>
    <th>Ticket Id</th>
    <th>Ticket Title</th>
    <th>Date</th>
    <th>Approver Name</th>
    <th>Supervisor Approval</th>
    <th>Procurement Approval</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>100</td>
    <td>Travel Ticket</td>
    <td>07/12/2018</td>
    <td>Ravi Mukkamala</td>
    <td></td>
    <td></td>
    <td><button class="button3">Expand</button></td>
  </tr>

  <tr>
    <td>102</td>
    <td>Hotel Booking</td>
    <td>07/12/2018</td>
    <td>Ravi Mukkamala</td>
    <td></td>
    <td></td>
    <td><button class="button3">Expand</button></td>
  </tr>

  <tr>
    <td>103</td>
    <td>Car Insurance</td>
    <td>07/12/2018</td>
    <td>Christy Chavis</td>
    <td></td>
    <td></td>
    <td><button class="button3">Expand</button></td>
  </tr>

  <tr>
    <td>104</td>
    <td>Car Insurance</td>
    <td>07/12/2018</td>
    <td>Christy Chavis</td>
    <td></td>
    <td></td>
    <td><button class="button3">Expand</button></td>
  </tr>
</table>
 </div> 
 
</form>
</body>
</html>
