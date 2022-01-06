<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
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
  unset($_SESSION['message']);
}
?>
    <!-- This example requires Tailwind CSS v2.0+ -->


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
                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>


                            <a href="#"
                                class=" hidden text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="category">Categories</a>
                              
                                                    <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="relative hidden text-left">
                            <div>
                                <button type="button" onclick="dropCategoryMenu()" class="flex text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100" id="category-button" aria-expanded="true" aria-haspopup="true">
                                Category
                                <!-- Heroicon name: solid/chevron-down -->
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
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
  <div class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"  id="category-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    <div class="py-1" role="none">
      <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">License</a>
     
    </div>
  </div>
</div>

               

                    <!-- Profile dropdown -->

                </div>
            </div>
        </div>
        <div class="ml-3 relative">
        <?php
 if(!isset($_SESSION['email']))
 {
    echo('  <a href="login.php"
    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="category">Login</a>');
 }
 else{
     echo('        <div>
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
</div>');
 }
?>
                
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 flex">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                
                <a href="index.php"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>

                <a href="#"
                    class="text-gray-300 hidden hover:bg-gray-700 hover:text-white  px-3 py-2 rounded-md text-base font-medium">Category</a>

                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white hidden px-3 py-2 rounded-md text-base font-medium">About</a>
            </div>
        </div>
    </nav>


   

    <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<form action='Subscribe.php' method="POST">
        <div class="bg-white ">
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="inline-flex text-3xl py-4">News
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-8 ml-2" viewBox="4 0 20 10"></svg>
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </h2>

                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/nyt.png" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            News
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            NewYork Times
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="1" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- More products... -->
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/thegardian.png" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            News
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            The Gardian
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="2" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- More products... -->
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/inshorts.png" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            News
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            Inshorts
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="3" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- More products... -->
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/newsdata.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            News
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            NewsData.io
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="4" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- More products... -->
            <!-- SPORTS SECTION -->
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="inline-flex text-3xl py-4">Sports
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-8 ml-2" viewBox="4 0 20 10"></svg>
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </h2>

                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/inshorts.png" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            Sports
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            Inshorts
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="7" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- More products... -->
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/thegardian.png" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            Sports
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            The Guardian
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="5" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- More products... -->
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/newsdata.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            Sports
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            NewsData.io
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="6" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- More products... -->
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="inline-flex text-3xl py-4">Books
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-8 ml-2" viewBox="4 0 20 10"></svg>
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </h2>

                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/nyt.png" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            Books
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            New York Times Books
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="8" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- More products... -->
            <!-- Jokes/ Memes -->
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="inline-flex text-3xl py-4">Quotes
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-8 ml-2" viewBox="4 0 20 10"></svg>
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </h2>

                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                    <!-- More products... -->
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/quotable.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            Daily quotes
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            Quotable
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="9" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- More products... -->
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/theysaidso.PNG" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-fill object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            Daily quotes
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            They Said So
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="10" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JOKES/MEMES -->
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="inline-flex text-3xl py-4">Jokes / Memes
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-8 ml-2" viewBox="4 0 20 10"></svg>
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </h2>

                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                    <!-- More products... -->
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/jokes.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            Random Jokes
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            Wholesome memes
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="12" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="inline-flex text-3xl py-4">Wallpapers
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-8 ml-2" viewBox="4 0 20 10"></svg>
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </h2>

                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                    <!-- More products... -->
                    <div href="#" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="./frontend/unsplash.jpeg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            Daily Wallpapers
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            Unsplash
                        </p>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class=" mt-2 flex flex-row justify-between">
                            <div>
                                <div>
                                    <button type="submit" value="11" name='name' class="inline-flex justify-center w-half rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </form>
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
        <script>

            window.addEventListener('DOMContentLoaded', () => {

                const dropdownBtn = document.querySelector('#Dropdown-btn')
                const dropdown = document.querySelector('#Dropdown')

                dropdownBtn.addEventListener('click', () => {
                    dropdown.classList.toggle('hidden')
                })

            })
        </script>
</body>

</html>