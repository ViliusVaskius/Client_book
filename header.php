
<?php


session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/compiledSass/sassCompiled.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>




   
   
<div id="header"> 


 <div class="log">




   <img src="knyga3.png" height="200" width="400" alt="">
    

    
<?php 
if(isset($_SESSION['u_id'])){

  /* start */  if(isset($_SESSION['u_id'])){        
        echo  '  <div class="login-bo"> <h5> hello and welcome &nbsp   '.   $_SESSION['u_uid']  ."</h5>" ;

}/* end */
 


echo'

<div class="login-b"> 

      <form action="includes/logout.inc.php" method="POST">

      <button class="logout" type="submit" name="submit">Logout   </button> 

      </form>  

</div> 

       </div>';

}else{





echo'
<div class="new">  <a href="signup.php">  Create new account </a> </div>

<form action="includes/login.inc.php" method="POST" id="log-forma">
   <h3>Sign in</h3>  
<p>Your username:</p> <input type="text" name="uid" id="user">
<p>Your password: </p> <input type="password" name="pwd" id="password"> <br>
<button type="submit" id="login" name="login"> Log In </button>




</form> ';
 



} 



?>



</div>



</div>

<?php
include_once 'profile.php'; ?>