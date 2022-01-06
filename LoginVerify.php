    <?php
session_start();
$config = include __DIR__ . '/config.php';

$con = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);

    $emailId = $_SESSION['email'];
    $password = $_SESSION['password'];
    
   

        $check = "select Password from Users where Email='$emailId'";
        $resultcheck = mysqli_query($con, $check);

        $row = mysqli_num_rows($resultcheck);
        $rows = mysqli_fetch_array($resultcheck, MYSQLI_ASSOC);
        echo ($rows['Password']);
        //echo '<script>alert('.$password.')</script>';
        //echo '<script>alert('.$rows["Password"].')</script>'; 
        
            echo 'subscribe' . '<br />';
            if ($row == 1)
            {
                //$_SESSION['message'] = 'There is already an account on this email id';
                if ($rows["Password"] == $password)
                {
                   $_SESSION['message']='Login Successful';
                  header('Location: index.php');
                  exit;
                }
                else
               {
                $_SESSION['message']='Invalid Credentials';
                header('Location: login.php');
                exit;
                }
            }

            else {
              $_SESSION['message']='No account with this email id';
                header('Location: Signup.php');
                exit;
            }
            
        
    
   
 ?>

   