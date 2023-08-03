<?php
require_once 'models.php';

// Assuming you have the user's cookie value from the current session
// Replace this with the actual method to get the user's cookie value
$cookieValue = $_COOKIE['titip_user'];

// Get the user's email based on their session
$userEmail = User::getUserEmailBySession($cookieValue);

// If the cookie doesn't exist or the session is invalid, getUserEmailBySession will handle the redirecting
// and display the appropriate error message.

// Get the user information based on their email
$user = User::getUserByEmail($userEmail);

// If the user doesn't exist or is not a "mitra," redirect to dashboard-konsumen.php
if (!$user || $user->status !== "mitra") {
    header("Location: dashboard-konsumen.php");
    exit();
}
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
                            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg bg-gray-300 group">
                                <svg class="w-5 h-5 text-gray-500 transition duration-75text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"></path>
                                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"></path>
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Riwayat</span><span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Akun</span>
                            </a>
                        </li>
                        <li>
                            <a href="./index" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Keluar</span>
                            </a>
                        </li>
                        <li>
                            <a href="./index" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100  group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"></path>
                                    <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"></path>
                                    <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Bantuan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <section id="menu-cepat" class="p-4 sm:ml-64">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                    <div class="mx-auto">
                        <div class="rounded-t-lg bg-gray-100 p-6">
                            <h2 class="text-2xl font-bold mb-4 text-black">Menu Cepat</h2>
                            <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
                                <!-- Modal toggle -->
                                <button data-modal-target="pesanan_masuk-modal" data-modal-toggle="pesanan_masuk-modal" class="flex-1 flex items-start p-4 rounded-xl shadow-lg bg-white" type="button">
                                    <div class="flex items-center justify-center bg-blue-50 h-12 w-12 rounded-full border border-blue-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h2 class="font-semibold text-left md:text-lg">Pesanan Masuk</h2>
                                        <p class="mt-2 text-xs md:text-sm text-gray-500 text-left">Terima Pesanan dari Konsumen</p>
                                    </div>
                                </button>
                                <!-- Main modal -->
                                <div id="pesanan_masuk-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Close button -->
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="pesanan_masuk-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                                                </svg>
                                            </button>
                                            <!-- Modal header -->
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900">Pesanan Masuk</h3>
                                                <!-- Form for entering order details -->
                                                <form class="space-y-6" action="./controllers.php?action=register" onsubmit="return validateFullName()" method="post">
                                                    <div>
                                                        <label for="full-name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                                                        <input type="text" name="full-name" id="full-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jayarudin Supratno" required="">
                                                        <p id="warning-full-name" class="hidden text-red-500 text-sm mt-1">Nama Lengkap harus terdiri dari minimal dua kata.</p>
                                                    </div>
                                                    <div>
                                                        <label for="size" class="block mb-2 text-sm font-medium text-gray-900">Ukuran</label>
                                                        <select name="size" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required="">
                                                            <option value="" disabled="" selected="">Pilih Ukuran</option>
                                                            <option value="S">S (Small)</option>
                                                            <option value="L">L (Large)</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="form_action" value="pesanan-masuk">
                                                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masukkan Pesanan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    // Function to generate a random 6-digit number
                                    function generateRandomNumber() {
                                      return Math.floor(100000 + Math.random() * 900000);
                                    }
                                    
                                    // Set the value of the input field with the generated number on page load
                                    document.addEventListener("DOMContentLoaded", function () {
                                      const idBarangInput = document.getElementById("id-barang");
                                      idBarangInput.value = generateRandomNumber();
                                    });
                                    
                                    // Inline script to validate full name before form submission
                                    function validateFullName() {
                                      const fullNameInput = document.getElementById("full-name");
                                      const fullName = fullNameInput.value.trim();
                                      const words = fullName.split(" ").filter(word => word !== ""); // Remove empty words
                                    
                                      const warningFullName = document.getElementById("warning-full-name");
                                    
                                      if (words.length < 2) {
                                        warningFullName.classList.remove("hidden");
                                        return false;
                                      } else {
                                        warningFullName.classList.add("hidden");
                                        return true;
                                      }
                                    }
                                </script>
                                <!-- Add the Flowbite library script for modal functionality -->
                                <button data-modal-target="paket_masuk-modal" data-modal-toggle="paket_masuk-modal" class="flex-1 flex items-start p-4 rounded-xl shadow-lg bg-white" type="button">
                                    <div class="flex items-center justify-center bg-yellow-50 h-12 w-12 rounded-full border border-blue-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h2 class="font-semibold text-left md:text-lg">Paket Masuk</h2>
                                        <p class="mt-2 text-xs md:text-sm text-gray-500 text-left">Terima Barang dari Kurir Paket</p>
                                    </div>
                                </button>
                                <div id="paket_masuk-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Close button -->
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="paket_masuk-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                                                </svg>
                                            </button>
                                            <!-- Modal header -->
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900">Paket Masuk</h3>
                                                <!-- Form for entering order details -->


                                                <form class="space-y-6 mb-6" action="#" onsubmit="return validateFullName()">
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <input type="text" id="full-name-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari Nama Pemilik" required="">
        <div id="search-results" class="mt-1"></div>
    </div>
    <div>
        <label for="search-results" class="block mb-2 text-sm font-medium text-gray-900">
            Hasil Pencarian
            <span id="search-results-count"></span>
        </label>
        <select name="search-results" id="search-results-dropdown" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required="">
            <!-- Dropdown options will be dynamically populated -->
        </select>
    </div>
    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masukkan Pesanan</button>
