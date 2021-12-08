<?php
if (isset($_POST["Lanjut Pembayaran"])){
  foreach ($_POST as $key => $value) {
    ${$key}=$value;

  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pembayaran</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style type="text/css">.invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Invoice</h2><h3 class="pull-right">Order # 12345</h3>
            </div>
            <hr>
            <div class="row">
                 <?php
                    $host ='localhost';
                    $user = 'root';
                    $password ='';
                    $database ='tokosnack';
                    $kode_barang = $_GET['no'];
                    $link = mysqli_connect($host,$user,$password,$database);
                    $query="SELECT * FROM karyawan k JOIN pelayanan pl on k.id_karyawan=pl.id_karyawan JOIN pembeli p on p.no_transaksi=pl.no_transaksi";
                    $result = mysqli_query($link,$query);
                    while ($tampung=mysqli_fetch_object($result)){
                      ?>
                <div class="col-xs-6">
                    <address>
                    <strong>Billed To:</strong><br>
                        <?=$tampung->karyawan.nama?><br>
                        <?=$tampung->karyawan.alamat?><br>
                        <br>
                        <?=$tampung->karyawan.no_telp?>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                    <strong>Shipped To:</strong><br>
                        <?=$tampung->pembeli.nama?><br>
                        <?=$tampung->pembeli.alamat?><br>
                        Apt. 4B<br>
                        <?=$tampung->pembeli.no_telp?>
                    </address>
                </div>

            </div>
            <div class="row">

                <div class="col-xs-12 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        March 7, 2014<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Discount</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td><?$tampung->pelayanan.no_transaksi?></td>
                                    <td class="text-center"><?=$tampung->pelayanan.harga?></td>
                                    <td class="text-center"><?=$tampung->pelayanan.discount?></td>
                                    <td class="text-right"><?=$tampung->pelayanan.quantity?></td>
                                    <td class="text-right"><?=$tampung->pelayanan.total?></td>
                                </tr>
                                
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right"><?=$i+($tampung->pelayanan.total)?></td>
                                    <?php
                                    $total =$i+($tampung->pelayanan.total)?>;
                                    ?></td>

                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right"><?=$total?></td>
                                </tr>
                            
                            </tbody>
                        </table>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>