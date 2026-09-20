<?php
/*
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
*/

class Film
{
    private $idFilm;
    private $judul;
    private $genre;
    private $durasi;       // dalam menit
    private $hargaTiket;
    private $gambar;        // path file lokal poster film (bukan url)

    public function __construct($idFilm, $judul, $genre, $durasi, $hargaTiket, $gambar)
    {
        $this->idFilm = $idFilm;
        $this->judul = $judul;
        $this->genre = $genre;
        $this->durasi = $durasi;
        $this->hargaTiket = $hargaTiket;
        $this->gambar = $gambar;
    }

    // ===== getter =====
    public function getIdFilm() { return $this->idFilm; }
    public function getJudul() { return $this->judul; }
    public function getGenre() { return $this->genre; }
    public function getDurasi() { return $this->durasi; }
    public function getHargaTiket() { return $this->hargaTiket; }
    public function getGambar() { return $this->gambar; }

    // ===== setter =====
    public function setJudul($judul) { $this->judul = $judul; }
    public function setGenre($genre) { $this->genre = $genre; }
    public function setDurasi($durasi) { $this->durasi = $durasi; }
    public function setHargaTiket($hargaTiket) { $this->hargaTiket = $hargaTiket; }
    public function setGambar($gambar) { $this->gambar = $gambar; }
}