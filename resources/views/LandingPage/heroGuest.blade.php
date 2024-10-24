<section class="relative bg-cover bg-center min-h-screen flex flex-col justify-center items-center" style="background-image: url('{{ asset('images/heroP.png') }}');">
    <div class="absolute inset-0 bg-white opacity-70"></div>
    <div class="relative z-10 max-w-screen-xl w-full px-6 md:px-12 lg:px-16 flex flex-col md:flex-row items-center justify-between mx-auto">
        <!-- Teks -->
        <div class="text-center md:text-left md:w-1/2">
            <h1 class="text-3xl md:text-5xl font-bold mb-2 md:mb-4">Gratis Beasiswa</h1>
            <h1 class="text-3xl md:text-5xl font-bold mb-2 md:mb-4">Merah Putih</h1>
            <h1 class="text-3xl md:text-5xl font-bold mb-2 md:mb-4">untuk</h1>
            <h1 class="text-3xl md:text-5xl font-bold mb-4 md:mb-6">Mahasiswa Indonesia</h1>
            <button class="mt-6 md:mt-10 w-48 md:w-64 bg-red-500 text-white px-6 md:px-9 py-3 rounded-full text-lg font-semibold hover:bg-red-600 transition duration-300 ease-in-out">
                <a href="/daftar">Daftar</a>
            </button>
        </div>
        
        <!-- Gambar -->
        <div class="mt-8 md:mt-0 md:w-1/3 flex justify-center md:justify-end">
            <img alt="Student" class="rounded-lg shadow-lg w-72 md:w-96 lg:w-full object-cover" src="{{ asset('images/zero1.png') }}"/>
        </div>
    </div>
</section>