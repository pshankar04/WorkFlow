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

     $sqlData = "SELECT * FROM Profile WHERE UserID='$var_value'";
        $result = $conn->query($sqlData);
        // $row = $result->fetch_assoc();
        // $transactionLimit = $row['Transaction Limit'];
        // $monthlyLimit = $row['Monthly Limit'];
        while($row = $result->fetch_assoc())
        {
            $transactionLimit = $row['Approver Name'];
            $monthlyLimit = $row['Monthly Limit'];
           
        }


  if(isset($_POST['submit'])){
     $approver="Ajay";
     $request = mysqli_real_escape_string($conn,$_POST['title']);
     echo $request;
     if($request == "limitIncrease"){
         // $dept = mysqli_real_escape_string($conn,$_POST['deptLimitIncrease']);
         // $transactionAmount = mysqli_real_escape_string($conn,$_POST['transAmount']);
         // $monthlyAmount = mysqli_real_escape_string($conn,$_POST['monthlyAmount']);
         // $desiredRange = mysqli_real_escape_string($conn,$_POST['range']);
         $justification = mysqli_real_escape_string($conn,$_POST['justification']);
     }
     else if($request == "lostReceipt"){
         $dept = mysqli_real_escape_string($conn,$_POST['deptLostReceipt']);
         $budgetCode = mysqli_real_escape_string($conn,$_POST['budgetCode']);
         $last_6_Digits = mysqli_real_escape_string($conn,$_POST['last6Digits']);
         $vendor = mysqli_real_escape_string($conn,$_POST['vendorName']);
         $dateValue = mysqli_real_escape_string($conn,$_POST['dateValue']);
         $itemDescription = mysqli_real_escape_string($conn,$_POST['itemDesc']);
         $itemAmount = mysqli_real_escape_string($conn,$_POST['itemAmount']);
         $reasonUnreceipt = mysqli_real_escape_string($conn,$_POST['reasonUnreceipt']);
     }
     else if($request == "carRental"){
         $dept = mysqli_real_escape_string($conn,$_POST['deptCarRental']);
         $exceptionPeriod = mysqli_real_escape_string($conn,$_POST['exceptionPeriod']);
         $dateRangeTemp = mysqli_real_escape_string($conn,$_POST['dateRange']);
     }
     else if($request == "travel"){
         $dept = mysqli_real_escape_string($conn,$_POST['deptTravel']);
         $exceptionPeriod = mysqli_real_escape_string($conn,$_POST['exceptionPeriod']);
         $dateRangeTemp = mysqli_real_escape_string($conn,$_POST['dateRange']);

     }else if($request == "accountCancellation"){
         
         $desiredRange = mysqli_real_escape_string($conn,$_POST['empSeparationDateValue']);
         $additionalComments = mysqli_real_escape_string($conn,$_POST['additionalComments']);
     }
     else if($request == "tempAccountMaintenance"){
         $dept = mysqli_real_escape_string($conn,$_POST['deptAccountMaintain']);
         $firstName = mysqli_real_escape_string($conn,$_POST['firstname']);
         $lastName = mysqli_real_escape_string($conn,$_POST['lastname']);
         $last_4_Digits = mysqli_real_escape_string($conn,$_POST['last4Digits']);
     }
     
    
   // $sql = "INSERT INTO `Tickets`(Ticket_Title,Ticket_Cost,Ticket_Date,Ticket_Description,Approver) VALUES('$title','$cost','$dateValue','$description','$approver')";

  $sql = "SELECT * FROM Profile WHERE UserID='$var_value'";
  $result = mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($result);
  $approver = $row['ApproverID'];  

  $sql_for_Id = "SELECT * FROM Tickets_Status WHERE Created_Date=CURRENT_DATE";
  $result = mysqli_query($conn, $sql_for_Id);
 // $row=mysqli_fetch_array($result);
   $rowcount=mysqli_num_rows($result) + 1;
  //$requestNumber = $row[0];

  // $sql_user = "SELECT count(*) FROM Tickets_Status WHERE Created_Date='now()'";  
  // $result1 = $mysqli->query($sql_user);    
  // $row1 = $result1->fetch_row();    
  // $n_yes = $row1['0'];

  $currentdate = date('mdy');
  $requestID = $currentdate.$rowcount;

   $status = "INSERT INTO `Tickets_Status`(Request_ID,RequestType,Creator,Last_6_digits,Created_Date,Current_Transaction_Amount,Current_Monthly_Amount,desired_Range_Increase,department,budget_Code,Vendor_Name,Item_description,
   Item_Amount,Reason_lost_receipt,Exception_Period,Exception_Period_Temp_Date_Range,Approver,Date_of_charge,Supervisor_Approval,Procurement_Approval,Justification)
