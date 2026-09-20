<?php
/*
Saya Nadya Rizqitha Salsabila dengan NIM 2500991 mengerjakan soal Kuis 1
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
*/

require_once __DIR__ . "/Film.php";
session_start();
require_once __DIR__ . "/fungsi.php";

// ===== inisialisasi array of object di $_SESSION (jika belum ada) =====
if (!isset($_SESSION['daftarFilm'])) {
    $_SESSION['daftarFilm'] = [
        new Film(1, "Pengabdi Setan 3", "Horror", 110, 45000, ""),
        new Film(2, "Dilan 1990", "Drama", 105, 35000, ""),
    ];
}

$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : "";
$filmSedangDiedit = null;

// ===== UPDATE (via POST, dari form edit di halaman ini) =====
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi']) && $_POST['aksi'] === 'update') {
    $id = (int) $_POST['idFilm'];
    $judul = trim($_POST['judul']);
    $genre = trim($_POST['genre']);
    $durasi = (int) $_POST['durasi'];
    $harga = (float) $_POST['hargaTiket'];

    $idx = cariIndexById($id);
    if ($idx === -1) {
        $pesan = "Gagal update: data dengan ID tersebut tidak ditemukan.";
    } else {
        $film = $_SESSION['daftarFilm'][$idx];
        $gambarPath = prosesGambar($film->getGambar());
        $film->setJudul($judul);
        $film->setGenre($genre);
        $film->setDurasi($durasi);
        $film->setHargaTiket($harga);
        $film->setGambar($gambarPath);
        $pesan = "Data film berhasil diupdate!";
    }
}

// ===== HAPUS (via GET) =====
if (isset($_GET['aksi']) && $_GET['aksi'] === 'hapus' && isset($_GET['id'])) {
    $idx = cariIndexById((int) $_GET['id']);
    if ($idx !== -1) {
        array_splice($_SESSION['daftarFilm'], $idx, 1);
        $pesan = "Data berhasil dihapus!";
    } else {
        $pesan = "Data dengan ID tersebut tidak ditemukan!";
    }
}

// ===== EDIT: load data ke form (via GET) =====
if (isset($_GET['aksi']) && $_GET['aksi'] === 'edit' && isset($_GET['id'])) {
    $idx = cariIndexById((int) $_GET['id']);
    if ($idx !== -1) {
        $filmSedangDiedit = $_SESSION['daftarFilm'][$idx];
    } else {
        $pesan = "Data dengan ID tersebut tidak ditemukan!";
    }
}

// ===== CARI (via GET) =====
$hasilPencarian = null;
$kataKunciCari = "";
if (isset($_GET['aksi']) && $_GET['aksi'] === 'cari' && isset($_GET['kataKunci'])) {
    $kataKunciCari = trim($_GET['kataKunci']);
    $hasilPencarian = [];
    foreach ($_SESSION['daftarFilm'] as $film) {
        if ($kataKunciCari !== "" &&
            (stripos($film->getJudul(), $kataKunciCari) !== false ||
             (string) $film->getIdFilm() === $kataKunciCari)) {
            $hasilPencarian[] = $film;
        }
    }
}

