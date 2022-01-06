<?php
session_start();
$config = include __DIR__ . '/config.php';

$con = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);

if (isset($_POST['name']))
{

    if(!isset($_SESSION['email']))
    {
        $_SESSION['message']='Please login to your account to subscribe';
        header('Location: login.php');
    }

    $apiID = $_POST['name'];
    $emailId = $_SESSION['email'];
   
    

        $check = "select * from Subscriptions where Email='$emailId'";
        $resultcheck = mysqli_query($con, $check);

        $row = mysqli_num_rows($resultcheck);

        
        
            if ($row > 5)
            {
                $_SESSION['message'] =('SUBSCRIPTION LIMIT OF 5 REACHED!')  ;  
                header('Location: Index.php');
                exit;
            }
            else
            {
                $check = "select * from Subscriptions where Email='$emailId' AND ApiId='$apiID'";
                $resultcheck = mysqli_query($con, $check);
                $row = mysqli_num_rows($resultcheck);

                if($row == 1)
                {
                    $_SESSION['message'] = 'Already subscribed to this service';
                    header('Location:index.php');
                    exit;                }

                else {
                    $query = "insert into Subscriptions (Email,ApiId, Frequency) values ('$emailId', '$apiID','01')";
                    $result = mysqli_query($con, $query);
                    if ($result == 1)
                    {
                        
                        $_SESSION['message'] = 'Subscribed sucessfully';
                         header('Location:Profile.php');
                         exit;
                    }
                }

               
            }
        
    }
    
 ?>