<?php
    $email=$_POST['email'];
    $password=$_POST['password'];
    $username=$_POST['username'];
    
    $conn=new mysqli('localhost','root','','test');
    $cont=new mysqli('localhost','root','','profile');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $u="SELECT email FROM registration WHERE email='$email'";
        $uu=mysqli_query($conn,$u);
        if(mysqli_num_rows($uu)>0)
        {
            echo "<script>
                 
                    alert('Email already in use.');
                    window.location.href = '../register.html';
                
              </script>";
            exit();
        }
        else{

            $stmt=$conn->prepare("insert into registration(email,password)values(?,?)");
            $stmt->bind_param("ss",$email,$password);
            $st=$cont->prepare("insert into details(email,username) values(?,?)");
            $st->bind_param("ss",$email,$username);
            $st->execute();
            $stmt->execute();
            echo "<script>
            
            alert('Registration Successfull');
            window.location.href = '../login.html';
            
            </script>";
            exit();
        }
        $stmt->close();
        $st->close();
        $conn->close();
        $cont->close();
    }
?>