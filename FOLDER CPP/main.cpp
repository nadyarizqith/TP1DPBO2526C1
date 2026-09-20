/*
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
*/

#include "film.cpp"

using namespace std;

int main() {
    // seed 2 data contoh (hardcode) agar array of object langsung terisi
    daftarFilm.push_back(Film(1, "Pengabdi Setan 3", "Horror", 110, 45000));
    daftarFilm.push_back(Film(2, "Dilan 1990", "Drama", 105, 35000));

    int pilihan;
    do {
        cout << "\n===== MENU BIOSKOP (C++) =====\n";
        cout << "1. Tambah Data Film\n";
        cout << "2. Tampilkan Data Film\n";
        cout << "3. Update Data Film\n";
        cout << "4. Hapus Data Film\n";
        cout << "5. Cari Data Film\n";
        cout << "6. Keluar\n";
        cout << "Pilih menu: ";
        cin >> pilihan;

        switch (pilihan) {
            case 1: tambahData(); break;
            case 2: tampilkanData(); break;
            case 3: updateData(); break;
            case 4: hapusData(); break;
            case 5: cariData(); break;
            case 6: cout << "Terima kasih!\n"; break;
            default: cout << "Pilihan tidak valid!\n";
        }
    } while (pilihan != 6);

    return 0;
}