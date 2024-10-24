<?php

namespace App\Http\Controllers;

use App\Models\pendaftaran;
use App\Models\ipk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class DaftarBeasiswaController extends Controller
{
    //fungsi menampilkan tampilan home page
    public function index()
    {
        return view('index');
    }

    //fungsi menampilkan tampilan daftar beasiswa
    public function daftar_view()
    {
        return view('daftarBeasiswa');
    }

    //fungsi untuk menampilkan hasil seluruh data daftar beasiswa
    public function hasil()
    {
        $data = pendaftaran::orderBy('id', 'ASC')->get();

        $jumlahPendaftarAkademik = 0;
        $jumlahPendaftarNonAkademik = 0;
        $jumlahPendaftarKIP = 0;

        // Lakukan perulangan terhadap data untuk menghitung jumlah pendaftaran berdasarkan jenis
        foreach ($data as $pendaftar) {
            if ($pendaftar->beasiswa == 'akademik') {
                $jumlahPendaftarAkademik++;
            } elseif ($pendaftar->beasiswa == 'non_akademik') {
                $jumlahPendaftarNonAkademik++;
            } elseif ($pendaftar->beasiswa == 'kip') {
                $jumlahPendaftarKIP++;
            }
        }

        // Meneruskan hasil perhitungan ke tampilan menggunakan compact
        return view('hasilBeasiswa', compact('data', 'jumlahPendaftarAkademik', 'jumlahPendaftarNonAkademik', 'jumlahPendaftarKIP'));
    }

    //fungsi mengecek IPK melalui NIM yang terdapat pada database
    public function cek_ipk($nim)
    {
        $cek = ipk::where('nim', $nim)->first();
        return response()->json([
            'status' => $cek ? true : false,
            'ipk' => $cek ? $cek->ipk : 0
        ]);
    }

    //fungsi untuk mengirim data yang sudah disubmit di form ke database
    public function daftar(Request $request)
    {
        try {
            //validasi data
            $request->validate([
                'nim' => 'required',
                'nama' => 'required',
                'email' => 'required',
                'no_hp' => 'required',
                'berkas' => 'required',
            ]);

            //variable menyimpan data pendaftaran yang tersedia pada database berdasarkan nim
            $Registration = pendaftaran::where('nim', $request->nim)->first();

            //cek jika nim yang sudah terdaftar
            if ($Registration) {
                //cek apakah beasiswa yang diminta sudah terdaftar
                if ($Registration->beasiswa == $request->beasiswa) {
                    $message = '';
                    if ($request->beasiswa == 'akademik') {
                        $message = 'Anda sudah mendaftar beasiswa Akademik.';
                    } elseif ($request->beasiswa == 'non_akademik') {
                        $message = 'Anda sudah mendaftar beasiswa Non-Akademik.';
                    } elseif ($request->beasiswa == 'kip') {
                        $message = 'Anda sudah mendaftar beasiswa Kartu Indonesia Pintar (KIP).';
                    }
            
                    Session::flash('warning', $message);
                    return redirect()->back();
                }
            }

            $data = $request->all();
            $data['status'] = "belum di verifikasi";

            //fungsi untuk mengunduh file berkas
            if ($request->hasFile('berkas')) {
                $tujuan_upload = public_path('uploads');
                $file = $request->file('berkas');
                $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
                $file->move($tujuan_upload, $namaFile);
                $data['berkas'] = $namaFile;
            }

            pendaftaran::create($data);

            return redirect('hasil')->with('success', "Berhasil Mendaftar Beasiswa");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
