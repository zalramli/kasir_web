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
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <a href="<?= base_url() . 'transaksi'; ?>" class="btn btn-primary">Kembali</a>
            <center>
                <h2>Detail Transaksi</h2>
            </center>
            <?php
            foreach ($transaksi as $items)
                ?>
            <?php
        foreach ($count as $itemss)
            ?>
            <table class="table table-borderless">
                <tr>
                    <th>Pelanggan : <?= $items->nama_pelanggan ?></th>
                    <th>Kasir : <?= $items->nama_pegawai ?></th>

                </tr>
                <tr>
                    <th>Tanggal : <?= TanggalIndo($items->tanggal) ?></th>
                    <th>Jumlah Barang : <?= $itemss->jumlah_barang ?></th>

                </tr>
            </table>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAMA BARANG</th>
                        <th scope="col">QTY</th>
                        <th style="text-align:center" scope="col">HARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($detail as $item) {
                        ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $item->nama_barang ?></td>
                            <td><?= $item->qty ?></td>
                            <td style="text-align:right"><?= format_ribuan($item->total_hrg) ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <th>TOTAL</th>
                        <th style="text-align:right"><?= format_ribuan($items->total_harga) ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>