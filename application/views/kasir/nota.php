<?php
$data = $this->session->userdata("nama");
if (!isset($data)) {
    redirect('login');
}
?>
<?php
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
foreach ($data_transaksi as $transaksi) {
    $id_transaksi = $transaksi->id_transaksi;
    $tanggal = $transaksi->tanggal;
    $kasir = $transaksi->nama_pegawai;
    $pelanggan = $transaksi->nama_pelanggan;
    $total = $transaksi->total_harga;
} ?>
<table width="100%" style="border-collapse: collapse;">
    <tr>
        <td width="15%"></td>
        <td width="2%"></td>
        <td width="10%"></td>
        <td width="40%"></td>
        <td width="25%">
            <h2><b>LCC Computer</b></h2>
        </td>
    </tr>
    <tr>
        <td width="15%">
            <h5>No. Transaksi</h5>
        </td>
        <td width="2%"> : </td>
        <td width="10%">
            <h5 style="font-weight:normal"><?= $id_transaksi ?></h5>
        </td>
        <td width="40%"></td>
        <td width="25%">
            <h5 style="font-weight:normal">Jln Alun-alun timur no 9</h5>
        </td>
    </tr>
    <tr>
        <td width="15%">
            <h5>Tanggal</h5>
        </td>
        <td width="2%"> : </td>
        <td width="10%">
            <h5 style="font-weight:normal"><?= $tanggal ?></h5>
        </td>
        <td width="40%"></td>
        <td width="25%">
            <h5 style="font-weight:normal">HP. 0822223234</h5>
        </td>
    </tr>
    <tr>
        <td width="15%">
            <h5>Kasir</h5>
        </td>
        <td width="2%"> : </td>
        <td width="25%">
            <h5 style="font-weight:normal"><?= $kasir ?></h5>
        </td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid black;" width="15%">
            <h5>Pelanggan</h5>
        </td>
        <td style="border-bottom: 1px solid black;" width="2%"> : </td>
        <td style="border-bottom: 1px solid black;" width="10%">
            <h5 style="font-weight:normal">Suprahhh</h5>
        </td>
        <td style="border-bottom: 1px solid black;" width="40%"></td>
        <td style="border-bottom: 1px solid black;" width="25%">
            <h5 style="font-weight:normal"></h5>
        </td>
    </tr><br>

</table><br>
<table width="100%" style="border-collapse:collapse">
    <tr>
        <td style="text-align:center" width="4%">
            <h5 style="font-weight:normal">No. </h5>
        </td>
        <td width=15%>
            <h5 style="font-weight:normal">Kategori </h5>
        </td>
        <td width=35%>
            <h5 style="font-weight:normal">Nama Barang </h5>
        </td>
        <td width="6%">
            <h5 style="font-weight:normal">Banyak </h5>
        </td>
        <td style="text-align:center" width="20%">
            <h5 style=" font-weight:normal">Harga Satuan </h5>
        </td>
        <td style="text-align:center" width="20%">
            <h5 style="font-weight:normal">Jumlah </h5>
        </td>
    </tr>
    <?php
    $no = 1;
    foreach ($detail_transaksi as $detail) {  ?>
        <tr>
            <td style="text-align:center" width="4%">
                <h5 style="font-weight:normal"><?= $no++ ?>. </h5>
            </td>
            <td width=15%>
                <h5 style="font-weight:normal">
                    <?= $detail->nama_kategori ?>
                </h5>
            </td>
            <td width=35%>
                <h5 style="font-weight:normal"><?= $detail->nama_merk . " " . $detail->nama_barang ?> </h5>
            </td>
            <td style="text-align:center" width="6%">
                <h5 style="font-weight:normal"><?= $detail->qty ?> </h5>
            </td>
            <td style="text-align:right" width="20%">
                <h5 style=" font-weight:normal">
                    <?= format_ribuan($detail->harga) ?>
                </h5>
            </td>
            <td style="text-align:right" width="20%">
                <h5 style="font-weight:normal">
                    <?= format_ribuan($detail->harga * $detail->qty) ?>
                </h5>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td style="border-bottom: 1px solid black;" width="4%">

        </td>
        <td style="border-bottom: 1px solid black;" width=15%>
        </td>
        <td style="border-bottom: 1px solid black;" width=35%>
        </td>
        <td style="border-bottom: 1px solid black;text-align:center" width="5%">
        </td>
        <td style="border-bottom: 1px solid black; text-align:right" width="20%">
        </td>
        <td style="border-bottom: 1px solid black;text-align:right" width="20%">
        </td>
    </tr><br><br><br>
    <tr>
        <td style="border-bottom: 1px solid black;" width="4%"></td>
        <td style="border-bottom: 1px solid black;" width=15%></td>
        <td style="border-bottom: 1px solid black;" width=35%>
        </td>
        <td style="border-bottom: 1px solid black; text-align:center" width="6%">
        </td>
        <td style="border-bottom: 1px solid black; text-align:right" width="20%">
            <h5 style=" font-weight:normal"><b>TOTAL</b> </h5>
        </td>
        <td style="border-bottom: 1px solid black; text-align:right" width="20%">
            <h5 style="font-weight:normal"><b><?= format_ribuan($total) ?></b> </h5>
        </td>
    </tr>
</table><br><br>
<table width="100%">
    <tr>
        <td width="5%"></td>
        <td style="text-align:center">
            <h5 style="font-weight:normal">Pelanggan </h5>
        </td>
        <td style="text-align:center">
            <h5 style="font-weight:normal">Hormat Kami,</h5>
        </td>
    </tr>
    <tr>
        <td width="5%"></td>
        <td style="text-align:center"></td>
        <td></td>
    </tr><br><br><br><br>
    <tr>
        <td width="5%"></td>
        <td style="text-align:center">
            <h5 style="font-weight:normal"><?= $pelanggan ?></h5>
        </td>
        <td style="text-align:center">
            <h5 style="font-weight:normal">Pegawai, <?= $kasir  ?></h5>
        </td>
    </tr>
</table>