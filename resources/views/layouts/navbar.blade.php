<link rel="stylesheet" href="../styles/navbar.css">
<nav class="bg-white shadow-md">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo -->
        <div class="flex items-center space-x-2" href="/">
            <img alt="Logo" class="w-12" src="{{ asset('images/Icon.png') }}" />
            <a href="/" class="text-xl font-medium text-red-600">Merah Putih</a>
        </div>

        <!-- Mobile Menu -->
        <button data-collapse-toggle="navbar" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Navbar -->
        <div class="hidden w-full md:block md:w-auto" id="navbar">
            <ul class="font-medium flex flex-col md:flex-row md:space-x-2 bg-gray-50 md:bg-white">
                <li>
                    <a href="/"
                        class="block py-2 px-4 {{ request()->is('/') ? 'font-bold text-black-900' : 'text-black hover:text-red-400' }}">Home</a>
                </li>
                <li>
                    <a href="daftar"
                        class="block py-2 px-4 {{ request()->is('daftar') ? 'font-bold text-black-900' : 'text-black hover:text-red-400' }}">Daftar</a>
                </li>
                <li>
                    <a href="hasil"
                        class="block py-2 px-4 {{ request()->is('hasil') ? 'font-bold text-black-900' : 'text-black hover:text-red-400' }}">Hasil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