VALUES('$requestID','$request','$var_value','$last_6_Digits',now(),'$transactionAmount','$monthlyAmount','$desiredRange','$dept','$budgetCode','$vendor','$itemDescription','$itemAmount','$reasonUnreceipt','$exceptionPeriod','$dateRangeTemp','$approver','$dateValue','2','2','$justification')"; 
                    if (mysqli_query($conn, $status)) {
                         header('Location:userProfile3.php');
                    }else{
                      header ("Location:index.php" );
                      // console.log("Not Created");
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
    background-position: relative;
    background-repeat: no-repeat;
    background-size: cover;
}

input[type=text],input[type=date], select, textarea {

    width: 50%;
    padding: 10px;
    border: 2px solid #666666;
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
  height: relative;
  background: #ffffff;
  display: inline-block;
  border : 2px solid #ffffff;
  padding : 5px;
  padding-top: 50px;
  padding-bottom: 50px;
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
    width:200px;
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
     width:200px;
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
    height:relative;
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
 
.hide{
display:none;
} 


.inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}

.inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: #0099cc;
    display: inline-block;
    padding:10px;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}

.inputfile + label {
  cursor: pointer; /* "hand" cursor */
}

 .inputfile:focus + label {
  outline: 1px dotted #000;
  outline: -webkit-focus-ring-color auto 5px;
}

.custom-file-upload {
  border: 1px solid #ccc;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
}

#uploadFile {
  text-align: center;
  border: none;
  background-color: white;
  color: black;
}

 
</style>
</head>
<body background="webb5.jpg"> 
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   
 <script type="text/javascript">

// document.getElementById("file-upload").onchange = function() {
//   document.getElementById("uploadFile").value = this.value;
// };

