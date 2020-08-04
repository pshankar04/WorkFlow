<?php
  // include("config.php");
  session_start();
  $host="handson-mysql"; // Host name 
  $username="kumar"; // Mysql username 
  $password="kumar";
  $db_name="Procurement"; // Database name 
  // Connect to server and select databse.
  $con=mysqli_connect("$host", "$username", "$password","$db_name")or die("Cannot Connect to the database please contact admin."); 
 // mysql_select_db("$db_name")or die("cannot select DB");

  $userNameErr = $passwordErr = "";

  if($_SERVER["REQUEST_METHOD"] == "POST") {
   
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']);
      $myusername = test_input($myusername);
      $mypassword = test_input($mypassword);

      if(empty($myusername)){
        $userNameErr = "Please enter User Name";
      }
      if(empty($mypassword)){
         $passwordErr = "Please enter Password";
      }


    $query = "SELECT * FROM Profile WHERE UPPER(UserID)=UPPER('$myusername') AND Password='$mypassword'";
   $result=mysqli_query($con,$query) or die("Unable to connect to db");
   // $row = mysql_fetch_assoc($result);
   
   $count=mysqli_num_rows($result);
   
    
      if($count == 1) {
         // session_register("myusername");
          $_SESSION['login_user'] = $myusername;
          if($myusername == 'prct1'){
              header("location: procurement.php");
          }else{
              header("location: userProfile4.php");
          }
      }else {
         
         $error = "Your Login Name or Password is invalid";
      }
   }
mysqli_close($con);

 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>


<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- <script>
    
    $( document ).ready(function() {
    $("#loginForm input").on('keyup',function(e){
        console.log(e.currentTarget.name);
        document.getElementById(e.currentTarget.name).innerHTML="";  
    });
});

</script> -->

<div class="bg">  
<div class="login-page">
  <div class="form" style='padding: 5% 10% 5% 10%;'>
    <center><img src="logo.png" width='250' height='250' style='padding-bottom:50px;'></center>
   <!--  <form  action="userProfile2.php" class="register-form" method='POST'>      
      <input type="text" name = "UserID" placeholder="User Name"/>
      <input type="password" name = "Password" placeholder="Password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form> -->   
    <form action="" name="loginForm" class="login-form" method='POST'>
      <input type="text" name ="username" placeholder="Username"/>
      <span class="error" id="uname" style="color:red"> <?php echo $userNameErr; ?> </span>
      <input type="password" name ="password" placeholder="Password"/>
      <span class="error" id="pass" style="color:red"> <?php echo $passwordErr; ?> </span>
      <!-- <input type="hidden" name="user" value="<?php //echo $user; ?>" /> -->
      <br/>
      <input type="reset" name="reset" value="RESET"  style="font-size:10pt;color:white;background-color: #4CAF50;border-radius: 4px; padding:20px; width:250px"/><input type="submit" name="submit" value="LOGIN"  style="font-size:10pt;color:white;background-color: #4CAF50;border-radius: 4px; padding:20px; width:250px" />
      <br/>
      <p id='errorMessage' name='errorMessage'></p>
     <!--  <button>login</button> -->
      <!-- <p class="message">Not registered? <a href="#">Create an account</a></p> -->
    </form>
  </div> 
</div>
</div>
</body>
</html>