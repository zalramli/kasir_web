<?php
$data = $this->session->userdata("nama");
if (!isset($data)) {
    redirect('login');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">NAMA TOKO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() . 'kasir' ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php
                foreach ($jumlah as $jumlas)
                    ?>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url() . 'kasir/pemesanan' ?>">Pemesanan <span class="badge badge-danger badge-counter"> <?= $jumlas->counts ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() . 'kasir/cart' ?>">Cart <span class="badge badge-danger badge-counter"> <?= count($this->cart->contents()); ?></span></a>
                </li>

            </ul>
            <span style="margin-right:400px" class="navbar-text text-white">
                Kasir : <?php echo $this->session->userdata("nama"); ?>
            </span>
            <span class="navbar-text text-white">
                <a href="<?php echo base_url() . 'welcome/logout'; ?>">Logout</a>
            </span>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row ">
            <div class="col-4">
                <div class="list-group">
                    <a class="list-group-item list-group-item-dark"><strong>KATEGORI</strong></a>
                    <a style="text-decoration:none;color:black;" href="<?php echo base_url() ?>kasir/" class="list-group-item">Semua</a>
                    <?php
                    foreach ($kategori as $row) {
                        ?>
                        <a style="text-decoration:none;color:black;" href="<?php echo base_url() ?>kasir/index/<?php echo $row['id_kategori']; ?>" class="list-group-item"><?php echo $row['nama_kategori']; ?></a>
                    <?php
                }
                ?>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="list-group">
                            <a style="text-decoration:none;" href="<?php echo base_url() ?>kasir/cart" class="list-group-item list-group-item-dark"><strong><i class="fas fa-shopping-cart"></i> KERANJANG BELANJA</strong></a>
                            <?php

                            $cart = $this->cart->contents();

                            // If cart is empty, this will show below message.
                            if (empty($cart)) {
                                ?>
                                <a class="list-group-item">Keranjang Belanja Kosong</a>
                            <?php
                        } else {
                            echo "<table width='100%' class='table'>";

                            $grand_total = 0;
                            foreach ($cart as $item) {
                                $grand_total += $item['subtotal'];
                                ?>

                                    <tr>
                                        <td width="55%"><?php echo $item['name']; ?></td>
                                        <td width="10%"><?php echo $item['qty']; ?></td>
                                        <td width="35%" align="right"><?php echo number_format($item['subtotal'], 0, ",", "."); ?></td>
                                    </tr>
                                <?php
                            }
                            ?>

                            <?php
                        }
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    $grand_total = 0;
                                    $cart = $this->cart->contents();
                                    foreach ($cart as $item) {
                                        $grand_total += $item['subtotal'];
                                    };
                                    if ($grand_total == 0) {
                                        echo "";
                                    } else {
                                        $totals = number_format($grand_total, 0, ",", ".");
                                        echo "<td colspan='4' align='right'>" . "Rp " . $totals . "</td>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <?php
                $grand_total = 0;
                if ($cart = $this->cart->contents()) {
                    foreach ($cart as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                        $id_pelanggan = $item['pelanggan'];
                    }
                    
                     echo '<center>TOTAL BELANJA <input type="text" id="total" onkeyup="hitung2();" onkeyup="return isNumberKey(event)" class="form-control"value="'.$grand_total.'" readonly></center><br>';
                    if ($id_pelanggan != "kosong") {
                        ?>
                        <div class="row">
                            <div class="col-md-6">

                                <center>
                                    <h2>Pembayaran</h2>
                                </center>

                                <form class="form-horizontal" action="<?php echo base_url() ?>kasir/prosesPemesananAkhir" method="post" name="frmCO" id="frmCO">
                                    <div class="form-group  has-success has-feedback">
                                        <label class="control-label col-xs-3" for="lastName">Bayar :</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="bayar" id="bayar" onkeyup="hitung2();" required=""  onkeyup="return isNumberKey(event)"placeholder="Pembayaran">
                                        </div>
                                    </div>
                                    <div class="form-group  has-success has-feedback">
                                        <label class="control-label col-xs-3" for="lastName">Kembalian :</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="kembalian" id="kembalian" value="" readonly>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-md-6">
                                <h2>Biodata Pelanggan</h2>
                                <input type="hidden" class="form-control" name="id_pelanggan" id="email" placeholder="Email" value="<?= $id_pelanggan ?>">
                                <input type="hidden" class="form-control" name="id_transaksi" id="email" placeholder="Email" value="<?= $transaksi ?>">
                                <input type="hidden" class="form-control" name="id_pemesanan" id="email" placeholder="Email" value="<?= $pemesanan[0]['id_pemesanan'] ?>">
                                <input name="id_pegawai" type="hidden" value="<?php echo $this->session->userdata("pegawai"); ?>">

                                <div class="form-group  has-success has-feedback">
                                    <label class="control-label col-xs-3" for="inputEmail">Nama :</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" name="nama" id="email" placeholder="Nama" value="<?= $data_pelanggan[0]['nama_pelanggan'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group  has-success has-feedback">
                                    <label class="control-label col-xs-3" for="firstName">Email :</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" name="email" id="nama" placeholder="Email Lengkap" value="<?= $data_pelanggan[0]['email'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group  has-success has-feedback">
                                    <label class="control-label col-xs-3" for="lastName">Alamat :</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?= $data_pelanggan[0]['alamat'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group  has-success has-feedback">
                                    <label class="control-label col-xs-3" for="phoneNumber">Telp :</label>
                                    <div class="col-xs-9">
                                        <input type="tel" class="form-control" name="telp" id="telp" placeholder="No Telp" value="<?= $data_pelanggan[0]['no_hp'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group  has-success has-feedback">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>
                    <?php
                } else {

                    ?>
                        <div class="row">
                            <div class="col-md-5">
                                <center>
                                    <h2>Pembayaran</h2>
                                </center>
                                <form class="form-horizontal" action="<?php echo base_url() ?>kasir/proses_transaksi" method="post" name="frmCO" id="frmCO">
                                    <div class="form-group  has-success has-feedback">
                                        <label class="control-label col-xs-3" for="lastName">Bayar :</label>
                                        <div class="col-xs-9">
                                            <input id="bayar" type="text" class="form-control" name="bayar" placeholder="Pembayaran">
                                        </div>
                                    </div>
                                    <div class="form-group  has-success has-feedback">
                                        <label id="kembalian" class="control-label col-xs-3" for="lastName">Kembalian :</label>
                                        <div class="col-xs-9">
                                            <input type="text"id="kembalian" class="form-control" name="kembalian" value="" id="alamat" readonly>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-7">
                                <h2>Biodata Pelanggan</h2>
                                <input type="hidden" class="form-control" name="id_pelanggan" id="email" placeholder="Email" value="<?= $pelanggan ?>">
                                <input type="hidden" class="form-control" name="id_transaksi" id="email" placeholder="Email" value="<?= $transaksi ?>">
                                <input name="id_pegawai" type="hidden" value="<?php echo $this->session->userdata("pegawai"); ?>">
                                <div class="form-group  has-success has-feedback">
                                    <label class="control-label col-xs-3" for="inputEmail">Nama :</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" name="nama" id="email" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group  has-success has-feedback">
                                    <label class="control-label col-xs-3" for="firstName">Email :</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" name="email" id="nama" placeholder="Email Lengkap">
                                    </div>
                                </div>
                                <div class="form-group  has-success has-feedback">
                                    <label class="control-label col-xs-3" for="lastName">Alamat :</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="form-group  has-success has-feedback">
                                    <label class="control-label col-xs-3" for="phoneNumber">Telp :</label>
                                    <div class="col-xs-9">
                                        <input type="tel" class="form-control" name="telp" id="telp" placeholder="No Telp">
                                    </div>
                                </div>

                                <div class="form-group  has-success has-feedback">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    <?php } ?>
                <?php

            } else {
                echo "<h5>Shopping Cart masih kosong</h5>";
            }
            ?>
            </div>
        </div>
    </div>
    </div>

<script type="text/javascript">
    function hitung2() {
var a = $("#total").val();
var b = $("#bayar").val();
c = b - a;
$("#kembalian").val(c);
}
function isNumberKey(evt){
 var charCode = (evt.which) ? evt.which : event.keyCode;
 if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 return true;
}
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>