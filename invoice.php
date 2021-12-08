<?php
    session_start();
      $host ='localhost';
      $user = 'root';
      $password ='';
      $database ='tokosnack';
      $i=0;    
      $id_pembeli=$_SESSION['id_pembeli']; 
      $link = mysqli_connect($host,$user,$password,$database);
      $query="SELECT *FROM struk JOIN barang ON struk.kode_barang=barang.kode_barang JOIN pembeli ON struk.id_pembeli= pembeli.id_pembeli WHERE struk.id_pembeli='$id_pembeli'";
      $result = mysqli_query($link,$query);
      $row= mysqli_fetch_object($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    </html><link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style type="text/css">
    .invoice {
    position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 10px 25px;
}
.page-header {
    margin: 10px 0 20px 0;
    font-size: 22px;
}
    </style>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<section class="content content_content" style="width: 70%; margin: auto;">
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> 
                                    <small class="pull-right"><?= date("l jS \of F Y h:i:s A");?></small>
                                </h2>
                            </div><!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                    
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                             <th>Harga</th>
                                             <th>Diskon</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php
                                    $totalsub=0;
                                    $query2="SELECT *FROM struk JOIN barang ON struk.kode_barang=barang.kode_barang JOIN pembeli ON struk.id_pembeli= pembeli.id_pembeli WHERE struk.id_pembeli='$id_pembeli'";
                                     $result2 = mysqli_query($link,$query2);
                                    while($row2=mysqli_fetch_object($result2)){
                                        ?>
                                          <tr>
                                            <th>Produk</th>
                                               <td><?=$row2->nama_barang?></td> </tr>
                                            <td><?=$row2->harga?></td>
                                            <td><?=$totalbiaya=$row2->harga-$row2->diskon?></td>
                                        
                                        <?php
                                        $totalsub=$totalsub+$totalbiaya;
                                    }
                                    ?> 

</tbody>
                                </table>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            
                                            
                                            <tr>
                                                <th>Total:</th>
                                                <td><?=$totalsub?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="hapus_struk.php" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                            </div>
                        </div>
                    </section>
                </section>
</body>


