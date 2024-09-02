Berikut adalah langkah-langkah untuk menginstall Laravel dan Laravel UI untuk membuat sistem login menggunakan Bootstrap:

### 1. **Install Laravel**
   - **Pastikan bahwa Composer telah terinstal.** Laravel memerlukan Composer untuk instalasinya. Jika belum terinstal, download dan instal Composer dari [getcomposer.org](https://getcomposer.org/).
   - **Buka terminal** dan jalankan perintah berikut untuk membuat proyek Laravel baru:

     ```bash
     composer create-project --prefer-dist laravel/laravel nama_proyek
     ```
     Gantilah `nama_proyek` dengan nama proyek yang ingin Anda buat.

   - **Masuk ke direktori proyek:**

     ```bash
     cd nama_proyek
     ```

   - **Jalankan server bawaan Laravel:**

     ```bash
     php artisan serve
     ```
     Laravel sekarang dapat diakses di `http://localhost:8000`.

### 2. **Install Laravel UI**
   Laravel UI adalah package yang menyediakan frontend scaffolding untuk Laravel, termasuk Bootstrap, Vue.js, React, dll.

   - **Install Laravel UI melalui Composer:**

     ```bash
     composer require laravel/ui
     ```

   - **Generate UI Auth Scaffolding dengan Bootstrap:**

     ```bash
     php artisan ui bootstrap --auth
     ```
     Perintah ini akan menghasilkan scaffolding untuk sistem autentikasi dengan Bootstrap sebagai framework frontend.

   - **Install Dependencies Frontend:**
     Setelah Laravel UI diinstal, Anda perlu menginstall dependencies JavaScript menggunakan NPM (Node Package Manager).

     ```bash
     npm install
     npm run dev
     ```

     Jika `npm` belum terinstal, Anda dapat mendownloadnya dari [nodejs.org](https://nodejs.org/).

### 3. **Migrasi Database**
   Laravel menggunakan migrasi untuk mengelola struktur database. Jalankan migrasi berikut untuk membuat tabel user dan lain-lain yang dibutuhkan oleh sistem login:

   ```bash
   php artisan migrate
   ```

   Pastikan Anda telah mengatur konfigurasi database di `.env` file.

### 4. **Cek Aplikasi**
   Sekarang Anda dapat membuka `http://localhost:8000` di browser. Anda akan melihat halaman utama Laravel dengan link untuk "Login" dan "Register".

Itu saja! Sekarang Anda memiliki aplikasi Laravel dengan sistem login menggunakan Bootstrap.
