<?php
    //Select data to send via POST to DB
   $name = $_POST['name'];
   $email = $_POST['email'];
   if (!empty($name) || !empty($email)) {
    $host = "localhost";
    $dbUsername = "hair_user";
    $dbPassword = "KobuSmart@123";
    $dbname = "hair_db";

    //Connections to DB
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
   }

   if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
   } else {
      $SELECT =  "SELECT email From subscribers Where email = ? Limit 1";
       $INSERT = "INSERT Into subscribers (name, email) values (?,?)"

        //Prepare Statement
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $email);
        $stmt->execute();
      $stmt->bind_result($email);
       $stmt->store_result();
     $rnum = $stmt->num_rows;//

        if($rnum==0) {
            $stmt->close();

            $stmt = $conn-prepare($INSERT);
            $stmt->bind_param("ssssii", $name, $email);
            $stmt->execute();
           echo "Thanks for subscribe";
        } else {
            echo "This email is already register, please try different email";
        }
       $stmt->close();
        $conn->close();
    }else{
       echo "All fields are required";
        die();
   }

   

  
?>