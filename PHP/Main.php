<?php
include 'Petshop.php'; // Meng-include file Petshop.php yang berisi definisi class Petshop
session_start(); // Memulai session untuk web

// Jika session 'listProduk' belum ada, maka buat session tersebut dengan beberapa produk awal
if (!isset($_SESSION['listProduk'])) {
    $_SESSION['listProduk'] = [
        new Petshop(1, "Whiskas", "Makanan Kucing", 30000, "asset/whiskas.png"),
        new Petshop(2, "Royal Canin", "Makanan Anjing", 75000, "asset/royal_canin.png"),
        new Petshop(3, "Takari", "Makanan Ikan", 10000, "asset/takari.png")
    ];
}

$listProduk = &$_SESSION['listProduk']; // Mengisi list produk dengan session

// Jika request method adalah POST (untuk add, edit, dan delete)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : null; // Mengambil id dari POST
    $nama = isset($_POST['nama_produk']) ? htmlspecialchars($_POST['nama_produk']) : ''; // Mengambil nama produk dari POST
    $kategori = isset($_POST['kategori_produk']) ? htmlspecialchars($_POST['kategori_produk']) : ''; // Mengambil kategori produk dari POST
    $harga = isset($_POST['harga_produk']) ? (int) $_POST['harga_produk'] : 0; // Mengambil harga produk dari POST
    $foto = isset($_POST['foto_produk']) ? htmlspecialchars($_POST['foto_produk']) : ''; // Mengambil foto produk dari POST

    // Jika tombol add ditekan, tambahkan produk baru
    if (isset($_POST['add'])) {
        $newId = count($listProduk) + 1; // Menghitung id baru secara auto increment
        $tambah_produk = new Petshop(); // Membuat objek Petshop baru
        $tambah_produk->add_edit_produk($newId, $nama, $kategori, $harga, $foto); // Mengisi objek dengan data
        $listProduk[] = $tambah_produk; // Menambahkan objek ke array listProduk
    
    // Jika tombol edit ditekan, edit produk yang ada
    } elseif (isset($_POST['edit'])) {
        $key = 0; // Inisialisasi key
        $stop = false; // Inisialisasi stop
        while ($key < count($listProduk) && !$stop) {
            if ($listProduk[$key]->getId() == $id) { // Jika id produk sesuai
                $listProduk[$key]->setNama_produk($nama); // Set nama produk
                $listProduk[$key]->setKategori_produk($kategori); // Set kategori produk
                $listProduk[$key]->setHarga_produk($harga); // Set harga produk
                if (!empty($foto)) {
                    $listProduk[$key]->setFoto($foto); // Set foto produk jika tidak kosong
                }
                $stop = true; // Hentikan loop
            }
            $key++;
        }
    // Jika tombol delete ditekan, hapus produk
    } elseif (isset($_POST['delete'])) {
        $key = 0; // Inisialisasi key
        $stop = false; // Inisialisasi stop
        while ($key < count($listProduk) && !$stop) {
            if ($listProduk[$key]->getId() == $id) { // Jika id produk sesuai
                unset($listProduk[$key]); // Hapus produk dari array
                $listProduk = array_values($listProduk); // Reindex array
                $stop = true; // Hentikan loop
            }
            $key++;
        }
    }
}

$filteredProduk = []; // Inisialisasi array untuk produk yang difilter
if (isset($_GET['search'])) {
    $cari = htmlspecialchars($_GET['search']); // Mengambil keyword pencarian dari GET
} else {
    $cari = ''; // Jika tidak ada keyword pencarian, set kosong
}

// Filter produk berdasarkan keyword pencarian
foreach ($listProduk as $produk) {
    if ($produk->search_produk($cari)) {
        $filteredProduk[] = $produk; // Tambahkan produk yang sesuai ke array filteredProduk
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zrill Petshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        // Fungsi untuk mengisi form edit dengan data produk yang dipilih
        function fillEditForm(id, nama, kategori, harga, foto) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_kategori').value = kategori;
            document.getElementById('edit_harga').value = harga;
            document.querySelectorAll('input[name="foto_produk"]').forEach(radio => {
                if (radio.value === foto) {
                    radio.checked = true;
                }
            });
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Zrill Petshop</h2>
        <!-- FORM TAMBAH PRODUK -->
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-4">Tambah Produk</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="kategori_produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga_produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="foto_produk" value="asset/whiskas.png" required>
                            <label class="form-check-label"><img src="asset/whiskas.png" width="50"> Whiskas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="foto_produk" value="asset/royal_canin.png" required>
                            <label class="form-check-label"><img src="asset/royal_canin.png" width="50"> Royal Canin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="foto_produk" value="asset/takari.png" required>
                            <label class="form-check-label"><img src="asset/takari.png" width="50"> Takari</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="foto_produk" value="asset/pedigree.jpg" required>
                            <label class="form-check-label"><img src="asset/pedigree.jpg" width="50"> Pedigree</label>
                        </div>
                    </div>
                    <button type="submit" name="add" class="btn btn-success">Tambah</button>
                </form>
            </div>
            <!-- FORM EDIT PRODUK -->
            <div class="col-md-6">
                <h3 class="mt-4">Edit Produk</h3>
                <form method="POST">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="edit_nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="kategori_produk" id="edit_kategori" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga_produk" id="edit_harga" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="foto_produk" value="asset/whiskas.png" required>
                            <label class="form-check-label"><img src="asset/whiskas.png" width="50"> Whiskas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="foto_produk" value="asset/royal_canin.png" required>
                            <label class="form-check-label"><img src="asset/royal_canin.png" width="50"> Royal Canin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="foto_produk" value="asset/takari.png" required>
                            <label class="form-check-label"><img src="asset/takari.png" width="50"> Takari</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="foto_produk" value="asset/pedigree.jpg" required>
                            <label class="form-check-label"><img src="asset/pedigree.jpg" width="50"> Pedigree</label>
                        </div>
                    </div>
                    <button type="submit" name="edit" class="btn btn-warning">Simpan Perubahan</button>
                </form>
            </div>
        </div>

        <!-- TABEL DAFTAR PRODUK DAN SEARCH -->
        <h3 class="mt-5">Daftar Produk</h3>
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari produk..." value="<?= $cari ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredProduk as $produk): ?>
                    <tr>
                        <td><?= $produk->getId() ?></td>
                        <td><?= $produk->getNama_produk() ?></td>
                        <td><?= $produk->getKategori_produk() ?></td>
                        <td>Rp<?= number_format($produk->getHarga_produk(), 0, ',', '.') ?></td>
                        <td><img src="<?= $produk->getFoto() ?>" width="50"><?= $produk->getFoto()?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" 
                                onclick="fillEditForm('<?= $produk->getId() ?>', '<?= $produk->getNama_produk() ?>', '<?= $produk->getKategori_produk() ?>', '<?= $produk->getHarga_produk() ?>', '<?= $produk->getFoto() ?>')">
                                Edit
                            </button>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $produk->getId() ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
