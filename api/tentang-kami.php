<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo.png">
  <title>titip.in : Layanan Penitipan Barang dengan Sistem Loker berbasis Daring</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

    <header>
        <nav>
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-50 flex justify-between py-8">
            <div class="relative z-10 flex items-center gap-16">
              <a href="/" aria-label="Home">
                <img class="h-14 w-auto" aria-hidden="true" viewbox="0 0 160 24" fill="none" src="../assets/images/logo-text-right.png">
              </a>
      
              <div class="lg:flex lg:gap-10 sm:hidden md:hidden hidden" id="menu-desktop">
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/">
                  <span class="relative z-10">Beranda</span>
                </a>
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="./blog">
                  <span class="relative z-10">Blog</span>
                </a>
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="./produk">
                  <span class="relative z-10">Produk</span>
                </a>
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="./bantuan">
                  <span class="relative z-10">Bantuan</span>
                </a>
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="./tentang-kami">
                  <span class="relative z-10">Tentang Kami</span>
                </a>
              </div>
              
      
              <div class="hidden lg:flex lg:gap-10 lg:hidden" id="menu-mobile">
                <div class="absolute inset-x-0 top-0 z-0 origin-top rounded-b-2xl bg-gray-50 px-6 pb-6 pt-10 shadow-2xl shadow-gray-900/20 min-w-[50vw]" id="headlessui-popover-panel-:r1:" tabindex="-1" data-headlessui-state="open" data-projection-id="2" style="opacity: 1; transform: none;">
                  <div class="space-y-4">
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="/">Beranda</a>
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="./blog">Blog</a>
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="./produk">Produk</a>
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="./bantuan">Bantuan</a>
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="./tentang-kami">Tentang Kami</a>
                  </div>
                  <div class="mt-8 flex flex-col gap-4">
                    <a class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-gray-300 text-gray-700 hover:border-gray-400 active:bg-gray-100 active:text-gray-700/80" href="./api/daftar-konsumen.php">Masuk</a>
                    <a class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-gray-800 text-white hover:bg-gray-900 active:bg-gray-800 active:text-white/80" href="./api/daftar-mitra.php">Daftar</a>
                  </div>
                </div>
              </div>
      
      
            </div>
            <div class="flex items-center gap-6">
              <div class="lg:hidden" data-headlessui-state="">
                <button class="relative z-10 -m-2 inline-flex items-center rounded-lg stroke-gray-900 p-2 hover:bg-gray-200/50 hover:stroke-gray-600 active:stroke-gray-900 [&amp;:not(:focus-visible)]:focus:outline-none" aria-label="Toggle site navigation" type="button" aria-expanded="false" data-headlessui-state="" id="headlessui-popover-button-:R2p6:">
                  <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6">
                    <path d="M5 6h14M5 18h14M5 12h14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </button>
              </div>
      
              <a class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-gray-300 text-gray-700 hover:border-gray-400 active:bg-gray-100 active:text-gray-700/80 hidden lg:block" href="./api/masuk">Masuk</a>
              <a class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-gray-800 text-white hover:bg-gray-900 active:bg-gray-800 active:text-white/80 hidden lg:block" href="./api/daftar-mitra.php">Daftar</a>
            </div>
          </div>
        
          <script>
            // JavaScript to handle mobile menu toggle
            const button = document.getElementById('headlessui-popover-button-:R2p6:');
            const menu = document.getElementById('menu-mobile');
      
        
            button.addEventListener('click', () => {
              const expanded = button.getAttribute('aria-expanded') === 'true' || false;
              button.setAttribute('aria-expanded', !expanded);
              menu.classList.toggle('hidden');
            });
          </script>
        </nav>
          </header>


          <main>
          <section id="banner-customer" class="overflow-hidden lg:py-20 sm:py-32 lg:pb-32 xl:pb-36">
              <div class="mx-auto w-full max-w-7xl lg:px-8"><div class="relative px-4 sm:px-8 lg:px-12"><div class="mx-auto max-w-2xl lg:max-w-5xl"><header class="max-w-2xl"><h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl">Apa sih Titip.in</h1><p class="mt-6 text-base text-zinc-600">Titip.in adalah platform dimana kamu dapat melakukan penitipan barang melalui platform kami. Dengan fitur ini, kamu tidak perlu khawatir jika kamu akan menerima barang namun kamu berada di luar atau sedang ada kesibukan</p></header><div class="mt-16 sm:mt-20"></div></div><div class="mx-auto max-w-2xl lg:max-w-5xl"><header class="max-w-2xl"><h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl">Syarat dan Ketentuan</h1><p class="mt-6 text-base text-zinc-600">    <h2>1. Definisi</h2>
    <ol>
        <li>
            a. <em>"Titip.in"</em> merujuk pada perusahaan atau individu yang menyediakan layanan penitipan barang.
        </li>
        <li>
            b. <em>"Pengguna"</em> adalah individu atau entitas yang menggunakan layanan penitipan barang yang disediakan oleh Titip.in.
        </li>
        <li>
            c. <em>"Barang"</em> merujuk pada item atau benda yang dititipkan oleh Pengguna kepada Penyedia Jasa untuk disimpan.
        </li>
        <li>
            d. <em>"Mitra"</em> merujuk pada pengusaha yang menyewakan tempat usahanya sebagai tempat penitipan dan merupakan partner bisnis dari Titip.in.
        </li>
    </ol>

    <h2>2. Layanan</h2>
    <ol>
        <li>
            a. Mitra bertanggung jawab untuk menerima, menjaga, dan mengembalikan Barang yang dititipkan sesuai dengan persyaratan yang disepakati.
        </li>
        <li>
            b. Pengguna wajib memberikan informasi yang akurat dan lengkap mengenai data diri untuk digunakan mitra sebagai konfirmasi.
        </li>
        <li>
            c. Mitra tidak bertanggung jawab atas kerusakan, kehilangan, atau pencurian Barang yang disebabkan oleh kejadian yang diluar kendali normal (force majeure) atau karena kelalaian Pengguna dalam memberikan informasi yang akurat.
        </li>
        <li>
            d. Pengguna dapat memesan tempat penitipan menggunakan aplikasi secara daring, maupun secara luring, dengan mendatangi langsung lokasi mitra.
        </li>
    </ol>

    <h2>3. Pembayaran dan Biaya</h2>
    <ol>
        <li>
            a. Pengguna wajib membayar biaya penitipan Barang sesuai dengan tarif yang telah ditetapkan oleh Titip.in dengan rincian sebagai berikut:
            <ul>
                <li><strong>LARGE:</strong> Panjang: 40-100 cm, Lebar: 25-100 cm, Tinggi: 20-100 cm, Harga awal: Rp10.000</li>
                <li><strong>SMALL:</strong> Panjang: &lt; 40 cm, Lebar: &lt; 25 cm, Tinggi: &lt; 20 cm, Harga awal: Rp5.000</li>
            </ul>
        </li>
        <li>
            b. Biaya awal barang akan diberikan biaya akumulasi tambahan yakni Rp2.500 setiap 1x24 sejak barang dititipkan.
        </li>
        <li>
            c. Biaya akan mencapai nilai saturasi dan tidak dikenai biaya akumulasi tambahan lagi setelah lebih dari 7x24 setelah barang dititipkan.
        </li>
        <li>
            d. Pembayaran harus dilakukan sesuai dengan ketentuan yang telah disepakati sebelumnya.
        </li>
    </ol>

    <h2>4. Tanggung Jawab</h2>
    <ol>
        <li>
            a. Pengguna bertanggung jawab sepenuhnya atas keadaan Barang yang dititipkan pada saat pengambilan dan penyerahan pada mitra Titip.in.
        </li>
        <li>
            b. Pihak Titip.in dan mitra tidak bertanggung jawab atas kerusakan atau kehilangan barang akibat dari kondisi barang yang sudah rusak sebelum dititipkan kepada Penyedia Jasa.
        </li>
        <li>
            c. Barang yang sudah dititipkan selama lebih dari satu bulan, sudah di luar tanggung jawab mitra.
        </li>
    </ol>

    <h2>5. Perubahan dan Pembatalan</h2>
    <ol>
        <li>
            a. Pengguna dapat melakukan perubahan atau pembatalan penitipan barang dengan syarat dan ketentuan yang telah ditetapkan sebelumnya.
        </li>
        <li>
            b. Penyedia Jasa berhak untuk menolak perubahan atau pembatalan yang dilakukan di luar batas waktu yang telah ditentukan sebelumnya.
        </li>
    </ol>

    <h2>6. Klaim dan Ganti Rugi</h2>
    <ol>
        <li>
            a. Pengguna wajib memberitahukan kepada Titip.in apabila terjadi kerusakan atau kehilangan Barang selama dalam penitipan dalam waktu yang ditentukan oleh ketentuan.
        </li>
        <li>
            b. Klaim atas kerusakan atau kehilangan Barang harus disertai dengan bukti yang cukup dan akan ditinjau oleh Titip.in untuk penggantian atau kompensasi.
        </li>
    </ol>

    <h2>7. Hukum yang Berlaku</h2>
    <ol>
        <li>
            a. Syarat dan ketentuan ini tunduk pada hukum yang berlaku di wilayah tempat Penyedia Jasa menjalankan operasionalnya.
        </li>
        <li>
            b. Penyelesaian sengketa akan diselesaikan melalui mediasi atau proses hukum yang berlaku sesuai dengan ketentuan yang berlaku.
        </li>
    </ol></p></header><div class="mt-16 sm:mt-20"></div></div></div></div>
            </section>

          </main>

          <footer class="border-t border-gray-200 bg-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div class="flex flex-col items-start justify-between gap-y-12 pb-6 pt-16 lg:flex-row lg:items-center lg:py-16">
                <div>
                  <div class="flex items-center text-gray-900">
                    <img class="h-14 w-auto" aria-hidden="true" viewbox="0 0 160 24" fill="none" src="../assets/images/logo-text-right.png">
                  </div>
                  <nav class="mt-11 flex gap-8"><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/"><span class="relative z-10">Beranda</span></a><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="./blog"><span class="relative z-10">Blog</span></a><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="./produk"><span class="relative z-10">Produk</span></a><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="./bantuan"><span class="relative z-10">Bantuan</span></a><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="./tentang-kami"><span class="relative z-10">Tentang Kami</span></a></nav>
                </div>
              </div>
            </div>
          </footer>

</body>
</html>