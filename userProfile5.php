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
    /*padding-top: 50px;*/
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

div.container {
 max-width: 1450px;
 width: 100%;
 border: none;
 margin: auto;
 overflow-x: hidden;
 overflow-y: hidden;
 position: relative;
}

header{
 width: 100%;
 padding: 0.5em;
 color: white;
 background-color: #3b5998;
 clear: left;
 text-align: left;
}

footer{
 width: 100%;
 padding: 0.2em;
 color: white;
 background-color: #3b5998;
 clear: left;
 text-align: left;
}

a, u {
    text-decoration: none;
}

form {
  width: 95%;
  height: relative;
  background: #ffffff;
  display: inline-block;
  border : 2px solid #ffffff;
  padding : 5px;
  margin-top: 30px;
  margin-right: 20px;
  margin-left: 20px;
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
    border-radius: 2px;
    border: 5px;
    color: #ffffff;
    padding: 12px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
}
.button2 {
    background-color: #f6665c; /* Red */
    border-radius: 2px;
    border: 5px;
    color: white;
    padding: 12px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
}

.button3 {
    background-color: #55ACEE; /* violet */
    border-radius: 2px;
    border: 5px;
    color: #fff;
    padding: 12px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
}

.logout {
border-radius: 2px;
padding: 20px;
padding-top: 15px;
padding-left: 15px;
padding-right: 15px;
padding-bottom: 10px;
width: 80px;
font-size: 12px;
display:block;
background-color: #8b9dc3;
color: #ffffff;
text-align:center;
position: absolute;
top: 25px;
right: 30px;
}
 
.h5{
    color: #ffffff;
    font-size: 20px;
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

.banner {
position: absolute;
right: 0px;
top: 90px;
color: #ffffff;
}

#pr th[role=columnheader]:not(.no-sort) {
    cursor: pointer;
}

#pr th[role=columnheader]:not(.no-sort):after {
    content: '';
    float: right;
    margin-top: 7px;
    border-width: 0 4px 4px;
    border-style: solid;
    border-color: #404040 transparent;
    visibility: hidden;
    opacity: 0;
    -ms-user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

#pr th[aria-sort=ascending]:not(.no-sort):after {
    border-bottom: none;
    border-width: 4px 4px 0;
}

#pr th[aria-sort]:not(.no-sort):after {
    visibility: visible;
    opacity: 0.4;
}

#pr th[role=columnheader]:not(.no-sort):hover:after {
    visibility: visible;
    opacity: 1;
}

</style>
</head>
<!-- <body background="odu_lion.jpg"> -->
 <script src='tablesort.min.js'></script>

<!-- Include sort types you need -->
<script src='tablesort.number.js'></script>
<script src='tablesort.date.js'></script>
<script src='tablesort.js'></script>
<script>
  var table = document.getElementById('pr');
  var sort = new Tablesort(table);

// Make some Ajax request to fetch new data and on success:
sort.refresh();
</script>

<body bgcolor="#f2f2f2">
    <!-- <div class="container"> -->
    <header>
        <h3>Procurement Portal</h3> <button class="logout"><a style='color: #ffffff;' href='logout.php'>LOGOUT</a></button>
    </header>
        <form background="#ffffff">
<div class="row">
  <div class="column3"><br/><br/>
    <img src="empty_male.png" width="160" height="160"><br/>
      <?php
        
        $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }  

        $sqlData = "SELECT * FROM Profile WHERE UserID='$var_value'";
        $result = $conn->query($sqlData);
        // $row = $result->fetch_assoc();
        // $transactionLimit = $row['Transaction Limit'];
        // $monthlyLimit = $row['Monthly Limit'];
        while($row = $result->fetch_assoc())
        {
            $firstName = $row['FirstName'];
            $lastName = $row['LastName'];
           
        }
        echo "<h2>";  echo strtoupper($firstName); echo " "; echo strtoupper($lastName);  echo "</h2>";
        mysql_close($conn);
    ?>

    
    <!-- <p><i>Professor</i><p>
    <p><i>Department of Computer Science</i><p> -->
  </div>
  <div class="column2" style="background-color:#fff;">

    <table id="analytics">
        <tr>
             <th><strong>Your UIN</strong></th>
             <th><strong>Approver Name</strong></th>
         </tr>
         <tr>

           <!--  // echo "<td bgcolor='#ffffff' style='color: #c94c4c;'>";echo"<strong>"; echo $pcardLimit; echo "</strong></td>";
            // echo "<td>"; echo $pcardLimit; echo "</td>"; -->
   <?php
        
        $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }  

        $sqlData = "SELECT * FROM Profile WHERE UserID='$var_value'";
        $result = $conn->query($sqlData);
        // $row = $result->fetch_assoc();
        // $transactionLimit = $row['Transaction Limit'];
        // $monthlyLimit = $row['Monthly Limit'];
        while($row = $result->fetch_assoc())
        {
            $approverId = $row['UIN'];
            $approverName = $row['ApproverName'];
           
        }
        echo "<td><p id='pcard'>";   echo $approverId;  echo "</p></td>";
        echo "<td><p id='pcard'>";   echo $approverName;  echo "</p></td>";
        mysql_close($conn);
    ?>      
         </tr>
    </table> 