function listFiles(){

var input = document.getElementById('file-upload');
var list = document.getElementById('uploadFile');

//empty list for now...
while (list.hasChildNodes()) {
  list.removeChild(ul.firstChild);
}

var li = '';
for (var x = 0; x < input.files.length; x++) {
   li = li + input.files[x].name + "<br/>";
}
 
document.getElementById('uploadFile').innerHTML = li;
}
function emailMessage() {
    
    // var emailId = document.getElementById('email').value;
    var emailId = "pbikk001@odu.edu";
    var ticketTitle = document.getElementById('title').value;
    // var cost = document.getElementById('cost').value;
    // var createdDate = document.getElementById('dateValue').value;
    // var desc = document.getElementById('description').value;
    var newContent = "<html><head><title>Procurement Portal</title></head>";
    newContent += "<body><p>Dear Sir/Madam,</p>";
    newContent += "<body><p>Request you to please approve the below ticket</p>";
    newContent += "<p><h3>Request Type :</h3></p>";
    newContent += "<p><h2 style='color:#0000ff;'>"+ticketTitle+"</h2></p>";
    // newContent += "<p><h3>Ticket Cost :</h3></p>";
    // newContent += "<p><h3 style='color:#ff0000;'>"+cost+"</h3></p>";
    // newContent += "<p><h3>Created Date :</h3></p>";
    // newContent += "<p><h3 style='color:#ff0000;'>"+createdDate+"</h3></p>";
    // newContent += "<p><h3>Description :</h3></p>";
    // newContent += "<p><h3 style='color:#037d50;'>"+desc+"</h3></p>";
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


 

function handleSelection(choice) {
//document.getElementById('select').disabled=true;
if(choice=='limitIncrease')
  {
    document.getElementById(choice).style.display="block";
    document.getElementById('lostReceipt').style.display="none";
    document.getElementById('carRental').style.display="none";
    document.getElementById('travel').style.display="none";
    document.getElementById('accountCancellation').style.display="none";
    document.getElementById('tempAccountMaintenance').style.display="none";
  }
else if(choice=='lostReceipt')
  {
    document.getElementById(choice).style.display="block";
    document.getElementById('limitIncrease').style.display="none";
    document.getElementById('carRental').style.display="none";
    document.getElementById('travel').style.display="none";
    document.getElementById('accountCancellation').style.display="none";
    document.getElementById('tempAccountMaintenance').style.display="none";
  }
 else if(choice=='carRental')
  {
    document.getElementById(choice).style.display="block";
    document.getElementById('lostReceipt').style.display="none";
    document.getElementById('limitIncrease').style.display="none";
    document.getElementById('travel').style.display="none";
    document.getElementById('accountCancellation').style.display="none";
    document.getElementById('tempAccountMaintenance').style.display="none";
  }
  else if(choice=='travel')
  {
    document.getElementById(choice).style.display="block";
    document.getElementById('lostReceipt').style.display="none";
    document.getElementById('carRental').style.display="none";
    document.getElementById('limitIncrease').style.display="none";
    document.getElementById('accountCancellation').style.display="none";
    document.getElementById('tempAccountMaintenance').style.display="none";
  }
  else if(choice=='accountCancellation')
  {
    document.getElementById(choice).style.display="block";
    document.getElementById('lostReceipt').style.display="none";
    document.getElementById('carRental').style.display="none";
    document.getElementById('travel').style.display="none";
    document.getElementById('limitIncrease').style.display="none";
    document.getElementById('tempAccountMaintenance').style.display="none";
  }
  else if(choice=='tempAccountMaintenance')
  {
    document.getElementById(choice).style.display="block";
    document.getElementById('lostReceipt').style.display="none";
    document.getElementById('carRental').style.display="none";
    document.getElementById('travel').style.display="none";
    document.getElementById('accountCancellation').style.display="none";
    document.getElementById('limitIncrease').style.display="none";
  } 

}

function validateException() {
  // Get the checkbox
  
  var checkBox = document.getElementById("temporary");
  // var x = document.getElementById("travelException").value;
  // Get the output text
  var text = document.getElementById("dateRangeTravelException");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

function validateExceptionForCarRental() {
  // Get the checkbox
  
  var exceptionRadio = document.getElementById("carRentalExceptionTemp");
  // var x = document.getElementById("travelException").value;
  // Get the output text
  var text = document.getElementById("dateRangecarRental");

  // If the checkbox is checked, display the output text
  if(exceptionRadio.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }

}

</script> 
 
<center>
<!-- <div class="container"> -->
  <!-- <form method="POST" onsubmit="return emailMessage();" > -->
    <form method="POST" onsubmit="" >
   <center><h2>New Request</h2></center>
      <div class="row">
         <select id="title" name="title" style='height:40px;width:500px;' onChange="handleSelection(value)">
          <option >Select Request Type</option>
          <option value="limitIncrease">PCard Limit Increase</option>
          <option value="lostReceipt">PCard Lost Receipt Certification</option>
          <option value="carRental">Request for Car Rental Exception</option>
          <option value="travel">Request for Travel Exception</option>
          <option value="accountCancellation">Account Cancellation Request Form</option>
          <option value="tempAccountMaintenance">Temporary Account Maintenance Form</option>
        </select>
       </div>
      
        <div class="hide" id="limitIncrease">
           <!--  <input type="text" id="deptLimitIncrease" name="deptLimitIncrease" style="width:470px;" placeholder="Department"></input><br/><br/>
            <input type="text" id="transAmount" name="transAmount" style="width:470px;" placeholder="Current Transaction Amount"></input> <br/><br/>
            <input type="text" id="monthlyAmount" name="monthlyAmount" style="width:470px;" placeholder="Current Monthly Amount"></input> <br/><br/>
            --> 
            <select id="range" name="range" style="width:500px;"> 
                    <option >Desired range of increase</option>
                    <option value="4999-10000">$4,999 Transaction Limit, $10,000 Monthly Limit</option>
                    <option value="4999-15000">$4,999 Transaction Limit, $15,000 Monthly Limit</option>
                    <option value="4999-25000">$4,999 Transaction Limit, $25,000 Monthly Limit</option>
                    <option value="4999-50000">$4,999 Transaction Limit, $50,000 Monthly Limit</option>
                    <option value="4999-100000">$4,999 Transaction Limit, $100,000 Monthly Limit</option>
            </select> <br/><br/>
            <textarea rows="20" cols="20" style="width:500px; height:220px;" id="justification" name="justification" placeholder="Justification for Limit Increase(s)"></textarea> 
        </div>
       
      <div class="hide" id="lostReceipt">
            <!-- <input type="text" id="deptLostReceipt" name="deptLostReceipt" style="width:470px" placeholder="Department"></input><br/><br/> -->
            <input type="text" id="budgetCode" name="budgetCode" style="width:500px;" placeholder="Budget Code(s)"></input> <br/><br/>
            <input type="text" id="last6Digits" name="last6Digits" style="width:500px;" placeholder="Last Six Digits of your P-Card Account Number"></input> <br/><br/>
            <input type="text" id="vendorName" name="vendorName" style="width:500px;" placeholder="Vendor Name"></input> <br/><br/>
            <input placeholder="Date of Charge" id="dateValue" style="width:500px;" name="dateValue" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"> <br/><br/>
            <input type="text" id="itemDesc1" name="itemDesc1" style="width:235px;" placeholder="Item Description"> <input type="text" id="itemAmount1" name="itemAmount1" style="width:235px" placeholder="Item Amount($)"> <br/><br/>
            <input type="text" id="itemDesc2" name="itemDesc2" style="width:235px;" placeholder="Item Description"> <input type="text" id="itemAmount2" name="itemAmount2" style="width:235px" placeholder="Item Amount($)"> <br/><br/>
            <input type="text" id="itemDesc3" name="itemDesc3" style="width:235px;" placeholder="Item Description"> <input type="text" id="itemAmount3" name="itemAmount3" style="width:235px" placeholder="Item Amount($)"> <br/><br/>
            <input type="text" id="itemDesc4" name="itemDesc4" style="width:235px;" placeholder="Item Description"> <input type="text" id="itemAmount4" name="itemAmount4" style="width:235px" placeholder="Item Amount($)"> <br/>
            <p style="text-indent :15em;"><input type="text" id="receiptTotal" name="receiptTotal" style="width:235px" placeholder="Receipt Total($)"></p>
            <textarea rows="20" cols="20" style="width:500px; height:220px;" id="reasonUnreceipt" name="reasonUnreceipt" placeholder="Reason you are unable to provide receipt document"></textarea> <br/><br/>
            <h4 style="color:#cc0000;">I certify by my signature below that the above goods/services were purchased with the PCard <br/> in my name and the goods/services were for official University business.I also 
            certify that <br/>I have included this purchase on my log for the month in which the charge occurred.</h4>
            <input style="width:500px;" type="text" name="signForLostReceipt" id="signForLostReceipt" placeholder="Please Enter your Full Name" required>&nbsp<span style="color:red;">*</span><br><br /> 
      </div>
      <div class="hide" id="carRental">
            <!-- <input type="text" id="deptCarRental" name="deptCarRental" style="width:500px;" placeholder="Department"></input><br/><br/> -->
           <!--  <h3>Exception Period</h3>
            <input type="checkbox" id="exceptionPeriod" name="exceptionPeriod" value="Permanent">Permanent<br><br />
            <input type="checkbox" id="exceptionPeriod" name="exceptionPeriod" value="Temporary">Temporary<br></input><br />
            <input style="display:none" placeholder="Date Range" id="dateRangeCarRental" name="dateRangeCarRental" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"> <br/><br/> -->


            <h3>Exception Period (check one box) </h3>
            <input type="checkBox" name="carRentalExceptionPerm" id="carRentalExceptionPerm" value="Permanent">Permanent(renew with the annual usage analysis) &nbsp &nbsp &nbsp 
            <input style="padding-left: 80px;" type="checkBox" name="carRentalExceptionTemp" id="carRentalExceptionTemp" value="Temporary" onclick="return validateExceptionForCarRental();">Temporary<br></input><br />  
            <input style="display:none" placeholder="Date Range" id="dateRangecarRental" name="dateRangecarRental" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"> <br/><br/>
            <center>
            <p><h4>The Car rental exception may be used to lease vehicles from Enterprise Leasing Company using the referenced </h4></p><p><h4>contract (Contract #XZ21270) for business related travel.</h4></p>
              
              <ul align="left">
                <div style="padding-left: 80px;">
                <li>The PCard is authorized for car rental time and distance fees, airport fees, and allowable tolls only</li>
                <li><p>Fuel, parking and other fees shall not be charged to the PCard.</p></li>
                <li><p>The Cardholder and Approver/Reviewer are responsible for recovering fuel, parking fees, GPS and any<br/>other unauthorized charges.</p></li>
                </div>
              </ul>
            </center>
            <br/>

            <center>
            <p><h4>The Cardholder and Cardholder&#39;s Approver/Reviewer agree to: </h4></p>
              
              <ul align="left">
                <div style="padding-left: 80px;">
                <li><p>Provide credit card information to Enterprise so the traveler will not have to provide the credit card at <br/> check in. State and University policy prohibits the faxing of the credit card
                 account number to a vendor.</p></li>
                <li><p>Document the driver of the vehicle in the monthly ODU Reconciliation Report.</p></li>
                <li><p>Monitor vehicle rentals under this exception for inappropriate use.</p></li>
                <li><p>Recover funds from drivers for rentals that are determined not to be for State business</p></li>
                <li><p>Recover funds for any charges other than car rental and allowable toll fees (parking, EZ passes, fuel,GPS).</p></li>
                <li><p>Forfeit use of this exception on the PCard if it is found to be used inappropriately or procedure is not followed.</p></li>
                </div>
              </ul>
            </center>
            <br/>

              <h4 style="color:#cc0000;">I certify by my signature below my understanding of the use of the travel exception</h4>
              <input style="width:500px;" type="text" name="signForCarRental" id="signForCarRental" placeholder="Please Enter Your Full Name" >&nbsp<span style="color:red;">*</span><br><br /> 


      </div>
      <div class="hide" id="travel">
            <!-- <input type="text" id="deptTravel" name="deptTravel" style="width:500px;" placeholder="Department"></input><br/><br/> -->
            <h3>Exception Period (check one box) </h3>
            <input type="checkBox" name="permanent" id="permanent" value="Permanent">Permanent(renew with the annual usage analysis) &nbsp &nbsp &nbsp 
            <input style="padding-left: 80px;" type="checkBox" name="temporary" id="temporary" value="Temporary" onclick="validateException()" >Temporary<br></input><br />  
            <input style="display:none" placeholder="Date Range" id="dateRangeTravelException" name="dateRangeTravelException" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"> <br/><br/>
            <center>
            <p><h4>The travel exception may be used to purchase mass domestic transportation tickets only and must comply with </h4></p><p><h4>University Travel Policy.</h4></p>
              
              <ul align="left">
                <div style="padding-left: 80px;">
                <li>This exception does not allow for the purchase of international travel tickets.</li>
                <li><p>Mass transportation includes coach or economy airline, bus, and train tickets only.</p></li>
                <li><p>Other business travel expenses are not allowable on the PCard, including but not limited to,<br/>international travel, car rental, lodging, restaurant meals, seating upgrades, shuttles or taxi services</p></li>
                <li><p>Note: Some new airline travel regulations require that passengers who purchase electronic tickets with a<br/>charge card must produce the card at check-in. It is recommended that verification be performed with<br/>
                    the airline of choice to determine the airline practices.<br/></p></li>
                </div>
              </ul>
            </center>
            <br/>
              <h4 style="color:#cc0000;">I certify by my signature below my understanding of the use of the travel exception</h4>
              <input style="width:500px;" type="text" name="signForTravelException" id="signForTravelException" placeholder="Please Enter Your Full Name">&nbsp<span style="color:red;">*</span><br><br />      

      </div>
      <div class="hide" id="accountCancellation">
            <!-- <input type="text" id="deptAccountCancellation" name="deptAccountCancellation" style="width:470px" placeholder="Department"></input><br/><br/> -->
            <!-- <input type="text" id="last4Digits" name="last4Digits" style="width:470px;" placeholder="Last Four Digits of your P-Card Account Number"></input> <br/><br/> <br/><br/>  -->
<input style="width:495px;" placeholder="Employee Separation Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="empSeparationDateValue" name="empSeparationDateValue" required />&nbsp<span style="color:red;">*</span><br/><br/>
          <input style="width:500px;" placeholder="Begin Date for Protective Suspension (atleast 2 weeks prior to separation date)" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="suspensionBeginDate" name="suspensionBeginDate"> <br/><br/>
            <textarea rows="20" cols="20" style="width:500px; height:220px;" id="additionalComments" name="additionalComments" placeholder="Additional Comments"></textarea> <br/><br/>
      </div>
      <div class="hide" id="tempAccountMaintenance">
            <!-- <input type="text" id="firstname" name="firstname" style="width:470px;" placeholder="Cardholder First Name"></input><br/><br/>
            <input type="text" id="lastname" name="lastname" style="width:470px;" placeholder="Cardholder Last Name"></input><br/><br/>
            <input type="text" id="last4Digits" name="last4Digits" style="width:470px;" placeholder="Last Four Digits of your P-Card Account Number"></input> <br/><br/> 
            <input type="text" id="deptAccountMaintain" name="deptAccountMaintain" style="width:470px;" placeholder="Department"></input><br/><br/> -->
            
             <select id="temporaryLimitRequested" name="temporaryLimitRequested" style="width:500px;"> 
                    <option >Temporary Limit Requested</option>
                    <option value="15000">Increase monthly cycle limit (temporarily) to $15,000</option>
                    <option value="25000">Increase monthly cycle limit (temporarily) to $25,000</option>
                    <option value="50000">Increase monthly cycle limit (temporarily) to $50,000</option>
                    <option value="100000">Increase monthly cycle limit (temporarily) to $100,000</option>
             </select><br/><br/>
             <textarea rows="20" cols="20" style="width:500px; height:220px;" id="temporaryLimitJustification" name="temporaryLimitJustification" placeholder="Temporary Limit Justification"></textarea> <br/><br/>
             <p> <h4>Have all transactions available for signoff been signed off by cardholder and approver ? </h4></p> <p><h4>(This will free up funds if the monthly limit has not been reached.)</h4></p>
              <input type="radio" name="signedOff" value="yes"> Yes <input type="radio" name="signedOff" value="no"> No <br/><br/>
              <input style="width:490px;" placeholder="Begin Date Requested for Adjustment" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="beginDateForAdjustment" name="beginDateForAdjustment" required />&nbsp<span style="color:red;">*</span> <br/><br/>
              <input style="width:490px;" placeholder="End Date Requested for Adjustment" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="beginDateForAdjustment" name="beginDateForAdjustment" required />&nbsp<span style="color:red;">*</span><br/><br/>
              <textarea rows="20" cols="20" style="width:500px; height:220px;" id="additionalCommentsTempAccount" name="additionalCommentsTempAccount" placeholder="Additional Comments"></textarea> <br/><br/>
              <p><h4>Upload Additional Documentation (if needed)</h4><br/>
              <!-- <input type="text" id="uploadFile" name="uploadFile" style="width:220px; height:40px;" placeholder=" Choose File" disabled="disabled" /> <input type="file" name="fileUpload" id="fileUpload" class="inputfile" /><label for="fileUpload"> Upload </label></p><br/><br/>
            -->   <!-- <input type="file" class="inputfile" name="fileUpload" id="fileUpload" accept="file_extension|audio/*|video/*|image/*|media_type" />  <label for="file">Choose a file</label> -->
           <label for="file-upload" class="custom-file-upload" style="background: #476ce8; color:white;">
            <i class="fa fa-cloud-upload"></i> Upload File
           </label>
           <!-- <input id="file-upload" name='file-upload[]' type="file" accept="file_extension|audio/*|video/*|image/*|media_type" style="display:none;" onchange="document.getElementById('uploadFile').value = this.value;" multiple="true"> -->
           
           <input id="file-upload" name='file-upload[]' type="file" accept="file_extension|audio/*|video/*|image/*|media_type" style="display:none;" onchange="return listFiles();" multiple="true"><p id="uploadFile" placeholder="No File" disabled="disabled" ></p> 
        
           <!-- <textarea rows="20" cols="20" id="uploadFile" placeholder="No File" style="width: 400px;" disabled="enabled"></textarea> -->
             
</div>
</div>

      </div>
      <br/><br/>
    <div class="row">
      <input type="reset" value="RESET"> &nbsp &nbsp &nbsp &nbsp
      <input type="submit" name="submit" value="SUBMIT">
    </div>
  </form>
<!-- </div> -->
</center>
</body>
</html>
