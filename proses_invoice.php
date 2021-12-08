<?php
	session_start();
    $host ='localhost';
    $user = 'root';
    $password ='';
    $id_pembeli= $_SESSION['id_pembeli'];
    $database ='tokosnack';
    $link = mysqli_connect($host,$user,$password,$database);

    if(isset($_POST['bayar'])){
    	if(!empty($_POST['pilihan'])){
    		foreach ($_POST['pilihan'] as $selected) {
    			$data[]=$selected;
    		}
    	}
    }
    $banyak= count($data);
    for($i=0; $i<$banyak; $i++){
    	$query="INSERT INTO struk VALUES ('$id_pembeli','$data[$i]')";
    	$result = mysqli_query($link,$query);
    }
    header('Location: invoice.php');
?>