<?php
/*
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
*/

// mencari index film berdasarkan id di dalam $_SESSION['daftarFilm']
// return -1 jika tidak ditemukan
function cariIndexById($id)
{
    foreach ($_SESSION['daftarFilm'] as $i => $film) {
        if ($film->getIdFilm() == $id) {
            return $i;
        }
    }
    return -1;
}

/**
 * Menentukan path gambar lokal untuk sebuah film, dari salah satu sumber:
 * 1) File yang diupload lewat <input type="file" name="gambarFile">
 * 2) Link/URL gambar lewat <input type="text" name="gambarUrl"> -> didownload ke lokal
 * 3) Jika keduanya kosong -> pertahankan gambar lama (mode update) atau kosong (mode tambah)
 */
function prosesGambar($gambarLama = "")
{
    $folderUpload = __DIR__ . "/uploads/";
    if (!is_dir($folderUpload)) {
        mkdir($folderUpload, 0777, true);
    }

    // 1) Upload file lokal
    if (isset($_FILES['gambarFile']) && $_FILES['gambarFile']['error'] === UPLOAD_ERR_OK) {
        $namaFileBaru = time() . "_" . basename($_FILES['gambarFile']['name']);
        $tujuan = $folderUpload . $namaFileBaru;
        if (move_uploaded_file($_FILES['gambarFile']['tmp_name'], $tujuan)) {
            return "uploads/" . $namaFileBaru;
        }
    }

    // 2) Link/URL gambar -> download ke lokal
    if (!empty($_POST['gambarUrl'])) {
        $url = trim($_POST['gambarUrl']);
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $isiGambar = @file_get_contents($url);
            if ($isiGambar !== false) {
                $ekstensi = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
                if (empty($ekstensi)) {
                    $ekstensi = "jpg";
                }
                $namaFileBaru = time() . "_dariurl." . $ekstensi;
                $tujuan = $folderUpload . $namaFileBaru;
                if (file_put_contents($tujuan, $isiGambar) !== false) {
                    return "uploads/" . $namaFileBaru; // path lokal, bukan url aslinya
                }
            }
        }
    }

    // 3) Tidak ada input baru -> pertahankan gambar lama
    return $gambarLama;
}