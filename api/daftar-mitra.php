<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar - Your Website Title</title> <!-- Change "Your Website Title" to your actual website title -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
  <script src="../assets/js/regis.js"></script>

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
      <div class="max-w-md w-full px-6 py-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-5">Daftar Mitra</h2>
<p class="text-md text-gray-700 text-center">Daftar sebagai Konsumen ? <a class="text-yellow-500 hover:text-yellow-800 mb-4 font-semibold" href="./daftar-konsumen.php">Klik Disini</a></p>

<form action="./controllers.php?action=register" method="post" onsubmit="validateForm(event)">

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
  <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_toko">Nama Toko</label>
  <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama_toko" name="nama_toko" type="text" placeholder="Misal: PandanMart Keputih" required="">
</div>
<div class="mb-4">
  <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat">Alamat</label>
  <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alamat" name="alamat" type="text" placeholder="Misal: Jl. Raya Kedondong XII No. 21" required="">
</div>
<div class="mb-4">
  <label class="block text-gray-700 text-sm font-bold mb-2" for="kelurahan">Kelurahan</label>
  <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kelurahan" name="kelurahan" type="text" placeholder="Misal: Keputih" required="">
</div>
<div class="mb-4">
  <label class="block text-gray-700 text-sm font-bold mb-2" for="kecamatan">Kecamatan</label>
  <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kecamatan" name="kecamatan" type="text" placeholder="Misal: Sukolilo" required="">
</div>
<div class="mb-4">
  <label class="block text-gray-700 text-sm font-bold mb-2" for="provinsi">Provinsi</label>
  <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="provinsi" name="provinsi" type="text" placeholder="Misal: Jawa Timur" required="">
</div>
<div class="mb-4">
  <label class="block text-gray-700 text-sm font-bold mb-2" for="penanggung_jawab">Nama Penanggungjawab</label>
  <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="penanggung_jawab" name="penanggung_jawab" type="text" placeholder="Misal: Rudi Wiatno" required="">
</div>
<div class="mb-4">
  <label class="block text-gray-700 text-sm font-bold mb-2" for="kontak_wa">Kontak WA Penanggungjawab</label>
  <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kontak_wa" name="kontak_wa" type="tel" placeholder="Misal: 08123456789" required="">
</div>
<input type="hidden" name="form_action" value="register-mitra">
    <input type="hidden" name="status" value="mitra"><p id="password-warning" class="text-sm text-red-600 mt-2 text-center hidden"></p>

                  


          <div class="flex items-center justify-center">
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Daftar</button>
          </div>

        </form>

        <p class="text-md text-gray-700 mt-6 text-center">Sudah mempunyai akun? <a class="text-yellow-500 hover:text-yellow-800 font-semibold" href="./masuk.php">Masuk</a></p>

        <!-- End of inline script for form validation -->

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
