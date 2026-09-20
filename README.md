JANJI:
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

DESIGN PROGRAM:
Class program yang dipakai adalah Film, dengan atribut:
idFilm — ID unik film
judul — judul film
genre — genre film
durasi — durasi tayang (menit)
hargaTiket — harga tiket per film
gambar — path file lokal poster film (php)

STRUKTUR FILE:

Main

├── CPP

│   ├── Film.cpp

│   └── main.cpp

│

├── Python

│   ├── Film.py

│   └── main.py

|

├── Java

│   ├── Film.java

│   └── Main.java

│

├── PHP

│   ├── film.php

│   ├── fungsi.php

│   ├── index.php

│   ├── tambah.php

│   ├── img

│   │   └── image.jpg

│   └── uploads

│       └── *.jpg


FLOW CODE:
 " Program ini mengelola data Film (tambah, tampil, update, hapus, cari) dan diimplementasikan dalam 4 bahasa berbeda dengan cara pakai yang sama alurnya, hanya beda tampilan (console vs web). "

A. PYTHON / JAVA / C++  (dijalankan lewat CMD/Terminal)

 1. Jalankan programnya:                                    
 Python : python main.py                                      
 Java   : javac Main.java Film.java   lalu   java Main
 C++    : g++ main.cpp -o main        lalu   ./main 
                                                            
 2. Saat program jalan, akan muncul menu:                                                                              
===== MENU BIOSKOP =====                           
  1. Tambah Data Film                                
  2. Tampilkan Data Film                             
  3. Update Data Film                                
  4. Hapus Data Film                                 
  5. Cari Data Film                                  
  6. Keluar                                                                                                        
Ketik angka menu yang diinginkan, lalu tekan Enter.
Program otomatis sudah terisi 2 data film awal (hardcode).

3. MENU 1 - TAMBAH DATA FILM                            
    Isi berurutan: ID Film (unik), Judul, Genre, Durasi (menit), Harga Tiket. Jika ID sudah dipakai film lain -> gagal.
                                                              
4. MENU 2 - TAMPILKAN DATA FILM                         
    Menampilkan seluruh data film yang tersimpan saat ini.
                                                              
5. MENU 3 - UPDATE DATA FILM                            
    Masukkan ID Film yang ingin diubah, lalu isi ulang Judul, Genre, Durasi, dan Harga Tiket. Jika ID tidak ditemukan, muncul pesan gagal.                                  
                                                    
6. MENU 4 - HAPUS DATA FILM                             
    Masukkan ID Film yang ingin dihapus. Jika ID tidak ditemukan, muncul pesan gagal.                       
                                                      
7. MENU 5 - CARI DATA FILM                              
    Masukkan ID Film yang dicari, data lengkap akan ditampilkan jika ditemukan.                                      

8. MENU 6 - KELUAR                                      
    Mengakhiri program. Setelah setiap aksi (1-5) program kembali otomatis ke menu utama.

B. PHP  (dijalankan lewat Browser - Web, klik & form)

1. Jalankan server lokal (mis. XAMPP/Laragon), taruh folder PHP di htdocs, lalu buka index.php di browser:  
    " http://localhost/nama-folder/index.php "   
    Halaman langsung menampilkan tabel "Daftar Semua Film" berisi 2 data awal (hardcode) yang tersimpan di session.             

2. TAMBAH DATA FILM                            
    Klik "+ Tambah Film Baru" (kanan atas) -> diarahkan ke tambah.php -> isi form (ID unik, Judul, Genre, Durasi, Harga Tiket, Poster opsional: upload file ATAU tempel link/URL gambar) -> klik "Tambah Data" -> otomatis kembali ke index.php.                               
                                                 
3. UPDATE DATA FILM                            
    Klik "Edit" pada baris film yang dituju -> form update muncul di atas halaman dengan data lama sudah terisi -> ubah field yang diinginkan -> klik "Update Data".             
                                                 
4. HAPUS DATA FILM                             
    Klik "Hapus" pada baris film yang dituju -> konfirmasi browser (OK/Batal) -> data terhapus dari session.             
                                                 
5. CARI DATA FILM                              
    Ketik ID atau (sebagian) Judul pada kotak "Cari Data Film" -> klik "Cari". Tabel hanya menampilkan hasil yang cocok.     
    Klik "Reset" untuk menampilkan semua data lagi. 

DOKUMENTASI:
C++
![alt text](image.png)
![alt text](image-1.png)
![alt text](image-2.png)

JAVA
![alt text](image-3.png)
![alt text](image-4.png)
![alt text](image-5.png)

PYTHON
![alt text](image-6.png)
![alt text](image-7.png)
![alt text](image-8.png)

PHP
https://youtu.be/mXqzRIFca2M?si=KnRcWCSumMMf1JEb




