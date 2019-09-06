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
        <h1 class="h3 mb-0 text-gray-800">Tambah Jabatan</h1>
    </div>
    <div class="container-fluid">
        <form class="" method="post" action="<?php base_url() . 'jabatan/aksiAdd'; ?>">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1">ID jabatan</label>
                    <input type="text" name="id_jabatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $kode ?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">

                    <label for="exampleInputEmail1">Nama jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama">
                    <small class="form-text text-danger"><?php echo form_error('nama_jabatan'); ?></small>

                </div>

            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url() . 'jabatan'; ?>" class="btn btn-danger">Kembali</a>
        </form>
    </div>
</div>