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
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
    </div>
    <div class="container-fluid">
        <form class="" method="post" action="<?php echo base_url() . 'barang/store'; ?>" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1">ID Barang</label>
                    <input type="text" name="id_barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan ID" value="<?= $kode ?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">

                    <label for="exampleInputEmail1">Nama Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <?php foreach ($kategori as $data) {
                            ?>
                            <option value="<?php echo $data->id_kategori ?>"><?php echo $data->nama_kategori ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1">Merk</label>
                    <select name="id_merk" class="form-control">
                        <?php foreach ($merk as $item) {
                            ?>
                            <option value="<?php echo $item->id_merk ?>"><?php echo $item->nama_merk ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">

                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama">
                </div>

            </div>
            <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="text" name="stok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan ID">
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">

                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama">
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">

                    <label for="exampleInputEmail1">Foto</label>
                    <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama">
                </div>

            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="15"></textarea>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url() . 'kategori'; ?>" class="btn btn-danger">Kembali</a>
        </form>
    </div>
</div>