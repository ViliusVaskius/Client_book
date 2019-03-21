<?php 
include_once 'header.php';
?>

<hr id="line">
</div> 


<div class="container">
<h2>Register new account</h2>


<legend>
<form id="reg" action="includes/signup.inc.php" method ="POST">
Your name <input type="text" name="first" id="name"> <br>
Your Email <input type="text" name="email" id="email"> <br>

User name <input type="text" name="uid" id="usrName"><br>
Password <input type="password" name="pwd" id="pass"><br>
 <button id="create" type="submit" name="submit">Create</button>
</form>

</legend>

