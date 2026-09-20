/*
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
*/

public class Film {
    private int idFilm;
    private String judul;
    private String genre;
    private int durasi;          // dalam menit
    private double hargaTiket;

    // constructor
    public Film(int idFilm, String judul, String genre, int durasi, double hargaTiket) {
        this.idFilm = idFilm;
        this.judul = judul;
        this.genre = genre;
        this.durasi = durasi;
        this.hargaTiket = hargaTiket;
    }

    //getter
    public int getIdFilm() { 
        return idFilm; 
    }
    public String getJudul() {
        return judul;
    }
    public String getGenre() { 
        return genre; 
    }
    public int getDurasi() { 
        return durasi; 
    }
    public double getHargaTiket() {
         return hargaTiket; 
        }

    //setter
    public void setJudul(String judul) {
        this.judul = judul; 
    }
    public void setGenre(String genre) { 
        this.genre = genre; 
    }
    public void setDurasi(int durasi) {
        this.durasi = durasi; 
    }
    public void setHargaTiket(double hargaTiket) { 
        this.hargaTiket = hargaTiket; 
    }

    //
    public void tampilkanInfo() {
        System.out.printf("%-12s: %d%n", "ID", idFilm);
        System.out.printf("%-12s: %s%n", "Judul", judul);
        System.out.printf("%-12s: %s%n", "Genre", genre);
        System.out.printf("%-12s: %d menit%n", "Durasi", durasi);
        System.out.printf("%-12s: Rp%.0f%n", "Harga", hargaTiket);
            System.out.println("-------------------------------------------");
    }
}