<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar - Your Website Title</title> <!-- Change "Your Website Title" to your actual website title -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
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

        <form action="../controllers/AuthController.php?action=register" method="post">

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="john.doe@example.com" required="">
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="********" required="">
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status Pendaftar</label>
            <select class="appearance-none border rounded w-full py-2 px-3 pr-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline sm:w-auto sm:pr-12" id="status" name="status" required="">
              <option value="" disabled="" selected="">Pilih</option>
              <option value="mitra">Mitra</option>
              <option value="konsumen">Konsumen</option>
            </select>
          </div>

          <input type="hidden" name="form_action" value="register">

          <div class="flex items-center justify-center">
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Daftar</button>
          </div>

        </form>

        <p class="text-md text-gray-700 mt-6 text-center">Belum mempunyai akun? <a class="text-yellow-500 hover:text-yellow-800 font-semibold" href="./masuk.php">Daftar</a></p>

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
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="https://aryadutapp.github.io/#features">
            <span class="relative z-10">Beranda</span>
          </a>
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="https://aryadutapp.github.io/#reviews">
            <span class="relative z-10">Blog</span>
          </a>
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="https://aryadutapp.github.io/#pricing">
            <span class="relative z-10">Produk</span>
          </a>
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="https://aryadutapp.github.io/#faqs">
            <span class="relative z-10">Bantuan</span>
          </a>
          <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="https://aryadutapp.github.io/#faqs">
            <span class="relative z-10">Tentang Kami</span>
          </a>
        </nav>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
