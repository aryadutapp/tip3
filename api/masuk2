<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
<header>
  <!-- ... Your header content ... -->
</header>

<main>
  <!-- ... Your main content ... -->
  <section class="pages-signup pb-10">
    <div class="flex items-center justify-center">
      <div class="max-w-md w-full px-6 py-8 bg-white rounded-lg lg:shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-5">Masuk</h2>

        <div id="login-form">
          <form action="./controllers.php?action=login" method="post">
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="john.doe@example.com" required="">
            </div>

            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="********" required="">
            </div>

            <div class="flex items-center justify-between mb-4">
              <!-- ... Your checkbox and "Lupa Password" link ... -->
            </div>

            <input type="hidden" name="form_action" value="login">

            <div class="flex items-center justify-center">
              <button id="submit-btn" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Masuk</button>
            </div>

          </form>
        </div>

        <p class="text-md text-gray-700 mt-6 text-center">Belum mempunyai akun <a class="text-yellow-500 hover:text-yellow-800 font-semibold" href="./daftar.php">Daftar</a></p>

      </div>
    </div>
  </section>
</main>

<footer class="border-t border-gray-200 bg-gray-100">
  <!-- ... Your footer content ... -->
</footer>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submit-btn').addEventListener('click', function(event) {
      event.preventDefault();

      // Get form data
      const form = document.querySelector('#login-form form');
      const formData = new FormData(form);

      // Send form data via AJAX
      fetch(form.action, {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (response.ok) {
          return response.json();
        } else {
          return response.json().then(data => {
            throw new Error(data.error);
          });
        }
      })
      .then(data => {
        if (data.status === "mitra") {
          window.location.href = "dashboard-mitra.php";
        } else if (data.status === "konsumen") {
          window.location.href = "dashboard-konsumen.php";
        } else {
          throw new Error("Invalid user status.");
        }
      })
      .catch(error => {
        const errorMessage = error.message || "Terjadi kesalahan saat masuk.";
        const errorContainer = document.createElement('p');
        errorContainer.classList.add('text-md', 'text-red-500', 'my-6', 'text-center');
        errorContainer.textContent = errorMessage;
        document.getElementById('login-form').appendChild(errorContainer);
      });
    });
  });
</script>

</body>
</html>
