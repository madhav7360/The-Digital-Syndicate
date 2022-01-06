<!DOCTYPE html>

<html lang='en'>

<head>
  <title>xkcd Comics Subscription</title>

  <link rel='shortcut icon' href='https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg' type='image/x-icon' />
  <link rel='icon' href='https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg' type='image/x-icon' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Comics Subscription</title>
</head>

<body>
  <!-- ***** PHP Start ***** -->

  <?php
  session_start();
  $config = include __DIR__ . '/config.php';

  $con = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);

  if (isset($_POST['submit']) && isset($_POST['otp'])) {

    $otp = $_POST['otp'];

    $emailId = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($otp == $_SESSION['otp']) {

      $check = "select Password from Users where Email='$emailId'";
      $resultcheck = mysqli_query($con, $check);

      $row = mysqli_num_rows($resultcheck);



      echo 'subscribe' . '<br />';
      if ($row == 1) {
        $_SESSION['message'] = 'There is already an account on this email id';
        header('Location: Login.php');
        exit;
      } else {
        $query = "insert into Users (Email,Password) values ('$emailId', '$password')";
        $result = mysqli_query($con, $query);
        if ($result == 1) {

          $_SESSION['message'] = 'Sign up Sucessful';
          header('Location:Login.php');
          exit;
        }
      }
    } else {
      echo '<script>alert("Invalid OTP")</script>';

      $_SESSION['message'] = 'Invalid OTP';
      header('Location: Signup.php');
      exit;
    }
  } ?>

  <!-- ***** PHP Ends ***** -->
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.
  
              Heroicon name: outline/menu
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.
  
              Heroicon name: outline/x
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center">
            <img class="block lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
            <div class="text-2xl text-gray-100 px-2 mr-4 ">The Digital Syndicate</div>
            <img class="hidden lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="Index.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>

              <!-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Categories</a>

              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a> -->

            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">

            <a href="Signup.php" class="text-sm font-medium text-gray-300 hover:text-gray-500">Create account</a>
          </div>



        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
      </div>
    </div>
  </nav>

  <div class=" min-h-full h-screen flex items-center justify-center py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Verify OTP
        </h2>

      </div>
      <form class="mt-8 space-y-10" action='' method="POST" id="form">
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="otp" class="sr-only">Verification Code</label>
            <input id="otp" name='otp' type="text" autocomplete="off" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Verification Code">
          </div>

        </div>

        <div>
          <button type="submit" name='submit' class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            Submit OTP
          </button>
        </div>
      </form>
    </div>
  </div>



  <!-- ***** Form End ***** -->
</body>

</html>