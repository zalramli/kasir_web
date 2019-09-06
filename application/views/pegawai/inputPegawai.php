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
        <h1 class="h3 mb-0 text-gray-800">Tambah Pegawai</h1>
    </div>
    <div class="container-fluid">
        <form class="" method="post" action="<?php base_url() . 'pegawai/aksiAdd'; ?>">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1">ID Pegawai</label>
                    <input type="text" name="id_pegawai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $kode ?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">

                    <label for="exampleInputEmail1">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama">
                    <small class="form-text text-danger"><?php echo form_error('nama_pegawai'); ?></small>

                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">

                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" aria-describedby="emailHelp" placeholder="Masukan alamat"></textarea>
                    <small class="form-text text-danger"><?php echo form_error('alamat'); ?></small>

                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">

                    <label for="nohp">Nomor HP</label>
                    <input type="number" name="no_hp" class="form-control" id="nohp" aria-describedby="emailHelp" placeholder="Masukan Nomor HP">
                    <small class="form-text text-danger"><?php echo form_error('no_hp'); ?></small>


                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">

                    <label for="jabatan">Jabatan</label>
                    <select name="id_jabatan" class="form-control" id="jabatan">
                        <option value="">--Pilih--</option>
                        <?php foreach ($jabatan as $temp) { ?>
                            <option value="<?php echo $temp->id_jabatan ?>"><?php echo $temp->nama_jabatan ?>
                            </option>
                        <?php } ?>
                    </select>


                </div>

            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url() . 'pegawai'; ?>" class="btn btn-danger">Kembali</a>
        </form>
    </div>
</div>