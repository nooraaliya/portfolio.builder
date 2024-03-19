<?php 
// database(profile->details) with attributes(name,usernaame,email,age,contactnumber,dob)
session_start();
$name=$_POST['name'];
$age=$_POST['age'];
$contactnumber=$_POST['contactnumber'];
$dob=$_POST['dob'];
$email = $_SESSION['email'];
$conn=new mysqli('localhost','root','','profile');

if($conn->connect_error)
{
    die('Connection Failed: '.$conn->connect_error);
}
else{
    
    
    $stmt = $conn->prepare("UPDATE details SET name=?, age=?, contactnumber=?, dob=? WHERE email=?");
    $stmt->bind_param("siiss", $name, $age, $contactnumber, $dob, $email);

    $stmt->execute();
    echo "<script>
             
                alert('Profile Updated');
                window.location.href = '../profile.html';
            
          </script>";
        exit();
    $stmt->close();
    $conn->close();
}

?>