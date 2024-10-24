@extends('layouts.index')

@section('title', 'Hasil')

@section('content')

    <div class="container mx-auto min-h-screen flex flex-col">
        <div class="my-6 ml-36">
            <h1 class="justify-left text-primary font-bold text-2xl">Hasil Beasiswa</h1>
        </div>
        @if (session()->has('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded-lg w-10">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="flex justify-center mt-5">
            <div class="text-left mx-auto max-w-screen-xl flex flex-col md:flex-row">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-left border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-2">No.</th>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">NIM</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">No. HP</th>
                                <th class="px-4 py-2">Semester</th>
                                <th class="px-4 py-2">IPK Terakhir</th>
                                <th class="px-4 py-2">Jenis Beasiswa</th>
                                <th class="px-4 py-2">Berkas</th>
                                <th class="px-4 py-2">Status Ajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->reverse() as $no => $hasil)
                                <tr class="border-t text-center">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $hasil->nama }}</td>
                                    <td class="px-4 py-2">{{ $hasil->nim }}</td>
                                    <td class="px-4 py-2">{{ $hasil->email }}</td>
                                    <td class="px-4 py-2">{{ $hasil->no_hp }}</td>
                                    <td class="px-4 py-2">{{ $hasil->semester }}</td>
                                    <td class="px-4 py-2">{{ $hasil->ipk }}</td>
                                    <td class="px-4 py-2">{{ $hasil->beasiswa }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ url('uploads/' . $hasil->berkas) }}" target="_blank"
                                            class="text-blue-500 hover:underline">
                                            File Berkas
                                        </a>
                                    </td>
                                    <td class="px-5 py-2 status">
                                        @if ($hasil->status === 'belum di verifikasi')
                                            <span class="text-red-600">belum di verifikasi</span>
                                        @elseif ($hasil->status === 'sudah di verifikasi')
                                            <span class="text-green-600">Terverifikasi</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="ml-36 flex flex-col md:flex-row mt-24">
            <div>
                <h1 class="font-bold text-2xl">Statistik Pengajuan Beasiswa</h1>
            </div>
            <div class="mt-8">
                <canvas id="myChart" class=""></canvas>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var PendaftarAkademik = parseInt(<?php echo $jumlahPendaftarAkademik; ?>);
        var PendaftarNonAkademik = parseInt(<?php echo $jumlahPendaftarNonAkademik; ?>);
        var PendaftarKIP = parseInt(<?php echo $jumlahPendaftarKIP; ?>);

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'pie', // Ubah tipe grafik menjadi 'pie'
            data: {
                labels: ['Beasiswa Akademik', 'Beasiswa Non-Akademik',
                    'Beasiswa Kartu Indonesia Pintar'
                ],
                datasets: [{
                    label: 'Jumlah Pendaftar Beasiswa',
                    data: [PendaftarAkademik, PendaftarNonAkademik, PendaftarKIP],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', // Warna untuk Beasiswa Akademik
                        'rgba(54, 162, 235, 0.2)', // Warna untuk Beasiswa Non-Akademik
                        'rgba(255, 206, 86, 0.2)' // Warna untuk Beasiswa KIP
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', // Warna border untuk Beasiswa Akademik
                        'rgba(54, 162, 235, 1)', // Warna border untuk Beasiswa Non-Akademik
                        'rgba(255, 206, 86, 1)' // Warna border untuk Beasiswa KIP
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Membuat grafik responsif
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem
                                    .raw;
                            }
                        }
                    }
                }
            }
        });
    </script>


@endsection
