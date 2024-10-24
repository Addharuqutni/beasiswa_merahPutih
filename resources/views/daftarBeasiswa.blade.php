@extends('layouts.index')

@section('title', 'Daftar Beasiswa')

@section('content')

    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>

    <div class="container mx-auto mt-8">
        <div class="text-left mx-auto max-w-screen-xl flex flex-col md:flex-row">
            <h1 class="my-5 text-primary font-bold text-2xl">Daftar</h1>

            @if ($errors->any())
                <div class="text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="content-about mt-5">
            <form action="{{ url('daftar') }}" enctype="multipart/form-data" method="post">
                @csrf
                @if (Session::has('warning'))
                    <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded mt-3">
                        {{ Session::get('warning') }}
                    </div>
                @endif

                <div class="container mx-auto">
                    <div class="flex justify-center">
                        <div class="w-full md:w-2/3 lg:w-1/2">
                            <div class="mb-5">
                                <label for="nim" class="block text-sm font-bold mb-2">Masukkan NIM</label>
                                <input type="number" name="nim"
                                    class="w-full p-2 border rounded-lg @error('nim') border-red-500 @enderror"
                                    id="nim" placeholder="NIM">
                                <span id="dt-s" class="hidden text-red-500 mt-1">NIM Tidak ditemukan</span>
                                <span id="dt-t" class="hidden text-green-500 mt-1">NIM Ditemukan</span>
                            </div>

                            <div class="mb-5">
                                <label for="nama" class="block text-sm font-bold mb-2">Masukkan Nama Lengkap</label>
                                <input name="nama" type="text"
                                    class="w-full p-2 border rounded-lg @error('nama') border-red-500 @enderror"
                                    id="nama" placeholder="Nama">
                            </div>

                            <div class="mb-5">
                                <label for="email" class="block text-sm font-bold mb-2">Masukkan Email</label>
                                <input type="email" name="email"
                                    class="w-full p-2 border rounded-lg @error('email') border-red-500 @enderror"
                                    id="email" placeholder="Email">
                            </div>

                            <div class="mb-5">
                                <label for="nomor_hp" class="block text-sm font-bold mb-2">Nomor HP</label>
                                <input type="number" name="no_hp"
                                    class="w-full p-2 border rounded-lg @error('no_hp') border-red-500 @enderror"
                                    id="nomor_hp" placeholder="No. HP">
                            </div>

                            <div class="mb-5">
                                <label for="semester" class="block text-sm font-bold mb-2">Semester Saat Ini</label>
                                <select class="w-full p-2 border border-gray-300 rounded-lg" id="semester" required
                                    name="semester">
                                    <option value="">Pilih Semester</option>
                                    @for ($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}">Semester {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mb-5">
                                <label for="ipk" class="block text-sm font-bold mb-2">IPK Terakhir</label>
                                <input type="text" name="ipk"
                                    class="w-full p-2 border border-gray-300 rounded-lg bg-gray-100 @error('ipk') is-invalid @enderror"
                                    id="ipk" readonly>
                            </div>

                            <div class="mb-5">
                                <label for="beasiswa" class="block text-sm font-bold mb-2">Pilihan Beasiswa</label>
                                <select class="w-full p-2 border border-gray-300 rounded-lg" id="beasiswa" name="beasiswa"
                                    required disabled>
                                    <option value="" disabled selected>Pilih Jenis Beasiswa</option>
                                    <option value="akademik">Beasiswa Akademik</option>
                                    <option value="non_akademik">Beasiswa Non Akademik</option>
                                    <option value="kip">Beasiswa Kartu Indonesia Pintar</option>
                                </select>
                            </div>

                            <div class="mb-12">
                                <label for="berkas" class="block text-sm font-bold mb-2">Upload Berkas</label>
                                <input type="file"
                                    class="w-full p-2 border rounded-lg @error('berkas') border-red-500 @enderror"
                                    name="berkas" id="berkas" disabled accept="application/pdf">
                            </div>

                            <div class="flex justify-center items-center py-10">
                                <button id="submit-daftar" type="submit"
                                    class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 font-bold disabled:bg-gray-400"
                                    disabled>Daftar</button>

                                <a href="/"
                                    class="ml-12 bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 font-bold">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('script')
    <script type="module">
        document.getElementById("nim").addEventListener('keyup', async () => {
            cekipk(document.getElementById("nim").value);
        });

        document.getElementById("beasiswa").addEventListener('change', function() {
            const selectedValue = this.value;
            const nimInput = document.getElementById("nim");

            if (selectedValue) {
                nimInput.placeholder = `Masukkan NIM untuk ${selectedValue}`;
            } else {
                nimInput.placeholder = "NIM"; // Reset ke placeholder default
            }
        });

        let cekipk = async (nim) => {
            try {
                const response = await fetch(`{{ url('cekipk') }}/${nim}`);
                const data = await response.json();

                // Resetting previous state
                document.getElementById("berkas").disabled = true;
                document.getElementById("submit-daftar").disabled = true;
                document.getElementById("beasiswa").disabled = true;

                if (data.status) {
                    document.getElementById("dt-s").classList.add("hidden");
                    document.getElementById("dt-t").classList.remove("hidden");

                    // Enable fields if IPK is above 3
                    if (data.ipk > 3) {
                        document.getElementById("berkas").disabled = false;
                        document.getElementById("submit-daftar").disabled = false;
                        document.getElementById("beasiswa").disabled = false;
                    }

                } else {
                    document.getElementById("dt-s").classList.remove("hidden");
                    document.getElementById("dt-t").classList.add("hidden");
                }

                document.getElementById("ipk").value = data.ipk;
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }
    </script>
@endpush
