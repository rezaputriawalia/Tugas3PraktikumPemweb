const urlParams = new URLSearchParams(window.location.search);
const statusParam = urlParams.get('status');
// console.log(statusParam);

var pesanBerhasil;
var pesanGagal;

if (statusParam === 'success') {
    pesanBerhasil = "Berhasil menambahkan data!";
} else if (statusParam === "updateSuccess") {
    pesanBerhasil = "Data berhasil diupdate!";
} else if (statusParam === "deleteSuccess") {
    pesanBerhasil = "Data berhasil dihapus!";
}

if (statusParam === "failed") {
    pesanGagal = "Terjadi kesalahan saat menambah data!"
} else if (statusParam === "updateFailed") {
    pesanGagal = "Terjadi kesalahan saat mengupdate data!"
} else if (statusParam === "deleteFailed") {
    pesanGagal = "Terjadi kesalahan saat menghapus data!"
}

// console.log(pesanBerhasil);


if (statusParam === 'success' || statusParam === 'updateSuccess' || statusParam === "deleteSuccess") {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: pesanBerhasil,
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    });
    window.history.replaceState(null, null, window.location.pathname);
} else if (statusParam === 'failed' || statusParam === 'updateFailed' || statusParam === 'deleteFailed') {
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: pesanGagal,
        confirmButtonColor: '#d33'
    });
    window.history.replaceState(null, null, window.location.pathname);
}

$(document).ready(function () {
    $('#tabelPendaftar').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50, 100],
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Tidak ada data",
            "infoFiltered": "(disaring dari _MAX_ total data)",
            "search": "Cari:"
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-hapus');

    buttons.forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            console.log('ini idnya ', id);
            

            Swal.fire({
                title: 'Yakin mau hapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                backdrop: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // kalau kamu mau arahkan ke file PHP untuk hapus:
                    window.location = `php/prosesHapus.php?id=${id}`;
                    // Swal.fire({
                    //     toast: true,
                    //     position: 'top-end',
                    //     icon: 'success',
                    //     title: 'Data berhasil dihapus!',
                    //     showConfirmButton: false,
                    //     timer: 2000,
                    //     timerProgressBar: true
                    // });

                    // atau kalau pakai AJAX:
                    /*
                    fetch(`hapus.php?id=${id}`)
                      .then(res => res.text())
                      .then(res => {
                        Swal.fire('Dihapus!', 'Data berhasil dihapus.', 'success')
                          .then(() => location.reload());
                      });
                    */
                }
            });
        });
    });
});