# Badjo; Your Travel Service

## Deskripsi

Badjo: Your Travel Service adalah sebuah sistem pemesanan paket wisata berbasis web yang dikembangkan menggunakan HTML, CSS dan JavaScript untuk frontend, PHP untuk Backend dan MySQL untuk Database. Sistem ini memungkinkan pengguna untuk memilih paket perjalanan wisata dan memesan paket wisata, serta mengedit dan menghapus pesanan.

## Fitur

- Halaman dengan Tampilan Modern dan Responsif: Setiap halaman dalam sistem ini dirancang dengan estetika yang modern dan responsif, memberikan pengalaman yang optimal di berbagai perangkat, baik desktop, tablet, maupun smartphone. Desainnya menonjolkan kesederhanaan yang elegan, dengan tata letak yang bersih dan mudah dinavigasi.

- Pemesan Paket Perjalanan dengan Perhitungan Akurat: Pengguna dapat memesan paket perjalanan dengan mudah, di mana sistem secara otomatis menghitung total biaya berdasarkan paket yang dipilih dan jumlah peserta perjalanan. Fitur ini memastikan perhitungan harga yang tepat dan meminimalkan kemungkinan kesalahan dalam transaksi.

- Menu Edit Pesanan: Fitur ini memungkinkan konsumen untuk mengedit pesanan mereka setelah melakukan pemesanan. Pengguna dapat mengubah detail pesanan sesuai kebutuhan, seperti mengganti paket atau mengubah jumlah peserta. Selain itu, tersedia juga opsi untuk menghapus atau membatalkan pesanan, memberikan fleksibilitas lebih bagi pengguna dalam mengelola pemesanan mereka.

- Tampilan Estetik dan Clean dengan Kombinasi Hover Effects: Sistem ini mengutamakan desain yang estetik dan minimalis, diperkaya dengan efek hover yang interaktif untuk meningkatkan pengalaman pengguna. Elemen-elemen desain ini tidak hanya mempercantik tampilan, tetapi juga mempermudah pengguna dalam berinteraksi dengan fitur-fitur yang tersedia.

## Teknologi yang Digunakan

- **HTML5/CSS3**: Untuk struktur dan gaya tampilan aplikasi.
- **JavaScript**: Untuk interaktivitas dan perhitungan dinamis.
- **PHP**: Untuk pengolahan backend dan manajemen data.
- **MySQL**: Untuk manajemen basis data untuk menyimpan dan mengelola data.
- **XAMPP**: Untuk server lokal (Apache, MySQL, PHP).
- **Visual Studio Code**: editor kode yang digunakan untuk menulis, mengedit, dan mengelola kode.

## Cara Instalasi

1. **Instalasi Visual Studio Code (VS Code)**:

   - Unduh dan install Visual Studio Code dari [situs resmi](https://code.visualstudio.com/).

2. **Instalasi XAMPP**:

   - Unduh dan install XAMPP dari [situs resmi](https://www.apachefriends.org/index.html). Jalankan XAMPP dan aktifkan modul Apache dan MySQL.

3. **Setup Proyek**:

   - Buka VSCode dan buka direktori proyek Badjo.
   - Pastikan semua file PHP, HTML, CSS, dan JavaScript sudah berada di dalam direktori proyek.

4. **Konfigurasi Database**:

   - Buka phpMyAdmin melalui http://localhost/phpmyadmin.
   - Buat database baru dengan nama badjo.
   - Import file SQL (badjo.sql) yang berisi struktur dan data tabel ke dalam database.

5. **Konfigurasi Database**:

- Buka file `config.php` di VSCode.
- Sesuaikan konfigurasi koneksi database, seperti nama database, username, dan password.

6. **Menjalankan Proyek**:

- BPindahkan direktori proyek ke dalam folder htdocs di direktori XAMPP (`C:\xampp\htdocs` untuk Windows atau `/Applications/XAMPP/htdocs` untuk macOS).
- Buka browser dan akses `http://localhost/badjo/` untuk melihat aplikasi berjalan.

## Cara Menggunakan

1. **Akses Halaman Utamaa**:

   - Buka browser dan masukkan URL `http://localhost/badjo/` untuk mengakses halaman utama website.

2. **Menjelajahi Paket Perjalanan**:

   - Di halaman utama, Anda akan melihat berbagai paket perjalanan yang tersedia.
   - Setiap paket disertai dengan deskripsi singkat dan harga per orang.

3. **Memesan Paket Perjalanan**:

   - Klik pada paket perjalanan yang ingin Anda pesan.
   - Isi form pemesanan dengan detail diri.
   - Sistem akan secara otomatis menghitung total biaya berdasarkan jumlah peserta dan harga per orang.s
   - Setelah semua data terisi dengan benar, klik button "Pesan Sekarang".
   - Akan muncul konfirmasi alert bahwa pemesanan sukses dilakukan.

4. **Mengedit dan Membatalkan Pesanan**:

   - Jika Anda ingin mengedit pesanan, navigasikan ke icon Edit yang berada di sebelah button "pesan sekarang".
   - Pilih pesanan yang ingin diedit dari daftar yang ditampilkan.
   - Ubah detail pesanan sesuai kebutuhan, atau klik tombol "Hapus" untuk membatalkan pesanan.
   - Simpan perubahan atau konfirmasi penghapusan sesuai pilihan Anda.

5. **Navigasi dan Interaksi**:
   - Gunakan menu navigasi untuk mengakses berbagai halaman lain, seperti daftar paket, tentang kami, dan kontak.
   - Efek hover yang interaktif akan memudahkan Anda berinteraksi dengan elemen-elemen di halaman.

## Kontributor

Proyek ini dikembangkan oleh `[Siti Nur Khalisha].`

## Kontak

Untuk pertanyaan lebih lanjut atau jika Anda ingin berkontribusi pada proyek ini, Anda dapat menghubungi saya melalui email di [khalisha.code@gmail.com](mailto:khalisha.code@gmail.com) atau kunjungi profil GitHub saya di [https://github.com/stkhalisha](https://github.com/stkhalisha). TerimaKasih!
