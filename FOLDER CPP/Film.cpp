/*
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
*/

#include <iostream>
#include <vector>
#include <string>
#include <iomanip>
using namespace std;

//membuat class film
class Film {
private:
    int idFilm;
    string judul;
    string genre;
    int durasi;          // dalam menit
    double hargaTiket;

public:
    // constructor kosong
    Film() {

    }

    // constructor berparameter
    Film(int idFilm, string judul, string genre, int durasi, double hargaTiket) {
        this->idFilm = idFilm;
        this->judul = judul;
        this->genre = genre;
        this->durasi = durasi;
        this->hargaTiket = hargaTiket;
    }

    //getter
    int getIdFilm() { return idFilm; }
    string getJudul() { return judul; }
    string getGenre() { return genre; }
    int getDurasi() { 
        return durasi; 
    }
    double getHargaTiket() { return hargaTiket; }


    //setter
    void setJudul(string judul) { this->judul = judul; }
    void setGenre(string genre) { this->genre = genre; }
    void setDurasi(int durasi) { this->durasi = durasi; }
    void setHargaTiket(double hargaTiket) { this->hargaTiket = hargaTiket; }

    //fungsi untuk menampiolkan info film
    void tampilkanInfo() {
        cout << left;
        cout << setw(12) << "ID"     << ": " << idFilm << endl;
        cout << setw(12) << "Judul"  << ": " << judul << endl;
        cout << setw(12) << "Genre"  << ": " << genre << endl;
        cout << setw(12) << "Durasi" << ": " << durasi << " menit" << endl;
        cout << setw(12) << "Harga"  << ": Rp" << fixed << setprecision(0) << hargaTiket << endl;
        cout << "-------------------------------------------" << endl;
    }
};

// vector sebagai penampung sekumpulan object Film (array of object)
vector<Film> daftarFilm;

// mencari index film berdasarkan id, return -1 jika tidak ditemukan
int cariIndexById(int id) {
    for (int i = 0; i < (int)daftarFilm.size(); i++) {
        if (daftarFilm[i].getIdFilm() == id) {
            return i;
        }
    }
    return -1;
}

//fungsi untuk menambahkan data film
void tambahData() {
    int id, durasi;
    string judul, genre;
    double harga;

    cout << "\n--- Tambah Data Film ---\n";

    if (!daftarFilm.empty()) {
        cout << "Masukkan ID Film (unik): ";
        cin >> id;
        cin.ignore();

        if (cariIndexById(id) != -1) {
            cout << "ID sudah dipakai film lain! Gagal menambahkan data.\n";
            return;
        }
    } else {
        cout << "Masukkan ID Film (unik): ";
        cin >> id;
        cin.ignore();
    }

    cout << "Masukkan Judul       : ";
    getline(cin, judul);
    cout << "Masukkan Genre       : ";
    getline(cin, genre);
    cout << "Masukkan Durasi (menit): ";
    cin >> durasi;
    cout << "Masukkan Harga Tiket : ";
    cin >> harga;
    cin.ignore();

    Film filmBaru(id, judul, genre, durasi, harga);
    daftarFilm.push_back(filmBaru);

    cout << "Data film berhasil ditambahkan!\n";
}

//fungsi untuk menampilkan data semua film
void tampilkanData() {
    cout << "\n--- Daftar Semua Film ---\n";
    if (daftarFilm.empty()) {
        cout << "Belum ada data film.\n";
        return;
    }
    for (int i = 0; i < (int)daftarFilm.size(); i++) {
        daftarFilm[i].tampilkanInfo();
    }
}

//fungsi untuk mengupdate/mengubah data film
void updateData() {
    int id;
    cout << "\n--- Update Data Film ---\n";
    cout << "Masukkan ID Film yang ingin diupdate: ";
    cin >> id;
    cin.ignore();

    int idx = cariIndexById(id);
    if (idx == -1) {
        cout << "Data dengan ID tersebut tidak ditemukan!\n";
        return;
    }

    string judul, genre;
    int durasi;
    double harga;

    cout << "Judul baru       : ";
    getline(cin, judul);
    cout << "Genre baru       : ";
    getline(cin, genre);
    cout << "Durasi baru (menit): ";
    cin >> durasi;
    cout << "Harga tiket baru : ";
    cin >> harga;
    cin.ignore();

    daftarFilm[idx].setJudul(judul);
    daftarFilm[idx].setGenre(genre);
    daftarFilm[idx].setDurasi(durasi);
    daftarFilm[idx].setHargaTiket(harga);

    cout << "Data berhasil diupdate!\n";
}

//fungsi menghapus data film
void hapusData() {
    int id;
    cout << "\n--- Hapus Data Film ---\n";
    cout << "Masukkan ID Film yang ingin dihapus: ";
    cin >> id;

    int idx = cariIndexById(id);
    if (idx == -1) {
        cout << "Data dengan ID tersebut tidak ditemukan!\n";
        return;
    }

    daftarFilm.erase(daftarFilm.begin() + idx);
    cout << "Data berhasil dihapus!\n";
}

//fungsi untuk mencari data film
void cariData() {
    int id;
    cout << "\n--- Cari Data Film ---\n";
    cout << "Masukkan ID Film yang dicari: ";
    cin >> id;

    int idx = cariIndexById(id);
    if (idx == -1) {
        cout << "Data dengan ID tersebut tidak ditemukan!\n";
        return;
    }

    cout << "\nData ditemukan:\n";
    daftarFilm[idx].tampilkanInfo();
}

