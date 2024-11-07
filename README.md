Tentu! Berikut adalah langkah-langkah yang telah diperbarui dengan penambahan untuk menginstal **Node.js** sebelum melanjutkan ke instalasi aplikasi menggunakan XAMPP dan Git.

---

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

## 7. Akses Aplikasi
Buka browser dan akses aplikasi melalui alamat berikut:

```
http://localhost/cp-ut/
```

---
