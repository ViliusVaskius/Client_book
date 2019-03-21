

<?php

if(isset($_SESSION['u_id'])){

   
 
include "includes/dbh.inc.php";
$query = "SELECT * FROM clients";
$result = mysqli_query($conn, $query);
//$alertMassage = '';
//check for query string
 


if (isset($_GET['alert'])) {

   //new client added
   if($_GET['alert'] == 'success' ) {
      $alertMassage = "<div class= 'alert alert-success'> New client added <a class ='close' data-dismiss= 'alert'>
&times;</a> </div> ";
   }  elseif($_GET['alert'] =='updatesuccess' ){
      $alertMassage = "<div class= 'alert alert-success'> Client Updated <a class ='close' data-dismiss= 'alert'>
&times;</a> </div> ";
   } elseif($_GET['alert'] =='deleted' ){
      $alertMassage = "<div class= 'alert alert-success'> Client deleted <a class ='close' data-dismiss= 'alert'>
&times;</a> </div> ";}

   
}//alert



echo '


<table class="table table-striped table-bordered"> 
<tr> 
   <th>Name </th>
   <th>Email </th>
   <th>Phone </th>
   <th>Address </th>
   <th>Company </th>
   <th>About </th>
   <th>Edit </th>

</tr> ';
if(isset($alertMassage)){
   echo $alertMassage;
}

if(mysqli_num_rows($result)> 0){
   while($row =mysqli_fetch_assoc($result) ){
      echo"<tr>";
         echo"<td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] ."</td><td>" 
         . $row['address'] ."</td><td>" . $row['company'] . "</td><td>" . $row['notes'] ."</td>";

         echo' <td> <a href="edit.php?id=' . $row['id'] . '" type="button" class="btn btn-primary btn-sm" <span> ✎</span>  </a>  </td>'; 
         echo "</tr>";
      }
     


}//end here

 else {
         echo " <div class='alert alert-waring'>You have no clients </div> ";
      }



      echo'

<tr>
<td colspan="7"> <div class="text-center"> <a href="add.php" type="button" class="btn btn-success">
 <span class="glyphicon glyphicon-plus"> </span> Add client </a> </div> </td> 
</tr>
</table>';
mysqli_close($conn);
}//session u_id ends here



?>




  


 
   
   







    






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>