<br/><br/>

    <table id="analytics">
        <tr>
             <th><strong>PCard Transaction Limit</strong></th>
             <th><strong>PCard Monthly Limit</strong></th>
         </tr>
         <tr>

           <!--  // echo "<td bgcolor='#ffffff' style='color: #c94c4c;'>";echo"<strong>"; echo $pcardLimit; echo "</strong></td>";
            // echo "<td>"; echo $pcardLimit; echo "</td>"; -->
   <?php
        
        $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }  

        $sqlData = "SELECT * FROM Profile WHERE UserID='$var_value'";
        $result = $conn->query($sqlData);
        // $row = $result->fetch_assoc();
        // $transactionLimit = $row['Transaction Limit'];
        // $monthlyLimit = $row['Monthly Limit'];
        while($row = $result->fetch_assoc())
        {
            $transactionLimit = $row['TransactionLimit'];
            $monthlyLimit = $row['MonthlyLimit'];
           
        }
        echo "<td><p id='pcard'>";   echo "$".$transactionLimit;  echo "</p></td>";
        echo "<td><p id='pcard'>";   echo "$".$monthlyLimit;  echo "</p></td>";
        mysql_close($conn);
    ?>      
         </tr>
    </table>  
<br/><br/>
    <table id="analytics">
 <!--        
  <tr>
    <th>Approved Count</th>
    <th>Rejected Count</th>    
  </tr> -->

   <tr>
    <td ><button class="button1"> <a href='http://qav2.cs.odu.edu/puneeth/WorkFlow/approvedTickets.php'>Approved Tickets</a></button></td>
    <td ><button class="button2"> <a href='http://qav2.cs.odu.edu/puneeth/WorkFlow/rejectedTickets.php'>Rejected Tickets</a></button></td>
  </tr>
</table>
<br/><br/>
 <table id="borderLessTable">
    <tr>
        <td><button class="button3"><a href="http://qav2.cs.odu.edu/puneeth/WorkFlow/dynamicRequest.php">New Request</a></button></td>
        <!-- <td><button class="button3"><a href="http://qav2.cs.odu.edu/puneeth/WorkFlow/raiseLimit.php">Request Limit Increase</a></button></td> -->
    </tr>    
</table>
  </div>
</div>

<br/><br/>
<h3><ul>Requests Pending for your Approval</ul></h3>
<div class="row" style="padding-top:20px;">
 <table id="pr">
  <thead>  
  <tr>
    <th data-sort-method='thead'>Request Type</th>
    <th data-sort-method='date'>Date</th>
    <th data-sort-method='thead'>Creator</th>
    <th data-sort-method='thead'>Supervisor Approval</th>
    <th data-sort-method='thead'>Procurement Approval</th>
    <th data-sort-method='thead'>View</th>
  </tr>
</thead>
<?php
 
  $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }  

$sql = "SELECT * FROM Tickets_Status WHERE Approver='$var_value' AND Supervisor_Approval='2'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
        $id = $row['Ticket_ID'];
        $request = $row['RequestType'];

        echo"<tr>";
         if($request == 'limitIncrease'){
           echo"<td>";echo 'PCard Limit Increase'; echo"</td>";
        }elseif($request == 'lostReceipt'){
            echo"<td>";echo 'PCard Lost Receipt Certification'; echo"</td>";
        }elseif($request == 'carRental'){
            echo"<td>";echo 'Request for Car Rental Exception'; echo"</td>";
        }elseif($request == 'travel'){
            echo"<td>";echo 'Request for Travel Exception'; echo"</td>";
        }elseif($request == 'accountCancellation'){
            echo"<td>";echo 'Account Cancellation Request Form'; echo"</td>";
        }elseif($request == 'tempAccountMaintenance'){
            echo"<td>";echo 'Temporary Account Maintenance Form'; echo"</td>";
        } 

        
        echo"<td>";echo $row['Created_Date']; echo"</td>";
        echo"<td>";echo $row['Creator']; echo"</td>";
        if($row['Supervisor_Approval'] == '1'){
           // echo"<td>"; echo "Approved";echo"</td>";
            echo"<td>"; echo "<img height='20' width='20' src='approved.jpg'></img>";echo"</td>";  
        }
        elseif($row['Supervisor_Approval'] == '2'){
            // echo"<td>"; echo "Pending";echo"</td>";
            echo"<td>"; echo "<img height='20' width='20' src='pending5.png'></img>";echo"</td>"; 
        }
        else{
            // echo"<td>"; echo "Rejected";echo"</td>";
            echo"<td>"; echo "<img height='20' width='20' src='rejected.jpg'></img>";echo"</td>"; 
        }

        if($row['Procurement_Approval'] == '1'){
           // echo"<td>"; echo "Approved";echo"</td>";   
            echo"<td>"; echo "<img height='20' width='20' src='approved.jpg'></img>";echo"</td>";  
        }
        elseif($row['Procurement_Approval'] == '2'){
            // echo"<td>"; echo "Pending";echo"</td>";  
            echo"<td>"; echo "<img height='20' width='20' src='pending5.png'></img>";echo"</td>"; 
        }
        else{
            // echo"<td>"; echo "Rejected";echo"</td>";
            echo"<td>"; echo "<img height='20' width='20' src='rejected.jpg'></img>";echo"</td>"; 
        }
    
        $request = $row['RequestType'];

         if($request == 'limitIncrease'){
            echo"<td>";echo "<a href='http://qav2.cs.odu.edu/puneeth/WorkFlow/limitIncrease.php?id=$id'>"; echo $row['Request_ID']; echo"</a></td>"; 
        }else{
            echo"<td>";echo "<a href='http://qav2.cs.odu.edu/puneeth/WorkFlow/dataPullUser.php?id=$id'>"; echo $row['Request_ID']; echo"</a></td>"; 
        }
        echo"</tr>"; 
}

