<?php
session_start();
$config = include __DIR__ . '/config.php';

$con = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);

if (isset($_POST['apiId']))
{
$newFrequency = $_POST['size-choice'];
$apiId = $_POST['apiId'];
$emailId = $_SESSION['email'];
echo($apiId);
echo($newFrequency);
echo($emailId);
 $query = "UPDATE Subscriptions SET Frequency = ".$newFrequency." WHERE ApiId = ".$apiId." And Email ='".$emailId."'";
 $result = mysqli_query($con, $query);


$query = "Select * from Subscriptions WHERE ApiId = ".$apiId." And Email ='".$emailId."'";
$result = mysqli_query($con, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($rows);
}
    // $apiID = $_POST['name'];
    // $emailId = $_SESSION['email'];
    

    //     $check = "select * from Subscriptions where Email='$emailId'";
    //     $resultcheck = mysqli_query($con, $check);

    //     $row = mysqli_num_rows($resultcheck);

        
        
    //         if ($row > 5)
    //         {
    //             echo ('SUBSCRIPTION LIMIT OF 5 REACHED!')  ;  
    //             header('Location: Index.php');
    //             exit;
    //         }
    //         else
    //         {
    //             $check = "select * from Subscriptions where Email='$emailId' AND ApiId='$apiID'";
    //             $resultcheck = mysqli_query($con, $check);
    //             $row = mysqli_num_rows($resultcheck);

    //             if($row == 1)
    //             {
    //                 echo ('Already subscribed to this Api');
    //             }

    //             else {
    //                 $query = "insert into Subscriptions (Email,ApiId, Frequency) values ('$emailId', '$apiID','01')";
    //                 $result = mysqli_query($con, $query);
    //                 if ($result == 1)
    //                 {
                        
    //                     $_SESSION['message'] = 'Sign up Sucessful';
    //                      header('Location:Index.php');
    //                      exit;
    //                 }
    //             }

               
    //         }
        
    // }
    
 ?>