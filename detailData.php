<?php 
include 'php/connection.php';
$id = $_GET['id'];

$sql = "SELECT * FROM pendaftar WHERE id = $id";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimbel Babarsari</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400&family=Playfair+Display:wght@700&family=Poppins:wght@400&family=Oswald:wght@700&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/config.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
</head>

<body>
    <div class="containerHasil">
        <h3 style="font-weight: bold; margin-bottom: 30px; color: rgba(0, 0, 0, 0.619);">Data Pendaftaran Bimbel</h3>
        <div class="hasilFormDaftar" style="width: 845px;">
            <table class="table table-striped hasilFormDaftar">
                <tr>
                    <td><b>Nama</b></td>
                    <td colspan="2" colspan="2"><?= $data['nama'] ?></td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td colspan="2"><?= $data['email'] ?></td>
                </tr>
                <tr>
                    <td><b>Paket Bimbel</b></td>
                    <td colspan="2"><?= $data['paket'] ?></td>
                </tr>
                <tr>
                    <td><b>Lokasi Belajar</b></td>
                    <td colspan="2"><?= $data['lokasi'] ?></td>
                </tr>
                <tr>
                    <td><b>Fasilitas Tambahan</b></td>
                    <td colspan="2"><?= $data['fasilitas'] ?></td>
                </tr>
                <tr>
                    <td><b>Pajak</b></td>
                    <td><?= $data['paket'] != "Undefined" ? "10%" : "0%"; ?></td>
                </tr>
                <tr>
                    <td><b>Catatan</b></td>
                    <td colspan="2"><?= $data['catatan'] ?></td>
                </tr>
                <tr>
                    <td><b>Metode Pembayaran</b></td>
                    <td colspan="2"><?= $data['metode_pembayaran'] ?></td>
                </tr>
                <?php if ($data['paket'] != 'Undefined') : ?>
                    <tr>
                        <td><b>Total Price</b></td>
                        <td>Paket </td>
                        <td>Rp. <?= number_format($data['harga_paket'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Lokasi Belajar</td>
                        <td>Rp. <?= number_format($data['harga_cabang'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Fasilitas Tambahan</td>
                        <td>Rp. <?= number_format($data['total_fasilitas'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Pajak</td>
                        <td>Rp. <?= number_format($data['pajak'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Biaya Layanan</td>
                        <td>Rp. <?= number_format($data['biaya_admin'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Rp. <?= number_format($data['total_bayar'], 0, ',', '.') ?></b></td>
                    </tr>
                <?php endif; ?>
            </table>
            <div class="div-button" style="text-align: right;">
                <a href="index.php"><button type="button" class="btn btn-light">Back to Dashboard</button></a>
            </div>
        </div>
    </div>
</body>

</html>