<?php
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

  // $conn = mysqli_connect('localhost', 'root', '', 'srs-db') or die('ERROR: Cannot Connect='.mysql_error($conn));
  $conn = new mysqli("handson-mysql","kumar", "kumar", "Procurement") OR die ('Could not connect to MySQL: '.mysql_error());
 mysqli_query($conn,"Update Tickets_Status set Supervisor_Approval='0' where Ticket_ID=".$data);

?>