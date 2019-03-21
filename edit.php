
<?php 
include_once ('includes/header.inc.php');
include_once ('includes/dbh.inc.php');

  
if (!$_SESSION['u_id']) {

    header ("Location: index.php");
}// u_id

function validateFormData ($formData) {
    $formData = trim( stripslashes ( htmlspecialchars ( $formData ) ) );
    return $formData; }

$clientID = $_GET['id'];

$query = "SELECT * FROM clients WHERE id='$clientID' ";
$result = mysqli_query($conn , $query);

if(mysqli_num_rows($result)> 0 ) {

while( $row = mysqli_fetch_assoc($result) ) {
    $clientName = $row['name'];
    $clientEmail = $row['email'];
    $clientPhone = $row['phone'];
    $clientAddress = $row['address'];
    $clientCompany = $row['company'];
    $clientNotes = $row['notes'];
    
        }

} else{

    $alertMassage = "<div class='alert alert-waring'>There is nothing here.
    <a href='/Client_book/index.php?login=succes'> Head back  </a> </div>";
}


  if (isset($_POST['update'])){

    $clientName = validateFormData( $_POST["clientName"]);
    $clientEmail = validateFormData ($_POST["clientEmail"]);
    $clientPhone = validateFormData ($_POST["clientPhone"]);
    $clientAddress = validateFormData ($_POST["clientAddress"]);
    $clientCompany = validateFormData ($_POST["clientCompany"]);
    $clientNotes = validateFormData ($_POST["clientNotes"]);
    
    //new data base query
    $query =" UPDATE clients
                SET name ='$clientName',
                email ='$clientEmail',
                phone ='$clientPhone',
                address ='$clientAddress',
                company ='$clientCompany',
                notes ='$clientNotes'
                WHERE id='$clientID'";

    $result= mysqli_query($conn, $query);
    if($result){
        header ('Location: index.php?alert=updatesuccess');
    } else{
        echo "Error updating record" . mysqli_error($conn);
    }


  }//update

  if (isset($_POST ['delete'])){

    $alertMassage = "<div class='alert alert-danger'>
                    <p>Are you sure you want to delete this client?   </p> <br>

                    <form action= '".htmlspecialchars ($_SERVER['PHP_SELF']) ."?id=$clientID' method='post'>

                    <input type='submit' class='btn btn-danger btn-sm' name='confirm-delete' value='Nuke the client'>
                    <a  type='button' class=' btn btn-success btn-sm' data-dismiss='alert' aria-hidden='true'> Ooops, no thanks! </a>
                    </form>
                    </div>";


  }//delete
   
  if (isset($_POST['confirm-delete'])){
    $query ="DELETE FROM clients WHERE id='$clientID'";
    $result = mysqli_query($conn , $query);
if($result) {

    header ("Location: index.php?alert=deleted");
} else{
    echo "error!!!".mysqli_error($conn);
}


  }//delete confirm


  if(isset($alertMassage)){
      echo $alertMassage;
  }

?>



<h1> Edit client </h1>


<form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>?id=<?php echo $clientID;?>" method="post" class="container row">

    <div class="form-group col-sm-6">
        <label for="client-name"> Name*</label>
        <input type="text" class="form-control input-lg" id="client-mame" name="clientName" value="<?php  if(!empty($clientName)){echo $clientName;} ?>">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-name"> Email*</label>
        <input type="text" class="form-control input-lg" id="client-email" name="clientEmail" value="<?php echo $clientEmail; ?>">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-name"> Phone</label>
        <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="<?php echo $clientPhone; ?>">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-name"> Address</label>
        <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="<?php echo $clientAddress; ?>">
    </div>


    <div class="form-group col-sm-6">
        <label for="client-name"> Company</label>
        <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="<?php echo $clientCompany; ?>">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-name"> Notes</label>
        <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNotes" ><?php echo $clientNotes ?> </textarea>
    </div>
            <div class="col-sm-12">
            <hr>
                <button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>

                <div class="right">
                <a href="index.php" type="button" class="btn btn-lg btn-default pull-right">cancel</a>
                <button type="submit" class="btn btn-lg btn-success pull-right" name="update">Update</button>
                </div>
                

            </div>




</form>