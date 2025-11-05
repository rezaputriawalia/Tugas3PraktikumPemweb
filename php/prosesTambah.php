<?php
    include 'connection.php';

    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $paket = !empty($_POST['paket']) ? $_POST['paket'] : 'Undefined';
    if ($paket == 'Paket Intensif SBMPTN') {
        $hargaPaket = 500000;
    } else if ($paket == 'Paket Reguler') {
        $hargaPaket = 750000;
    } else if ($paket == 'Paket Supercamp SBMPTN') {
        $hargaPaket = 1000000;
    } else {
        $hargaPaket = 0;
    } 

    $fasilitas = $_POST['fasilitas'] ?? [];
    if (!empty($fasilitas)) {
        $fasilitasGabungan = implode(', ', $fasilitas);
    } else {
        $fasilitasGabungan = '-';
    }

    $hargaFasilitas = [
        'Modul Cetak Lengkap' => 50000,
        'Modul PDF' => 25000,
        'Video Rekaman Kelas' => 75000,
        'Grup Diskusi Telegram' => 40000,
    ];

    $totalFasilitas = 0;
    foreach ($fasilitas as $item) {
        if (isset($hargaFasilitas[$item])) {
            $totalFasilitas += $hargaFasilitas[$item];
        }
    }

    $cabang = $_POST['lokasiCabang'];
    if ($cabang == 'Jakarta Pusat') {
        $hargaCabang = 100000;
    } else if ($cabang == 'Surabaya') {
        $hargaCabang = 150000;
    } else if ($cabang == 'Yogyakarta') {
        $hargaCabang = 80000;
    } else if ($cabang == 'Aceh') {
        $hargaCabang = 120000;
    } else if ($cabang == 'Makassar') {
        $hargaCabang = 115000;
    }

    $bayar = $_POST['metodeBayar'];
    if ($bayar == 'Transfer Bank') {
        $biayaAdmin = 3000;
    } else if ($bayar == 'E-Wallet') {
        $biayaAdmin = 2000;
    } else if ($bayar = 'Tunai') {
        $biayaAdmin = 0;
    }

    $subtotal = $hargaPaket + $hargaCabang + $totalFasilitas;
    if ($paket != "Undefined") {
        $pajak = 0.10 * $subtotal;
    } else {
        $pajak = 0;
    }
    $totalBayar = $subtotal + $pajak + $biayaAdmin;
 
    $note = !empty($_POST['note']) ? $_POST['note'] : '-';

    $sql = "INSERT INTO pendaftar (nama, email, paket, fasilitas, lokasi, metode_pembayaran, catatan, harga_paket, harga_cabang, total_fasilitas, subtotal, pajak, biaya_admin, total_bayar, tanggal_daftar)
            VALUES ('$nama', '$email', '$paket', '$fasilitasGabungan', '$cabang', '$bayar', '$note', '$hargaPaket', '$hargaCabang', '$totalFasilitas', '$subtotal', '$pajak', '$biayaAdmin', '$totalBayar', NOW())";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        header('Location: ../index.php?status=success');
    } else {
        header('Location: ../index.php?status=failed');
    }
?>