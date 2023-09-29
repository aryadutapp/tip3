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

// If the user doesn't exist or is not a "konsumen," redirect to dashboard-mitra.php
if (!$user || $user->status !== "konsumen") {
    header("Location: dashboard-mitra.php");
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
                                <span class="flex-1 ml-3 whitespace-nowrap">Nama Toko</span><span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">3</span>
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
                            window.open('book_store.php', '_blank');

                            // To navigate the main tab to the homepage
                            window.location.href = 'api/dashboard-konsumen.php'; // Replace 'index.php' with your homepage URL
                        }
                    </script>



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
                                                <form class="space-y-6" action="./controllers.php?action=register" onsubmit="return handleSubmit(event)" method="post">
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

                                                <script>
                                                    function handleSubmit(event) {
                                                        event.preventDefault(); // Prevent the form from submitting normally

                                                        // Serialize the form data
                                                        const formData = new FormData(event.target);

                                                        // Make a POST request to your PHP script
                                                        fetch('./controllers.php?action=register', {
                                                            method: 'POST',
                                                            body: formData
                                                        })
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            if (data.status_pesanan_masuk === 'success') {
                                                                // Display success message as a popup
                                                                alert('Pesanan berhasil masuk!. Tekan OK untuk mencetak kode pengambilan (Pastikan Notifikasi Pop Up Tidak Diblokir)');
                                                                // You can also redirect to another page if needed
                                                               // window.location.href = 'dashboard-mitra.php';
                                                                   // Open a new tab to print_pesanan-masuk.php
                                                                const newTab = window.open('print_pesanan_masuk.php', '_blank');
                                                                
                                                                // Check if the new tab was successfully opened
                                                                if (newTab) {
                                                                    // You can also redirect to another page in the current tab if needed
                                                                    window.location.href = 'dashboard-mitra.php';
                                                                } else {
                                                                    // Handle if the new tab couldn't be opened
                                                                    alert('Gagal membuka halaman print_pesanan-masuk.php.');
                                                                }
                                                            } else {
                                                                // Display error message as a popup
                                                                alert('Gagal memasukkan pesanan. Silakan coba lagi.');
                                                            }
                                                        })
                                                        .catch(error => {
                                                            console.error('Error:', error);
                                                            // Handle any network or server error here
                                                            alert('Terjadi kesalahan. Silakan coba lagi nanti.');
                                                        });
                                                    }
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
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
                            <label for="search-results" class="block mb-2 text-sm font-medium text-gray-900"> Hasil Pencarian <span id="search-results-count"></span>
                            </label>
                            <select name="search-results" id="search-results-dropdown" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required="">
                              <!-- Dropdown options will be dynamically populated -->
                            </select>
                          </div>
                          <div>
                            <label for="size" class="block mb-2 text-sm font-medium text-gray-900">Ukuran</label>
                            <select name="size" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required="">
                              <option value="" disabled="" selected="">Pilih Ukuran</option>
                              <option value="S">S (Small)</option>
                              <option value="L">L (Large)</option>
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
                            fetch(`cari-nama.php?query=${fullNameSearch}`).then(response => response.json()).then(data => {
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
                            }).catch(error => {
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
                        <form class="space-y-6 mb-6" action="#">
                          <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                              </svg>
                            </div>
                            <input type="text" id="full-id-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari Nama Pemilik" required="">
                            <div id="id-search" class="mt-1"></div>
                          </div>
                          <div>
                            <label for="id-search" class="block mb-2 text-sm font-medium text-gray-900"> Hasil Pencarian <span id="id-search-count"></span>
                            </label>
                            <select name="id-search" id="id-search-dropdown" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required="">
                              <!-- Dropdown options will be dynamically populated -->
                            </select>
                          </div>
                          <div>
                            <label for="id-paket-keluar" class="block mb-2 text-sm font-medium text-gray-900">ID Barang (Auto Generated)</label>
                            <input type="text" name="id-paket-keluar" id="id-paket-keluar" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly="" required="">
                          </div>
                          <div>
                            <label for="ukuran-paket" class="block mb-2 text-sm font-medium text-gray-900">Ukuran Barang (Auto Generated)</label>
                            <input type="text" name="ukuran-paket" id="ukuran-paket" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly="" required="">
                          </div>
                          <div>
                            <label for="waktu-awal" class="block mb-2 text-sm font-medium text-gray-900">Waktu Penitipan Awal (Auto Generated)</label>
                            <input type="text" name="waktu-awal" id="waktu-awal" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly="" required="">
                          </div>
                          <div>
                            <label for="waktu-akhir" class="block mb-2 text-sm font-medium text-gray-900">Waktu Penitipan Akhir (Auto Generated)</label>
                            <input type="text" name="waktu-akhir" id="waktu-akhir" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly="" required="">
                        </div>

                          <div>
                             <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                             <input type="text" name="harga" id="harga" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly="" required="">
                             <p id="harga-message" class="text-sm text-red-500"></p>
                          </div>

                          <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masukkan Pesanan</button>
                        </form>
                        <script>
                          // Function to calculate and display the price based on size and start time
                          async function fetchCurrentTimestamp() {
                            try {
                                const response = await fetch('get-time.php');
                                if (!response.ok) {
                                    throw new Error('Failed to fetch current timestamp');
                                }
                                const data = await response.json();
                                return new Date(data.current_timestamp).getTime();
                            } catch (error) {
                                console.error('Error fetching current timestamp:', error);
                                return null;
                            }
                        }
                        
                        async function calculateAndDisplayPrice(size, startTime) {
                            const initialPrice = size === 'S' ? 5000 : 10000;
                            const additionalPricePerDay = 2500;
                        
                            // Fetch the current timestamp from PHP endpoint
                            const currentTimeMillis = await fetchCurrentTimestamp();
                        
                            if (currentTimeMillis === null) {
                                // Handle the case where fetching timestamp failed
                                return null;
                            }
                            const waktuAkhir = document.getElementById('waktu-akhir');

                            // Convert the timestamp to a Date object
                            const currentTime = new Date(currentTimeMillis);

                            // Get individual components of the date and time
                            const year = currentTime.getFullYear();
                            const month = (currentTime.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-indexed, so add 1
                            const day = currentTime.getDate().toString().padStart(2, '0');
                            const hours = currentTime.getHours().toString().padStart(2, '0');
                            const minutes = currentTime.getMinutes().toString().padStart(2, '0');
                            const seconds = currentTime.getSeconds().toString().padStart(2, '0');

                            // Construct the formatted date and time string
                            const formattedTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

                            // Set the formatted time as the value of the input field
                            waktuAkhir.value = formattedTime;







                            const startTimeMillis = new Date(startTime).getTime();
                            const daysDifference = Math.ceil((currentTimeMillis - startTimeMillis) / (1000 * 3600 * 24));
                        
                            // Calculate the price
                            const additionalPrice = additionalPricePerDay * Math.max(0, daysDifference - 1);
                            const totalPrice = initialPrice + additionalPrice;
                            return totalPrice;
                        }


                          // Function to fetch data and populate the dropdown
                          function fetchDataAndPopulateDropdown() {
                            const fullIDSearch = document.getElementById('full-id-search').value;
                            const searchResultsDropdown = document.getElementById('id-search-dropdown');
                            const idPaketInput = document.getElementById('id-paket-keluar');
                            const ukuranPaketInput = document.getElementById('ukuran-paket');
                            const waktuAwalInput = document.getElementById('waktu-awal');
                            const hargaInput = document.getElementById('harga');
                            // Make an AJAX request to fetch data from fetch.php
                            fetch(`pesanan-keluar.php?query=${fullIDSearch}`).then(response => response.json()).then(data => {
                              searchResultsDropdown.innerHTML = '';
                              data.forEach(result => {
                                const option = document.createElement('option');
                                option.value = result.cust_name;
                                option.textContent = `${result.cust_name} (ID: ${result.reservation_id})`;
                                searchResultsDropdown.appendChild(option);
                                idPaketInput.value = result.reservation_id;
                                ukuranPaketInput.value = result.size;
                                waktuAwalInput.value = result.start_time;
                                // Set the text content of auto-generated fields
                                idPaketInput.textContent = `$(ID: ${result.reservation_id})`;
                                ukuranPaketInput.textContent = result.size;
                                waktuAwalInput.textContent = result.start_time;
                                // Calculate and display the price
                              //  const totalPrice = calculateAndDisplayPrice(result.size, result.start_time);
                               // hargaInput.value = totalPrice;
                                ///hargaInput.textContent = totalPrice;
                                  const hargaInput = document.getElementById('harga');
                                  const hargaMessage = document.getElementById('harga-message');

                                  calculateAndDisplayPrice(result.size, result.start_time).then(totalPrice => {
                                    if (totalPrice !== null) {
                                        hargaInput.value = totalPrice; // Update the input value with the calculated total price
                                        hargaMessage.textContent = ''; // Clear any previous error messages
                                    } else {
                                        hargaInput.value = ''; // Clear the input value
                                        hargaMessage.textContent = 'Failed to calculate total price'; // Display error message
                                    }
                                });


                                  
                              });
                              const searchResultsCount = document.getElementById('id-search-count');
                              searchResultsCount.textContent = ` (${data.length} results)`;
                              searchResultsDropdown.addEventListener('change', () => {
                                const selectedOption = data.find(result => result.cust_name === searchResultsDropdown.value);
                                if (selectedOption) {
                                  idPaketInput.value = selectedOption.reservation_id;
                                  ukuranPaketInput.value = selectedOption.size;
                                  waktuAwalInput.value = selectedOption.start_time;
                                  // Set the text content of auto-generated fields
                                  idPaketInput.textContent = selectedOption.reservation_id;
                                  ukuranPaketInput.textContent = selectedOption.size;
                                  waktuAwalInput.textContent = selectedOption.start_time;
                                  // Calculate and display the price
                               //   const totalPrice = calculateAndDisplayPrice(selectedOption.size, selectedOption.start_time);
                                //  hargaInput.value = totalPrice;
                                  // hargaInput.textContent = selectedOption.start_time;
                                }
                              });
                            }).catch(error => {
                              console.error('Error fetching data:', error);
                            });
                          }
                          const fullIDSearchInput = document.getElementById('full-id-search');
                          fullIDSearchInput.addEventListener('input', fetchDataAndPopulateDropdown);
                          const searchResultsDropdown = document.getElementById('id-search-dropdown');
                          searchResultsDropdown.addEventListener('change', fetchDataAndPopulateDropdown);
                        </script>
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
                <th scope="col" class="px-4 py-3">NAMA TOKO</th>
                <th scope="col" class="px-4 py-3">ALAMAT</th>
                <th scope="col" class="px-4 py-3">KELURAHAN</th>
                <th scope="col" class="px-4 py-3">KOTA</th>
                <th scope="col" class="px-4 py-3">
                    <span class="sr-only">CETAK STRUK</span>
                </th>
            </tr>
        </thead>
        <tbody id="reservation-table-body">
            <!-- Table rows will be dynamically added here -->
        </tbody>
    </table>
</div>


<!-- HTML content -->

<!-- JavaScript section for creating table rows -->
<script>
    // Function to create table rows with data
    function createTableRow(data) {
        const row = document.createElement('tr');
        const namaTokoValue = data.nama_toko;
        const alamatValue = data.alamat;
        const kelurahanValue = data.keluarahan;
        const provinsiValue = data.provinsi;
        const userIDValue = data.user_id;

        row.innerHTML = `
        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${namaTokoValue}</td>
        <td class="px-4 py-3">${alamatValue}</td>
        <td class="px-4 py-3">${kelurahanValue}</td>
        <td class="px-4 py-3">${provinsiValue}</td>
        <td class="px-4 py-3 flex items-center justify-end">
        <!-- Modal toggle -->
      <button data-modal-target="pesanan_masuk_konsumen_${userIDValue}" data-modal-toggle="pesanan_masuk_konsumen_${userIDValue}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
        Pesan Disini ${userIDValue} ${namaTokoValue}
      </button>
      
      <!-- Main modal -->
      <div>
      <div id="pesanan_masuk_konsumen_${userIDValue}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-md max-h-full">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow ">
                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="pesanan_masuk_konsumen_${userIDValue}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                  <div class="px-6 py-6 lg:px-8">
                      <h3 class="mb-4 text-xl font-medium text-gray-900 ">Pesan di ${namaTokoValue}</h3>
                      <form class="space-y-6" action="#">
                          <div>
                              <label for="full-name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap</label>
                              <input type="full-name" name="full-name" id="full-name_${userIDValue}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Joni Sunandar" required>
                          </div>
                        <div>
                          <div class="flex justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required>
                                </div>
                                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 mb-5">Saya menyetujui <a class="text-blue-500 ">Syarat dan Ketentuan</label>
                            </div>
                        </div>
                      </div>
                          <!-- Error Pesanan Masuk Konsumen Modal -->
                          <div id="error_pesanan_masuk_konsumen_full-name_${userIDValue}" class="w-full text-center text-red-500 hidden"></div>
                          <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Buat Pesanan</button>
                      </form>
                  </div>
              </div>
          </div>
      </div> 
    </div>

        </td>
        `;
        
        const buttons = row.querySelectorAll('[data-modal-toggle="pesanan_masuk_konsumen"]');
        buttons.forEach(button => {
            button.addEventListener('click', () => openPesananMasukModal(data, userIDValue)); // Pass userIDValue as an argument
        });

        return row;
    }

    // Function to open the Pesanan Masuk modal


    function openPesananMasukModal(data, userID) {
        // Handle the modal opening logic here
        // ...

        // Assuming you want to open the modal when the button is clicked
        const modalId = `pesanan_masuk_konsumen_${userID}`;
        const modal = document.getElementById(modalId);
        
        if (modal) {
            modal.classList.remove('hidden');
        }
    }



</script>

<!-- JavaScript section for fetching and populating data -->
<!-- JavaScript section for fetching and populating data -->
<script>
    // Function to fetch data from the server and populate the table
    function fetchReservationData(callback) {
        fetch("fetch_data_toko.php")
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById("reservation-table-body");
            data.forEach(rowData => {
                const newRow = createTableRow(rowData);
                tableBody.appendChild(newRow);
            });

            // Now that the table has been populated, you can attach event listeners
            // or perform other actions as needed.

            // Call the callback function to signal that data population is complete
            if (typeof callback === "function") {
                callback();
            }
        })
        .catch(error => console.error("Error:", error));
    }

    // Inline script content defined as a function
    function inlineScriptFunction() {
        !function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define("Flowbite",[],e):"object"==typeof exports?exports.Flowbite=e():t.Flowbite=e()}(self,(function(){return function(){"use strict";var t={647:function(t,e,i){i.r(e)},853:function(t,e,i){i.r(e),i.d(e,{afterMain:function(){return E},afterRead:function(){return _},afterWrite:function(){return x},applyStyles:function(){return S},arrow:function(){return Z},auto:function(){return a},basePlacements:function(){return c},beforeMain:function(){return b},beforeRead:function(){return m},beforeWrite:function(){return L},bottom:function(){return o},clippingParents:function(){return u},computeStyles:function(){return it},createPopper:function(){return St},createPopperBase:function(){return Pt},createPopperLite:function(){return Dt},detectOverflow:function(){return yt},end:function(){return d},eventListeners:function(){return ot},flip:function(){return _t},hide:function(){return Et},left:function(){return s},main:function(){return w},modifierPhases:function(){return k},offset:function(){return Lt},placements:function(){return v},popper:function(){return f},popperGenerator:function(){return jt},popperOffsets:function(){return Ot},preventOverflow:function(){return xt},read:function(){return y},reference:function(){return h},right:function(){return r},start:function(){return l},top:function(){return n},variationPlacements:function(){return g},viewport:function(){return p},write:function(){return O}});var n="top",o="bottom",r="right",s="left",a="auto",c=[n,o,r,s],l="start",d="end",u="clippingParents",p="viewport",f="popper",h="reference",g=c.reduce((function(t,e){return t.concat([e+"-"+l,e+"-"+d])}),[]),v=[].concat(c,[a]).reduce((function(t,e){return t.concat([e,e+"-"+l,e+"-"+d])}),[]),m="beforeRead",y="read",_="afterRead",b="beforeMain",w="main",E="afterMain",L="beforeWrite",O="write",x="afterWrite",k=[m,y,_,b,w,E,L,O,x];function A(t){return t?(t.nodeName||"").toLowerCase():null}function T(t){if(null==t)return window;if("[object Window]"!==t.toString()){var e=t.ownerDocument;return e&&e.defaultView||window}return t}function C(t){return t instanceof T(t).Element||t instanceof Element}function j(t){return t instanceof T(t).HTMLElement||t instanceof HTMLElement}function P(t){return"undefined"!=typeof ShadowRoot&&(t instanceof T(t).ShadowRoot||t instanceof ShadowRoot)}var S={name:"applyStyles",enabled:!0,phase:"write",fn:function(t){var e=t.state;Object.keys(e.elements).forEach((function(t){var i=e.styles[t]||{},n=e.attributes[t]||{},o=e.elements[t];j(o)&&A(o)&&(Object.assign(o.style,i),Object.keys(n).forEach((function(t){var e=n[t];!1===e?o.removeAttribute(t):o.setAttribute(t,!0===e?"":e)})))}))},effect:function(t){var e=t.state,i={popper:{position:e.options.strategy,left:"0",top:"0",margin:"0"},arrow:{position:"absolute"},reference:{}};return Object.assign(e.elements.popper.style,i.popper),e.styles=i,e.elements.arrow&&Object.assign(e.elements.arrow.style,i.arrow),function(){Object.keys(e.elements).forEach((function(t){var n=e.elements[t],o=e.attributes[t]||{},r=Object.keys(e.styles.hasOwnProperty(t)?e.styles[t]:i[t]).reduce((function(t,e){return t[e]="",t}),{});j(n)&&A(n)&&(Object.assign(n.style,r),Object.keys(o).forEach((function(t){n.removeAttribute(t)})))}))}},requires:["computeStyles"]};function D(t){return t.split("-")[0]}var I=Math.max,M=Math.min,q=Math.round;function H(){var t=navigator.userAgentData;return null!=t&&t.brands?t.brands.map((function(t){return t.brand+"/"+t.version})).join(" "):navigator.userAgent}function B(){return!/^((?!chrome|android).)*safari/i.test(H())}function V(t,e,i){void 0===e&&(e=!1),void 0===i&&(i=!1);var n=t.getBoundingClientRect(),o=1,r=1;e&&j(t)&&(o=t.offsetWidth>0&&q(n.width)/t.offsetWidth||1,r=t.offsetHeight>0&&q(n.height)/t.offsetHeight||1);var s=(C(t)?T(t):window).visualViewport,a=!B()&&i,c=(n.left+(a&&s?s.offsetLeft:0))/o,l=(n.top+(a&&s?s.offsetTop:0))/r,d=n.width/o,u=n.height/r;return{width:d,height:u,top:l,right:c+d,bottom:l+u,left:c,x:c,y:l}}function W(t){var e=V(t),i=t.offsetWidth,n=t.offsetHeight;return Math.abs(e.width-i)<=1&&(i=e.width),Math.abs(e.height-n)<=1&&(n=e.height),{x:t.offsetLeft,y:t.offsetTop,width:i,height:n}}function z(t,e){var i=e.getRootNode&&e.getRootNode();if(t.contains(e))return!0;if(i&&P(i)){var n=e;do{if(n&&t.isSameNode(n))return!0;n=n.parentNode||n.host}while(n)}return!1}function R(t){return T(t).getComputedStyle(t)}function F(t){return["table","td","th"].indexOf(A(t))>=0}function N(t){return((C(t)?t.ownerDocument:t.document)||window.document).documentElement}function K(t){return"html"===A(t)?t:t.assignedSlot||t.parentNode||(P(t)?t.host:null)||N(t)}function U(t){return j(t)&&"fixed"!==R(t).position?t.offsetParent:null}function X(t){for(var e=T(t),i=U(t);i&&F(i)&&"static"===R(i).position;)i=U(i);return i&&("html"===A(i)||"body"===A(i)&&"static"===R(i).position)?e:i||function(t){var e=/firefox/i.test(H());if(/Trident/i.test(H())&&j(t)&&"fixed"===R(t).position)return null;var i=K(t);for(P(i)&&(i=i.host);j(i)&&["html","body"].indexOf(A(i))<0;){var n=R(i);if("none"!==n.transform||"none"!==n.perspective||"paint"===n.contain||-1!==["transform","perspective"].indexOf(n.willChange)||e&&"filter"===n.willChange||e&&n.filter&&"none"!==n.filter)return i;i=i.parentNode}return null}(t)||e}function Y(t){return["top","bottom"].indexOf(t)>=0?"x":"y"}function G(t,e,i){return I(t,M(e,i))}function J(t){return Object.assign({},{top:0,right:0,bottom:0,left:0},t)}function Q(t,e){return e.reduce((function(e,i){return e[i]=t,e}),{})}var Z={name:"arrow",enabled:!0,phase:"main",fn:function(t){var e,i=t.state,a=t.name,l=t.options,d=i.elements.arrow,u=i.modifiersData.popperOffsets,p=D(i.placement),f=Y(p),h=[s,r].indexOf(p)>=0?"height":"width";if(d&&u){var g=function(t,e){return J("number"!=typeof(t="function"==typeof t?t(Object.assign({},e.rects,{placement:e.placement})):t)?t:Q(t,c))}(l.padding,i),v=W(d),m="y"===f?n:s,y="y"===f?o:r,_=i.rects.reference[h]+i.rects.reference[f]-u[f]-i.rects.popper[h],b=u[f]-i.rects.reference[f],w=X(d),E=w?"y"===f?w.clientHeight||0:w.clientWidth||0:0,L=_/2-b/2,O=g[m],x=E-v[h]-g[y],k=E/2-v[h]/2+L,A=G(O,k,x),T=f;i.modifiersData[a]=((e={})[T]=A,e.centerOffset=A-k,e)}},effect:function(t){var e=t.state,i=t.options.element,n=void 0===i?"[data-popper-arrow]":i;null!=n&&("string"!=typeof n||(n=e.elements.popper.querySelector(n)))&&z(e.elements.popper,n)&&(e.elements.arrow=n)},requires:["popperOffsets"],requiresIfExists:["preventOverflow"]};function $(t){return t.split("-")[1]}var tt={top:"auto",right:"auto",bottom:"auto",left:"auto"};function et(t){var e,i=t.popper,a=t.popperRect,c=t.placement,l=t.variation,u=t.offsets,p=t.position,f=t.gpuAcceleration,h=t.adaptive,g=t.roundOffsets,v=t.isFixed,m=u.x,y=void 0===m?0:m,_=u.y,b=void 0===_?0:_,w="function"==typeof g?g({x:y,y:b}):{x:y,y:b};y=w.x,b=w.y;var E=u.hasOwnProperty("x"),L=u.hasOwnProperty("y"),O=s,x=n,k=window;if(h){var A=X(i),C="clientHeight",j="clientWidth";if(A===T(i)&&"static"!==R(A=N(i)).position&&"absolute"===p&&(C="scrollHeight",j="scrollWidth"),c===n||(c===s||c===r)&&l===d)x=o,b-=(v&&A===k&&k.visualViewport?k.visualViewport.height:A[C])-a.height,b*=f?1:-1;if(c===s||(c===n||c===o)&&l===d)O=r,y-=(v&&A===k&&k.visualViewport?k.visualViewport.width:A[j])-a.width,y*=f?1:-1}var P,S=Object.assign({position:p},h&&tt),D=!0===g?function(t){var e=t.x,i=t.y,n=window.devicePixelRatio||1;return{x:q(e*n)/n||0,y:q(i*n)/n||0}}({x:y,y:b}):{x:y,y:b};return y=D.x,b=D.y,f?Object.assign({},S,((P={})[x]=L?"0":"",P[O]=E?"0":"",P.transform=(k.devicePixelRatio||1)<=1?"translate("+y+"px, "+b+"px)":"translate3d("+y+"px, "+b+"px, 0)",P)):Object.assign({},S,((e={})[x]=L?b+"px":"",e[O]=E?y+"px":"",e.transform="",e))}var it={name:"computeStyles",enabled:!0,phase:"beforeWrite",fn:function(t){var e=t.state,i=t.options,n=i.gpuAcceleration,o=void 0===n||n,r=i.adaptive,s=void 0===r||r,a=i.roundOffsets,c=void 0===a||a,l={placement:D(e.placement),variation:$(e.placement),popper:e.elements.popper,popperRect:e.rects.popper,gpuAcceleration:o,isFixed:"fixed"===e.options.strategy};null!=e.modifiersData.popperOffsets&&(e.styles.popper=Object.assign({},e.styles.popper,et(Object.assign({},l,{offsets:e.modifiersData.popperOffsets,position:e.options.strategy,adaptive:s,roundOffsets:c})))),null!=e.modifiersData.arrow&&(e.styles.arrow=Object.assign({},e.styles.arrow,et(Object.assign({},l,{offsets:e.modifiersData.arrow,position:"absolute",adaptive:!1,roundOffsets:c})))),e.attributes.popper=Object.assign({},e.attributes.popper,{"data-popper-placement":e.placement})},data:{}},nt={passive:!0};var ot={name:"eventListeners",enabled:!0,phase:"write",fn:function(){},effect:function(t){var e=t.state,i=t.instance,n=t.options,o=n.scroll,r=void 0===o||o,s=n.resize,a=void 0===s||s,c=T(e.elements.popper),l=[].concat(e.scrollParents.reference,e.scrollParents.popper);return r&&l.forEach((function(t){t.addEventListener("scroll",i.update,nt)})),a&&c.addEventListener("resize",i.update,nt),function(){r&&l.forEach((function(t){t.removeEventListener("scroll",i.update,nt)})),a&&c.removeEventListener("resize",i.update,nt)}},data:{}},rt={left:"right",right:"left",bottom:"top",top:"bottom"};function st(t){return t.replace(/left|right|bottom|top/g,(function(t){return rt[t]}))}var at={start:"end",end:"start"};function ct(t){return t.replace(/start|end/g,(function(t){return at[t]}))}function lt(t){var e=T(t);return{scrollLeft:e.pageXOffset,scrollTop:e.pageYOffset}}function dt(t){return V(N(t)).left+lt(t).scrollLeft}function ut(t){var e=R(t),i=e.overflow,n=e.overflowX,o=e.overflowY;return/auto|scroll|overlay|hidden/.test(i+o+n)}function pt(t){return["html","body","#document"].indexOf(A(t))>=0?t.ownerDocument.body:j(t)&&ut(t)?t:pt(K(t))}function ft(t,e){var i;void 0===e&&(e=[]);var n=pt(t),o=n===(null==(i=t.ownerDocument)?void 0:i.body),r=T(n),s=o?[r].concat(r.visualViewport||[],ut(n)?n:[]):n,a=e.concat(s);return o?a:a.concat(ft(K(s)))}function ht(t){return Object.assign({},t,{left:t.x,top:t.y,right:t.x+t.width,bottom:t.y+t.height})}function gt(t,e,i){return e===p?ht(function(t,e){var i=T(t),n=N(t),o=i.visualViewport,r=n.clientWidth,s=n.clientHeight,a=0,c=0;if(o){r=o.width,s=o.height;var l=B();(l||!l&&"fixed"===e)&&(a=o.offsetLeft,c=o.offsetTop)}return{width:r,height:s,x:a+dt(t),y:c}}(t,i)):C(e)?function(t,e){var i=V(t,!1,"fixed"===e);return i.top=i.top+t.clientTop,i.left=i.left+t.clientLeft,i.bottom=i.top+t.clientHeight,i.right=i.left+t.clientWidth,i.width=t.clientWidth,i.height=t.clientHeight,i.x=i.left,i.y=i.top,i}(e,i):ht(function(t){var e,i=N(t),n=lt(t),o=null==(e=t.ownerDocument)?void 0:e.body,r=I(i.scrollWidth,i.clientWidth,o?o.scrollWidth:0,o?o.clientWidth:0),s=I(i.scrollHeight,i.clientHeight,o?o.scrollHeight:0,o?o.clientHeight:0),a=-n.scrollLeft+dt(t),c=-n.scrollTop;return"rtl"===R(o||i).direction&&(a+=I(i.clientWidth,o?o.clientWidth:0)-r),{width:r,height:s,x:a,y:c}}(N(t)))}function vt(t,e,i,n){var o="clippingParents"===e?function(t){var e=ft(K(t)),i=["absolute","fixed"].indexOf(R(t).position)>=0&&j(t)?X(t):t;return C(i)?e.filter((function(t){return C(t)&&z(t,i)&&"body"!==A(t)})):[]}(t):[].concat(e),r=[].concat(o,[i]),s=r[0],a=r.reduce((function(e,i){var o=gt(t,i,n);return e.top=I(o.top,e.top),e.right=M(o.right,e.right),e.bottom=M(o.bottom,e.bottom),e.left=I(o.left,e.left),e}),gt(t,s,n));return a.width=a.right-a.left,a.height=a.bottom-a.top,a.x=a.left,a.y=a.top,a}function mt(t){var e,i=t.reference,a=t.element,c=t.placement,u=c?D(c):null,p=c?$(c):null,f=i.x+i.width/2-a.width/2,h=i.y+i.height/2-a.height/2;switch(u){case n:e={x:f,y:i.y-a.height};break;case o:e={x:f,y:i.y+i.height};break;case r:e={x:i.x+i.width,y:h};break;case s:e={x:i.x-a.width,y:h};break;default:e={x:i.x,y:i.y}}var g=u?Y(u):null;if(null!=g){var v="y"===g?"height":"width";switch(p){case l:e[g]=e[g]-(i[v]/2-a[v]/2);break;case d:e[g]=e[g]+(i[v]/2-a[v]/2)}}return e}function yt(t,e){void 0===e&&(e={});var i=e,s=i.placement,a=void 0===s?t.placement:s,l=i.strategy,d=void 0===l?t.strategy:l,g=i.boundary,v=void 0===g?u:g,m=i.rootBoundary,y=void 0===m?p:m,_=i.elementContext,b=void 0===_?f:_,w=i.altBoundary,E=void 0!==w&&w,L=i.padding,O=void 0===L?0:L,x=J("number"!=typeof O?O:Q(O,c)),k=b===f?h:f,A=t.rects.popper,T=t.elements[E?k:b],j=vt(C(T)?T:T.contextElement||N(t.elements.popper),v,y,d),P=V(t.elements.reference),S=mt({reference:P,element:A,strategy:"absolute",placement:a}),D=ht(Object.assign({},A,S)),I=b===f?D:P,M={top:j.top-I.top+x.top,bottom:I.bottom-j.bottom+x.bottom,left:j.left-I.left+x.left,right:I.right-j.right+x.right},q=t.modifiersData.offset;if(b===f&&q){var H=q[a];Object.keys(M).forEach((function(t){var e=[r,o].indexOf(t)>=0?1:-1,i=[n,o].indexOf(t)>=0?"y":"x";M[t]+=H[i]*e}))}return M}var _t={name:"flip",enabled:!0,phase:"main",fn:function(t){var e=t.state,i=t.options,d=t.name;if(!e.modifiersData[d]._skip){for(var u=i.mainAxis,p=void 0===u||u,f=i.altAxis,h=void 0===f||f,m=i.fallbackPlacements,y=i.padding,_=i.boundary,b=i.rootBoundary,w=i.altBoundary,E=i.flipVariations,L=void 0===E||E,O=i.allowedAutoPlacements,x=e.options.placement,k=D(x),A=m||(k===x||!L?[st(x)]:function(t){if(D(t)===a)return[];var e=st(t);return[ct(t),e,ct(e)]}(x)),T=[x].concat(A).reduce((function(t,i){return t.concat(D(i)===a?function(t,e){void 0===e&&(e={});var i=e,n=i.placement,o=i.boundary,r=i.rootBoundary,s=i.padding,a=i.flipVariations,l=i.allowedAutoPlacements,d=void 0===l?v:l,u=$(n),p=u?a?g:g.filter((function(t){return $(t)===u})):c,f=p.filter((function(t){return d.indexOf(t)>=0}));0===f.length&&(f=p);var h=f.reduce((function(e,i){return e[i]=yt(t,{placement:i,boundary:o,rootBoundary:r,padding:s})[D(i)],e}),{});return Object.keys(h).sort((function(t,e){return h[t]-h[e]}))}(e,{placement:i,boundary:_,rootBoundary:b,padding:y,flipVariations:L,allowedAutoPlacements:O}):i)}),[]),C=e.rects.reference,j=e.rects.popper,P=new Map,S=!0,I=T[0],M=0;M<T.length;M++){var q=T[M],H=D(q),B=$(q)===l,V=[n,o].indexOf(H)>=0,W=V?"width":"height",z=yt(e,{placement:q,boundary:_,rootBoundary:b,altBoundary:w,padding:y}),R=V?B?r:s:B?o:n;C[W]>j[W]&&(R=st(R));var F=st(R),N=[];if(p&&N.push(z[H]<=0),h&&N.push(z[R]<=0,z[F]<=0),N.every((function(t){return t}))){I=q,S=!1;break}P.set(q,N)}if(S)for(var K=function(t){var e=T.find((function(e){var i=P.get(e);if(i)return i.slice(0,t).every((function(t){return t}))}));if(e)return I=e,"break"},U=L?3:1;U>0;U--){if("break"===K(U))break}e.placement!==I&&(e.modifiersData[d]._skip=!0,e.placement=I,e.reset=!0)}},requiresIfExists:["offset"],data:{_skip:!1}};function bt(t,e,i){return void 0===i&&(i={x:0,y:0}),{top:t.top-e.height-i.y,right:t.right-e.width+i.x,bottom:t.bottom-e.height+i.y,left:t.left-e.width-i.x}}function wt(t){return[n,r,o,s].some((function(e){return t[e]>=0}))}var Et={name:"hide",enabled:!0,phase:"main",requiresIfExists:["preventOverflow"],fn:function(t){var e=t.state,i=t.name,n=e.rects.reference,o=e.rects.popper,r=e.modifiersData.preventOverflow,s=yt(e,{elementContext:"reference"}),a=yt(e,{altBoundary:!0}),c=bt(s,n),l=bt(a,o,r),d=wt(c),u=wt(l);e.modifiersData[i]={referenceClippingOffsets:c,popperEscapeOffsets:l,isReferenceHidden:d,hasPopperEscaped:u},e.attributes.popper=Object.assign({},e.attributes.popper,{"data-popper-reference-hidden":d,"data-popper-escaped":u})}};var Lt={name:"offset",enabled:!0,phase:"main",requires:["popperOffsets"],fn:function(t){var e=t.state,i=t.options,o=t.name,a=i.offset,c=void 0===a?[0,0]:a,l=v.reduce((function(t,i){return t[i]=function(t,e,i){var o=D(t),a=[s,n].indexOf(o)>=0?-1:1,c="function"==typeof i?i(Object.assign({},e,{placement:t})):i,l=c[0],d=c[1];return l=l||0,d=(d||0)*a,[s,r].indexOf(o)>=0?{x:d,y:l}:{x:l,y:d}}(i,e.rects,c),t}),{}),d=l[e.placement],u=d.x,p=d.y;null!=e.modifiersData.popperOffsets&&(e.modifiersData.popperOffsets.x+=u,e.modifiersData.popperOffsets.y+=p),e.modifiersData[o]=l}};var Ot={name:"popperOffsets",enabled:!0,phase:"read",fn:function(t){var e=t.state,i=t.name;e.modifiersData[i]=mt({reference:e.rects.reference,element:e.rects.popper,strategy:"absolute",placement:e.placement})},data:{}};var xt={name:"preventOverflow",enabled:!0,phase:"main",fn:function(t){var e=t.state,i=t.options,a=t.name,c=i.mainAxis,d=void 0===c||c,u=i.altAxis,p=void 0!==u&&u,f=i.boundary,h=i.rootBoundary,g=i.altBoundary,v=i.padding,m=i.tether,y=void 0===m||m,_=i.tetherOffset,b=void 0===_?0:_,w=yt(e,{boundary:f,rootBoundary:h,padding:v,altBoundary:g}),E=D(e.placement),L=$(e.placement),O=!L,x=Y(E),k="x"===x?"y":"x",A=e.modifiersData.popperOffsets,T=e.rects.reference,C=e.rects.popper,j="function"==typeof b?b(Object.assign({},e.rects,{placement:e.placement})):b,P="number"==typeof j?{mainAxis:j,altAxis:j}:Object.assign({mainAxis:0,altAxis:0},j),S=e.modifiersData.offset?e.modifiersData.offset[e.placement]:null,q={x:0,y:0};if(A){if(d){var H,B="y"===x?n:s,V="y"===x?o:r,z="y"===x?"height":"width",R=A[x],F=R+w[B],N=R-w[V],K=y?-C[z]/2:0,U=L===l?T[z]:C[z],J=L===l?-C[z]:-T[z],Q=e.elements.arrow,Z=y&&Q?W(Q):{width:0,height:0},tt=e.modifiersData["arrow#persistent"]?e.modifiersData["arrow#persistent"].padding:{top:0,right:0,bottom:0,left:0},et=tt[B],it=tt[V],nt=G(0,T[z],Z[z]),ot=O?T[z]/2-K-nt-et-P.mainAxis:U-nt-et-P.mainAxis,rt=O?-T[z]/2+K+nt+it+P.mainAxis:J+nt+it+P.mainAxis,st=e.elements.arrow&&X(e.elements.arrow),at=st?"y"===x?st.clientTop||0:st.clientLeft||0:0,ct=null!=(H=null==S?void 0:S[x])?H:0,lt=R+rt-ct,dt=G(y?M(F,R+ot-ct-at):F,R,y?I(N,lt):N);A[x]=dt,q[x]=dt-R}if(p){var ut,pt="x"===x?n:s,ft="x"===x?o:r,ht=A[k],gt="y"===k?"height":"width",vt=ht+w[pt],mt=ht-w[ft],_t=-1!==[n,s].indexOf(E),bt=null!=(ut=null==S?void 0:S[k])?ut:0,wt=_t?vt:ht-T[gt]-C[gt]-bt+P.altAxis,Et=_t?ht+T[gt]+C[gt]-bt-P.altAxis:mt,Lt=y&&_t?function(t,e,i){var n=G(t,e,i);return n>i?i:n}(wt,ht,Et):G(y?wt:vt,ht,y?Et:mt);A[k]=Lt,q[k]=Lt-ht}e.modifiersData[a]=q}},requiresIfExists:["offset"]};function kt(t,e,i){void 0===i&&(i=!1);var n,o,r=j(e),s=j(e)&&function(t){var e=t.getBoundingClientRect(),i=q(e.width)/t.offsetWidth||1,n=q(e.height)/t.offsetHeight||1;return 1!==i||1!==n}(e),a=N(e),c=V(t,s,i),l={scrollLeft:0,scrollTop:0},d={x:0,y:0};return(r||!r&&!i)&&(("body"!==A(e)||ut(a))&&(l=(n=e)!==T(n)&&j(n)?{scrollLeft:(o=n).scrollLeft,scrollTop:o.scrollTop}:lt(n)),j(e)?((d=V(e,!0)).x+=e.clientLeft,d.y+=e.clientTop):a&&(d.x=dt(a))),{x:c.left+l.scrollLeft-d.x,y:c.top+l.scrollTop-d.y,width:c.width,height:c.height}}function At(t){var e=new Map,i=new Set,n=[];function o(t){i.add(t.name),[].concat(t.requires||[],t.requiresIfExists||[]).forEach((function(t){if(!i.has(t)){var n=e.get(t);n&&o(n)}})),n.push(t)}return t.forEach((function(t){e.set(t.name,t)})),t.forEach((function(t){i.has(t.name)||o(t)})),n}var Tt={placement:"bottom",modifiers:[],strategy:"absolute"};function Ct(){for(var t=arguments.length,e=new Array(t),i=0;i<t;i++)e[i]=arguments[i];return!e.some((function(t){return!(t&&"function"==typeof t.getBoundingClientRect)}))}function jt(t){void 0===t&&(t={});var e=t,i=e.defaultModifiers,n=void 0===i?[]:i,o=e.defaultOptions,r=void 0===o?Tt:o;return function(t,e,i){void 0===i&&(i=r);var o,s,a={placement:"bottom",orderedModifiers:[],options:Object.assign({},Tt,r),modifiersData:{},elements:{reference:t,popper:e},attributes:{},styles:{}},c=[],l=!1,d={state:a,setOptions:function(i){var o="function"==typeof i?i(a.options):i;u(),a.options=Object.assign({},r,a.options,o),a.scrollParents={reference:C(t)?ft(t):t.contextElement?ft(t.contextElement):[],popper:ft(e)};var s=function(t){var e=At(t);return k.reduce((function(t,i){return t.concat(e.filter((function(t){return t.phase===i})))}),[])}(function(t){var e=t.reduce((function(t,e){var i=t[e.name];return t[e.name]=i?Object.assign({},i,e,{options:Object.assign({},i.options,e.options),data:Object.assign({},i.data,e.data)}):e,t}),{});return Object.keys(e).map((function(t){return e[t]}))}([].concat(n,a.options.modifiers)));return a.orderedModifiers=s.filter((function(t){return t.enabled})),a.orderedModifiers.forEach((function(t){var e=t.name,i=t.options,n=void 0===i?{}:i,o=t.effect;if("function"==typeof o){var r=o({state:a,name:e,instance:d,options:n}),s=function(){};c.push(r||s)}})),d.update()},forceUpdate:function(){if(!l){var t=a.elements,e=t.reference,i=t.popper;if(Ct(e,i)){a.rects={reference:kt(e,X(i),"fixed"===a.options.strategy),popper:W(i)},a.reset=!1,a.placement=a.options.placement,a.orderedModifiers.forEach((function(t){return a.modifiersData[t.name]=Object.assign({},t.data)}));for(var n=0;n<a.orderedModifiers.length;n++)if(!0!==a.reset){var o=a.orderedModifiers[n],r=o.fn,s=o.options,c=void 0===s?{}:s,u=o.name;"function"==typeof r&&(a=r({state:a,options:c,name:u,instance:d})||a)}else a.reset=!1,n=-1}}},update:(o=function(){return new Promise((function(t){d.forceUpdate(),t(a)}))},function(){return s||(s=new Promise((function(t){Promise.resolve().then((function(){s=void 0,t(o())}))}))),s}),destroy:function(){u(),l=!0}};if(!Ct(t,e))return d;function u(){c.forEach((function(t){return t()})),c=[]}return d.setOptions(i).then((function(t){!l&&i.onFirstUpdate&&i.onFirstUpdate(t)})),d}}var Pt=jt(),St=jt({defaultModifiers:[ot,Ot,it,S,Lt,_t,xt,Z,Et]}),Dt=jt({defaultModifiers:[ot,Ot,it,S]})},902:function(t,e){var i=this&&this.__assign||function(){return i=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},i.apply(this,arguments)};Object.defineProperty(e,"__esModule",{value:!0}),e.initAccordions=void 0;var n={alwaysOpen:!1,activeClasses:"bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white",inactiveClasses:"text-gray-500 dark:text-gray-400",onOpen:function(){},onClose:function(){},onToggle:function(){}},o=function(){function t(t,e){void 0===t&&(t=[]),void 0===e&&(e=n),this._items=t,this._options=i(i({},n),e),this._init()}return t.prototype._init=function(){var t=this;this._items.length&&this._items.map((function(e){e.active&&t.open(e.id),e.triggerEl.addEventListener("click",(function(){t.toggle(e.id)}))}))},t.prototype.getItem=function(t){return this._items.filter((function(e){return e.id===t}))[0]},t.prototype.open=function(t){var e,i,n=this,o=this.getItem(t);this._options.alwaysOpen||this._items.map((function(t){var e,i;t!==o&&((e=t.triggerEl.classList).remove.apply(e,n._options.activeClasses.split(" ")),(i=t.triggerEl.classList).add.apply(i,n._options.inactiveClasses.split(" ")),t.targetEl.classList.add("hidden"),t.triggerEl.setAttribute("aria-expanded","false"),t.active=!1,t.iconEl&&t.iconEl.classList.remove("rotate-180"))})),(e=o.triggerEl.classList).add.apply(e,this._options.activeClasses.split(" ")),(i=o.triggerEl.classList).remove.apply(i,this._options.inactiveClasses.split(" ")),o.triggerEl.setAttribute("aria-expanded","true"),o.targetEl.classList.remove("hidden"),o.active=!0,o.iconEl&&o.iconEl.classList.add("rotate-180"),this._options.onOpen(this,o)},t.prototype.toggle=function(t){var e=this.getItem(t);e.active?this.close(t):this.open(t),this._options.onToggle(this,e)},t.prototype.close=function(t){var e,i,n=this.getItem(t);(e=n.triggerEl.classList).remove.apply(e,this._options.activeClasses.split(" ")),(i=n.triggerEl.classList).add.apply(i,this._options.inactiveClasses.split(" ")),n.targetEl.classList.add("hidden"),n.triggerEl.setAttribute("aria-expanded","false"),n.active=!1,n.iconEl&&n.iconEl.classList.remove("rotate-180"),this._options.onClose(this,n)},t}();function r(){document.querySelectorAll("[data-accordion]").forEach((function(t){var e=t.getAttribute("data-accordion"),i=t.getAttribute("data-active-classes"),r=t.getAttribute("data-inactive-classes"),s=[];t.querySelectorAll("[data-accordion-target]").forEach((function(e){if(e.closest("[data-accordion]")===t){var i={id:e.getAttribute("data-accordion-target"),triggerEl:e,targetEl:document.querySelector(e.getAttribute("data-accordion-target")),iconEl:e.querySelector("[data-accordion-icon]"),active:"true"===e.getAttribute("aria-expanded")};s.push(i)}})),new o(s,{alwaysOpen:"open"===e,activeClasses:i||n.activeClasses,inactiveClasses:r||n.inactiveClasses})}))}e.initAccordions=r,"undefined"!=typeof window&&(window.Accordion=o,window.initAccordions=r),e.default=o},33:function(t,e){var i=this&&this.__assign||function(){return i=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},i.apply(this,arguments)};Object.defineProperty(e,"__esModule",{value:!0}),e.initCarousels=void 0;var n={defaultPosition:0,indicators:{items:[],activeClasses:"bg-white dark:bg-gray-800",inactiveClasses:"bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"},interval:3e3,onNext:function(){},onPrev:function(){},onChange:function(){}},o=function(){function t(t,e){void 0===t&&(t=[]),void 0===e&&(e=n),this._items=t,this._options=i(i(i({},n),e),{indicators:i(i({},n.indicators),e.indicators)}),this._activeItem=this.getItem(this._options.defaultPosition),this._indicators=this._options.indicators.items,this._intervalDuration=this._options.interval,this._intervalInstance=null,this._init()}return t.prototype._init=function(){var t=this;this._items.map((function(t){t.el.classList.add("absolute","inset-0","transition-transform","transform")})),this._getActiveItem()?this.slideTo(this._getActiveItem().position):this.slideTo(0),this._indicators.map((function(e,i){e.el.addEventListener("click",(function(){t.slideTo(i)}))}))},t.prototype.getItem=function(t){return this._items[t]},t.prototype.slideTo=function(t){var e=this._items[t],i={left:0===e.position?this._items[this._items.length-1]:this._items[e.position-1],middle:e,right:e.position===this._items.length-1?this._items[0]:this._items[e.position+1]};this._rotate(i),this._setActiveItem(e),this._intervalInstance&&(this.pause(),this.cycle()),this._options.onChange(this)},t.prototype.next=function(){var t=this._getActiveItem(),e=null;e=t.position===this._items.length-1?this._items[0]:this._items[t.position+1],this.slideTo(e.position),this._options.onNext(this)},t.prototype.prev=function(){var t=this._getActiveItem(),e=null;e=0===t.position?this._items[this._items.length-1]:this._items[t.position-1],this.slideTo(e.position),this._options.onPrev(this)},t.prototype._rotate=function(t){this._items.map((function(t){t.el.classList.add("hidden")})),t.left.el.classList.remove("-translate-x-full","translate-x-full","translate-x-0","hidden","z-20"),t.left.el.classList.add("-translate-x-full","z-10"),t.middle.el.classList.remove("-translate-x-full","translate-x-full","translate-x-0","hidden","z-10"),t.middle.el.classList.add("translate-x-0","z-20"),t.right.el.classList.remove("-translate-x-full","translate-x-full","translate-x-0","hidden","z-20"),t.right.el.classList.add("translate-x-full","z-10")},t.prototype.cycle=function(){var t=this;"undefined"!=typeof window&&(this._intervalInstance=window.setInterval((function(){t.next()}),this._intervalDuration))},t.prototype.pause=function(){clearInterval(this._intervalInstance)},t.prototype._getActiveItem=function(){return this._activeItem},t.prototype._setActiveItem=function(t){var e,i,n=this;this._activeItem=t;var o=t.position;this._indicators.length&&(this._indicators.map((function(t){var e,i;t.el.setAttribute("aria-current","false"),(e=t.el.classList).remove.apply(e,n._options.indicators.activeClasses.split(" ")),(i=t.el.classList).add.apply(i,n._options.indicators.inactiveClasses.split(" "))})),(e=this._indicators[o].el.classList).add.apply(e,this._options.indicators.activeClasses.split(" ")),(i=this._indicators[o].el.classList).remove.apply(i,this._options.indicators.inactiveClasses.split(" ")),this._indicators[o].el.setAttribute("aria-current","true"))},t}();function r(){document.querySelectorAll("[data-carousel]").forEach((function(t){var e=t.getAttribute("data-carousel-interval"),i="slide"===t.getAttribute("data-carousel"),r=[],s=0;t.querySelectorAll("[data-carousel-item]").length&&Array.from(t.querySelectorAll("[data-carousel-item]")).map((function(t,e){r.push({position:e,el:t}),"active"===t.getAttribute("data-carousel-item")&&(s=e)}));var a=[];t.querySelectorAll("[data-carousel-slide-to]").length&&Array.from(t.querySelectorAll("[data-carousel-slide-to]")).map((function(t){a.push({position:parseInt(t.getAttribute("data-carousel-slide-to")),el:t})}));var c=new o(r,{defaultPosition:s,indicators:{items:a},interval:e||n.interval});i&&c.cycle();var l=t.querySelector("[data-carousel-next]"),d=t.querySelector("[data-carousel-prev]");l&&l.addEventListener("click",(function(){c.next()})),d&&d.addEventListener("click",(function(){c.prev()}))}))}e.initCarousels=r,"undefined"!=typeof window&&(window.Carousel=o,window.initCarousels=r),e.default=o},922:function(t,e){var i=this&&this.__assign||function(){return i=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},i.apply(this,arguments)};Object.defineProperty(e,"__esModule",{value:!0}),e.initCollapses=void 0;var n={onCollapse:function(){},onExpand:function(){},onToggle:function(){}},o=function(){function t(t,e,o){void 0===t&&(t=null),void 0===e&&(e=null),void 0===o&&(o=n),this._targetEl=t,this._triggerEl=e,this._options=i(i({},n),o),this._visible=!1,this._init()}return t.prototype._init=function(){var t=this;this._triggerEl&&(this._triggerEl.hasAttribute("aria-expanded")?this._visible="true"===this._triggerEl.getAttribute("aria-expanded"):this._visible=!this._targetEl.classList.contains("hidden"),this._triggerEl.addEventListener("click",(function(){t.toggle()})))},t.prototype.collapse=function(){this._targetEl.classList.add("hidden"),this._triggerEl&&this._triggerEl.setAttribute("aria-expanded","false"),this._visible=!1,this._options.onCollapse(this)},t.prototype.expand=function(){this._targetEl.classList.remove("hidden"),this._triggerEl&&this._triggerEl.setAttribute("aria-expanded","true"),this._visible=!0,this._options.onExpand(this)},t.prototype.toggle=function(){this._visible?this.collapse():this.expand(),this._options.onToggle(this)},t}();function r(){document.querySelectorAll("[data-collapse-toggle]").forEach((function(t){var e=t.getAttribute("data-collapse-toggle"),i=document.getElementById(e);i?new o(i,t):console.error('The target element with id "'.concat(e,'" does not exist. Please check the data-collapse-toggle attribute.'))}))}e.initCollapses=r,"undefined"!=typeof window&&(window.Collapse=o,window.initCollapses=r),e.default=o},556:function(t,e){var i=this&&this.__assign||function(){return i=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},i.apply(this,arguments)};Object.defineProperty(e,"__esModule",{value:!0}),e.initDials=void 0;var n={triggerType:"hover",onShow:function(){},onHide:function(){},onToggle:function(){}},o=function(){function t(t,e,o,r){void 0===t&&(t=null),void 0===e&&(e=null),void 0===o&&(o=null),void 0===r&&(r=n),this._parentEl=t,this._triggerEl=e,this._targetEl=o,this._options=i(i({},n),r),this._visible=!1,this._init()}return t.prototype._init=function(){var t=this;if(this._triggerEl){var e=this._getTriggerEventTypes(this._options.triggerType);e.showEvents.forEach((function(e){t._triggerEl.addEventListener(e,(function(){t.show()})),t._targetEl.addEventListener(e,(function(){t.show()}))})),e.hideEvents.forEach((function(e){t._parentEl.addEventListener(e,(function(){t._parentEl.matches(":hover")||t.hide()}))}))}},t.prototype.hide=function(){this._targetEl.classList.add("hidden"),this._triggerEl&&this._triggerEl.setAttribute("aria-expanded","false"),this._visible=!1,this._options.onHide(this)},t.prototype.show=function(){this._targetEl.classList.remove("hidden"),this._triggerEl&&this._triggerEl.setAttribute("aria-expanded","true"),this._visible=!0,this._options.onShow(this)},t.prototype.toggle=function(){this._visible?this.hide():this.show()},t.prototype.isHidden=function(){return!this._visible},t.prototype.isVisible=function(){return this._visible},t.prototype._getTriggerEventTypes=function(t){switch(t){case"hover":default:return{showEvents:["mouseenter","focus"],hideEvents:["mouseleave","blur"]};case"click":return{showEvents:["click","focus"],hideEvents:["focusout","blur"]};case"none":return{showEvents:[],hideEvents:[]}}},t}();function r(){document.querySelectorAll("[data-dial-init]").forEach((function(t){var e=t.querySelector("[data-dial-toggle]");if(e){var i=e.getAttribute("data-dial-toggle"),r=document.getElementById(i);if(r){var s=e.getAttribute("data-dial-trigger");new o(t,e,r,{triggerType:s||n.triggerType})}else console.error("Dial with id ".concat(i," does not exist. Are you sure that the data-dial-toggle attribute points to the correct modal id?"))}else console.error("Dial with id ".concat(t.id," does not have a trigger element. Are you sure that the data-dial-toggle attribute exists?"))}))}e.initDials=r,"undefined"!=typeof window&&(window.Dial=o,window.initDials=r),e.default=o},791:function(t,e){var i=this&&this.__assign||function(){return i=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},i.apply(this,arguments)};Object.defineProperty(e,"__esModule",{value:!0}),e.initDismisses=void 0;var n={transition:"transition-opacity",duration:300,timing:"ease-out",onHide:function(){}},o=function(){function t(t,e,o){void 0===t&&(t=null),void 0===e&&(e=null),void 0===o&&(o=n),this._targetEl=t,this._triggerEl=e,this._options=i(i({},n),o),this._init()}return t.prototype._init=function(){var t=this;this._triggerEl&&this._triggerEl.addEventListener("click",(function(){t.hide()}))},t.prototype.hide=function(){var t=this;this._targetEl.classList.add(this._options.transition,"duration-".concat(this._options.duration),this._options.timing,"opacity-0"),setTimeout((function(){t._targetEl.classList.add("hidden")}),this._options.duration),this._options.onHide(this,this._targetEl)},t}();function r(){document.querySelectorAll("[data-dismiss-target]").forEach((function(t){var e=t.getAttribute("data-dismiss-target"),i=document.querySelector(e);i?new o(i,t):console.error('The dismiss element with id "'.concat(e,'" does not exist. Please check the data-dismiss-target attribute.'))}))}e.initDismisses=r,"undefined"!=typeof window&&(window.Dismiss=o,window.initDismisses=r),e.default=o},340:function(t,e){var i=this&&this.__assign||function(){return i=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},i.apply(this,arguments)};Object.defineProperty(e,"__esModule",{value:!0}),e.initDrawers=void 0;var n={placement:"left",bodyScrolling:!1,backdrop:!0,edge:!1,edgeOffset:"bottom-[60px]",backdropClasses:"bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-30",onShow:function(){},onHide:function(){},onToggle:function(){}},o=function(){function t(t,e){void 0===t&&(t=null),void 0===e&&(e=n),this._targetEl=t,this._options=i(i({},n),e),this._visible=!1,this._init()}return t.prototype._init=function(){var t=this;this._targetEl&&(this._targetEl.setAttribute("aria-hidden","true"),this._targetEl.classList.add("transition-transform")),this._getPlacementClasses(this._options.placement).base.map((function(e){t._targetEl.classList.add(e)})),document.addEventListener("keydown",(function(e){"Escape"===e.key&&t.isVisible()&&t.hide()}))},t.prototype.hide=function(){var t=this;this._options.edge?(this._getPlacementClasses(this._options.placement+"-edge").active.map((function(e){t._targetEl.classList.remove(e)})),this._getPlacementClasses(this._options.placement+"-edge").inactive.map((function(e){t._targetEl.classList.add(e)}))):(this._getPlacementClasses(this._options.placement).active.map((function(e){t._targetEl.classList.remove(e)})),this._getPlacementClasses(this._options.placement).inactive.map((function(e){t._targetEl.classList.add(e)}))),this._targetEl.setAttribute("aria-hidden","true"),this._targetEl.removeAttribute("aria-modal"),this._targetEl.removeAttribute("role"),this._options.bodyScrolling||document.body.classList.remove("overflow-hidden"),this._options.backdrop&&this._destroyBackdropEl(),this._visible=!1,this._options.onHide(this)},t.prototype.show=function(){var t=this;this._options.edge?(this._getPlacementClasses(this._options.placement+"-edge").active.map((function(e){t._targetEl.classList.add(e)})),this._getPlacementClasses(this._options.placement+"-edge").inactive.map((function(e){t._targetEl.classList.remove(e)}))):(this._getPlacementClasses(this._options.placement).active.map((function(e){t._targetEl.classList.add(e)})),this._getPlacementClasses(this._options.placement).inactive.map((function(e){t._targetEl.classList.remove(e)}))),this._targetEl.setAttribute("aria-modal","true"),this._targetEl.setAttribute("role","dialog"),this._targetEl.removeAttribute("aria-hidden"),this._options.bodyScrolling||document.body.classList.add("overflow-hidden"),this._options.backdrop&&this._createBackdrop(),this._visible=!0,this._options.onShow(this)},t.prototype.toggle=function(){this.isVisible()?this.hide():this.show()},t.prototype._createBackdrop=function(){var t,e=this;if(!this._visible){var i=document.createElement("div");i.setAttribute("drawer-backdrop",""),(t=i.classList).add.apply(t,this._options.backdropClasses.split(" ")),document.querySelector("body").append(i),i.addEventListener("click",(function(){e.hide()}))}},t.prototype._destroyBackdropEl=function(){this._visible&&document.querySelector("[drawer-backdrop]").remove()},t.prototype._getPlacementClasses=function(t){switch(t){case"top":return{base:["top-0","left-0","right-0"],active:["transform-none"],inactive:["-translate-y-full"]};case"right":return{base:["right-0","top-0"],active:["transform-none"],inactive:["translate-x-full"]};case"bottom":return{base:["bottom-0","left-0","right-0"],active:["transform-none"],inactive:["translate-y-full"]};case"left":default:return{base:["left-0","top-0"],active:["transform-none"],inactive:["-translate-x-full"]};case"bottom-edge":return{base:["left-0","top-0"],active:["transform-none"],inactive:["translate-y-full",this._options.edgeOffset]}}},t.prototype.isHidden=function(){return!this._visible},t.prototype.isVisible=function(){return this._visible},t}(),r=function(t,e){if(e.some((function(e){return e.id===t})))return e.find((function(e){return e.id===t}))};function s(){var t=[];document.querySelectorAll("[data-drawer-target]").forEach((function(e){var i=e.getAttribute("data-drawer-target"),s=document.getElementById(i);if(s){var a=e.getAttribute("data-drawer-placement"),c=e.getAttribute("data-drawer-body-scrolling"),l=e.getAttribute("data-drawer-backdrop"),d=e.getAttribute("data-drawer-edge"),u=e.getAttribute("data-drawer-edge-offset");r(i,t)||t.push({id:i,object:new o(s,{placement:a||n.placement,bodyScrolling:c?"true"===c:n.bodyScrolling,backdrop:l?"true"===l:n.backdrop,edge:d?"true"===d:n.edge,edgeOffset:u||n.edgeOffset})})}else console.error("Drawer with id ".concat(i," not found. Are you sure that the data-drawer-target attribute points to the correct drawer id?"))})),document.querySelectorAll("[data-drawer-toggle]").forEach((function(e){var i=e.getAttribute("data-drawer-toggle");if(document.getElementById(i)){var n=r(i,t);n?e.addEventListener("click",(function(){n.object.toggle()})):console.error("Drawer with id ".concat(i," has not been initialized. Please initialize it using the data-drawer-target attribute."))}else console.error("Drawer with id ".concat(i," not found. Are you sure that the data-drawer-target attribute points to the correct drawer id?"))})),document.querySelectorAll("[data-drawer-dismiss], [data-drawer-hide]").forEach((function(e){var i=e.getAttribute("data-drawer-dismiss")?e.getAttribute("data-drawer-dismiss"):e.getAttribute("data-drawer-hide");if(document.getElementById(i)){var n=r(i,t);n?e.addEventListener("click",(function(){n.object.hide()})):console.error("Drawer with id ".concat(i," has not been initialized. Please initialize it using the data-drawer-target attribute."))}else console.error("Drawer with id ".concat(i," not found. Are you sure that the data-drawer-target attribute points to the correct drawer id"))})),document.querySelectorAll("[data-drawer-show]").forEach((function(e){var i=e.getAttribute("data-drawer-show");if(document.getElementById(i)){var n=r(i,t);n?e.addEventListener("click",(function(){n.object.show()})):console.error("Drawer with id ".concat(i," has not been initialized. Please initialize it using the data-drawer-target attribute."))}else console.error("Drawer with id ".concat(i," not found. Are you sure that the data-drawer-target attribute points to the correct drawer id?"))}))}e.initDrawers=s,"undefined"!=typeof window&&(window.Drawer=o,window.initDrawers=s),e.default=o},316:function(t,e,i){var n=this&&this.__assign||function(){return n=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},n.apply(this,arguments)},o=this&&this.__spreadArray||function(t,e,i){if(i||2===arguments.length)for(var n,o=0,r=e.length;o<r;o++)!n&&o in e||(n||(n=Array.prototype.slice.call(e,0,o)),n[o]=e[o]);return t.concat(n||Array.prototype.slice.call(e))};Object.defineProperty(e,"__esModule",{value:!0}),e.initDropdowns=void 0;var r=i(853),s={placement:"bottom",triggerType:"click",offsetSkidding:0,offsetDistance:10,delay:300,ignoreClickOutsideClass:!1,onShow:function(){},onHide:function(){},onToggle:function(){}},a=function(){function t(t,e,i){void 0===t&&(t=null),void 0===e&&(e=null),void 0===i&&(i=s),this._targetEl=t,this._triggerEl=e,this._options=n(n({},s),i),this._popperInstance=this._createPopperInstance(),this._visible=!1,this._init()}return t.prototype._init=function(){this._triggerEl&&this._setupEventListeners()},t.prototype._setupEventListeners=function(){var t=this,e=this._getTriggerEvents();"click"===this._options.triggerType&&e.showEvents.forEach((function(e){t._triggerEl.addEventListener(e,(function(){t.toggle()}))})),"hover"===this._options.triggerType&&(e.showEvents.forEach((function(e){t._triggerEl.addEventListener(e,(function(){"click"===e?t.toggle():setTimeout((function(){t.show()}),t._options.delay)})),t._targetEl.addEventListener(e,(function(){t.show()}))})),e.hideEvents.forEach((function(e){t._triggerEl.addEventListener(e,(function(){setTimeout((function(){t._targetEl.matches(":hover")||t.hide()}),t._options.delay)})),t._targetEl.addEventListener(e,(function(){setTimeout((function(){t._triggerEl.matches(":hover")||t.hide()}),t._options.delay)}))})))},t.prototype._createPopperInstance=function(){return(0,r.createPopper)(this._triggerEl,this._targetEl,{placement:this._options.placement,modifiers:[{name:"offset",options:{offset:[this._options.offsetSkidding,this._options.offsetDistance]}}]})},t.prototype._setupClickOutsideListener=function(){var t=this;this._clickOutsideEventListener=function(e){t._handleClickOutside(e,t._targetEl)},document.body.addEventListener("click",this._clickOutsideEventListener,!0)},t.prototype._removeClickOutsideListener=function(){document.body.removeEventListener("click",this._clickOutsideEventListener,!0)},t.prototype._handleClickOutside=function(t,e){var i=t.target,n=this._options.ignoreClickOutsideClass,o=!1;n&&document.querySelectorAll(".".concat(n)).forEach((function(t){t.contains(i)&&(o=!0)}));i===e||e.contains(i)||this._triggerEl.contains(i)||o||!this.isVisible()||this.hide()},t.prototype._getTriggerEvents=function(){switch(this._options.triggerType){case"hover":return{showEvents:["mouseenter","click"],hideEvents:["mouseleave"]};case"click":default:return{showEvents:["click"],hideEvents:[]};case"none":return{showEvents:[],hideEvents:[]}}},t.prototype.toggle=function(){this.isVisible()?this.hide():this.show(),this._options.onToggle(this)},t.prototype.isVisible=function(){return this._visible},t.prototype.show=function(){this._targetEl.classList.remove("hidden"),this._targetEl.classList.add("block"),this._popperInstance.setOptions((function(t){return n(n({},t),{modifiers:o(o([],t.modifiers,!0),[{name:"eventListeners",enabled:!0}],!1)})})),this._setupClickOutsideListener(),this._popperInstance.update(),this._visible=!0,this._options.onShow(this)},t.prototype.hide=function(){this._targetEl.classList.remove("block"),this._targetEl.classList.add("hidden"),this._popperInstance.setOptions((function(t){return n(n({},t),{modifiers:o(o([],t.modifiers,!0),[{name:"eventListeners",enabled:!1}],!1)})})),this._visible=!1,this._removeClickOutsideListener(),this._options.onHide(this)},t}();function c(){document.querySelectorAll("[data-dropdown-toggle]").forEach((function(t){var e=t.getAttribute("data-dropdown-toggle"),i=document.getElementById(e);if(i){var n=t.getAttribute("data-dropdown-placement"),o=t.getAttribute("data-dropdown-offset-skidding"),r=t.getAttribute("data-dropdown-offset-distance"),c=t.getAttribute("data-dropdown-trigger"),l=t.getAttribute("data-dropdown-delay"),d=t.getAttribute("data-dropdown-ignore-click-outside-class");new a(i,t,{placement:n||s.placement,triggerType:c||s.triggerType,offsetSkidding:o?parseInt(o):s.offsetSkidding,offsetDistance:r?parseInt(r):s.offsetDistance,delay:l?parseInt(l):s.delay,ignoreClickOutsideClass:d||s.ignoreClickOutsideClass})}else console.error('The dropdown element with id "'.concat(e,'" does not exist. Please check the data-dropdown-toggle attribute.'))}))}e.initDropdowns=c,"undefined"!=typeof window&&(window.Dropdown=a,window.initDropdowns=c),e.default=a},311:function(t,e,i){Object.defineProperty(e,"__esModule",{value:!0}),e.initFlowbite=void 0;var n=i(902),o=i(33),r=i(922),s=i(556),a=i(791),c=i(340),l=i(316),d=i(16),u=i(903),p=i(247),f=i(671);function h(){(0,n.initAccordions)(),(0,r.initCollapses)(),(0,o.initCarousels)(),(0,a.initDismisses)(),(0,l.initDropdowns)(),(0,d.initModals)(),(0,c.initDrawers)(),(0,p.initTabs)(),(0,f.initTooltips)(),(0,u.initPopovers)(),(0,s.initDials)()}e.initFlowbite=h,"undefined"!=typeof window&&(window.initFlowbite=h)},16:function(t,e){var i=this&&this.__assign||function(){return i=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},i.apply(this,arguments)};Object.defineProperty(e,"__esModule",{value:!0}),e.initModals=void 0;var n={placement:"center",backdropClasses:"bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",backdrop:"dynamic",closable:!0,onHide:function(){},onShow:function(){},onToggle:function(){}},o=function(){function t(t,e){void 0===t&&(t=null),void 0===e&&(e=n),this._targetEl=t,this._options=i(i({},n),e),this._isHidden=!0,this._backdropEl=null,this._init()}return t.prototype._init=function(){var t=this;this._targetEl&&this._getPlacementClasses().map((function(e){t._targetEl.classList.add(e)}))},t.prototype._createBackdrop=function(){var t;if(this._isHidden){var e=document.createElement("div");e.setAttribute("modal-backdrop",""),(t=e.classList).add.apply(t,this._options.backdropClasses.split(" ")),document.querySelector("body").append(e),this._backdropEl=e}},t.prototype._destroyBackdropEl=function(){this._isHidden||document.querySelector("[modal-backdrop]").remove()},t.prototype._setupModalCloseEventListeners=function(){var t=this;"dynamic"===this._options.backdrop&&(this._clickOutsideEventListener=function(e){t._handleOutsideClick(e.target)},this._targetEl.addEventListener("click",this._clickOutsideEventListener,!0)),this._keydownEventListener=function(e){"Escape"===e.key&&t.hide()},document.body.addEventListener("keydown",this._keydownEventListener,!0)},t.prototype._removeModalCloseEventListeners=function(){"dynamic"===this._options.backdrop&&this._targetEl.removeEventListener("click",this._clickOutsideEventListener,!0),document.body.removeEventListener("keydown",this._keydownEventListener,!0)},t.prototype._handleOutsideClick=function(t){(t===this._targetEl||t===this._backdropEl&&this.isVisible())&&this.hide()},t.prototype._getPlacementClasses=function(){switch(this._options.placement){case"top-left":return["justify-start","items-start"];case"top-center":return["justify-center","items-start"];case"top-right":return["justify-end","items-start"];case"center-left":return["justify-start","items-center"];case"center":default:return["justify-center","items-center"];case"center-right":return["justify-end","items-center"];case"bottom-left":return["justify-start","items-end"];case"bottom-center":return["justify-center","items-end"];case"bottom-right":return["justify-end","items-end"]}},t.prototype.toggle=function(){this._isHidden?this.show():this.hide(),this._options.onToggle(this)},t.prototype.show=function(){this.isHidden&&(this._targetEl.classList.add("flex"),this._targetEl.classList.remove("hidden"),this._targetEl.setAttribute("aria-modal","true"),this._targetEl.setAttribute("role","dialog"),this._targetEl.removeAttribute("aria-hidden"),this._createBackdrop(),this._isHidden=!1,document.body.classList.add("overflow-hidden"),this._options.closable&&this._setupModalCloseEventListeners(),this._options.onShow(this))},t.prototype.hide=function(){this.isVisible&&(this._targetEl.classList.add("hidden"),this._targetEl.classList.remove("flex"),this._targetEl.setAttribute("aria-hidden","true"),this._targetEl.removeAttribute("aria-modal"),this._targetEl.removeAttribute("role"),this._destroyBackdropEl(),this._isHidden=!0,document.body.classList.remove("overflow-hidden"),this._options.closable&&this._removeModalCloseEventListeners(),this._options.onHide(this))},t.prototype.isVisible=function(){return!this._isHidden},t.prototype.isHidden=function(){return this._isHidden},t}(),r=function(t,e){return e.some((function(e){return e.id===t}))?e.find((function(e){return e.id===t})):null};function s(){var t=[];document.querySelectorAll("[data-modal-target]").forEach((function(e){var i=e.getAttribute("data-modal-target"),s=document.getElementById(i);if(s){var a=s.getAttribute("data-modal-placement"),c=s.getAttribute("data-modal-backdrop");r(i,t)||t.push({id:i,object:new o(s,{placement:a||n.placement,backdrop:c||n.backdrop})})}else console.error("Modal with id ".concat(i," does not exist. Are you sure that the data-modal-target attribute points to the correct modal id?."))})),document.querySelectorAll("[data-modal-toggle]").forEach((function(e){var i=e.getAttribute("data-modal-toggle"),s=document.getElementById(i);if(s){var a=s.getAttribute("data-modal-placement"),c=s.getAttribute("data-modal-backdrop"),l=r(i,t);l||(l={id:i,object:new o(s,{placement:a||n.placement,backdrop:c||n.backdrop})},t.push(l)),e.addEventListener("click",(function(){l.object.toggle()}))}else console.error("Modal with id ".concat(i," does not exist. Are you sure that the data-modal-toggle attribute points to the correct modal id?"))})),document.querySelectorAll("[data-modal-show]").forEach((function(e){var i=e.getAttribute("data-modal-show");if(document.getElementById(i)){var n=r(i,t);n?e.addEventListener("click",(function(){n.object.isHidden&&n.object.show()})):console.error("Modal with id ".concat(i," has not been initialized. Please initialize it using the data-modal-target attribute."))}else console.error("Modal with id ".concat(i," does not exist. Are you sure that the data-modal-show attribute points to the correct modal id?"))})),document.querySelectorAll("[data-modal-hide]").forEach((function(e){var i=e.getAttribute("data-modal-hide");if(document.getElementById(i)){var n=r(i,t);n?e.addEventListener("click",(function(){n.object.isVisible&&n.object.hide()})):console.error("Modal with id ".concat(i," has not been initialized. Please initialize it using the data-modal-target attribute."))}else console.error("Modal with id ".concat(i," does not exist. Are you sure that the data-modal-hide attribute points to the correct modal id?"))}))}e.initModals=s,"undefined"!=typeof window&&(window.Modal=o,window.initModals=s),e.default=o},903:function(t,e,i){var n=this&&this.__assign||function(){return n=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},n.apply(this,arguments)},o=this&&this.__spreadArray||function(t,e,i){if(i||2===arguments.length)for(var n,o=0,r=e.length;o<r;o++)!n&&o in e||(n||(n=Array.prototype.slice.call(e,0,o)),n[o]=e[o]);return t.concat(n||Array.prototype.slice.call(e))};Object.defineProperty(e,"__esModule",{value:!0}),e.initPopovers=void 0;var r=i(853),s={placement:"top",offset:10,triggerType:"hover",onShow:function(){},onHide:function(){},onToggle:function(){}},a=function(){function t(t,e,i){void 0===t&&(t=null),void 0===e&&(e=null),void 0===i&&(i=s),this._targetEl=t,this._triggerEl=e,this._options=n(n({},s),i),this._popperInstance=this._createPopperInstance(),this._visible=!1,this._init()}return t.prototype._init=function(){this._triggerEl&&this._setupEventListeners()},t.prototype._setupEventListeners=function(){var t=this,e=this._getTriggerEvents();e.showEvents.forEach((function(e){t._triggerEl.addEventListener(e,(function(){t.show()})),t._targetEl.addEventListener(e,(function(){t.show()}))})),e.hideEvents.forEach((function(e){t._triggerEl.addEventListener(e,(function(){setTimeout((function(){t._targetEl.matches(":hover")||t.hide()}),100)})),t._targetEl.addEventListener(e,(function(){setTimeout((function(){t._triggerEl.matches(":hover")||t.hide()}),100)}))}))},t.prototype._createPopperInstance=function(){return(0,r.createPopper)(this._triggerEl,this._targetEl,{placement:this._options.placement,modifiers:[{name:"offset",options:{offset:[0,this._options.offset]}}]})},t.prototype._getTriggerEvents=function(){switch(this._options.triggerType){case"hover":default:return{showEvents:["mouseenter","focus"],hideEvents:["mouseleave","blur"]};case"click":return{showEvents:["click","focus"],hideEvents:["focusout","blur"]};case"none":return{showEvents:[],hideEvents:[]}}},t.prototype._setupKeydownListener=function(){var t=this;this._keydownEventListener=function(e){"Escape"===e.key&&t.hide()},document.body.addEventListener("keydown",this._keydownEventListener,!0)},t.prototype._removeKeydownListener=function(){document.body.removeEventListener("keydown",this._keydownEventListener,!0)},t.prototype._setupClickOutsideListener=function(){var t=this;this._clickOutsideEventListener=function(e){t._handleClickOutside(e,t._targetEl)},document.body.addEventListener("click",this._clickOutsideEventListener,!0)},t.prototype._removeClickOutsideListener=function(){document.body.removeEventListener("click",this._clickOutsideEventListener,!0)},t.prototype._handleClickOutside=function(t,e){var i=t.target;i===e||e.contains(i)||this._triggerEl.contains(i)||!this.isVisible()||this.hide()},t.prototype.isVisible=function(){return this._visible},t.prototype.toggle=function(){this.isVisible()?this.hide():this.show(),this._options.onToggle(this)},t.prototype.show=function(){this._targetEl.classList.remove("opacity-0","invisible"),this._targetEl.classList.add("opacity-100","visible"),this._popperInstance.setOptions((function(t){return n(n({},t),{modifiers:o(o([],t.modifiers,!0),[{name:"eventListeners",enabled:!0}],!1)})})),this._setupClickOutsideListener(),this._setupKeydownListener(),this._popperInstance.update(),this._visible=!0,this._options.onShow(this)},t.prototype.hide=function(){this._targetEl.classList.remove("opacity-100","visible"),this._targetEl.classList.add("opacity-0","invisible"),this._popperInstance.setOptions((function(t){return n(n({},t),{modifiers:o(o([],t.modifiers,!0),[{name:"eventListeners",enabled:!1}],!1)})})),this._removeClickOutsideListener(),this._removeKeydownListener(),this._visible=!1,this._options.onHide(this)},t}();function c(){document.querySelectorAll("[data-popover-target]").forEach((function(t){var e=t.getAttribute("data-popover-target"),i=document.getElementById(e);if(i){var n=t.getAttribute("data-popover-trigger"),o=t.getAttribute("data-popover-placement"),r=t.getAttribute("data-popover-offset");new a(i,t,{placement:o||s.placement,offset:r?parseInt(r):s.offset,triggerType:n||s.triggerType})}else console.error('The popover element with id "'.concat(e,'" does not exist. Please check the data-popover-target attribute.'))}))}e.initPopovers=c,"undefined"!=typeof window&&(window.Popover=a,window.initPopovers=c),e.default=a},247:function(t,e){var i=this&&this.__assign||function(){return i=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},i.apply(this,arguments)};Object.defineProperty(e,"__esModule",{value:!0}),e.initTabs=void 0;var n={defaultTabId:null,activeClasses:"text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500",inactiveClasses:"dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300",onShow:function(){}},o=function(){function t(t,e){void 0===t&&(t=[]),void 0===e&&(e=n),this._items=t,this._activeTab=e?this.getTab(e.defaultTabId):null,this._options=i(i({},n),e),this._init()}return t.prototype._init=function(){var t=this;this._items.length&&(this._activeTab||this._setActiveTab(this._items[0]),this.show(this._activeTab.id,!0),this._items.map((function(e){e.triggerEl.addEventListener("click",(function(){t.show(e.id)}))})))},t.prototype.getActiveTab=function(){return this._activeTab},t.prototype._setActiveTab=function(t){this._activeTab=t},t.prototype.getTab=function(t){return this._items.filter((function(e){return e.id===t}))[0]},t.prototype.show=function(t,e){var i,n,o=this;void 0===e&&(e=!1);var r=this.getTab(t);(r!==this._activeTab||e)&&(this._items.map((function(t){var e,i;t!==r&&((e=t.triggerEl.classList).remove.apply(e,o._options.activeClasses.split(" ")),(i=t.triggerEl.classList).add.apply(i,o._options.inactiveClasses.split(" ")),t.targetEl.classList.add("hidden"),t.triggerEl.setAttribute("aria-selected","false"))})),(i=r.triggerEl.classList).add.apply(i,this._options.activeClasses.split(" ")),(n=r.triggerEl.classList).remove.apply(n,this._options.inactiveClasses.split(" ")),r.triggerEl.setAttribute("aria-selected","true"),r.targetEl.classList.remove("hidden"),this._setActiveTab(r),this._options.onShow(this,r))},t}();function r(){document.querySelectorAll("[data-tabs-toggle]").forEach((function(t){var e=[],i=null;t.querySelectorAll('[role="tab"]').forEach((function(t){var n="true"===t.getAttribute("aria-selected"),o={id:t.getAttribute("data-tabs-target"),triggerEl:t,targetEl:document.querySelector(t.getAttribute("data-tabs-target"))};e.push(o),n&&(i=o.id)})),new o(e,{defaultTabId:i})}))}e.initTabs=r,"undefined"!=typeof window&&(window.Tabs=o,window.initTabs=r),e.default=o},671:function(t,e,i){var n=this&&this.__assign||function(){return n=Object.assign||function(t){for(var e,i=1,n=arguments.length;i<n;i++)for(var o in e=arguments[i])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t},n.apply(this,arguments)},o=this&&this.__spreadArray||function(t,e,i){if(i||2===arguments.length)for(var n,o=0,r=e.length;o<r;o++)!n&&o in e||(n||(n=Array.prototype.slice.call(e,0,o)),n[o]=e[o]);return t.concat(n||Array.prototype.slice.call(e))};Object.defineProperty(e,"__esModule",{value:!0}),e.initTooltips=void 0;var r=i(853),s={placement:"top",triggerType:"hover",onShow:function(){},onHide:function(){},onToggle:function(){}},a=function(){function t(t,e,i){void 0===t&&(t=null),void 0===e&&(e=null),void 0===i&&(i=s),this._targetEl=t,this._triggerEl=e,this._options=n(n({},s),i),this._popperInstance=this._createPopperInstance(),this._visible=!1,this._init()}return t.prototype._init=function(){this._triggerEl&&this._setupEventListeners()},t.prototype._setupEventListeners=function(){var t=this,e=this._getTriggerEvents();e.showEvents.forEach((function(e){t._triggerEl.addEventListener(e,(function(){t.show()}))})),e.hideEvents.forEach((function(e){t._triggerEl.addEventListener(e,(function(){t.hide()}))}))},t.prototype._createPopperInstance=function(){return(0,r.createPopper)(this._triggerEl,this._targetEl,{placement:this._options.placement,modifiers:[{name:"offset",options:{offset:[0,8]}}]})},t.prototype._getTriggerEvents=function(){switch(this._options.triggerType){case"hover":default:return{showEvents:["mouseenter","focus"],hideEvents:["mouseleave","blur"]};case"click":return{showEvents:["click","focus"],hideEvents:["focusout","blur"]};case"none":return{showEvents:[],hideEvents:[]}}},t.prototype._setupKeydownListener=function(){var t=this;this._keydownEventListener=function(e){"Escape"===e.key&&t.hide()},document.body.addEventListener("keydown",this._keydownEventListener,!0)},t.prototype._removeKeydownListener=function(){document.body.removeEventListener("keydown",this._keydownEventListener,!0)},t.prototype._setupClickOutsideListener=function(){var t=this;this._clickOutsideEventListener=function(e){t._handleClickOutside(e,t._targetEl)},document.body.addEventListener("click",this._clickOutsideEventListener,!0)},t.prototype._removeClickOutsideListener=function(){document.body.removeEventListener("click",this._clickOutsideEventListener,!0)},t.prototype._handleClickOutside=function(t,e){var i=t.target;i===e||e.contains(i)||this._triggerEl.contains(i)||!this.isVisible()||this.hide()},t.prototype.isVisible=function(){return this._visible},t.prototype.toggle=function(){this.isVisible()?this.hide():this.show()},t.prototype.show=function(){this._targetEl.classList.remove("opacity-0","invisible"),this._targetEl.classList.add("opacity-100","visible"),this._popperInstance.setOptions((function(t){return n(n({},t),{modifiers:o(o([],t.modifiers,!0),[{name:"eventListeners",enabled:!0}],!1)})})),this._setupClickOutsideListener(),this._setupKeydownListener(),this._popperInstance.update(),this._visible=!0,this._options.onShow(this)},t.prototype.hide=function(){this._targetEl.classList.remove("opacity-100","visible"),this._targetEl.classList.add("opacity-0","invisible"),this._popperInstance.setOptions((function(t){return n(n({},t),{modifiers:o(o([],t.modifiers,!0),[{name:"eventListeners",enabled:!1}],!1)})})),this._removeClickOutsideListener(),this._removeKeydownListener(),this._visible=!1,this._options.onHide(this)},t}();function c(){document.querySelectorAll("[data-tooltip-target]").forEach((function(t){var e=t.getAttribute("data-tooltip-target"),i=document.getElementById(e);if(i){var n=t.getAttribute("data-tooltip-trigger"),o=t.getAttribute("data-tooltip-placement");new a(i,t,{placement:o||s.placement,triggerType:n||s.triggerType})}else console.error('The tooltip element with id "'.concat(e,'" does not exist. Please check the data-tooltip-target attribute.'))}))}e.initTooltips=c,"undefined"!=typeof window&&(window.Tooltip=a,window.initTooltips=c),e.default=a},947:function(t,e){Object.defineProperty(e,"__esModule",{value:!0});var i=function(){function t(t,e){void 0===e&&(e=[]),this._eventType=t,this._eventFunctions=e}return t.prototype.init=function(){var t=this;this._eventFunctions.forEach((function(e){"undefined"!=typeof window&&window.addEventListener(t._eventType,e)}))},t}();e.default=i}},e={};function i(n){var o=e[n];if(void 0!==o)return o.exports;var r=e[n]={exports:{}};return t[n].call(r.exports,r,r.exports,i),r.exports}i.d=function(t,e){for(var n in e)i.o(e,n)&&!i.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})};var n={};return function(){var t=n;Object.defineProperty(t,"__esModule",{value:!0}),i(647);var e=i(902),o=i(33),r=i(922),s=i(556),a=i(791),c=i(340),l=i(316),d=i(16),u=i(903),p=i(247),f=i(671);i(311);var h=i(947);new h.default("load",[e.initAccordions,r.initCollapses,o.initCarousels,a.initDismisses,l.initDropdowns,d.initModals,c.initDrawers,p.initTabs,f.initTooltips,u.initPopovers,s.initDials]).init(),t.default={Accordion:e.default,Carousel:o.default,Collapse:r.default,Dial:s.default,Drawer:c.default,Dismiss:a.default,Dropdown:l.default,Modal:d.default,Popover:u.default,Tabs:p.default,Tooltip:f.default,Events:h.default}}(),n}()}));
    }

    // Callback function to run the script after data population is complete
    function runScriptAfterDataPopulation() {
        // Call the inline script function
        inlineScriptFunction();
    }

    // Wait for the DOM to be fully loaded before fetching and populating the data
    document.addEventListener("DOMContentLoaded", function () {
        fetchReservationData(runScriptAfterDataPopulation);
    });
</script>



<!-- JavaScript section for handling form submission -->
<script>
function handleSubmit(event, form) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get the user_id from the form data
    const user_id = form.querySelector('input[name="user_id_mitra"]').value;
    console.log('user_id:', user_id); // Add this line for debugging

    // Serialize the form data
    const formData = new FormData(form);

    // Update the user_id in the formData object
    formData.set('user_id_mitra', user_id);

    // Make a POST request to your PHP script
        fetch('./controllers.php?action=register', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status_pesanan_masuk === 'success') {
            // Display success message as a popup
            alert('Pesanan berhasil masuk!. Tekan OK untuk mengabaikan pesanan');
        } else {
            // Display error message as a popup
            alert('Gagal memasukkan pesanan. Silakan coba lagi.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle any network or server error here
        alert('Error: ' + error);
    });
}

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
