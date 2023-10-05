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
if (!$user || $user->status === "mitra") {
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
        <div class="mx-auto max-w-8xl px-4 sm:px-6 lg:px-8 relative z-50 flex justify-between py-2">
          <div id="logo-usaha" class="relative z-10 flex items-center gap-16"><a href="#" aria-label="Home"><img class="h-14 w-auto" aria-hidden="true" viewbox="0 0 160 24" fill="none" src="https://aryadutapp.github.io/titipin/logo-usaha.png"></a></div>
          <div id="menu-bar" class="flex items-center gap-6">
            <div class="lg:hidden" data-headlessui-state=""><button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"><span class="sr-only">Open sidebar</span><svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg></button></div>
          </div>
        </div>
      </nav>
    </header>
    <main id="menu-utama" class="mt-24">
      <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform sm:translate-x-0 -translate-x-full" aria-label="Sidebar" aria-hidden="true">
        <div class="mt-16 h-full px-3 py-4 overflow-y-auto bg-gray-50">
          <ul class="space-y-2 font-medium">
            <li><a href="#" class="flex items-center p-2 text-gray-900 rounded-lg bg-gray-300 group"><svg class="w-5 h-5 text-gray-500 transition duration-75text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"></path>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"></path>
                </svg><span class="ml-3">Dashboard</span></a></li>
            <li><a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"><svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"></path>
                </svg><span class="flex-1 ml-3 whitespace-nowrap">Nama Toko</span><span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">3</span></a></li>
            <li><a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"><svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"></path>
                </svg><span class="flex-1 ml-3 whitespace-nowrap">Akun</span></a></li>
            <li><a href="./logout.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"><svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"></path>
                </svg><span class="flex-1 ml-3 whitespace-nowrap">Keluar</span></a></li>
            <li><a href="./bantuan.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100  group" onclick="openNewTabAndReturnHome()"><svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"></path>
                  <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"></path>
                  <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"></path>
                </svg><span class="flex-1 ml-3 whitespace-nowrap">Bantuan</span></a></li>
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



      <section id="selamat-datang-user" class="sm:ml-64 pb-4">
        <div class="border-2 border-gray-200 border-dashed rounded-lg">
          <div class="mx-auto">
            <div class="rounded-t-lg bg-gray-100 p-3">
              <h2 class="text-2xl font-bold text-black pt-4 lg:px-12">Selamat Datang Konsumen</h2>
              <h1 id="teks-user" class="text-xl font-med mb-4 text-black pt-4 lg:px-12"><?php echo $userEmail; ?></h1>
            </div>
          </div>
        </div>
      </section>


      
      
      
      <section id="daftar-mitra" class="sm:ml-64">
        <div class="border-2 border-gray-200 border-dashed rounded-lg">
          <div class="mx-auto">
            <div class="rounded-t-lg bg-gray-100 p-3">
              <h2 class="text-2xl font-bold mb-4 text-black pt-4 lg:px-12">Daftar Mitra</h2>
              <div class="mx-auto max-w-screen-xl px- lg:px-12 pb-4">
                <!-- Start coding here -->
                <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                  <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
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
                      const kotaValue = data.kota;
                      const kelurahanValue = data.kelurahan;
                      const provinsiValue = data.provinsi;
                      const KodePos = data.kode_pos;
                      const userIDValue = data.user_id;
                      row.innerHTML = `


                            
        
								<td class="px-4 py-3 whitespace-nowrap">
    <div class="font-medium text-gray-900">${namaTokoValue}</div>
    <div class="text-xs text-gray-500">${alamatValue}</div>
</td>

								
								
								<!-- <td class="px-4 py-3">wqwq</td> -->
								<td class="px-4 py-3 flex items-center justify-end">
									<!-- Modal toggle -->
									<button data-modal-target="pesanan_masuk_konsumen_${userIDValue}" data-modal-toggle="pesanan_masuk_konsumen" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                        Pesan Disini
                                    </button>
									<!-- Main modal -->
									<div>
										<div id="pesanan_masuk_konsumen_${userIDValue}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center flex modal-opened hidden">
											<div class="relative w-full max-w-md max-h-full">
												<!-- Modal content -->
												<div class="relative bg-white rounded-lg shadow ">
													<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="pesanan_masuk_konsumen">
														<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
															<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
														</svg>
														<span class="sr-only">Close modal</span>
													</button>
													<div class="px-6 py-6 lg:px-8">
														<h3 class="mb-4 text-xl font-medium text-gray-900 ">Pesan di ${namaTokoValue}</h3>
														<form class="space-y-6" action="https://www.titipin.com/api/controllers.php?action=register" onsubmit="return handleSubmit(event, this)" method="post">
															<div>
																<label for="full-name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap</label>
																<input type="full-name" name="full-name" id="full-name_${userIDValue}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Joni Sunandar" required="">
																</div>
																<div>
																	<div class="flex justify-between">
																		<div class="flex items-start">
																			<div class="flex items-center h-5">
																				<input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required="">
																				</div>
																				<label for="remember" class="ml-2 text-sm font-medium text-gray-900 mb-5">Saya menyetujui 
																					<a class="text-blue-500 ">Syarat dan Ketentuan
																					</a></label><a class="text-blue-500 ">
																				</a></div><a class="text-blue-500 ">
																			</a></div><a class="text-blue-500 ">
																		</a></div><a class="text-blue-500 ">
																		<!-- Error Pesanan Masuk Konsumen Modal -->
																		<div id="error_pesanan_masuk_konsumen_full-name_${userIDValue}" class="w-full text-center text-red-500 hidden mb-3"></div>
																		<input type="hidden" name="form_action" value="pesanan-masuk">
																			<input type="hidden" name="user_id_mitra" value="${userIDValue}">
																				<input type="hidden" name="size" value="S">
																					<button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Buat Pesanan</button>
																				
																			</a></form></div><a class="text-blue-500 ">
																		</a></div><a class="text-blue-500 ">
																	</a></div><a class="text-blue-500 ">
																</a></div><a class="text-blue-500 ">
															</a></div><a class="text-blue-500 ">
														</a></td>
                                                      


                            


                                                        `;
                      const buttons = row.querySelectorAll('[data-modal-toggle="pesanan_masuk_konsumen"]');
                      buttons.forEach(button => {
                        button.addEventListener('click', () => openPesananMasukModal(data, userIDValue)); // Pass userIDValue as an argument
                      });
                      const buttonscl = row.querySelectorAll('[data-modal-hide="pesanan_masuk_konsumen"]');
                      buttonscl.forEach(button => {
                        button.addEventListener('click', () => closePesananMasukModal(data, userIDValue)); // Pass userIDValue as an argument
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
                        // Remove all existing classes
                        modal.removeAttribute('class');
                        // Add your new classes
                        modal.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'w-full', 'p-4', 'overflow-x-hidden', 'overflow-y-auto', 'md:inset-0', 'h-[calc(100%-1rem)]', 'max-h-full', 'justify-center', 'items-center', 'flex');

                        const modalBackdrop = document.getElementById('modal-backdrop');

                        if (modalBackdrop) {
                            // Remove the "hidden" class
                            modalBackdrop.classList.remove('hidden');
                        }

                      }
                    }

                    function closePesananMasukModal(data, userID) {
                      // Handle the modal opening logic here
                      // ...
                      // Assuming you want to open the modal when the button is clicked
                      const modalId = `pesanan_masuk_konsumen_${userID}`;
                      const modal = document.getElementById(modalId);
                      if (modal) {
                        modal.classList.add('hidden');

                        const modalBackdrop = document.getElementById('modal-backdrop');
                        if (modalBackdrop) {
                            // Remove the "hidden" class
                            modalBackdrop.classList.add('hidden');
                        }

                      }
                    }
                  </script>



                  <!-- JavaScript section for fetching and populating data -->
                  <script>
                    // Function to fetch data from the server and populate the table
                    function fetchReservationData() {
                      fetch("fetch_data_toko.php").then(response => response.json()).then(data => {
                        const tableBody = document.getElementById("reservation-table-body");
                        data.forEach(rowData => {
                          const newRow = createTableRow(rowData);
                          tableBody.appendChild(newRow);
                        });
                        //to check name on the full name list
                        nameCheck();
                        // Now that the table has been populated, you can attach event listeners
                        // or perform other actions as needed.
                      }).catch(error => console.error("Error:", error));
                    }

                    function nameCheck() {
                      // Get all input elements with the type "full-name"
                      var fullNameInputs = document.querySelectorAll('input[type="full-name"]');
                      // Regular expression pattern for alphabetical letters
                      var alphabetPattern = /^[A-Za-z\s]+$/;
                      // Loop through all the matching input elements
                      fullNameInputs.forEach(function(fullNameInput) {
                        // Get the error div element next to the input
                        var errorDiv = document.getElementById("error_pesanan_masuk_konsumen_" + fullNameInput.id);
                        // Add an event listener to the full name input for input events
                        fullNameInput.addEventListener("input", function() {
                          // Get the input value
                          var inputValue = fullNameInput.value;
                          // Test if the input matches the alphabetical letters pattern
                          if (!alphabetPattern.test(inputValue)) {
                            // Display an error message if the input contains non-alphabetical characters
                            errorDiv.textContent = "Nama Lengkap hanya boleh mengandung huruf alphabet (Contoh: Joni Sunandar)";
                            errorDiv.classList.remove("hidden");
                          } else if (inputValue.trim().split(/\s+/).length < 2) {
                            // Check if there are at least two words
                            // Display an error message if there are less than two words
                            errorDiv.textContent = "Nama Lengkap minimal dua kata (Contoh: Joni Sunandar)";
                            errorDiv.classList.remove("hidden");
                          } else {
                            // Clear the error message if the input is valid
                            errorDiv.textContent = "";
                            errorDiv.classList.add("hidden");
                          }
                        });
                      });
                    }
                    // Wait for the DOM to be fully loaded before fetching and populating the data
                    document.addEventListener("DOMContentLoaded", function() {
                      fetchReservationData();
                    });
                  </script>
                  
                  
                  
                  <script>
                    // Function to toggle the modal's class
                    function toggleModalClass(modalId) {
                      const modal = document.getElementById(modalId);
                      if (modal.classList.contains('modal-opened')) {
                        modal.classList.remove('modal-opened');
                      } else {
                        modal.classList.add('modal-opened');
                      }
                    }
                    // Function to handle the modal toggle button click event
                    function handleModalToggleClick(event) {
                      const modalTarget = event.target.getAttribute('data-modal-target');
                      toggleModalClass(modalTarget);
                    }
                    // Function to handle the modal close button click event
                    function handleModalCloseClick(event, modalId) {
                      event.preventDefault();
                      toggleModalClass(modalId);
                    }
                    // Add event listener to a parent element that exists when the page loads
                    document.body.addEventListener('click', (event) => {
                      const target = event.target;
                      // Check if the clicked element is a modal toggle button
                      if (target.matches('[data-modal-toggle]')) {
                        handleModalToggleClick(event);
                      }
                      // Check if the clicked element is a modal close button
                      if (target.matches('[data-modal-hide]')) {
                        const modalId = target.getAttribute('data-modal-hide');
                        handleModalCloseClick(event, modalId);
                      }
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
                      }).then(response => response.json()).then(data => {
                        if (data.status_pesanan_masuk === 'success') {
                          // Display success message as a popup
                          alert('Pesanan berhasil masuk!. Tekan OK untuk mengabaikan pesanan');
                        } else {
                          // Display error message as a popup
                          alert('Gagal memasukkan pesanan. Silakan coba lagi.');
                        }
                      }).catch(error => {
                        console.error('Error:', error);
                        // Handle any network or server error here
                        alert('Error: ' + error);
                      });
                    }
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      
      
      

    
      <section id="riwayat-konsumen" class="py-4 sm:ml-64">
      <div class="border-2 border-gray-200 border-dashed rounded-lg">
        <div class="mx-auto">
          <div class="rounded-t-lg bg-gray-100 p-6">
            <h2 class="text-2xl font-bold mb-4 text-black lg:px-12">Riwayat Pemesanan</h2>
            <div class="mx-auto max-w-screen-xl lg:px-12 pb-4">
              <!-- Start coding here -->
              <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                      <tr>
                        <th scope="col" class="px-4 py-3">Nama Toko</th>
                        <th scope="col" class="px-4 py-3">Jam Pemesanan</th>
                        <th scope="col" class="px-4 py-3">Kode Pengambilan</th>
                        <th scope="col" class="px-4 py-3">Status Barang</th>
                      </tr>
                    </thead>
                    <tbody id="riwayat-table-body">
                      <!-- Table rows will be dynamically added here -->
                    </tbody>
                  </table>
                </div>
                <!-- HTML content -->
                <!-- JavaScript section for creating table rows -->
                <script>
                  // Function to create table rows with data
                  function createTableRiwayat(data) {
                    const row = document.createElement('tr');
                    const NamaToko = data.nama_toko;
                    const jampesan = data.book_time;
                    const koderahasia = data.pickup_number;
                    row.innerHTML = `
    
                                                    
							<td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${NamaToko}</td>
							<td class="px-4 py-3">${jampesan}</td>
							 <td class="px-4 py-3">${koderahasia}</td> 
							 <td class="px-4 py-3">${data.reservation_status}</td> 
							
        `;
                    return row;
                  }
                </script>
                <!-- JavaScript section for fetching and populating data 222 WHYYY -->
                <script>
                  // Function to fetch data from the server and populate the table
                  function fetchRiwayatData() {
                    fetch("fetch_riwayat_konsumen.php").then(response => response.json()).then(data => {
                      const tableBody = document.getElementById("riwayat-table-body");
                      data.forEach(rowData => {
                        const newRow = createTableRiwayat(rowData);
                        tableBody.appendChild(newRow);
                      });
                      //to check name on the full name list
                      nameCheck();
                      // Now that the table has been populated, you can attach event listeners
                      // or perform other actions as needed.
                    }).catch(error => console.error("Error:", error));
                  }
                  // Wait for the DOM to be fully loaded before fetching and populating the data
                  document.addEventListener("DOMContentLoaded", function() {
                    fetchRiwayatData();
                  });
                </script>
                <!-- JavaScript section for handling form submission -->
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
    <script src="https://flowbite.com/docs/flowbite.min.js"></script>

    <div id="modal-backdrop" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40 hidden"></div>



  </body>
</html>