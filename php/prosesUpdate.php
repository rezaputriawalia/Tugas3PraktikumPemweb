<?php
    include 'connection.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $paket = !empty($_POST['paket']) ? $_POST['paket'] : 'Undefined';
    // echo($paket);
    // echo("<br>");
    if ($paket == 'Paket Intensif SBMPTN') {
        $hargaPaket = 500000;
    } else if ($paket == 'Paket Reguler') {
        $hargaPaket = 750000;
    } else if ($paket == 'Paket Supercamp SBMPTN') {
        $hargaPaket = 1000000;
    } else {
        $hargaPaket = 0;
    } 

    // echo($hargaPaket);
    // echo("<br>");

    $fasilitas = $_POST['fasilitas'] ?? [];
    // print_r($fasilitas);
    // echo("<br>");
    if (!empty($fasilitas)) {
        $fasilitasGabungan = implode(', ', $fasilitas);
    } else {
        $fasilitasGabungan = '-';
    }
    // echo($fasilitasGabungan);
    // echo("<br>");
    
    $hargaFasilitas = [
        'Modul Cetak Lengkap' => 50000,
        'Modul PDF' => 25000,
        'Video Rekaman Kelas' => 75000,
        'Grup Diskusi Telegram' => 40000,
    ];
    
    $totalFasilitas = 0;
    foreach ($fasilitas as $item) {
        if (isset($hargaFasilitas[$item])) {
            // echo($hargaFasilitas[$item]);
            $totalFasilitas += $hargaFasilitas[$item];
        }
    }
    // echo($totalFasilitas);
    // echo("<br>");

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
    
    // echo($hargaCabang);
    // echo("<br>");

    $bayar = $_POST['metodeBayar'];
    if ($bayar == 'Transfer Bank') {
        $biayaAdmin = 3000;
    } else if ($bayar == 'E-Wallet') {
        $biayaAdmin = 2000;
    } else if ($bayar = 'Tunai') {
        $biayaAdmin = 0;
    }
    // echo($biayaAdmin);
    // echo("<br>");

    $subtotal = $hargaPaket + $hargaCabang + $totalFasilitas;
    
    // echo($subtotal);
    // echo("<br>");

    if ($paket != "Undefined") {
        $pajak = 0.10 * $subtotal;
    } else {
        $pajak = 0;
    }
    $totalBayar = $subtotal + $pajak + $biayaAdmin;
 
    $note = !empty($_POST['note']) ? $_POST['note'] : '-';

    $sql = "UPDATE pendaftar SET 
                    nama = '$nama', email = '$email', paket = '$paket', fasilitas = '$fasilitasGabungan', lokasi = '$cabang', metode_pembayaran = '$bayar', catatan = '$note', harga_paket = '$hargaPaket', harga_cabang = '$hargaCabang', total_fasilitas = '$totalFasilitas', pajak = '$pajak', biaya_admin = '$biayaAdmin', total_bayar = '$totalBayar'
                    WHERE id = '$id'";
    // $sql = "INSERT INTO pendaftar (nama, email, paket, fasilitas, lokasi, metode_pembayaran, catatan, harga_paket, harga_cabang, total_fasilitas, subtotal, pajak, biaya_admin, total_bayar, tanggal_daftar)
    //         VALUES ('$nama', '$email', '$paket', '$fasilitasGabungan', '$cabang', '$bayar', '$note', '$hargaPaket', '$hargaCabang', '$totalFasilitas', '$subtotal', '$pajak', '$biayaAdmin', '$totalBayar', NOW())";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        header('Location: ../index.php?status=updateSuccess');
    } else {
        header('Location: ../index.php?status=updateFailed');
    }
?>