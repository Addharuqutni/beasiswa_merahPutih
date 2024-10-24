## Pendaftaran Beasiswa Merah Putih

## Persyaratan Sistem

-   PHP versi 7.3 atau yang lebih baru
-   Composer
-   Database MySQL
-   NPM (Node Package Manager)

## Installation

Clone Repository: Gunakan perintah git clone untuk mengunduh repository ini ke dalam folder.

```bash
  git clone https://github.com/namarepo.git
```
```bash
  cd Beasiswa-MerahPutih
```

Instal Dependensi yang diperlukan.

```bash
  npm install
```

Ubah Konfigurasi Database: Salin file .env.example menjadi .env. Sesuaikan database anda di file .env.

Generate Aplikasi Key untuk menghasilkan kunci aplikasi:

```bash
  php artisan key:generate
```

Migrasi Database:

```bash
  php artisan migrate
```

## Menjalankan Aplikasi

```bash
  php artisan serve
```
```bash
  npm run dev
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
