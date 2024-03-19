<?php
    // database(test->registration) with attributes(id,email,password)
    session_start();
   $email= $_POST['email'];
   $password=$_POST['password'];
   $con=new mysqli("localhost","root","","test");
   if($con->connect_error)
   {
    die("failed to connect : ".$con->connect_error);
   }
   else
   {
    $stmt=$con->prepare("select * from registration where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0)
    {
        $data=$stmt_result->fetch_assoc();
        if($data['password']===$password)
        {
            
            $_SESSION['email'] = $email;
            echo "<script>
                 
                    
                    window.location.href = '../profile.html';
                
              </script>";
            exit();
        }
        else{
            echo "<script>
                 
                    alert('Invalid credentials');
                    window.location.href = '../login.html';
                
              </script>";
            exit();
        }
    }
    else
    {
        echo "<script>
                
                    alert('Invalid credentials');
                    window.location.href = '../login.html';
                
              </script>";
        exit();
    }
   }
?>