<?php
$data = $this->session->userdata("nama");
$data2 = $this->session->userdata("akses");

if (!isset($data)) {
    redirect('login');
} else if ($data2 == "Kasir") {
    redirect('kasir');
}
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url() ?>barang/add" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>Kode Kategori</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($barang as $item) {
                            ?>
                            <tr>
                                <td><?= $item->id_barang ?></td>
                                <td><?= $item->id_kategori ?></td>
                                <td><?= $item->id_merk ?></td>
                                <td><?= $item->nama_barang ?></td>
                                <td><?= $item->stok_real ?></td>
                                <td><?= $item->harga ?></td>
                                <td><img width="70" height="70" src="uploads/<?= $item->foto ?>" alt=""></td>
                                <td>
                                    <a href="<?php echo base_url() . 'barang/edit'; ?>/<?= $item->id_barang ?>" class="btn btn-success">Edit</a>
                                    <a href="<?php echo base_url() . 'barang/hapus'; ?>/<?php echo $item->id_barang ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>