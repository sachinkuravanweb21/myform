<?php
$username = $_POST['name'];
$useremail = $_POST['email'];
$usermobileno = $_POST['mobile'];
$usermessage = $_POST['message'];

if (!empty($username) || !empty($useremail) || !empty($usermobile) || !empty($usermessage)) {
    $host = "localhost";
    $dbusername = "root";
    $dbuseremail = "";
    $dbusermobileno = "";
    $dbusermessage = "";

    // create connection
    $conn = new mysqli($host, $dbusername, $dbuseremail, $dbusermobileno, $dbmessage);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
    }else{
        $SELECT = "SELECT email from register Where email = ? limit 1 "; 
        $INSERT = "INSERT email into register (username, useremail, usermobileno, usermessage) values(?, ?, ?, ?)"; 

        //prepare statement 
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $smst->bind_result($email);
        $smst->store_result();
        $smst = $smst->num_rows;

        if($rnum==0){
            $smst->close();

            $smst = $conn->prepare($INSERT);
            $smst->bind_param("ssssii", $username, $useremail, $usermobileno, $usermessage);
            $smst->execute();
            echo "New record inserted successfully";
        }
        else {
            echo "someone already register using this email";
        }
        $smst->close();
        $conn->close();
        }
    }
 else {
    echo "all field are required";
die();
}
