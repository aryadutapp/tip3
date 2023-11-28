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
              <div class="mx-auto w-full max-w-7xl lg:px-8"><div class="relative px-4 sm:px-8 lg:px-12"><div class="mx-auto max-w-2xl lg:max-w-5xl"><header class="max-w-2xl"><h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl">Titip barang gak harus ribet</h1><p class="mt-6 text-base text-zinc-600">Dengan Titip.in, kalian dapat langsung titip barang dengan mitra kami baik melalui website atau langsung ke jaringan mitra kami.</p></header><div class="mt-16 sm:mt-20"><ul role="list" class="grid grid-cols-1 gap-x-12 gap-y-16 sm:grid-cols-2 lg:grid-cols-3"><li class="group relative flex flex-col items-start"><h2 class="mt-6 text-base font-semibold text-zinc-800"><div class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-zinc-800/50 sm:-inset-x-6 sm:rounded-2xl"></div><a href="http://planetaria.tech"><span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span><span class="relative z-10">Penitipan tanpa registrasi</span></a></h2><p class="relative z-10 mt-2 text-sm text-zinc-600">Dengan fitur ini kamu dapat langsung menitipkan barang tanpa melalui registrasi. Nanti ketika di mitra kamu akan mendapatkan kode pengambilan untuk mengambil barang</p></li><li class="group relative flex flex-col items-start"><h2 class="mt-6 text-base font-semibold text-zinc-800"><div class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-zinc-800/50 sm:-inset-x-6 sm:rounded-2xl"></div><a href="#"><span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span><span class="relative z-10">Penitipan melalui website</span></a></h2><p class="relative z-10 mt-2 text-sm text-zinc-600">Dengan fitur ini, kamu dapat memilih penitipan dengan memilih lokasi mitra titip.in melalui website kami</p></li><li class="group relative flex flex-col items-start"><h2 class="mt-6 text-base font-semibold text-zinc-800"><a href="#"><span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span><span class="relative z-10">Kode pengambilan</span></a></h2><p class="relative z-10 mt-2 text-sm text-zinc-600">Kode pengambilan digunakan untuk mengambil barang untuk memastikan hanya kamu yang bisa ambil barangmu dan bukan orang lain</p></li><li class="group relative flex flex-col items-start"><h2 class="mt-6 text-base font-semibold text-zinc-800"><a href="#"><span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span><span class="relative z-10">Riwayat transaksi</span></a></h2><p class="relative z-10 mt-2 text-sm text-zinc-600 mb-5">Riwayat transaksi untuk memastikan mitra kami dapat mencatat riwayat transaski dan keuangan mitra</p></li></ul></div></div></div></div>
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
