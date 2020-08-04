<?php
session_start();
$var_value = $_SESSION['login_user'];

$data=$_POST['val'];
$status =explode('-',$data);
$user_id=$status[1];

echo $data;
if($status[0]=='acc'){
    $value=1;
}
elseif($status[0]=='rec'){
    $value=0;
}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
  // $conn = mysqli_connect('localhost', 'root', '', 'srs-db') or die('ERROR: Cannot Connect='.mysql_error($conn));
  // $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());

  $conn = mysqli_connect("handson-mysql","kumar", "kumar", "Procurement");
  if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  $sql = "SELECT * FROM Tickets_Status WHERE Ticket_ID=".$data;
  $result = mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($result);
  $user = $row['Creator'];
  $requestType = $row['RequestType'];
  $range = $row['desired_Range_Increase'];
  $amount=explode('-',$range);
  $startAmount = $amount[0];
  $endAmount = $amount[1];
    
   
   if($requestType =='limitIncrease'){
 	mysqli_query($conn,"Update Profile set TransactionLimit='$startAmount',MonthlyLimit='$endAmount' where UserID='$user'");
   }
   mysqli_query($conn,"Update Tickets_Status set Procurement_Approval='1' where Ticket_ID=".$data);


mysqli_close($conn);

?>