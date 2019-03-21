

<?php

if (isset ($_POST['submit'])) {
include_once 'dbh.inc.php';

$first = mysqli_real_escape_string($conn, $_POST['first']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

//Error

//check empty fields

if(empty($first) || empty($email)|| empty($uid) || empty ($uid) ) {

    header("Location: ../signup.php?signup=empty");
    echo "<h4> empty </h4>";
    exit();
}       else{
    //check if input character are valid
if(!preg_match("/^[a-zZ]*$/",$first)) {
header("Location: ../signup.php?signup=useNorma_letters!!");
exit();
    }

        else{ //is email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=incorrect_email");
                exit();
            } else{
                $sql ="SELECT * FROM users WHERE user_uid='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0){
                    header("Location: ../signup.php?signup=userTaken");
                    exit();
                }else{
                    //password hashing
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //inset the user into database
                    $sql = "INSERT INTO users (user_first, user_email, user_uid, user_pwd)
                     VALUES('$first', '$email', '$uid', '$hashedPwd');";
                     $result = mysqli_query($conn, $sql);
                     header("Location: ../signup.php?signup=success");
                     echo "<class   ";
                     exit();


                }

            }

        }




    }    
  
}
else{
    header("Location: ../signup.php?signup=error");
    exit();
} 