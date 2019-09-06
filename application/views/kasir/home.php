<?php
$data = $this->session->userdata("nama");
if (!isset($data)) {
    redirect('login');
}
function format_ribuan($nilai)
{
    $n = number_format($nilai, 0, ',', ',');
    $m = "" . $n;
    return $m;
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

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <title>Hello, world!</title>
</head>
<style>
    .kotak {
        padding: 10px;
        border: 1px solid #e8e8e8;
        margin-bottom: 15px;
        background: #F4F4F4;
        border-radius: 5px;
    }
</style>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">NAMA TOKO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link active" href="<?= base_url() . 'kasir' ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php
                foreach ($jumlah as $jumlas)
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() . 'kasir/pemesanan' ?>">Pemesanan <span class="badge badge-danger badge-counter"> <?= $jumlas->counts ?></span></a>
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
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-7">
                <div class="row">
                        <?php
                        foreach ($produk as $item) {
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="kotak">
                                    <form action="<?php echo base_url(); ?>kasir/tambah" method="post">
                                        <img class="img-thumbnail card-img-top" src="<?= $item['foto'] ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title text-center"><?= $item['nama_barang'] ?></h5>
                                            <p class="card-text">
                                                <h5 class="text-primary">Rp. <?= format_ribuan($item['harga']) ?> </h5>
                                            </p>
                                            <div class="text-center">
                                                <input type="hidden" name="id" value="<?php echo $item['id_barang']; ?>" />
                                                <input type="hidden" name="name" value="<?php echo $item['nama_barang']; ?>" />
                                                <input type="hidden" name="price" value="<?php echo $item['harga']; ?>" />
                                                <input type="hidden" name="foto" value="<?php echo $item['foto']; ?>" />
                                                <input type="hidden" name="qty" value="1" />
                                                <?php
                                                if ($item['stok_real'] == 0) {
                                                    echo "<a style='text-decoration:none;' href='' class='btn btn-sm btn-dark'><i class='fas fa-search '></i>  Detail</a>
                                                    <a style='text-decoration:none;' href='' class='btn btn-sm btn-danger'><i class='fas fa-exclamation-circle '></i>  Habis</a>";
                                                } else {
                                                    echo "
                                                    <a style='text-decoration:none;' href='' class='btn btn-sm btn-dark'><i class='fas fa-search '></i>  Detail</a>
                                                    <button style='color:white;' type='submit' class='btn btn-sm btn-warning'><i class='fas fa-shopping-cart '></i> Beli</button>";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        <?php
                    } ?>

                    </div>
                </div>
            <div class="col-5">
                <div class="list-group">
                            <a style="text-decoration:none;" href="<?php echo base_url() ?>kasir/cart" class="list-group-item list-group-item-dark"><strong><i class="fas fa-shopping-cart"></i> KERANJANG BELANJA</strong></a>
                            <form action="<?php echo base_url() ?>kasir/ubah_cart" method="post" name="frmShopping" enctype="multipart/form-data">
                            <?php
                            $cart = $this->cart->contents();

                            // If cart is empty, this will show below message.
                            if ($cart = $this->cart->contents()) {
                                ?>
                                <table width="100%" class="table table-sm">
                            <thead class="">
                            <tr>
                                <th style="text-align: center;" width="1%">No</th>
                                <th style="text-align: center;" width="53%">Nama</th>
                                <th style="text-align: center;" width="20%">Jumlah</th>
                                <th style="text-align: center;" width="25%">Total</th>
                                <th style="text-align: center;" width="1%">Hapus</th>
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
                                    <td><?= $i++ ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><input style="text-align: center;" type="text" class="form-control input-sm" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" /></td>
                                    <td style="text-align: right;"><?php echo number_format($item['subtotal'], 0, ",", ".") ?></td>
                                    <td style="text-align: center;"><a href="<?php echo base_url() ?>kasir/hapusCart/<?php echo $item['rowid']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </form>

                            <?php
                        } else {
                            echo '<a class="list-group-item">Keranjang Belanja Kosong</a>';
                        }
                        ?>
                        </div>
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
            
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>