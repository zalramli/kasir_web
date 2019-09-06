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
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() . 'kasir' ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php
                foreach ($jumlah as $jumlas)
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() . 'kasir/pemesanan' ?>">Pemesanan <span class="badge badge-danger badge-counter"> <?= $jumlas->counts ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url() . 'kasir/cart' ?>">Cart <span class="badge badge-danger badge-counter"> <?= count($this->cart->contents()); ?></span></a>
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
    <form action="<?php echo base_url() ?>kasir/ubah_cart" method="post" name="frmShopping" enctype="multipart/form-data">
        <?php
        if ($cart = $this->cart->contents()) {
            ?>
            <div class="container mt-3">
                <div class="row">
                    <a style="color:white;" href="<?php echo base_url() ?>kasir/check_out" class='btn btn-lg btn-primary'>Proses</a><br>
                    <table width="100%" class="table mt-3">
                        <thead class="">
                            <tr>
                                <th width="3%" scope="col">No</th>
                                <th width="15%" scope="col">Foto</th>
                                <th width="30%" scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th width="7%" scope="col">Qty</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $grand_total = 0;
                            $i = 1;
                            foreach ($cart as $item) {
                                $grand_total = $grand_total + $item['subtotal'];

                                ?>
                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][id]" value="<?php echo $item['id']; ?>" />
                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][rowid]" value="<?php echo $item['rowid']; ?>" />
                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][name]" value="<?php echo $item['name']; ?>" />
                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][price]" value="<?php echo $item['price']; ?>" />
                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][foto]" value="<?php echo $item['foto']; ?>" />
                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" />
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><img width="80" height="80" class="img-responsive" src="<?php echo base_url() . 'uploads/' . $item['foto']; ?>" /></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= number_format($item['price'], 0, ",", "."); ?></td>
                                    <td><input type="text" class="form-control input-sm" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" /></td>
                                    <td><?php echo number_format($item['subtotal'], 0, ",", ".") ?></td>
                                    <td><a href="<?php echo base_url() ?>kasir/hapusCart/<?php echo $item['rowid']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"><b>Order Total: Rp <?php echo number_format($grand_total, 0, ",", "."); ?></b></td>
                                <td colspan="4" align="right">
                                    <button class='btn btn-sm btn-success' type="submit">Update Cart</button>
                                    <a style="color:white;" data-toggle="modal" data-target="#myModal" class='btn btn-sm btn-danger'>Kosongkan Cart</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php
            } else {
                echo "
            <div class='container mt-3'>
            <div class='row'>
            <h3>Keranjang Belanja masih kosong</h3>
            </div>
            </div>
            ";
            }
            ?>
    </form>

    </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" action="<?php echo base_url() ?>kasir/hapusCart/all">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda yakin mau mengosongkan Shopping Cart?

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-sm btn-default">Ya</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>