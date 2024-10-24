<section class="bg-white-100 py-24 bg-white">
    <div class="max-w-screen-xl mx-auto mb-12">
        <h2 class="text-3xl font-bold">Kategori</h2>
    </div>

    <div class="max-w-screen-xl grid grid-cols-1 md:grid-cols-3 gap-8 mx-auto">
        <!-- Beasiswa Akademik -->
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <img alt="Beasiswa Akademik" class="mx-auto mb-8" src="{{ asset('images/akademik.png') }}" width="200" />
            <p class="text-xl font-bold mb-4">Beasiswa Akademik</p>
            <p class="text-gray-600">
                Merupakan beasiswa yang diperuntukan untuk calon mahasiswa yang memiliki prestasi di bidang akademik.
            </p>
        </div>

        <!-- Beasiswa Non Akademik -->
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <img alt="Beasiswa Non Akademik" class="mx-auto mb-8" src="{{ asset('images/non-akademik.png') }}"
                width="180" />
            <p class="text-xl font-bold mb-4">Beasiswa Non Akademik</p>
            <p class="text-gray-600">
                Merupakan beasiswa yang diperuntukan untuk calon mahasiswa yang memiliki prestasi di bidang non
                akademik.
            </p>
        </div>

        <!-- Beasiswa Kartu Indonesia Pintar -->
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <img alt="Beasiswa Kartu Indonesia Pintar" class="mx-auto mb-8" src="{{ asset('images/kip.png') }}"
                width="160" />
            <p class="text-xl font-bold mb-4">Beasiswa Kartu Indonesia Pintar</p>
            <p class="text-gray-600">
                Merupakan beasiswa yang diperuntukan untuk mahasiswa yang memiliki Kartu Indonesia Pintar (KIP) atau
                berasal dari keluarga kurang mampu (bukti SKTM) sesuai ketentuan pemerintah.
            </p>
        </div>
    </div>
</section>
