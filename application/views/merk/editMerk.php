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
        <h1 class="h3 mb-0 text-gray-800">Edit Merk</h1>
    </div>
    <div class="container-fluid">
        <?php foreach ($merk as $item) { ?>
            <form class="" method="post" action="<?php base_url() . 'merk/update'; ?>">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="exampleInputEmail1">ID Merk</label>
                        <input type="text" name="id_merk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $item->id_merk ?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="exampleInputEmail1">Nama Merk</label>
                        <input type="text" name="nama_merk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $item->nama_merk ?>">
                        <small class="form-text text-danger"><?php echo form_error('nama_merk'); ?></small>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo base_url() . 'merk'; ?>" class="btn btn-danger">Batal</a>
            </form>
        <?php } ?>
    </div>
</div>