<?php
require_once 'models.php';
// Check if the user's cookie exists
$cookieValue = isset($_COOKIE['titip_user']) ? $_COOKIE['titip_user'] : null;

// If the user's cookie exists, check the user's status based on the session
if ($cookieValue) {
    // Get the user's email based on their session
    $userEmail = User::getUserEmailBySession($cookieValue);

    // Get the user information based on their email
    $user = User::getUserByEmail($userEmail);

    // If the user doesn't exist or is not a "mitra," redirect to dashboard-konsumen.php
    if ($user && $user->status === "mitra") {
        header("Location: dashboard-mitra.php");
        exit();
    }
    elseif ($user && $user->status === "konsumen") {
        header("Location: dashboard-konsumen.php");
        exit();
    }
}

// Retrieve email value from the header if it exists
$emailFromHeader = isset($_GET["email"]) ? urldecode($_GET["email"]) : '';

?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
<header>
  <nav>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-50 flex justify-center py-8">
      <div class="relative z-10 flex items-center gap-16">
        <a href="../" aria-label="Home">
          <img class="h-14 w-auto" aria-hidden="true" viewbox="0 0 160 24" fill="none" src="../assets/images/logo-text-right.png">
        </a>
      </div>
    </div>
  </nav>
</header>



<main>
  <section class="pages-signup pb-10">
    <div class="flex items-center justify-center">
      <div class="max-w-md w-full px-6 py-8 bg-white rounded-lg lg:shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-5">Masuk</h2>

        <form action="./controllers.php?action=login" method="post">

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
<input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="john.doe@example.com" value="<?php echo htmlspecialchars($emailFromHeader); ?>" required="">
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="********" required="">
          </div>

          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
              <input class="mr-2 leading-tight" type="checkbox">
              <label class="text-sm text-gray-700 font-bold" for="remember">Ingat Saya</label>
            </div>

            <div>
              <a class="inline-block align-baseline text-sm text-yellow-500 hover:text-yellow-800" href="https://aryadutapp.github.io/titipin/#">Lupa Password</a>
            </div>
          </div>

          <input type="hidden" name="form_action" value="login">

                <?php
    if (isset($_GET["error"])) {
        $errorMessage = urldecode($_GET["error"]);
        echo "<p class='text-md text-red-500 my-6 text-center'>$errorMessage</p>";
    }
    if (isset($_GET["success"])) {
        $successMessage = urldecode($_GET["success"]);
        echo "<p class='text-md text-green-500 my-6 text-center'>$successMessage</p>";
    }
    ?>
    
        

          <div class="flex items-center justify-center">
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Masuk</button>
          </div>

        </form>

        <p class="text-md text-gray-700 mt-6 text-center">Belum mempunyai akun <a class="text-yellow-500 hover:text-yellow-800 font-semibold" href="./daftar-konsumen.php">Daftar</a></p>

      </div>
    </div>
  </section>
</main>



<footer class="border-t border-gray-200 bg-gray-100">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col items-start justify-between gap-y-12 pb-6 pt-10 lg:pt-16 lg:flex-row lg:items-center lg:py-16">
      <div>
        <div class="flex items-center text-gray-900">
          <img class="h-14 w-auto" aria-hidden="true" viewbox="0 0 160 24" fill="none" src="../assets/images/logo-text-right.png">
        </div>
        <nav class="mt-11 flex gap-8">
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="../index">
            <span class="relative z-10">Beranda</span>
          </a>
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="../blog">
            <span class="relative z-10">Blog</span>
          </a>
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="../produk">
            <span class="relative z-10">Produk</span>
          </a>
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="../bantuan">
            <span class="relative z-10">Bantuan</span>
          </a>
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="../tentang-kami">
            <span class="relative z-10">Tentang Kami</span>
          </a>
        </nav>
      </div>
    </div>
  </div>
</footer>

    

    
</body>
</html>
