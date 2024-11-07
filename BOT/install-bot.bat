@echo off
:: Cek apakah folder wa-bot sudah ada
if exist wa-bot (
    echo Folder wa-bot sudah ada, menghapus folder lama...
    rmdir /s /q wa-bot
)

:: Unduh repository dari GitHub
echo Mengunduh repository...
git clone https://github.com/adirana18/wa-bot.git

:: Masuk ke dalam folder wa-bot
cd wa-bot

:: Install dependensi dengan npm
echo Menginstall dependensi...
npm install

:: Jalankan bot di dalam terminal yang tetap terbuka
echo Menjalankan bot...
start "" cmd /k "node index.js"

:: Tunggu dan beri informasi agar terminal utama tetap terbuka
echo Bot sedang berjalan di terminal baru. Tekan Ctrl+C untuk menghentikan.
pause
@echo off
:: Cek apakah folder wa-bot sudah ada
if exist wa-bot (
    echo Folder wa-bot sudah ada, menghapus folder lama...
    rmdir /s /q wa-bot
)

:: Unduh repository dari GitHub
echo Mengunduh repository...
git clone https://github.com/adirana18/wa-bot.git

:: Masuk ke dalam folder wa-bot
cd wa-bot

:: Install dependensi dengan npm
echo Menginstall dependensi...
npm install

:: Jalankan bot di dalam terminal yang tetap terbuka
echo Menjalankan bot...
start "" cmd /k "node index.js"

:: Tunggu dan beri informasi agar terminal utama tetap terbuka
echo Bot sedang berjalan di terminal baru. Tekan Ctrl+C untuk menghentikan.
pause
@echo off
:: Cek apakah folder wa-bot sudah ada
if exist wa-bot (
    echo Folder wa-bot sudah ada, menghapus folder lama...
    rmdir /s /q wa-bot
)

:: Unduh repository dari GitHub
echo Mengunduh repository...
git clone https://github.com/adirana18/wa-bot.git

:: Masuk ke dalam folder wa-bot
cd wa-bot

:: Install dependensi dengan npm
echo Menginstall dependensi...
npm install

:: Jalankan bot di dalam terminal yang tetap terbuka
echo Menjalankan bot...
start "" cmd /k "node index.js"

:: Tunggu dan beri informasi agar terminal utama tetap terbuka
echo Bot sedang berjalan di terminal baru. Tekan Ctrl+C untuk menghentikan.
pause