$dataUntukTabel = $hasilPencarian !== null ? $hasilPencarian : $_SESSION['daftarFilm'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pengelolaan Data Film Bioskop</title>
<style>
    body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
    h1 { color: #222; }
    .header-atas { display: flex; justify-content: space-between; align-items: center; }
    .banner-wrap { margin-bottom: 20px; }
    .banner-image {
        width: 100%;
        max-height: 220px;
        object-fit: cover;
        display: block;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    .kotak { background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 20px;
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
    .btn-hapus { background: #d9534f; }
    .btn-hapus:hover { background: #b52b27; }
    .btn-tambah { background: #2e9e4f; font-size: 15px; font-weight: bold; }
    .btn-tambah:hover { background: #22803e; }
    table { width: 100%; border-collapse: collapse; background: #fff; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background: #2d6cdf; color: #fff; }
    .pesan { padding: 10px; background: #dff0d8; border: 1px solid #c1e2b3; border-radius: 4px; margin-bottom: 15px; }
    img.poster { max-width: 60px; max-height: 80px; }
    .cari-box { display: flex; gap: 8px; }
    .cari-box input { flex: 1; }
</style>
</head>
<body>

<style>
    body {
        background: url('img/image2.jpg') no-repeat center center fixed;
        background-size: cover;
    }
    </style>

<div class="header-atas">
    <h1>Pengelolaan Data Film Bioskop</h1>
    <!-- Teks berlink: kalau dipencet, membawa ke halaman tambah.php -->
    <a href="tambah.php" class="btn btn-tambah">+ Tambah Film Baru</a>
</div>

<?php if ($pesan): ?>
    <div class="pesan"><?php echo htmlspecialchars($pesan); ?></div>
<?php endif; ?>

<?php if ($filmSedangDiedit): ?>
<div class="kotak">
    <h2>Update Data Film</h2>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="aksi" value="update">

        <label>ID Film</label>
        <input type="number" name="idFilm" value="<?php echo $filmSedangDiedit->getIdFilm(); ?>" readonly>

        <label>Judul</label>
        <input type="text" name="judul" required
               value="<?php echo htmlspecialchars($filmSedangDiedit->getJudul()); ?>">

        <label>Genre</label>
        <input type="text" name="genre" required
               value="<?php echo htmlspecialchars($filmSedangDiedit->getGenre()); ?>">

        <label>Durasi (menit)</label>
        <input type="number" name="durasi" required value="<?php echo $filmSedangDiedit->getDurasi(); ?>">

        <label>Harga Tiket (Rp)</label>
        <input type="number" step="0.01" name="hargaTiket" required
               value="<?php echo $filmSedangDiedit->getHargaTiket(); ?>">

        <label>Gambar Poster - Upload File dari Komputer</label>
        <input type="file" name="gambarFile" accept="image/*">

        <div class="atau">-- atau --</div>

        <label>Gambar Poster - Link/URL Gambar (akan otomatis didownload ke lokal)</label>
        <input type="text" name="gambarUrl" placeholder="https://contoh.com/poster.jpg">

        <?php if ($filmSedangDiedit->getGambar()): ?>
            <p style="margin-top:8px;">Gambar saat ini:
                <br><img class="poster" src="<?php echo htmlspecialchars($filmSedangDiedit->getGambar()); ?>" alt="poster saat ini">
            </p>
        <?php endif; ?>

        <button type="submit">Update Data</button>
        <a href="index.php" class="btn" style="background:#777;">Batal</a>
    </form>
</div>
<?php endif; ?>

<div class="kotak">
    <h2>Cari Data Film</h2>
    <form action="index.php" method="GET" class="cari-box">
        <input type="hidden" name="aksi" value="cari">
        <input type="text" name="kataKunci" placeholder="Cari berdasarkan ID atau Judul..."
               value="<?php echo htmlspecialchars($kataKunciCari); ?>">
        <button type="submit">Cari</button>
        <?php if ($hasilPencarian !== null): ?>
            <a href="index.php" class="btn" style="background:#777;">Reset</a>
        <?php endif; ?>
    </form>
</div>

<div class="kotak">
    <h2>Daftar Semua Film</h2>
    <?php if (empty($dataUntukTabel)): ?>
        <p>Tidak ada data film.</p>
    <?php else: ?>
    <table>
        <tr>
            <th>Poster</th>
            <th>ID</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Durasi</th>
            <th>Harga Tiket</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($dataUntukTabel as $film): ?>
        <tr>
            <td>
                <?php if ($film->getGambar() && file_exists(__DIR__ . "/" . $film->getGambar())): ?>
                    <img class="poster" src="<?php echo htmlspecialchars($film->getGambar()); ?>" alt="poster">
                <?php else: ?>
                    (tidak ada gambar)
                <?php endif; ?>
            </td>
            <td><?php echo $film->getIdFilm(); ?></td>
            <td><?php echo htmlspecialchars($film->getJudul()); ?></td>
            <td><?php echo htmlspecialchars($film->getGenre()); ?></td>
            <td><?php echo $film->getDurasi(); ?> menit</td>
            <td>Rp<?php echo number_format($film->getHargaTiket(), 0, ',', '.'); ?></td>
            <td>
                <a class="btn" href="index.php?aksi=edit&id=<?php echo $film->getIdFilm(); ?>">Edit</a>
                <a class="btn btn-hapus" href="index.php?aksi=hapus&id=<?php echo $film->getIdFilm(); ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>

</body>
</html>