



<?php
 include_once ('includes/header.inc.php');
include ('includes/dbh.inc.php');
 if(!$_SESSION['u_id'] ){

header ('Location: index.php');
    
 }
 


 //if add button submited
 if(isset($_POST['add'] ) ) {


    function validateFormData ($formData) {
        $formData = trim( stripslashes ( htmlspecialchars ( $formData ) ) );
        return $formData;
}

//set empty varialbes
 $clientName = $clientEmail = $clientPhone = $clientAddress = $clientCompany = $clientNotes ="";

 if(!$_POST["clientName"] ) {
    //for require fields
    $nameError = "Please enter a name <br>";
 }  else{
    $clientName = validateFormData ( $_POST["clientName"] );

    }

    if(!$_POST["clientEmail"] ) {

        $nameError = "Please enter a name <br>";
     }  else{
        $clientEmail = validateFormData ( $_POST['clientEmail']);
    
        }
    
        $clientPhone = validateFormData ( $_POST["clientPhone"] );
        $clientAddress = validateFormData ( $_POST["clientAddress"] );
        $clientCompany = validateFormData ( $_POST["clientCompany"] );
        $clientNotes = validateFormData ( $_POST["clientNotes"] );

if($clientName && $clientEmail) {

    $query = "INSERT INTO clients (id, name, email, phone, address, company, notes, date_added )
      VALUES (NULL, '$clientName' , '$clientEmail' , '$clientPhone' , '$clientAddress' , '$clientCompany',
      '$clientNotes' , CURRENT_TIMESTAMP)  ";

      $result= mysqli_query( $conn , $query);

      //if query succes
      if($result){
          header ("Location: index.php?alert=success");
      }     else{
          echo "Error". $query . "<br>" . mysqli_query($conn);
      }

}


 }//end of add!!!
    // geting error echo $aletMassage; "undifine varriable" to avoid it need to use function 

    if(isset($alertMassage)){
        echo $alertMassage;
     }
mysqli_close($conn);
 
 ?>

<h1> Add Client </h1>

<form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" method="post" class="container row">

    <div class="form-group col-sm-6">
        <label for="client-name"> Name*</label>
        <input type="text" class="form-control input-lg" id="client-mame" name="clientName" value="">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-name"> Email*</label>
        <input type="text" class="form-control input-lg" id="client-email" name="clientEmail" value="">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-name"> Phone</label>
        <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-name"> Address</label>
        <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="">
    </div>


    <div class="form-group col-sm-6">
        <label for="client-name"> Company</label>
        <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-name"> Notes</label>
        <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNotes"></textarea>
    </div>
            <div class="col-sm-12">
                <a href="index.php" type="button" class="btn btn-lg btn-default">Cancel</a>
                <button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add</button>

            </div>




</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>





