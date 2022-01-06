<?php
session_start();
   if (isset($_SESSION['message'])) {
    echo ('<div id="banner" class="bg-indigo-600">
    <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between flex-wrap">
        <div class="w-0 flex-1 flex items-center">
          <span class="flex p-2 rounded-lg bg-indigo-800">
            <!-- Heroicon name: outline/speakerphone -->
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
            </svg>
          </span>
          <p class="ml-3 font-medium text-white truncate">
            <span class="md:hidden">
              We announced a new product!
            </span>
            <span class="hidden md:inline">
              '.$_SESSION["message"].'
            </span>
          </p>
        </div>
       
        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
          <button type="button" onclick="hideBanner()" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
            <span class="sr-only">Dismiss</span>
            <!-- Heroicon name: outline/x -->
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>');
}
unset($_SESSION['message']);
?>  
<?php
$subscriptions = array (
        'serialNumber' => 00,
         'apiId' => 00,
         'frequency' => 00,
);


  $mailId= $_SESSION['email'];
    // print_r($subscriptions);

    $config = include __DIR__ . '/config.php';
    $con = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
    $query= "select * from Subscriptions where Email='".$mailId."' ";
    $resultcheck = mysqli_query($con, $query);
    $rows = mysqli_fetch_all($resultcheck, MYSQLI_ASSOC);
// print_r($rows);
    // print_r($rows);
    // $user_data =json_encode($rows);
    // print_r($rows[0]['ApiId']);
    // $api_name_list = $config['api'];
    // print_r($api_name_list);
    // $user_data = []; 
    // $serial_num =1;
  
    //    $get_api_name = $api_name_list[$row['ApiId']];
    //    $freq = $row['Frequency'];
    //     array_push($user_data, (object)[
    //         'serial' =>$serial_num,
    //         'apiname' =>$get_api_name,
    //         'frequency' =>$freq,
    //     ]);
    //     $serial_num +=1;
    
    // $serial_num =1;

    // echo("<h1>".$mailId."<br/><br/>");
    // echo("<h2> Serial No.&emsp;&emsp; Subscription Name &emsp;&emsp; Frequency <br/>");
//    foreach($user_data as $data){
//        $api_name =$data->{'apiname'}; 
//        $freq =$data->{'frequency'}; 
//        $serial =$data->{'serial'}; 
      
//    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

<?php
echo ('<div id="overlay">

<div class="fixed z-10 inset-0 overflow-y-auto" role="dialog" aria-modal="true">
  <div class="flex min-h-screen text-center md:block md:px-2 lg:px-4" style="font-size: 0;">
    <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity md:block" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden md:inline-block md:align-middle md:h-screen" aria-hidden="true">&#8203;</span>

    <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
        To: "opacity-100 translate-y-0 md:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 md:scale-100"
        To: "opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
    -->
    <div class="flex text-base text-left transform transition w-full md:inline-block md:max-w-2xl md:px-4 md:my-8 md:align-middle lg:max-w-4xl">
      <div class="w-full relative flex items-center bg-white px-4 pt-14 pb-8 overflow-hidden shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
        <button onclick="off()" type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8">
          <span class="sr-only" >Close</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <div class="w-full grid grid-cols-1 gap-y-8 gap-x-6 items-start sm:grid-cols-12 lg:gap-x-8">
          <div class="col-span-12">
            <h2 class="text-2xl font-extrabold text-gray-900 sm:pr-12">
              
            </h2>

            <section aria-labelledby="information-heading" class="mt-2">
              <h3 id="information-heading" class="sr-only">Product information</h3>

              <p class="text-2xl text-gray-900">
                Select frequency of subscription service
              </p>

             
            </section>

            <section aria-labelledby="options-heading" class="mt-6">
              <h3 id="options-heading" class="sr-only">Product options</h3>

              <form action="ChangeFrequency.php" method="POST"> 
                

                <!-- Frequencies -->
                <div class="mt-10">
                  <div class="flex items-center justify-between">
                    <h4 class="text-sm text-gray-900 font-medium"> Frequency</h4>
                  </div>

                  <fieldset class="mt-4">
                    <legend class="sr-only">
                      Choose a size
                    </legend>
                    <div class="grid grid-cols-4 gap-4">
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase active:ring-2 ring-indigo-500, hover:bg-gray-50 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                        <input type="radio" name="size-choice" value="1" class="sr-only" aria-labelledby="size-choice-0-label">
                        <p id="size-choice-0-label">
                          Daily
                        </p>

                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <div class="absolute -inset-px rounded-md pointer-events-none  Active: border, Not Active: border-2
                        Checked: border-indigo-500", Not Checked: "border-transparent" aria-hidden="true"></div>
                      </label>

                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                        <input type="radio" name="size-choice" value="2" class="sr-only" aria-labelledby="size-choice-1-label">
                        <p id="size-choice-1-label">
                          Weekly
                        </p>

                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></div>
                      </label>

                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                        <input type="radio" name="size-choice" value="3" class="sr-only" aria-labelledby="size-choice-2-label">
                        <p id="size-choice-2-label">
                          Bi-Monthly
                        </p>

                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></div>
                      </label>

                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                        <input type="radio" name="size-choice" value="4" class="sr-only" aria-labelledby="size-choice-3-label">
                        <p id="size-choice-3-label">
                          Monthly
                        </p>

                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></div>
                      </label>

                      
                    </div>
                  </fieldset>
                </div>

                <button type="submit" value="0" name="apiId" id="confirmBtn" class="mt-6 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Confirm</button>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <div id="text">Overlay Text</div>
</div>');
?>


<script>
function on(value) {
    console.log(value);
    document.getElementById("confirmBtn").value = value;



  console.log('button clciked');
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}
</script>
       <!-- This example requires Tailwind CSS v2.0+ -->
<!-- <div class="bg-indigo-600">
  <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between flex-wrap">
      <div class="w-0 flex-1 flex items-center">
        <span class="flex p-2 rounded-lg bg-indigo-800">
          <!-- Heroicon name: outline/speakerphone -->
          <!-- <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
          </svg>
        </span>
        <p class="ml-3 font-medium text-white truncate">
          <span class="md:hidden">
            We announced a new product!
          </span>
          <span class="hidden md:inline">
            Big news! We're excited to announce a brand new product.
          </span>
        </p>
      </div>
     
      <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
        <button type="button" onclick="hideBanner()" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
          <span class="sr-only">Dismiss</span>
          <!-- Heroicon name: outline/x -->
          <!-- <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div> -->

    <!-- This example requires Tailwind CSS v2.0+ -->
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:block h-8 w-auto"
                            src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                            <div class="text-2xl text-gray-100 px-2 mr-4 ">The Digital Syndicate</div>
                        <img class="hidden lg:hidden h-8 w-auto"
                            src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                            alt="Workflow">
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="index.php"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>


                         
                                                    <!-- This example requires Tailwind CSS v2.0+ -->
                            <!-- <div class="relative inline-block text-left">
                            <div>
                                <button type="button" onclick="dropCategoryMenu()" class="flex text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100" id="category-button" aria-expanded="true" aria-haspopup="true">
                                Category -->
                                <!-- Heroicon name: solid/chevron-down -->
                                <!-- <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                </button>
                            </div> -->

  <!--
    Dropdown menu, show/hide based on menu state.

    Entering: "transition ease-out duration-100"
      From: "transform opacity-0 scale-95"
      To: "transform opacity-100 scale-100"
    Leaving: "transition ease-in duration-75"
      From: "transform opacity-100 scale-100"
      To: "transform opacity-0 scale-95"
  -->
  <!-- <div class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"  id="category-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    <div class="py-1" role="none"> -->
      <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
      <!-- <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">License</a>
     
    </div>
  </div>
</div> -->

               


                    <!-- Profile dropdown -->

                </div>
            </div>
        </div>
        <div class="ml-3 relative">
                        <div>
                            <button type="button" onclick="dropUserMenu()" 
                                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="./assets/avatar.jpg"
                                    alt="">
                            </button>
                        </div>

                        <!--
              Dropdown menu, show/hide based on menu state.
  
              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
                        <div class=" hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-menu">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="Profile.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="user-menu-item-1">Manage</a>
                            <a href="signout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
</div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 flex">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>

                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Category</a>

                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About</a>
            </div>
        </div>
    </nav>

    <div class="bg-white ">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="inline-flex text-3xl py-4">Manage Services 
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-8 ml-2" viewBox="4 0 20 10">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
            </h2>

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        <?php
                          foreach($rows as $row){
                           
                            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                            { $link = 'https';}
                       else
                           { $link = 'http';}
                       
                       // Here append the common URL characters.
                       $link .= '://';
                       
                       // Append the host(domain name, ip) to the URL.
                       if(isset($_SERVER['HTTP_HOST']))
                            $link .= $_SERVER['HTTP_HOST'];
                       else
                            exit('Error occured, HTTP_HOST not set');
                       // Append file path and token
                        $link .= "/the-digital-syndicate/unsubscribe.php?id=".$mailId."&apiId=".$row['ApiId']."&validation_hash=".md5($mailId.$config['KEY']);
                        //echo($link);
                              


                            echo (' <div href="#" class="group">
                            <div
                                class="w-full  bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                <img src="'.$config["api"][$row["ApiId"]]["img"].'"
                                    alt="Hand holding black machined steel mechanical pencil with brass tip and top."
                                    class="w-full h-full object-center object-cover group-hover:opacity-75">
                            </div>
                            <p class="mt-1 text-lg font-medium text-gray-900">
                            '.$config["api"][$row["ApiId"]]["name"].'
                            </p>
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class=" mt-2 flex flex-row justify-between">
                                <div>
                                    <div>
                                    
                                    <a href="'.$link.'"> <button type="submit" value="'.$row['ApiId'].'" name="name"
                                    class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    Unsubscribe

                                </button></a>
    
                                       
                                        
                                       
                                        <button onclick="on(this.value)" value="'.$row['ApiId'].'" type="button" name="Overlay"
                                        class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Modify settings
    
                                    </button>
                                    
                                    </div>
                                </div>
        
        
                            </div>
                            </div>
        ');
                            // echo ($row['ApiId']);
                            // echo ($row['Frequency']);
                            // echo ($config['api'][$row['ApiId']]['name']);
                        }
                        ?>
                        <!-- NewYork Times -->
                        <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropUserMenu() {
  document.getElementById("user-menu").classList.toggle("hidden");
}

function dropCategoryMenu() {
  document.getElementById("category-menu").classList.toggle("hidden");
}

function hideBanner(){
    document.getElementById("banner").classList.add("hidden");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 