</form>

<script>
    // Function to fetch data and populate the dropdown
    function fetchDataAndPopulateDropdown() {
        const fullNameSearch = document.getElementById('full-name-search').value;
        const searchResultsDropdown = document.getElementById('search-results-dropdown');
        
        // Make an AJAX request to fetch data from fetch.php
        fetch(`fetch.php?query=${fullNameSearch}`)
            .then(response => response.json())
            .then(data => {
                // Clear previous dropdown options
                searchResultsDropdown.innerHTML = '';
                
                // Populate dropdown with fetched data
                data.forEach(result => {
                    const option = document.createElement('option');
                    option.value = result.reservation_id; // Assuming the result has a property "cust_name"
                    option.textContent = `${result.cust_name} (ID: ${result.reservation_id})`;
                    searchResultsDropdown.appendChild(option);
                });

                // Update search results count
                const searchResultsCount = document.getElementById('search-results-count');
                searchResultsCount.textContent = ` (${data.length} results)`;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    // Attach an event listener to the input for real-time updates
    const fullNameSearchInput = document.getElementById('full-name-search');
    fullNameSearchInput.addEventListener('input', fetchDataAndPopulateDropdown);
</script>








                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    // Function to generate a random 6-digit number
                                    function generateRandomNumber() {
                                      return Math.floor(100000 + Math.random() * 900000);
                                    }
                                    
                                    // Set the value of the input field with the generated number on page load
                                    document.addEventListener("DOMContentLoaded", function () {
                                      const idBarangInput = document.getElementById("id-paket");
                                      idBarangInput.value = generateRandomNumber();
                                    });
                                    
                                </script>
                                <!-- Add the Flowbite library script for modal functionality -->
                                <button data-modal-target="paket_keluar-modal" data-modal-toggle="paket_keluar-modal" class="flex-1 flex items-start p-4 rounded-xl shadow-lg bg-white" type="button">
                                    <div class="flex items-center justify-center bg-yellow-50 h-12 w-12 rounded-full border border-blue-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h2 class="font-semibold text-left md:text-lg">Pesanan Keluar</h2>
                                        <p class="mt-2 text-xs md:text-sm text-gray-500 text-left">Pengambilan Barang oleh Konsumen</p>
                                    </div>
                                </button>
                                <div id="paket_keluar-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Close button -->
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="paket_keluar-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                                                </svg>
                                            </button>
                                            <!-- Modal header -->
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900">Pesanan Keluar</h3>
                                                <!-- Form for entering order details -->
                                                <form class="mb-6 space-y-6" action="#" onsubmit="return validateKodePengambilan()">
                                                    <div>
                                                        <div class="relative w-full">
                                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                                                </svg>
                                                            </div>
                                                            <input type="text" id="kode-pengambilan" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Masukkan Kode Pengambilan" required="">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cari Kode Pengambilan</button>
                                                </form>
                                                <form class="space-y-6" action="#" onsubmit="return validateFullName()">
                                                    <div>
                                                        <label for="id-paket" class="block mb-2 text-sm font-medium text-gray-900">ID Barang (Auto Generated)</label>
                                                        <input type="text" name="id-paket" id="id-paket" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly="" required="">
                                                    </div>
                                                    <div>
                                                        <label for="ukuran-paket" class="block mb-2 text-sm font-medium text-gray-900">Ukuran Barang (Auto Generated)</label>
                                                        <input type="text" name="ukuran-paket" id="ukuran-paket" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly="" required="">
                                                    </div>
                                                    <div>
                                                        <label for="waktu-awal" class="block mb-2 text-sm font-medium text-gray-900">Waktu Penitipan Awal (Auto Generated)</label>
                                                        <input type="text" name="waktu-awal" id="waktu-awal" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly="" required="">
                                                    </div>
                                                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masukkan Pesanan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more buttons here if needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="riwayat" class="p-4 sm:ml-64">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                    <div class="mx-auto">
                        <div class="rounded-t-lg bg-gray-100 p-6">
                            <h2 class="text-2xl font-bold mb-4 text-black">Riwayat</h2>
                            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                                <!-- Start coding here -->
                                <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                                        <div class="w-full md:w-1/2">
                                            <form class="flex items-center">
                                                <label for="simple-search" class="sr-only">Search</label>
                                                <div class="relative w-full">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search" required="">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                            <button type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                                                </svg>
                                                Add product 
                                            </button>
                                            <div class="flex items-center space-x-3 w-full md:w-auto">
                                                <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200" type="button">
                                                    <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path>
                                                    </svg>
                                                    Actions 
                                                </button>
                                                <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(678.5px, 488.5px, 0px);">
                                                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="actionsDropdownButton">
                                                        <li>
                                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Mass Edit</a>
                                                        </li>
                                                    </ul>
                                                    <div class="py-1">
                                                        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Delete all</a>
                                                    </div>
                                                </div>
                                                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Filter 
                                                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path>
                                                    </svg>
                                                </button>
                                                <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(798px, 488.5px, 0px);">
                                                    <h6 class="mb-3 text-sm font-medium text-gray-900">Choose brand</h6>
                                                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                                        <li class="flex items-center">
                                                            <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2">
                                                            <label for="apple" class="ml-2 text-sm font-medium text-gray-900 ">Apple (56)</label>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2">
                                                            <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 ">Microsoft (16)</label>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <input id="razor" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2">
                                                            <label for="razor" class="ml-2 text-sm font-medium text-gray-900 ">Razor (49)</label>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <input id="nikon" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2">
                                                            <label for="nikon" class="ml-2 text-sm font-medium text-gray-900 ">Nikon (12)</label>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <input id="benq" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2">
                                                            <label for="benq" class="ml-2 text-sm font-medium text-gray-900 ">BenQ (74)</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-4 py-3">INDEX</th>
                    <th scope="col" class="px-4 py-3">RESERVATION_ID</th>
                    <th scope="col" class="px-4 py-3">CUST_EMAIL</th>
                    <th scope="col" class="px-4 py-3">CUST_NAME</th>
                    <th scope="col" class="px-4 py-3">STORE_ID</th>
                    <th scope="col" class="px-4 py-3">BOOK_TIME</th>
                    <th scope="col" class="px-4 py-3">START_TIME</th>
                    <th scope="col" class="px-4 py-3">END_TIME</th>
                    <th scope="col" class="px-4 py-3">PICKUP_NUMBER</th>
                    <th scope="col" class="px-4 py-3">RESERVATION_STATUS</th>
                    <th scope="col" class="px-4 py-3">SIZE</th>
                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody id="reservation-table-body">
                <!-- Table rows will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <script>
        // Function to create table rows with data
        function createTableRow(data) {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${data.index}</td>
                <td class="px-4 py-3">${data.reservation_id}</td>
                <td class="px-4 py-3">${data.cust_email}</td>
                <td class="px-4 py-3">${data.cust_name}</td>
                <td class="px-4 py-3">${data.store_id}</td>
                <td class="px-4 py-3">${data.book_time}</td>
                <td class="px-4 py-3">${data.start_time}</td>
                <td class="px-4 py-3">${data.end_time || 'N/A'}</td>
                <td class="px-4 py-3">${data.pickup_number}</td>
                <td class="px-4 py-3">${data.reservation_status}</td>
                <td class="px-4 py-3">${data.size}</td>
                <td class="px-4 py-3 flex items-center justify-end">
                    <button data-dropdown-toggle="actions-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none" type="button">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                    </button>
                    <div id="actions-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(1077px, 628.5px, 0px);">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="actions-dropdown">
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-100">Show</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Delete</a>
                        </div>
                    </div>
                </td>
            `;
            return row;
        }

        // Function to fetch data from the server and populate the table
        function fetchReservationData() {
            fetch("fetch.php")
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById("reservation-table-body");
                data.forEach(rowData => {
                    const newRow = createTableRow(rowData);
                    tableBody.appendChild(newRow);
                });
            })
            .catch(error => console.error("Error:", error));
        }

        // Call the function to populate the table on page load
        fetchReservationData();
    </script>





                                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                                        <span class="text-sm font-normal text-gray-500"> Showing <span class="font-semibold text-gray-900">1-10</span> of <span class="font-semibold text-gray-900">1000</span>
                                        </span>
                                        <ul class="inline-flex items-stretch -space-x-px">
                                            <li>
                                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                                    <span class="sr-only">Previous</span>
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                                            </li>
                                            <li>
                                                <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700">3</a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">...</a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">100</a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                                    <span class="sr-only">Next</span>
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
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
