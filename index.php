<?php
include 'php/connection.php';

$no = 1;
$sql = "SELECT * FROM pendaftar";
$query = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimbel Babarsari</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400&family=Playfair+Display:wght@700&family=Poppins:wght@400&family=Oswald:wght@700&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/config.css">
</head>

<body>
    <div class="form-container">
        <h3 style="font-weight: bold; margin-bottom: 30px; color: rgba(0, 0, 0, 0.619);">Daftar Pendaftaran Bimbel</h3>
        <div class="formDaftar">
            <a href="formDaftar.php">
                <button type="submit" class="btn btn-secondary" style="margin-bottom: 10px;">Tambah Data&nbsp;&nbsp;<i class="fa-solid fa-user-plus"></i></button>
            </a>
            <table id="tabelPendaftar">
                <thead>
                    <tr>
                        <th style="text-align: center;">NO</th>
                        <th>Nama</th>
                        <th>Paket</th>
                        <th>Total Biaya</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (mysqli_num_rows($query) == 0) {
                    ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">Data masih kosong</td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                        </tr>
                        <?php
                    } else {
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['paket']; ?></td>
                                <td>Rp. <?= number_format($data['total_bayar'], 0, ',', '.') ?></td>
                                <td style="text-align: center;">
                                    <a href="detailData.php?id=<?= $data['id']; ?>"><button type="button" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i>&nbsp;Detail</button></a>
                                    <a href="formEdit.php?id=<?= $data['id']; ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit</button></a>
                                    <button type="button" class="btn btn-danger btn-hapus" data-id="<?= $data['id']; ?>"><i class="fa-solid fa-trash"></i>&nbsp;Hapus</button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/config.js"></script>
</body>

</html>