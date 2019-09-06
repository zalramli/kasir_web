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
        <h1 class="h3 mb-0 text-gray-800">Edit Akun</h1>
    </div>
    <div class="container-fluid">
        <?php foreach ($ak as $key) { ?>


            <form class="" method="post" action="<?php base_url() . 'akun/update'; ?>">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="exampleInputEmail1">Kode Akun</label>
                        <input type="text" name="id_akun" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $key->id_akun ?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">

                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $key->username ?>">
                        <small class="form-text text-danger"><?php echo form_error('username'); ?></small>

                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">

                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $key->password ?>">
                        <small class="form-text text-danger"><?php echo form_error('password'); ?></small>

                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">

                        <label for="Akses">Akses</label>
                        <select name="Akses" class="form-control">
                            <option value="" disabled>--Pilih--</option>
                            <option value="Manajer" <?php {
                                                        echo "Selected";
                                                    } ?>>Manajer</option>
                            <option value="Owner" <?php {
                                                        echo "Selected";
                                                    } ?>>Owner</option>
                            <option value="Operator" <?php {
                                                            echo "Selected";
                                                        } ?>>Operator</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">

                        <label for="id_user">Nama Pegawai</label>
                        <select name="id_user" class="form-control">
                            <option value="" disabled="">--Pilih--</option>
                            <?php foreach ($peg as $temp) { ?>
                                <option value="<?php echo $temp->id_pegawai ?>" <?php if ($temp->id_pegawai == $key->id_user) {
                                                                                    echo "Selected";
                                                                                } ?>><?php echo $temp->nama_pegawai ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() . 'akun'; ?>" class="btn btn-danger">Kembali</a>
            </form>
        <?php } ?>
    </div>
</div>