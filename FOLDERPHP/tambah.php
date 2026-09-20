<?php
/*
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
*/

require_once __DIR__ . "/Film.php";
session_start();
require_once __DIR__ . "/fungsi.php";

if (!isset($_SESSION['daftarFilm'])) {
    $_SESSION['daftarFilm'] = [];
}

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['idFilm'];
    $judul = trim($_POST['judul']);
    $genre = trim($_POST['genre']);
    $durasi = (int) $_POST['durasi'];
    $harga = (float) $_POST['hargaTiket'];

    if (cariIndexById($id) !== -1) {
        $pesan = "Gagal menambahkan: ID sudah dipakai film lain.";
    } else {
        $gambarPath = prosesGambar("");
        $_SESSION['daftarFilm'][] = new Film($id, $judul, $genre, $durasi, $harga, $gambarPath);

        // langsung diarahkan (redirect) ke index.php setelah berhasil menambah
        header("Location: index.php?pesan=" . urlencode("Data film berhasil ditambahkan!"));
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Data Film</title>
<style>
    body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
    h1 { color: #222; }
    .kotak { background: #fff; padding: 20px; border-radius: 8px; max-width: 500px;
             box-shadow: 0 1px 3px rgba(0,0,0,0.15); }
    label { display: block; margin-top: 10px; font-weight: bold; }
    input[type=text], input[type=number], input[type=file] {
        width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;
    }
    .atau { margin: 8px 0; color: #888; font-style: italic; }
    button, .btn {
        margin-top: 15px; padding: 8px 16px; background: #2d6cdf; color: #fff;
        border: none; border-radius: 4px; cursor: pointer; text-decoration: none;
        display: inline-block;
    }
    button:hover, .btn:hover { background: #1d54b8; }
    .pesan { padding: 10px; background: #f2dede; border: 1px solid #ebccd1; border-radius: 4px; margin-bottom: 15px; }
    .kembali { display: inline-block; margin-bottom: 15px; color: #2d6cdf; text-decoration: none; }
    .kembali:hover { text-decoration: underline; }
</style>
</head>
<body>

<a class="kembali" href="index.php">&larr; Kembali ke Daftar Film</a>
<h1>Tambah Data Film</h1>

<?php if ($pesan): ?>
    <div class="pesan"><?php echo htmlspecialchars($pesan); ?></div>
<?php endif; ?>

<div class="kotak">
    <form action="tambah.php" method="POST" enctype="multipart/form-data">
        <label>ID Film (unik)</label>
        <input type="number" name="idFilm" required>

        <label>Judul</label>
        <input type="text" name="judul" required>

        <label>Genre</label>
        <input type="text" name="genre" required>

        <label>Durasi (menit)</label>
        <input type="number" name="durasi" required>

        <label>Harga Tiket (Rp)</label>
        <input type="number" step="0.01" name="hargaTiket" required>

        <label>Gambar Poster - Upload File dari Komputer</label>
        <input type="file" name="gambarFile" accept="image/*">

        <div class="atau">-- atau --</div>

        <label>Gambar Poster - Link/URL Gambar (akan otomatis didownload ke lokal)</label>
        <input type="text" name="gambarUrl" placeholder="https://contoh.com/poster.jpg">

        <button type="submit">Tambah Data</button>
    </form>
</div>

</body>
</html>