mysql_close($conn);
// session_destroy();
?>
</table>
 </div>  

<br/><br/>
<h3><ul>Your Recent Requests</ul></h3>
<div class="row" style="padding-top:20px;">
 <table id="pr">
    <thead>
  <tr>
   <!--  <th>Request Type</th>
    <th>Date</th>
    <th>Supervisor Approval</th>
    <th>Procurement Approval</th>
    <th>View</th> -->

     <th data-sort-method='thead'>Request Type</th>
    <th data-sort-method='date'>Date</th>
    <!-- <th data-sort-method='thead'>Creator</th> -->
    <th data-sort-method='thead'>Supervisor Approval</th>
    <th data-sort-method='thead'>Procurement Approval</th>
    <th data-sort-method='thead'>View</th>
  </tr>
  </thead>
<?php
 
  $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }  

$sql = "SELECT * FROM Tickets_Status WHERE Creator='$var_value'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
        $id = $row['Ticket_ID'];
        $request = $row['RequestType'];

        echo"<tr>";
         if($request == 'limitIncrease'){
           echo"<td>";echo 'PCard Limit Increase'; echo"</td>";
        }elseif($request == 'lostReceipt'){
            echo"<td>";echo 'PCard Lost Receipt Certification'; echo"</td>";
        }elseif($request == 'carRental'){
            echo"<td>";echo 'Request for Car Rental Exception'; echo"</td>";
        }elseif($request == 'travel'){
            echo"<td>";echo 'Request for Travel Exception'; echo"</td>";
        }elseif($request == 'accountCancellation'){
            echo"<td>";echo 'Account Cancellation Request Form'; echo"</td>";
        }elseif($request == 'tempAccountMaintenance'){
            echo"<td>";echo 'Temporary Account Maintenance Form'; echo"</td>";
        } 
        echo"<td>";echo $row['Created_Date']; echo"</td>";
       
        if($row['Supervisor_Approval'] == '1'){
           // echo"<td>"; echo "Approved";echo"</td>";
            echo"<td>"; echo "<img height='20' width='20' src='approved.jpg'></img>";echo"</td>";   
            
        }
        elseif($row['Supervisor_Approval'] == '2'){
            // echo"<td>"; echo "Pending";echo"</td>";
            echo"<td>"; echo "<img height='20' width='20' src='pending5.png'></img>";echo"</td>"; 
        }
        else{
            // echo"<td>"; echo "Rejected";echo"</td>";
            echo"<td>"; echo "<img height='20' width='20' src='rejected.jpg'></img>";echo"</td>";   
        }

        if($row['Procurement_Approval'] == '1'){
           // echo"<td>"; echo "Approved";echo"</td>";   
            echo"<td>"; echo "<img height='20' width='20' src='approved.jpg'></img>";echo"</td>";   
        }
        elseif($row['Procurement_Approval'] == '2'){
            // echo"<td>"; echo "Pending";echo"</td>";  
            echo"<td>"; echo "<img height='20' width='20' src='pending5.png'></img>";echo"</td>"; 
        }
        else{
            // echo"<td>"; echo "Rejected";echo"</td>";
            echo"<td>"; echo "<img height='20' width='20' src='rejected.jpg'></img>";echo"</td>"; 
        }
    

        // if($row['Supervisor_Approval'] == '1' && $row['Procurement_Approval'] == '1'){
        //     $pcardLimit = $pcardLimit - $row['Ticket_Cost'];    
        // }
        
        echo"<td>";echo "<a href='http://qav2.cs.odu.edu/puneeth/WorkFlow/userView.php?id=$id'>"; echo $row['Request_ID']; echo"</a></td>"; 
        echo"</tr>"; 
}

mysql_close($conn);
?>
</table>
 </div> 
 

</form>
<footer><h4>Old Dominion University</h4></footer>
<!-- </div> -->
</body>
</html>
