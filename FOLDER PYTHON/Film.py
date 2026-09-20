"""
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
"""


class Film:
    def __init__(self, id_film: int, judul: str, genre: str, durasi: int,
                 harga_tiket: float):
        self.id_film = id_film
        self.judul = judul
        self.genre = genre
        self.durasi = durasi          # dalam menit
        self.harga_tiket = harga_tiket

    # getter
    def get_id_film(self):
        return self.id_film
    
    # getter
    def get_judul(self):
        return self.judul

    # setter
    def set_judul(self, judul):
        self.judul = judul

    # setter
    def set_genre(self, genre):
        self.genre = genre

    # setter
    def set_durasi(self, durasi):
        self.durasi = durasi

    # setter
    def set_harga_tiket(self, harga_tiket):
        self.harga_tiket = harga_tiket

    # method untuk menampilkan info film
    def tampilkan_info(self):
        print(f"{'ID':12}: {self.id_film}")
        print(f"{'Judul':12}: {self.judul}")
        print(f"{'Genre':12}: {self.genre}")
        print(f"{'Durasi':12}: {self.durasi} menit")
        print(f"{'Harga':12}: Rp{self.harga_tiket:,.0f}")
        print("-" * 45)