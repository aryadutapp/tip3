<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar - Your Website Title</title> <!-- Change "Your Website Title" to your actual website title -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
  <script>
          function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === 'password') {
              passwordInput.type = 'text';
            } else {
              passwordInput.type = 'password';
            }
          }

    function validateForm(event) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('password2').value;

      if (password !== confirmPassword) {
        event.preventDefault(); // Prevent form submission
        const warningMessage = document.getElementById('password-warning');
        warningMessage.innerText = 'Password and Konfirmasi Password must match.';
        warningMessage.style.display = 'block';
      } else if (password.length < 8) {
        event.preventDefault(); // Prevent form submission
        const warningMessage = document.getElementById('password-warning');
        warningMessage.innerText = 'Password must be at least 8 characters long.';
        warningMessage.style.display = 'block';
      }
    }
  </script>
</head>
<body>

<header>
  <nav>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-50 flex justify-center py-8">
      <div class="relative z-10 flex items-center gap-16">
        <a href="https://aryadutapp.github.io/titipin" aria-label="Home">
          <img class="h-14 w-auto" aria-hidden="true" viewbox="0 0 160 24" fill="none" src="../assets/images/logo-text-right.png">
        </a>
      </div>
    </div>
  </nav>
</header>

<main>
  <section class="pages-signup pb-10">
    <div class="flex items-center justify-center">
      <div class="max-w-md w-full px-6 py-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-5">Daftar</h2>

<form action="./AuthController.php?action=register" method="post" onsubmit="validateForm(event)">

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="john.doe@example.com" required="">
          </div>

          <div class="mb-4 relative">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
            <div class="relative">
              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="********" required="">
              <button class="absolute right-3 top-2 h-6 w-6 text-gray-500 hover:text-gray-800" onclick="togglePasswordVisibility('password')" type="button">
                <img class="h-6 w-6" src="../assets/images/eye-svg.svg" alt="See Password">
              </button>
            </div>
          </div>

          <div class="mb-4 relative">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password2">Konfirmasi Password</label>
            <div class="relative">
              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password2" name="password2" type="password" placeholder="********" required="">
              <button class="absolute right-3 top-2 h-6 w-6 text-gray-500 hover:text-gray-800" onclick="togglePasswordVisibility('password2')" type="button">
                <img class="h-6 w-6" src="../assets/images/eye-svg.svg" alt="See Password">
              </button>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status Pendaftar</label>
            <div class="relative">
              <select class="appearance-none border rounded w-full py-2 px-3 pr-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-auto sm:pr-12" id="status" name="status" required>
                <option value="" disabled selected>Pilih</option>
                <option value="mitra">Mitra</option>
                <option value="konsumen">Konsumen</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                  <path d="M10 12l-5-5 1.41-1.41L10 9.17l3.59-3.58L15 7z"></path>
                </svg>
              </div>
            </div>
          </div>

          <input type="hidden" name="form_action" value="register">
    <p id="password-warning" class="text-sm text-red-600 mt-2 text-center hidden"></p>


          <div class="flex items-center justify-center">
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Daftar</button>
          </div>

        </form>

        <p class="text-md text-gray-700 mt-6 text-center">Belum mempunyai akun? <a class="text-yellow-500 hover:text-yellow-800 font-semibold" href="./masuk.php">Daftar</a></p>

        <!-- End of inline script for form validation -->

      </div>
    </div>
  </section>

</main>

<footer class="border-t border-gray-200 bg-gray-100">
  <!-- Footer content
