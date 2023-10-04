<?php
require_once 'models.php';

// Assuming you have the user's cookie value from the current session
// Replace this with the actual method to get the user's cookie value
$cookieValue = isset($_COOKIE['titip_user']) ? $_COOKIE['titip_user'] : null;

// Get the user's email based on their session
$userEmail = User::getUserEmailBySession($cookieValue);

// If the cookie doesn't exist or the session is invalid, getUserEmailBySession will handle the redirecting
// and display the appropriate error message.

// Get the user information based on their email
$user = User::getUserByEmail($userEmail);

?>




<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>titip.in : Layanan Penitipan Barang dengan Sistem Loker berbasis Daring</title>
        <link rel="shortcut icon" type="image/x-icon" href="./assets/images/logo.png">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <header class="fixed top-0 left-0 w-full bg-white z-50 shadow-lg">
            <nav>            
                <div  class="mx-auto max-w-8xl px-4 sm:px-6 lg:px-8 relative z-50 flex justify-between py-2">
                   
                    <div id="logo-usaha" class="relative z-10 flex items-center gap-16">
                        <a href="#" aria-label="Home">
                        <img class="h-14 w-auto" aria-hidden="true" viewbox="0 0 160 24" fill="none" src="https://aryadutapp.github.io/titipin/logo-usaha.png">
                        </a>
                      
                    </div>
                    
                    <div id="menu-bar"  class="flex items-center gap-6">
                        <div class="lg:hidden" data-headlessui-state="">
                            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                <span class="sr-only">Open sidebar</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>  
            </nav>
        </header>

        <main id="menu-utama" class="mt-24">
            
            <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform sm:translate-x-0 -translate-x-full" aria-label="Sidebar" aria-hidden="true">
                <div class="mt-20 h-full px-3 py-4 overflow-y-auto bg-gray-50">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="./dashboard-mitra.php" class="flex items-center p-2 text-gray-900 rounded-lg bg-gray-300 group">
                                <svg class="w-5 h-5 text-gray-500 transition duration-75text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"></path>
                                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"></path>
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        <?php
                        if (!$user || $user->status == "mitra") {
                            echo '<li>
                            <a href="./riwayat-mitra.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Riwayat</span>
                            </a>
                        </li>';
                        }
                        ?>
                        
                            <a href="./logout.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Keluar</span>
                            </a>
                        </li>
                        <li>
                            <a href="./index" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100  group" onclick="openNewTabAndReturnHome()">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"></path>
                                    <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"></path>
                                    <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Bantuan</span>
                            </a>
                        </li>

                        <script>
                        function openNewTabAndReturnHome() {
                            // To open a new tab
                            window.open('print_ticket.php', '_blank');

                            // To navigate the main tab to the homepage
                            window.location.href = 'index.php'; // Replace 'index.php' with your homepage URL
                        }
                    </script>



                    </ul>
                </div>
            </aside>

            <section id="selamat-datang-user" class="sm:ml-64 p-4">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <div class="mx-auto">
                    <div class="rounded-t-lg bg-gray-100 p-3">
                    <h2 class="text-2xl font-bold text-black pt-4 lg:px-12">Kontak</h2>
                    <h1 id="teks-user" class="text-xl font-med text-black pt-4 lg:px-12">Instagram : @titip.in_23</h1>
                    <h1 id="teks-user" class="text-xl font-med mb-4 text-black pt-4 lg:px-12">Whatsapp Admin : +62-8123-3920-264</h1></div>
                </div>
                </div>
            </section>

        
        </main>
        <script src="https://flowbite.com/docs/flowbite.min.js"></script>
        <script>
            // Function to check and toggle visibility of the element
            function toggleElementVisibility() {
              const drawerBackdrop = document.querySelector('.drawer-backdrop');
              const screenWidth = window.innerWidth;
            
              if (screenWidth <= 1024) {
                drawerBackdrop.classList.add('hidden'); // Add the 'hidden' class to hide the element
              } else {
                drawerBackdrop.classList.remove('hidden'); // Remove the 'hidden' class to show the element
              }
            }
            
            // Call the function on page load and whenever the window is resized
            window.addEventListener('load', toggleElementVisibility);
            window.addEventListener('resize', toggleElementVisibility);
        </script>
    </body>
</html>
