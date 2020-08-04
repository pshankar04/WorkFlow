<!DOCTYPE html>
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
  position: relative;
  width: 65%;
  height: 550px;
  background: #ffffff;
  display: inline-block;
  border : 2px solid #ffffff;
  padding : 5px;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
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
    width: 40%;
    padding: 20px;
    padding-left: 60px;
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
    padding-left: 40px;
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
    border: none;
    color: white;
    padding: 15px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
.button2 {
    background-color: #f6665c; /* Red */
    border: none;
    color: white;
    padding: 15px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}

</style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
function approveUser(id){

     // trid=id.split('-')[1];
     //alert(trid);

    $.ajax({
        url: "userApproval.php",
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
        url: "userReject.php",
        type:"post",
        data:{ val : id },


        success: function(result){
            alert('Ticket Status is updated to Rejected');

    }
    });
}
</script>
<body background="odu_lion.jpg">

<form background="#ffffff">
<div class="row">
  <div class="column3"><br/><br/>
    <img src="empty_female.png" width="160" height="160"><br/>
    <h2>Christy Chavis</h2>
    <!-- <p>Professor<p> -->
    <p>Department of Computer Science<p>
    <h3>#100</h3>
  </div>
  <div class="column2" style="background-color:#fff;">
    <h2>Ticket Title</h2><br/>
    <input type="text" name="cost" placeholder="Cost"> <br/><br/>
    <input type="text" name="date" placeholder="Date"><br/><br/>
    <input type="text" name="approver" value="Ravi Mukkamala"><br/><br/><br/>
    <textarea rows="6" cols="20" placeholder="Ticket Description"></textarea><br/>
  </div>
</div>
<div class="row" style="padding-top:20px;">
<div class="column1" style="background-color:#fff;">
<button class="button1">Approve</button>
 </div>
 <div class="column4" style="background-color:#fff;">
<button class="button2">Reject</button>
 </div> 
</div>
</form>
</body>
</html>
