<?php
$data = $this->session->userdata("nama");
$data2 = $this->session->userdata("akses");

if (!isset($data)) {
    redirect('login');
} else if ($data2 == "Kasir") {
    redirect('kasir');
}
function TanggalIndo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
    return ($result);
}
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pemesanan</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tgl Pesan</th>
                            <th>Tgl Tenggak</th>
                            <th>No Hp</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pemesanan as $item) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item->nama_pelanggan ?></td>
                                <td><?= TanggalIndo($item->tanggal_pesan) ?></td>
                                <td><?= TanggalIndo($item->tanggal_tenggang) ?></td>
                                <td><?= $item->no_hp ?></td>
                                <td><a href="<?= base_url() . 'pemesanan/detailPemesanan' ?>/<?= $item->id_pemesanan ?>" class="btn btn-primary">Detail</a></td>
                            </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>