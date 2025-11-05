<?php 
include 'php/connection.php';
$id = $_GET['id'];

$sql = "SELECT * FROM pendaftar WHERE id = $id";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);
$fasilitas = explode( ', ', $data['fasilitas']);
// print_r(mysqli_num_rows($fasilitas));
// print_r($data['lokasi']);
// echo($data['fasilitas'][0]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400&family=Playfair+Display:wght@700&family=Poppins:wght@400&family=Oswald:wght@700&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/config.css">
</head>

<body>
    <div id="formDaftarContainer" class="form-container">
        <h3 style="font-weight: bold; margin-bottom: 30px; color: rgba(0, 0, 0, 0.619);;">Formulir Pendaftaran</h3>
        <form id="formDaftar" class="formDaftar" action="php/prosesUpdate.php" method="POST">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="contoh@gmail.com" value="<?= $data['email']; ?>" required>
            </div>
            <div class="mb-3" style="display: flex; flex-direction: column;">
                <label class="mb-2">Paket Bimbingan</label>
                <div>
                    <input type="radio" name="paket" class="form-radio-input" id="paket-intensif" style="margin-right: 5px;" value="Paket Intensif SBMPTN" <?= $data['paket'] == "Paket Intensif SBMPTN" ? 'checked' : '' ?>>Paket Intensif SBMPTN
                    <input type="radio" name="paket" class="form-radio-input" id="paket-reguler" style="margin-right: 5px; margin-left: 5px;" value="Paket Reguler" <?= $data['paket'] == "Paket Reguler" ? 'checked' : '' ?>>Paket Reguler
                    <input type="radio" name="paket" class="form-radio-input" id="paket-supercamp" style="margin-right: 5px; margin-left: 5px;" value="Paket Supercamp SBMPTN" <?= $data['paket'] == "Paket Supercamp SBMPTN" ? 'checked' : '' ?>>Paket Supercamp SBMPTN
                </div>
            </div>
            <div style="display: flex; flex-direction: column;">
                <label class="mb-2">Fasilitas Tambahan</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" name="fasilitas[]" id="modul-cetak" value="Modul Cetak Lengkap"<?= in_array('Modul Cetak Lengkap', $fasilitas) ? 'checked' : '' ?>>
                <label for="modul-cetak" class="form-cetak-label">Modul Cetak Lengkap</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" name="fasilitas[]" id="modul-pdf" value="Modul PDF"<?= in_array('Modul PDF', $fasilitas) ? 'checked' : '' ?>>
                <label for="modul-pdf" class="form-cetak-label">Modul PDF</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" name="fasilitas[]" id="video" value="Video Rekaman Kelas" <?= in_array('Video Rekaman Kelas', $fasilitas) ? 'checked' : '' ?>>
                <label for="video" class="form-cetak-label">Video Rekaman Kelas</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" name="fasilitas[]" id="telegram" value="Grup Diskusi Telegram" <?= in_array('Grup Diskusi Telegram', $fasilitas) ? 'checked' : '' ?>>
                <label for="telegram" class="form-cetak-label">Grup Diskusi Telegram</label>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Cabang</label>
                <select class="form-select" name="lokasiCabang" required>
                    <option value="" disabled selected hidden>Pilih lokasi cabang...</option>
                    <option value="Jakarta Pusat" <?= $data['lokasi'] == "Jakarta Pusat" ? 'selected' : '' ?>>Jakarta Pusat</option>
                    <option value="Surabaya" <?= $data['lokasi'] == "Surabaya" ? 'selected' : '' ?>>Surabaya</option>
                    <option value="Yogyakarta" <?= $data['lokasi'] == "Yogyakarta" ? 'selected' : '' ?>>Yogyakarta</option>
                    <option value="Makassar" <?= $data['lokasi'] == "Makassar" ? 'selected' : '' ?>>Makassar</option>
                    <option value="Aceh" <?= $data['lokasi'] == "Aceh" ? 'selected' : '' ?>>Aceh</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="metode-bayar" class="form-label">Metode Pembayaran</label>
                <select class="form-select" name="metodeBayar">
                    <option value="Transfer Bank" <?= $data['metode_pembayaran'] == "Transfer Bank" ? 'selected' : '' ?>>Transfer Bank +3000</option>
                    <option value="Tunai" <?= $data['metode_pembayaran'] == "Tunai" ? 'selected' : '' ?>>Tunai</option>
                    <option value="E-Wallet" <?= $data['metode_pembayaran'] == "E-Wallet" ? 'selected' : '' ?>>E-Wallet +2000</option>
                </select>
            </div>
            <div class="mb-3" style="display: flex; flex-direction: column;">
                <label for="note" class="form-label">Note</label>
                <textarea class="textarea-note" name="note" id="note" placeholder="Write your additional note here"><?= $data['catatan']; ?></textarea>
            </div>
            <div class="div-button" style="text-align: right;">
                <button type="reset" class="btn btn-light">Reset</button>
                <button type="submit" class="btn btn-light">Update</button>
            </div>
            <div class="div-button" style="text-align: right;">
                <a href="index.php"><button type="button" class="btn btn-light">Back to Dashboard</button></a>
            </div>
        </form>
    </div>
</body>

</html>