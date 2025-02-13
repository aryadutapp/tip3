<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="./assets/images/logo.png">
  <title>titip.in : Layanan Penitipan Barang dengan Sistem Loker berbasis Daring</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <header>
        <nav>
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-50 flex justify-between py-8">
            <div class="relative z-10 flex items-center gap-16">
              <a href="/" aria-label="Home">
                <img class="h-14 w-auto" aria-hidden="true" viewbox="0 0 160 24" fill="none" src="./assets/images/logo.png">
              </a>
      
              <div class="lg:flex lg:gap-10 sm:hidden md:hidden hidden" id="menu-desktop">
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#features">
                  <span class="relative z-10">Beranda</span>
                </a>
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#reviews">
                  <span class="relative z-10">Blog</span>
                </a>
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#pricing">
                  <span class="relative z-10">Produk</span>
                </a>
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#faqs">
                  <span class="relative z-10">Bantuan</span>
                </a>
                <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#faqs">
                  <span class="relative z-10">Tentang Kami</span>
                </a>
              </div>
              
      
              <div class="hidden lg:flex lg:gap-10 lg:hidden" id="menu-mobile">
                <div class="absolute inset-x-0 top-0 z-0 origin-top rounded-b-2xl bg-gray-50 px-6 pb-6 pt-10 shadow-2xl shadow-gray-900/20 min-w-[50vw]" id="headlessui-popover-panel-:r1:" tabindex="-1" data-headlessui-state="open" data-projection-id="2" style="opacity: 1; transform: none;">
                  <div class="space-y-4">
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="/#features">Beranda</a>
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="/#reviews">Blog</a>
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="/#pricing">Produk</a>
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="/#faqs">Bantuan</a>
                    <a class="block text-base leading-7 tracking-tight text-gray-700" data-headlessui-state="open" href="/#faqs">Tentang Kami</a>
                  </div>
                  <div class="mt-8 flex flex-col gap-4">
                    <a class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-gray-300 text-gray-700 hover:border-gray-400 active:bg-gray-100 active:text-gray-700/80" href="./views/masuk">Masuk</a>
                    <a class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-gray-800 text-white hover:bg-gray-900 active:bg-gray-800 active:text-white/80" href="./views/daftar">Daftar</a>
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
      
              <a class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-gray-300 text-gray-700 hover:border-gray-400 active:bg-gray-100 active:text-gray-700/80 hidden lg:block" href="./views/masuk">Masuk</a>
              <a class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-gray-800 text-white hover:bg-gray-900 active:bg-gray-800 active:text-white/80 hidden lg:block" href="./views/daftar">Daftar</a>
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
              <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="lg:grid lg:grid-cols-12 lg:gap-x-8 lg:gap-y-20">
                  <div class="relative z-10 mx-auto max-w-2xl lg:col-span-7 lg:max-w-none lg:pt-6 xl:col-span-6">
                    <h1 class="text-4xl font-medium tracking-tight text-gray-900">Titipkan barang secara mudah dengan titip.in</h1>
                    <p class="mt-6 text-lg text-gray-600">Manfaatkan fleksibilitas penitipan barang dengan harga yang bersaing dan lokasi yang terjangkau</p>
                    <div class="mt-8 flex flex-wrap gap-x-6 gap-y-4"><a class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors bg-gray-800 text-white hover:bg-gray-900 active:bg-gray-800 active:text-white/80 lg:block" href="/#">Pesan Sekarang</a><a class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-gray-300 text-gray-700 hover:border-gray-400 active:bg-gray-100 active:text-gray-700/80" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6 flex-none">
                          <circle cx="12" cy="12" r="11.5" stroke="#D4D4D4"></circle>
                          <path d="M9.5 14.382V9.618a.5.5 0 0 1 .724-.447l4.764 2.382a.5.5 0 0 1 0 .894l-4.764 2.382a.5.5 0 0 1-.724-.447Z" fill="#A3A3A3" stroke="#A3A3A3"></path>
                        </svg><span class="ml-2.5">Lihat Profil Usaha</span></a></div>
                  </div>
                  <div class="relative mt-10 sm:mt-20 lg:col-span-5 lg:row-span-2 lg:mt-0 xl:col-span-6">
                    <div class="absolute left-1/2 top-4 h-[1026px] w-[1026px] -translate-x-1/3 stroke-gray-300/70 [mask-image:linear-gradient(to_bottom,white_20%,transparent_75%)] sm:top-16 sm:-translate-x-1/2 lg:-top-16 lg:ml-12 xl:-top-14 xl:ml-0"></div>
                    <div class="-mx-4 pb-9 h-auto lg:h-[448px] px-9 [mask-image:linear-gradient(to_bottom,white_60%,transparent)] sm:mx-0 lg:absolute lg:-inset-x-10 lg:-bottom-20 lg:-top-10 lg:h-auto lg:px-0 lg:pt-10 xl:-bottom-32"><img src="./assets/images/vektor-mitra.png" alt="Embedded Image" class=""></div>
                  </div>
                </div>
              </div>
            </section>
      
              <section id="banner-mitra" aria-label="Features for investing all your money" class="bg-gray-900 pt-5 pb-20 lg:py-20 sm:py-32">
                  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-20 md:mt-0">
                    <div class="grid grid-cols-12 items-center gap-8 lg:gap-16 xl:gap-24">
                      <div class="relative z-10 col-span-12 md:col-span-6 space-y-6" role="tablist" aria-orientation="vertical">
                        <div class="relative z-10 mx-auto max-w-2xl lg:col-span-7 lg:max-w-none lg:pt-6 xl:col-span-6">
                          <h1 class="text-4xl font-medium tracking-tight text-white">Bergabung menjadi mitra sekarang juga</h1>
                          <p class="mt-6 text-lg text-gray-300">Dapatkan penghasilan tambahan dan manfaatkan ruangan tidak terpakai dengan menjadi mitra. Bergabung sekarang tanpa biaya awal dan atur harga sesuai dengan permintaan </p>
                          <div class="mt-8 flex flex-wrap gap-x-6 gap-y-4"><a class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm outline-2 outline-offset-2 transition-colors border-gray-300 text-gray-300 hover:border-gray-400 active:bg-gray-100 active:text-gray-400" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><span class="">Gabung Menjadi Mitra</span></a></div>
                        </div>
                      </div>
                      <div class="relative col-span-12 md:col-span-6"><img src="./assets/images/vektor-mitra.png" alt="Embedded Image" class=""></div>
                    </div>
                  </div>
                </section>
                
      
            <section id="secondary-features" aria-label="Features for building a portfolio" class="py-20 sm:py-32">
              <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl sm:text-center">
                  <h2 class="text-3xl font-medium tracking-tight text-gray-900">Fitur Utama</h2>
                  <p class="mt-2 text-lg text-gray-600">Gunakan layanan penitipan dengan berbagai fitur berikut</p>
                </div>
                <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 text-sm sm:mt-20 sm:grid-cols-2 md:gap-y-10 lg:max-w-none lg:grid-cols-3">
                  <li class="rounded-2xl border border-gray-200 p-8"><svg viewBox="0 0 32 32" aria-hidden="true" class="h-8 w-8">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9 0a4 4 0 00-4 4v24a4 4 0 004 4h14a4 4 0 004-4V4a4 4 0 00-4-4H9zm0 2a2 2 0 00-2 2v24a2 2 0 002 2h14a2 2 0 002-2V4a2 2 0 00-2-2h-1.382a1 1 0 00-.894.553l-.448.894a1 1 0 01-.894.553h-6.764a1 1 0 01-.894-.553l-.448-.894A1 1 0 0010.382 2H9z" fill="#737373"></path>
                      <path d="M12 25l8-8m0 0h-6m6 0v6" stroke="#171717" stroke-width="2" stroke-linecap="round"></path>
                      <circle cx="16" cy="16" r="16" fill="#A3A3A3" fill-opacity="0.2"></circle>
                    </svg>
                    <h3 class="mt-6 font-semibold text-gray-900">Pilih Mitra yang Tersedia</h3>
                    <p class="mt-2 text-gray-700">Pilihan opsi yang sesuai dengan ketersediaan mitra yang tersedia. Anda dapat memperpertimbangkan mitra yang yang sesuai dengan kebutuhan Anda.</p>
                  </li>
                  <li class="rounded-2xl border border-gray-200 p-8"><svg viewBox="0 0 32 32" aria-hidden="true" class="h-8 w-8">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9 0a4 4 0 00-4 4v24a4 4 0 004 4h14a4 4 0 004-4V4a4 4 0 00-4-4H9zm0 2a2 2 0 00-2 2v24a2 2 0 002 2h14a2 2 0 002-2V4a2 2 0 00-2-2h-1.382a1 1 0 00-.894.553l-.448.894a1 1 0 01-.894.553h-6.764a1 1 0 01-.894-.553l-.448-.894A1 1 0 0010.382 2H9z" fill="#737373"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9 13a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H10a1 1 0 01-1-1v-2zm0 6a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H10a1 1 0 01-1-1v-2zm1 5a1 1 0 00-1 1v2a1 1 0 001 1h12a1 1 0 001-1v-2a1 1 0 00-1-1H10z" fill="url(#:R1adm:-gradient)"></path>
                      <rect x="9" y="6" width="14" height="4" rx="1" fill="#171717"></rect>
                      <circle cx="16" cy="16" r="16" fill="#A3A3A3" fill-opacity="0.2"></circle>
                      <defs>
                        <linearGradient id=":R1adm:-gradient" x1="16" y1="12" x2="16" y2="28" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#737373"></stop>
                          <stop offset="1" stop-color="#737373" stop-opacity="0"></stop>
                        </linearGradient>
                      </defs>
                    </svg>
                    <h3 class="mt-6 font-semibold text-gray-900">Biaya Penitipan Murah</h3>
                    <p class="mt-2 text-gray-700">Nikmati layanan penitipan dengan biaya yang terjangkau. Dapatkan harga yang kompetitif untuk memenuhi kebutuhan Anda dalam menjaga atau menyimpan barang dengan aman dan terpercaya.</p>
                  </li>
                  <li class="rounded-2xl border border-gray-200 p-8"><svg viewBox="0 0 32 32" aria-hidden="true" class="h-8 w-8">
                      <circle cx="16" cy="16" r="16" fill="#A3A3A3" fill-opacity="0.2"></circle>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M5 4a4 4 0 014-4h14a4 4 0 014 4v10h-2V4a2 2 0 00-2-2h-1.382a1 1 0 00-.894.553l-.448.894a1 1 0 01-.894.553h-6.764a1 1 0 01-.894-.553l-.448-.894A1 1 0 0010.382 2H9a2 2 0 00-2 2v24a2 2 0 002 2h5v2H9a4 4 0 01-4-4V4z" fill="#737373"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M24 32a8 8 0 100-16 8 8 0 000 16zm1-8.414V19h-2v5.414l4 4L28.414 27 25 23.586z" fill="#171717"></path>
                    </svg>
                    <h3 class="mt-6 font-semibold text-gray-900">Lacak Status Barang</h3>
                    <p class="mt-2 text-gray-700">Dengan fitur pelacakan status barang, Anda dapat memantau dan mengetahui posisi atau lokasi barang. Dapatkan informasi terkini mengenai perjalanan barang mulai dari penitipan hingga pengambilan.</p>
                  </li>
                </ul>
              </div>
            </section>
          </main>

          <footer class="border-t border-gray-200 bg-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div class="flex flex-col items-start justify-between gap-y-12 pb-6 pt-16 lg:flex-row lg:items-center lg:py-16">
                <div>
                  <div class="flex items-center text-gray-900">
                    <img class="h-14 w-auto" aria-hidden="true" viewbox="0 0 160 24" fill="none" src="./assets/images/logo.png">
                  </div>
                  <nav class="mt-11 flex gap-8"><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#features"><span class="relative z-10">Beranda</span></a><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#reviews"><span class="relative z-10">Blog</span></a><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#pricing"><span class="relative z-10">Produk</span></a><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#faqs"><span class="relative z-10">Bantuan</span></a><a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-[0ms]" href="/#faqs"><span class="relative z-10">Tentang Kami</span></a></nav>
                </div>
              </div>
            </div>
          </footer>

</body>
</html>
