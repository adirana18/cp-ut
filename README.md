
# Langkah-langkah Instalasi Aplikasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan aplikasi ini di sistem lokal menggunakan XAMPP, Git, dan Node.js.

## 1. Instal Node.js
Node.js diperlukan untuk menjalankan aplikasi yang memerlukan backend JavaScript. Ikuti langkah-langkah berikut untuk menginstal Node.js:

### Untuk Windows, Linux, dan macOS:
1. **Unduh Node.js** dari [situs resmi Node.js](https://nodejs.org/).
   - Pilih versi **LTS** (Long Term Support) untuk kestabilan terbaik.
   
2. **Ikuti petunjuk instalasi** untuk sistem operasi kamu.
   - Pada Windows, installer akan mengarahkan kamu untuk menginstal Node.js dan npm (Node Package Manager).
   - Pada macOS dan Linux, kamu dapat menggunakan paket manajer (seperti Homebrew untuk macOS atau apt untuk Ubuntu) untuk menginstalnya.

3. Setelah instalasi selesai, verifikasi instalasi dengan menjalankan perintah berikut di terminal:

   ```bash
   node --version
   npm --version
   ```

   Jika instalasi berhasil, kamu akan melihat versi dari Node.js dan npm yang terpasang.

## 2. Instal XAMPP
- Unduh XAMPP dari [situs resmi XAMPP](https://www.apachefriends.org/index.html).
- Pilih versi XAMPP yang sesuai dengan sistem operasi kamu (Windows, Linux, atau macOS).
- Ikuti petunjuk instalasi untuk menyelesaikan proses instalasi XAMPP di sistem kamu.

## 3. Instal Git (Jika Belum Terpasang)
Jika Git belum terpasang di sistem kamu, kamu dapat menginstalnya melalui terminal dengan langkah-langkah berikut:

### Untuk Windows:
1. **Buka terminal** (CMD atau PowerShell), kemudian jalankan perintah berikut untuk mengunduh dan menginstal Git menggunakan Windows Package Manager (winget):

   ```bash
   winget install --id Git.Git -e --source winget
   ```

2. Tunggu hingga proses instalasi selesai. Setelah selesai, Git akan terpasang di sistem kamu.

3. Setelah Git terpasang, kamu dapat memverifikasi instalasi dengan menjalankan perintah berikut di terminal untuk memastikan Git terinstal dengan benar:

   ```bash
   git --version
   ```

## 4. Arahkan Terminal ke Direktori `htdocs`
Setelah Git dan Node.js terpasang, buka terminal (CMD atau PowerShell) dan arahkan ke direktori `htdocs` di dalam folder instalasi XAMPP menggunakan perintah berikut:

```bash
cd C:\xampp\htdocs\
```

## 5. Clone Repositori Git
Setelah berada di dalam direktori `htdocs`, clone repositori aplikasi ke dalam folder tersebut menggunakan perintah berikut:

```bash
git clone https://github.com/adirana18/cp-ut.git
```

Repositori akan terunduh dan disalin ke dalam folder `cp-ut` di dalam `htdocs`.


Perintah ini akan mengunduh dan menginstal semua paket yang tercantum dalam file `package.json`.

## 6. Menjalankan Apache dan MySQL
Buka aplikasi XAMPP, kemudian klik tombol **Start** di bagian **Apache** dan **MySQL** untuk menjalankan web server (Apache) dan database server (MySQL).

- Setelah kedua layanan berjalan (ditandai dengan indikator hijau), aplikasi siap dijalankan.

Tentu! Berikut adalah langkah tambahan untuk membuat database dengan nama `moni` dan mengimpor database dari file `DATABASE/moni.sql`:

---

## 7. Membuat Database `moni`

Setelah menjalankan Apache dan MySQL di XAMPP, kita perlu membuat database untuk aplikasi ini.

1. **Buka phpMyAdmin**:
   - Akses phpMyAdmin melalui browser dengan alamat berikut:  
     ```
     http://localhost/phpmyadmin
     ```

2. **Buat Database**:
   - Di phpMyAdmin, klik pada tab **Databases**.
   - Di bagian **Create database**, ketik nama database: `moni`.
   - Pilih kolasi (kolasi default sudah cukup, biasanya `utf8_general_ci`), lalu klik **Create**.

## 8. Mengimpor Database dari File `moni.sql`

1. **Impor Database**:
   - Setelah database `moni` dibuat, pilih database `moni` dari daftar database yang ada di sebelah kiri.
   - Klik tab **Import** di bagian atas.
   - Klik tombol **Choose File**, kemudian cari dan pilih file `moni.sql` yang ada di folder `DATABASE/moni.sql` dalam repositori yang telah kamu clone sebelumnya.

2. **Mulai Proses Impor**:
   - Setelah memilih file `moni.sql`, klik **Go** untuk mulai mengimpor database.
   - Proses ini akan memuat tabel dan data yang diperlukan untuk aplikasi berjalan.

## 9. Menjalankan Aplikasi

Setelah database berhasil diimpor, aplikasi siap dijalankan. Kembali ke browser dan akses aplikasi melalui URL berikut:

```
http://localhost/cp-ut/
```

Aplikasi seharusnya sudah bisa dijalankan dan terhubung dengan database `moni` yang baru saja kamu buat.

---
Baik! Berikut adalah pembaruan langkah-langkah instalasi yang mencakup penggunaan **file `.bat`** untuk menginstal BOT-WA secara otomatis dan instruksi untuk menjalankan bot dengan menggunakan perintah `node index.js`:

---

## 10. Menginstal dan Menjalankan BOT-WA

Untuk memudahkan instalasi dan menjalankan **BOT-WA**, aplikasi ini sudah menyediakan file **`install-bot.bat`** yang akan secara otomatis menginstal semua dependensi yang diperlukan.

### 1. Instalasi BOT-WA

1. **Akses Direktori BOT**:
   - Setelah aplikasi terpasang di folder `cp-ut`, buka **File Explorer** dan arahkan ke folder berikut:

     ```
     C:\xampp\htdocs\cp-ut\BOT
     ```

2. **Jalankan File `install-bot.bat`**:
   - Di dalam folder `BOT`, kamu akan menemukan file **`install-bot.bat`**. Cukup klik dua kali file tersebut, dan proses instalasi untuk BOT-WA akan dimulai secara otomatis. File `.bat` ini akan menjalankan perintah yang diperlukan untuk menginstal semua dependensi dan menyiapkan lingkungan untuk BOT-WA.

   - Proses instalasi akan berlangsung secara otomatis, dan semua dependensi yang dibutuhkan akan terinstal.

### 2. Menjalankan BOT-WA

Setelah BOT-WA terinstal dengan benar, kamu dapat menjalankan bot dengan langkah-langkah berikut:

1. **Buka Terminal (CMD)**:
   - Tekan `Windows + R`, ketik `cmd`, dan tekan **Enter** untuk membuka **Command Prompt** (CMD).

2. **Arahkan ke Direktori BOT-WA**:
   - Di Command Prompt, arahkan ke direktori **`wa-bot`** di dalam folder **`BOT`** dengan perintah:

     ```bash
     cd C:\xampp\htdocs\cp-ut\BOT\wa-bot
     ```

3. **Jalankan BOT-WA**:
   - Setelah berada di dalam folder `wa-bot`, jalankan bot dengan perintah:

     ```bash
     node index.js
     ```

   - Perintah ini akan memulai BOT-WA dan bot akan mulai beroperasi.

---

