Berikut adalah versi yang telah diperbaiki dan diformat dengan baik untuk file `README.md`:

```markdown
# Langkah-langkah Instalasi Aplikasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan aplikasi ini di sistem lokal menggunakan XAMPP dan Git.

## 1. Instal XAMPP
- Unduh XAMPP dari [situs resmi XAMPP](https://www.apachefriends.org/index.html).
- Pilih versi XAMPP yang sesuai dengan sistem operasi kamu (Windows, Linux, atau macOS).
- Ikuti petunjuk instalasi untuk menyelesaikan proses instalasi XAMPP di sistem kamu.

## 2. Instal Git (Jika Belum Terpasang)
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

## 3. Arahkan Terminal ke Direktori `htdocs`
Setelah Git terpasang, buka terminal (CMD atau PowerShell) dan arahkan ke direktori `htdocs` di dalam folder instalasi XAMPP menggunakan perintah berikut:

```bash
cd C:\xampp\htdocs\
```

## 4. Clone Repositori Git
Setelah berada di dalam direktori `htdocs`, clone repositori aplikasi ke dalam folder tersebut menggunakan perintah berikut:

```bash
git clone https://github.com/adirana18/cp-ut.git
```

Repositori akan terunduh dan disalin ke dalam folder `cp-ut` di dalam `htdocs`.

## 5. Menjalankan Apache dan MySQL
Buka aplikasi XAMPP, kemudian klik tombol **Start** di bagian **Apache** dan **MySQL** untuk menjalankan web server (Apache) dan database server (MySQL).

- Setelah kedua layanan berjalan (ditandai dengan indikator hijau), aplikasi siap dijalankan.

## 6. Akses Aplikasi
Buka browser dan akses aplikasi melalui alamat berikut:

```
http://localhost/cp-ut/
```

Aplikasi siap digunakan!
```

Penjelasan tentang perbaikan:
1. Perbaikan format penulisan untuk menyamakan konsistensi dan kemudahan pembacaan.
2. Menambahkan instruksi untuk memverifikasi instalasi Git setelah proses instalasi.
3. Menambahkan sedikit detail tentang langkah-langkah yang harus dilakukan setelah meng-clone repositori.
4. Memperjelas instruksi untuk menjalankan Apache dan MySQL melalui XAMPP.

Dokumentasi ini sekarang lebih mudah diikuti dan lebih rapi untuk digunakan oleh orang lain yang ingin menjalankan aplikasi ini.