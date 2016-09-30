<?php
if(isset($_POST['submit']))
{
$email = $_POST["email"];
$resume = basename($_FILES["file"]["name"]);
$rand = rand(1,1000);
$target_dir = "uploads/";
$target_file = $target_dir . $resume;
$arr = explode('.',$target_file);
$arr[0] = $arr[0].$rand;
$target_file = implode('.',$arr);
$uploadOk = 1;

// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $connect= new mysqli("localhost", "root", 'password', 'database'); // Select your db and password
        $query = "INSERT into database values(null,'$email','$target_file')";
        if($result = $connect->query($query))
        {
            $to=$email;
            $subject='Subject of the mail';
            $body='Body of the mail';
                $headers="From: email id";

                 if(mail($to, $subject, $body,"From: Email ID")) {
                  echo 'Your Application is successfully submitted';
                }
                else
                {
                  echo 'There is an error in sending Email';
                }
        }else
        {
        echo "You have already submitted";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}



