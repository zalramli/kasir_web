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
            <a href="<?= base_url() . 'pemesanan'; ?>" class="btn btn-primary">Kembali</a>
            <center>
                <h2>Detail Pesanan</h2>
            </center>
            <?php
            foreach ($pelanggan as $items) {
                ?>
                <h5>Nama pemesan : <?= $items->nama_pelanggan ?></h5>
                <h5>Tanggal pesan &nbsp&nbsp: <?= TanggalIndo($items->tanggal_pesan) ?> - <?= TanggalIndo($items->tanggal_pesan) ?></h5>
            <?php } ?>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Merk</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($detail as $item) {
                        ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $item->nama_kategori ?></td>
                            <td><?= $item->nama_merk ?></td>
                            <td><?= $item->nama_barang ?></td>
                            <td><?= $item->jumlah ?></td>
                            <td style="text-align:right"><?= format_ribuan($item->jumlah * $item->harga) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>