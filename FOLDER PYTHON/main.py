"""
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
"""
from Film import Film

# list sebagai penampung sekumpulan object Film (array of object)
daftar_film = []

# fungsi untuk mencari index film berdasarkan id_film
def cari_index_by_id(id_film):
    for i, film in enumerate(daftar_film):
        if film.get_id_film() == id_film:
            return i
    return -1

# fungsi untuk menambah data film
def tambah_data():
    print("\n--- Tambah Data Film ---")
    id_film = int(input("Masukkan ID Film (unik): "))

    if cari_index_by_id(id_film) != -1:
        print("ID sudah dipakai film lain! Gagal menambahkan data.")
        return

    judul = input("Masukkan Judul       : ")
    genre = input("Masukkan Genre       : ")
    durasi = int(input("Masukkan Durasi (menit): "))
    harga = float(input("Masukkan Harga Tiket : "))

    film_baru = Film(id_film, judul, genre, durasi, harga)
    daftar_film.append(film_baru)
    print("Data film berhasil ditambahkan!")

# fungsi untuk menampilkan semua data film
def tampilkan_data():
    print("\n--- Daftar Semua Film ---")
    if not daftar_film:
        print("Belum ada data film.")
        return
    for film in daftar_film:
        film.tampilkan_info()

# fungsi untuk mengupdate data film
def update_data():
    print("\n--- Update Data Film ---")
    id_film = int(input("Masukkan ID Film yang ingin diupdate: "))

    idx = cari_index_by_id(id_film)
    if idx == -1:
        print("Data dengan ID tersebut tidak ditemukan!")
        return

    film = daftar_film[idx]
    film.set_judul(input("Judul baru         : "))
    film.set_genre(input("Genre baru         : "))
    film.set_durasi(int(input("Durasi baru (menit): ")))
    film.set_harga_tiket(float(input("Harga tiket baru   : ")))

    print("Data berhasil diupdate!")

# fungsi untuk menghapus data film
def hapus_data():
    print("\n--- Hapus Data Film ---")
    id_film = int(input("Masukkan ID Film yang ingin dihapus: "))

    idx = cari_index_by_id(id_film)
    if idx == -1:
        print("Data dengan ID tersebut tidak ditemukan!")
        return

    daftar_film.pop(idx)
    print("Data berhasil dihapus!")

# fungsi untuk mencari data film berdasarkan ID
def cari_data():
    print("\n--- Cari Data Film ---")
    id_film = int(input("Masukkan ID Film yang dicari: "))

    idx = cari_index_by_id(id_film)
    if idx == -1:
        print("Data dengan ID tersebut tidak ditemukan!")
        return

    print("\nData ditemukan:")
    daftar_film[idx].tampilkan_info()

def main():
    # seed 2 data contoh (hardcode) agar list of object langsung terisi
    daftar_film.append(Film(1, "Pengabdi Setan 3", "Horror", 110, 45000))
    daftar_film.append(Film(2, "Dilan 1990", "Drama", 105, 35000))

    while True:
        print("\n===== MENU BIOSKOP (Python) =====")
        print("1. Tambah Data Film")
        print("2. Tampilkan Data Film")
        print("3. Update Data Film")
        print("4. Hapus Data Film")
        print("5. Cari Data Film")
        print("6. Keluar")
        pilihan = input("Pilih menu: ")

        if pilihan == "1":
            tambah_data()
        elif pilihan == "2":
            tampilkan_data()
        elif pilihan == "3":
            update_data()
        elif pilihan == "4":
            hapus_data()
        elif pilihan == "5":
            cari_data()
        elif pilihan == "6":
            print("Terima kasih!")
            break
        else:
            print("Pilihan tidak valid!")


if __name__ == "__main__":
    main()