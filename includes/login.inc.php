<?php 
session_start();

if (isset($_POST['login'])){

    include 'dbh.inc.php';


    $loginError ="<div class='alert alert-danger'> No such user in data base. Please try agian. <a class='close' data-dissmis='alert'> &times;</a></div>";
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

//error handelers

// check for empty
if(empty($uid) || empty($pwd)) {
    
    header("Location:../index.php?login=empty!!!");
    exit();
}
else{
    $sql = "SELECT * FROM users WHERE user_uid ='$uid' OR user_email='$uid'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck < 1 ){
        header("Location:../index.php?login=error!!!");
        exit();
    
        }   else{
            if($row = mysqli_fetch_assoc($result )){
                //dehashing
                $hashedPwdCheck = password_verify($pwd , $row['user_pwd']);
                if($hashedPwdCheck == false){
                    header("Location:../index.php?login=password error");
        exit();
                } elseif($hashedPwdCheck == true){
                    // log in  user here
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    header("Location:../index.php?login=succes");
                    exit();
                }   


                    }
            
            }

     }
}

else{
        header("Location:../index.php?login=error!!!");
        exit();
     }

