<?php
$data = $this->session->userdata("nama");
$data2 = $this->session->userdata("akses");

if (!isset($data)) {
    redirect('login');
} else if ($data2 == "Kasir") {
    redirect('kasir');
}
function format_ribuan($angka)
{
    $hasil_rupiah = number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
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
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form target="_blank" method="post" action="<?php echo base_url() . 'transaksi/print'; ?>">
                <input type="date" name="tgl_awal"> 
                <input type="date" name="tgl_akhir"> &nbsp;&nbsp;&nbsp;&nbsp;
                <button style="height:40px; margin-bottom: 3px;" class="btn btn-success"><i class="fa fa-print" style="color:white;"> </i></button>
            </form><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>Kode</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total Belanjaa</th>
                            <th>Kasir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($transaksi as $item) {
                            ?>
                            <tr>
                                <td><?= $item->id_transaksi ?></td>
                                <td><?= $item->nama_pelanggan ?></td>
                                <td><?= TanggalIndo($item->tanggal) ?></td>
                                <td style="text-align:right"><?= format_ribuan($item->total_harga) ?></td>
                                <td><?= $item->nama_pegawai ?></td>
                                <td style="text-align:center;">
                                    <a href="<?= base_url() . 'transaksi/detail'; ?>/<?= $item->id_transaksi ?>" class="btn btn-warning">Detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>