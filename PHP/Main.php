<?php
include 'Petshop.php';

session_start();
if (!isset($_SESSION['listProduk'])) {
    $_SESSION['listProduk'] = [
        new Petshop(1, "Whiskas", "Makanan Kucing", 30000, "asset/whiskas.png"),
        new Petshop(2, "Royal Canin", "Makanan Anjing", 75000, "asset/royal_canin.png"),
        new Petshop(3, "Takari", "Makanan Ikan", 10000, "asset/takari.png")
    ];
}
$listProduk = &$_SESSION['listProduk'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : null;
    $nama = isset($_POST['nama_produk']) ? htmlspecialchars($_POST['nama_produk']) : '';
    $kategori = isset($_POST['kategori_produk']) ? htmlspecialchars($_POST['kategori_produk']) : '';
    $harga = isset($_POST['harga_produk']) ? (int) $_POST['harga_produk'] : 0;
    $foto = isset($_POST['foto_produk']) ? htmlspecialchars($_POST['foto_produk']) : '';

    if (isset($_POST['add'])) {
        $newId = count($listProduk) + 1;
        $listProduk[] = new Petshop($newId, $nama, $kategori, $harga, $foto);
    } elseif (isset($_POST['edit'])) {
        foreach ($listProduk as $produk) {
            if ($produk->getId() == $id) {
                $produk->setNama_produk($nama);
                $produk->setKategori_produk($kategori);
                $produk->setHarga_produk($harga);
                if (!empty($foto)) {
                    $produk->setFoto($foto);
                }
                break;
            }
        }
    } elseif (isset($_POST['delete'])) {
        foreach ($listProduk as $key => $produk) {
            if ($produk->getId() == $id) {
                unset($listProduk[$key]);
                $listProduk = array_values($listProduk);
                break;
            }
        }
    }
}

$searchQuery = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
$filteredProduk = array_filter($listProduk, function($produk) use ($searchQuery) {
    return stripos($produk->getNama_produk(), $searchQuery) !== false;
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zrill Petshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
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

        <h3 class="mt-5">Daftar Produk</h3>
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari produk..." value="<?= $searchQuery ?>">
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
                        <td><img src="<?= $produk->getFoto() ?>" width="50"></td>
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
