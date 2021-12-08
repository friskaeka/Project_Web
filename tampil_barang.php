<!DOCTYPE html>
<html>
<head>
	<title>Barang</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style type="text/css">
		table {
  font-family: Times New Roman, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px  #fff;
  background color: ;
  border: #ccc 1px solid;
}

table th {
  padding: 10px 10px;
  border-top: 1px solid #e0e0e0;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
}

table th:first-child{  
  border-left:none;  
}

table tr {
  text-align: center;
  padding-left: 10px;
}

table td:first-child {
  text-align: left;
  padding-left: 10px;
  border-left: 0;
}

table td {
  padding: 10px 10px;
  border-top: 1px solid #e0e0e0;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb));
}
	</style>
</head>
<body>
	<table cellspacing='2' align="center">
		<tr>
			<td>No.</td>
			<td>Kode Barang</td>
      <td>Nama</td>
      <td>Stok</td>
			<td>Harga</td>
			<td>Kategori</td>
			<td>Diskon</td>
			<td>gambar</td>
			<td>
				<a href="login_pemasok.php" class="btn btn-primary">Logout </a>
			
			</td>
		</tr>
		<?php
		$host ='localhost';
	    $user = 'root';
	    $password ='';
	    $database ='tokosnack';
	    $i=1;
	    $link = mysqli_connect($host,$user,$password,$database);
	    $query="select *from barang";
	    $result = mysqli_query($link,$query);
	    while ($tampung=mysqli_fetch_object($result)){
      ?>
 	 <tbody>
    <tr>
      <th scope="row"><?=$i++;?>.</th>
      <td><?=$tampung->kode_barang?></td>
      <td><?=$tampung->nama_barang?></td>
      <td><?=$tampung->stok?></td>
      <td><?=$tampung->harga?></td>
      <td><?=$tampung->kategori?></td>
      <td><?=$tampung->diskon?></td>
      <td><img src="<?="img/".$tampung->gambar?>" alt="Snack" width="100"></td>
       <td>
      		<a href="edit_barang.php?kode_barang=<?=$tampung->kode_barang?>" class="btn btn-primary">Edit</a>
      		<a href="hapus_barang.php?kode_barang=<?=$tampung->kode_barang?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php
  	}
    ?>
	</tbody>
	</table>

</body>
</html>