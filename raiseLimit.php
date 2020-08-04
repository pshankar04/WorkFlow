<!DOCTYPE html>


<?php
   // include("config.php");
   session_start();
     $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else{
      console.log("Connected");
    }
console.log("Before Created 1");

  if(isset($_POST['submit'])){
    console.log("Before Created 2");
      
     $title = mysqli_real_escape_string($conn,$_POST['title']);
     $cost = mysqli_real_escape_string($conn,$_POST['cost']);
     $dateValue = mysqli_real_escape_string($conn,$_POST['dateValue']);
     $description = mysqli_real_escape_string($conn,$_POST['description']);
     $approver = mysqli_real_escape_string($conn,$_POST['approver']);
    
   
    $sql = "INSERT INTO `Tickets`(Ticket_Title,Ticket_Cost,Ticket_Date,Ticket_Description,Approver) VALUES('$title','$cost','$dateValue','$description','$approver')";
                    if (mysqli_query($conn, $sql)) {
                        console.log("Created");
                    }else{
                      console.log("Not Created");
                    }
   }
   mysql_close($conn);
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
    padding-top: 100px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

input[type=text],input[type=date], select, textarea {

    width: 50%;
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    float: center;
    height: 40px;
    padding-bottom: 10px;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

form {
  width: 50%;
  height: 700px;
  background: #ffffff;
  display: inline-block;
  border : 2px solid #ffffff;
  padding : 5px;
  padding-top: 50px;
  float: center;
   opacity: 0.9;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: center;
    padding-top: 10px;
}

input[type=reset] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: center;
     padding-top: 10px;
}

input[type=submit]:hover {
    background-color: #45a049;
}

input[type=reset]:hover {
    background-color: #45a049;
}
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    float: center;
}
 

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
    padding-top: 15px;
    padding-bottom: 15px;
}

.custom-select {
  position: relative;
  font-family: Arial;
}
.custom-select select {
  display: none; /*hide original SELECT element:*/
}
 
 
</style>
</head>
<body background="webb5.jpg"> 
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
function emailMessage() {
    
    var emailId = document.getElementById('email').value;
    var cardLimit = document.getElementById('limit').value;
    var expectedLimit = document.getElementById('elimit').value;
    var desc = document.getElementById('description').value;
    var newContent = "<html><head><title>Procurement Portal</title></head>";
    newContent += "<body><p>Dear Sir/Madam,</p>";
    newContent += "<p>"+desc+"</p>";
    newContent += "<p><h3>Current P-Card limit :</h3></p>";
    newContent += "<p><h3>"+cardLimit+"</h3></p>";
    newContent += "<p><h3>Expected P-Card limit :</h3></p>";
    newContent += "<p><h3>"+expectedLimit+"</h3></p>";
    newContent += "<p><h3>Please follow the below URL to approve the same</h3></p>";
    newContent += "<p><h3><a href='http://qav2.cs.odu.edu/puneeth/WorkFlow/index.php'>CLICK HERE</a></h3></p>";
    newContent += "</body></html>";

    $.ajax({
      url:"emailApprover.php",  
      type: "POST",
      data: {msg: " "+newContent+".",email:""+emailId},
      success:function(popData){
       alert(popData);
     },
     error: function (request, status, error) {
        alert("Your request has been sent to your Supervisor");
    }

   });
  }
</script> 
 
<center>
<!-- <div class="container"> -->
  <form method="POST" action="userProfile2.php" onsubmit="return emailMessage();">
   <center><h2>Raise P-Card Limit</h2></center>
       <div class="row">
         <input type="text" id="limit" name="limit" placeholder="Current P-Card Limit"><br/>
       </div>
        <div class="row">
         <input type="text" id="elimit" name="elimit" placeholder="Expected P-Card Limit"><br/>
       </div>      
       <div class="row">
        <input type="text" id="email" name="email" placeholder="Supervisor Email Id"><br/>
      </div>
      <div class="row">
        <textarea id="description" name="description" placeholder="Ticket Description" style="height:200px"></textarea><br/>
     </div>
    
    <div class="row">
      <input type="reset" value="Reset"> &nbsp &nbsp
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
<!-- </div> -->
</center>
</body>
</html>
