<!DOCTYPE html>
 

<?php
   // include("config.php");
   session_start();
   $var_value = $_SESSION['login_user'];

     $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else{
      console.log("Connected");
    }


  if(isset($_POST['submit'])){
    
      
     $title = mysqli_real_escape_string($conn,$_POST['title']);
     $cost = mysqli_real_escape_string($conn,$_POST['cost']);
     $dateValue = mysqli_real_escape_string($conn,$_POST['dateValue']);
     $description = mysqli_real_escape_string($conn,$_POST['description']);
     $approver = mysqli_real_escape_string($conn,$_POST['approver']);
    
   $sql = "INSERT INTO `Tickets`(Ticket_Title,Ticket_Cost,Ticket_Date,Ticket_Description,Approver)
    VALUES('$title','$cost','$dateValue','$description','$approver')";

   $status = "INSERT INTO `Tickets_Status`(Creator,Created_Date,Ticket_Cost,Ticket_Title,Approver,Supervisor_Approval,Procurement_Approval,Status)
    VALUES('$var_value','$dateValue','$cost','$title','$approver','2','2','')"; 
                    if (mysqli_query($conn, $sql) && mysqli_query($conn, $status)) {
                         header('Location: userProfile2.php');
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
    var ticketTitle = document.getElementById('title').value;
    var cost = document.getElementById('cost').value;
    var createdDate = document.getElementById('dateValue').value;
    var desc = document.getElementById('description').value;
    var newContent = "<html><head><title>Procurement Portal</title></head>";
    newContent += "<body><p>Dear Sir/Madam,</p>";
    newContent += "<body><p>Request you to please approve the below ticket</p>";
    newContent += "<p><h3>Ticket Title :</h3></p>";
    newContent += "<p><h2 style='color:#0000ff;'>"+ticketTitle+"</h2></p>";
    newContent += "<p><h3>Ticket Cost :</h3></p>";
    newContent += "<p><h3 style='color:#ff0000;'>"+cost+"</h3></p>";
    newContent += "<p><h3>Created Date :</h3></p>";
    newContent += "<p><h3 style='color:#ff0000;'>"+createdDate+"</h3></p>";
    newContent += "<p><h3>Description :</h3></p>";
    newContent += "<p><h3 style='color:#037d50;'>"+desc+"</h3></p>";
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
  <form method="POST" action="" onsubmit="return emailMessage();">
   <center><h2>Raise Fresh Ticket</h2></center>
      <div class="row">
         <input type="text" id="title" name="title" placeholder="Ticket Title">
       </div>
       <div class="row">
         <input type="text" id="cost" name="cost" placeholder="Ticket Cost"><br/>
       </div>
       <div class="row">
        <input type="date" id="dateValue" name="dateValue" placeholder="Date">
       </div>        
       <div class="row">
        <select id="approver" name="approver" style='height:40px;'>
          <option >Select Approver</option>
          <option value="Ravi">Ravi Mukkamala</option>
          <option value="Ajay">Ajay Gupta</option>
          <option value="Christy">Christy Chavis</option>
        </select>
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
