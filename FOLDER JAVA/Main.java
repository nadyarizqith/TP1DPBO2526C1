/*Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
*/
import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    // ArrayList sebagai penampung sekumpulan object Film (array of object)
    static ArrayList<Film> daftarFilm = new ArrayList<>();
    static Scanner scanner = new Scanner(System.in);

    // mencari index film berdasarkan id, return -1 jika tidak ditemukan
    static int cariIndexById(int id) {
        for (int i = 0; i < daftarFilm.size(); i++) {
            if (daftarFilm.get(i).getIdFilm() == id) {
                return i;
            }
        }
        return -1;
    }

    static void tambahData() {
        System.out.println("\n--- Tambah Data Film ---");
        System.out.print("Masukkan ID Film (unik): ");
        int id = Integer.parseInt(scanner.nextLine());

        if (cariIndexById(id) != -1) {
            System.out.println("ID sudah dipakai film lain! Gagal menambahkan data.");
            return;
        }

        System.out.print("Masukkan Judul       : ");
        String judul = scanner.nextLine();
        System.out.print("Masukkan Genre       : ");
        String genre = scanner.nextLine();
        System.out.print("Masukkan Durasi (menit): ");
        int durasi = Integer.parseInt(scanner.nextLine());
        System.out.print("Masukkan Harga Tiket : ");
        double harga = Double.parseDouble(scanner.nextLine());

        daftarFilm.add(new Film(id, judul, genre, durasi, harga));
        System.out.println("Data film berhasil ditambahkan!");
    }

    static void tampilkanData() {
        System.out.println("\n--- Daftar Semua Film ---");
        if (daftarFilm.isEmpty()) {
            System.out.println("Belum ada data film.");
            return;
        }
        for (Film film : daftarFilm) {
            film.tampilkanInfo();
        }
    }

    static void updateData() {
        System.out.println("\n--- Update Data Film ---");
        System.out.print("Masukkan ID Film yang ingin diupdate: ");
        int id = Integer.parseInt(scanner.nextLine());

        int idx = cariIndexById(id);
        if (idx == -1) {
            System.out.println("Data dengan ID tersebut tidak ditemukan!");
            return;
        }

        Film film = daftarFilm.get(idx);
        System.out.print("Judul baru         : ");
        film.setJudul(scanner.nextLine());
        System.out.print("Genre baru         : ");
        film.setGenre(scanner.nextLine());
        System.out.print("Durasi baru (menit): ");
        film.setDurasi(Integer.parseInt(scanner.nextLine()));
        System.out.print("Harga tiket baru   : ");
        film.setHargaTiket(Double.parseDouble(scanner.nextLine()));

        System.out.println("Data berhasil diupdate!");
    }

    static void hapusData() {
        System.out.println("\n--- Hapus Data Film ---");
        System.out.print("Masukkan ID Film yang ingin dihapus: ");
        int id = Integer.parseInt(scanner.nextLine());

        int idx = cariIndexById(id);
        if (idx == -1) {
            System.out.println("Data dengan ID tersebut tidak ditemukan!");
            return;
        }

        daftarFilm.remove(idx);
        System.out.println("Data berhasil dihapus!");
    }

    static void cariData() {
        System.out.println("\n--- Cari Data Film ---");
        System.out.print("Masukkan ID Film yang dicari: ");
        int id = Integer.parseInt(scanner.nextLine());

        int idx = cariIndexById(id);
        if (idx == -1) {
            System.out.println("Data dengan ID tersebut tidak ditemukan!");
            return;
        }

        System.out.println("\nData ditemukan:");
        daftarFilm.get(idx).tampilkanInfo();
    }

    public static void main(String[] args) {
        // seed 2 data contoh (hardcode) agar ArrayList of object langsung terisi
        daftarFilm.add(new Film(1, "Pengabdi Setan 3", "Horror", 110, 45000));
        daftarFilm.add(new Film(2, "Dilan 1990", "Drama", 105, 35000));

        int pilihan;
        do {
            System.out.println("\n===== MENU BIOSKOP (Java) =====");
            System.out.println("1. Tambah Data Film");
            System.out.println("2. Tampilkan Data Film");
            System.out.println("3. Update Data Film");
            System.out.println("4. Hapus Data Film");
            System.out.println("5. Cari Data Film");
            System.out.println("6. Keluar");
            System.out.print("Pilih menu: ");
            pilihan = Integer.parseInt(scanner.nextLine());

            switch (pilihan) {
                case 1: tambahData(); break;
                case 2: tampilkanData(); break;
                case 3: updateData(); break;
                case 4: hapusData(); break;
                case 5: cariData(); break;
                case 6: System.out.println("Terima kasih!"); break;
                default: System.out.println("Pilihan tidak valid!");
            }
        } while (pilihan != 6);

        scanner.close();
    }
}

// untuk mengerun
//cd "C:\Users\LENOVO\Documents\nadya dasprog\SEM 3\TUGAS PRAKTIKUM\TP 1\FOLDER JAVA"
//javac Main.java Film.java
//java Main